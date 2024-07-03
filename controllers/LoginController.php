<?php

namespace Controllers;

use Classes\Email;
use Model\Usuarios;
use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if (empty($errores)) {
                //Veriificar si el usuario existe
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    //mensaje de error
                    $errores = Admin::getErrores();
                } else {
                    //Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if ($autenticado) {
                        //autenticar al usuario
                        $usuarioLogueado = Usuarios::where('email', $_POST['email']);
                        $usuarioLogueado = get_object_vars($usuarioLogueado);
                        $usuario = new Usuarios($usuarioLogueado);
                        if(!isset($_SESSION)){
                            session_start();
                        }

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['login'] = true;
                        $_SESSION['rol'] = $usuario->rol_id ?? null;

                        if($_SESSION['rol']=== "1" ){
                            echo "admin";
                        } else {
                            echo "Mesero";
                        }
                        exit;

                    } else {
                        //password incorrecto mensaje de error
                        $errores = Admin::getErrores();

                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function registrar(Router $router)
    {
        $errores = [];
        $usuario = new Usuarios;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);

            $errores = $usuario->validarNuevacuenta();

            if (empty($errores)) {
                $existeUsuario = $usuario->existeUsuario();
                if ($existeUsuario->num_rows > 0) {
                    $errores = Usuarios::getErrores();
                    Usuarios::setError('El uasuario ya está registrado');
                } else {
                    $usuario->hashPassword();
                    unset($usuario->password2);
                    $usuario->crearToken();
                    $resultado = $usuario->guardar();
                    $usuarioNuevo = $usuario->where('email', $usuario->email);
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if($resultado){
                        header('Location: /mensaje');
                    }

                }
            }

        }
        $router->render('auth/registrar', [
            'errores' => $errores,
            'usuario' => $usuario
        ]);
    }

    public static function mensaje(Router $router){
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router){
        $token = $_GET['token'];

        if(!$token) header('Location: /');

        $usuario = Usuarios::where('token', $token);

        if(empty($usuario)){
            Usuarios::setError('La cuenta no se confirmó');
            $errores = Usuarios::getErrores();

        } else {
            $usuario->confirmado = 1;
            $usuario->token = '';
            unset($usuario->password2);
            $usuario->guardar();
        }
        $router->render('auth/confirmar',[
        'errores'=> $errores
        ]);
    }

    public static function recuperar(Router $router)
    {
        $errores =[];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuarios($_POST);
            $errores = $usuario->validarEmail();

            if(empty($errores)){
            $usuario= Usuarios::where('email',$usuario->email);
            $usuario = $usuario;

            if($usuario && $usuario->confirmado){
                $usuario->crearToken();
                unset($usuario->password2);
                $usuario->guardar();

                $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                $email->enviarInstrucciones();
                $exito[] = 'Hemos enviado las instrucciones a tu email';
            } else {
                $errores[] ='El Usuario no existe o no está confirmado';
            }
        }
    }
        $router->render('auth/recuperar', [
            'errores' => $errores,
            'exito' => $exito
        ]);
    }

    public static function reestablecer(Router $router){
        $token = s($_GET['token']);
        $token_valido = true;
        if(!$token){
            header('Location: /');
        }

        $usuario = Usuarios::where('token', $token);
        if(empty($usuario)){
            Usuarios::setError('Token No válido');
            $token_valido = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nuevoPassword = $_POST['password'];
            $usuarioActualizado = get_object_vars($usuario); 
            $usuarioActualizado['password'] = $nuevoPassword;
            $usuario = new Usuarios($usuarioActualizado);

            $errores = $usuario->validarPassword();

            if(empty($errores)){
                $usuario->hashPassword();
                $usuario->token = null;
                $resultado = $usuario->guardar();

                if($resultado){
                    header('Location: /login');
                }
            }
        }
        $errores = Usuarios::getErrores();
        $router->render('auth/reestablecer',[
            'errores'=> $errores,
            'token_valido'=> $token_valido
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}