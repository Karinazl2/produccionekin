<?php

namespace Controllers;

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
                        $auth->autenticar();

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

    public static function recuperar(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            debuguear($_POST);
        }
        $router->render('auth/recuperar', [
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
                if ($existeUsuario) {
                    echo "Ya existe";
                } else {
                    "No existe";
                }
            }

        }
        $router->render('auth/registrar', [
            'errores' => $errores,
            'usuario' => $usuario
        ]);
    }

    public static function logout()
    {
        session_start();

        $_SESSION = [];

        header('Location: /');

    }
}