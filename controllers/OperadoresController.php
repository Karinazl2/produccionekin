<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Operadores;
use Intervention\Image\ImageManagerStatic as Image;
use PHPMailer\PHPMailer\PHPMailer;

class OperadoresController
{
    public static function crear(Router $router)
    {
        $operador = new Operadores;

        //arreglo con mrnsaje de errores
        $errores = Operadores::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $errores= Operadores::getErrores();
        $operador = new Operadores($_POST['operadores']);


            //generar nombre único
            $nombreImagen = md5(uniqid(rand(), true));


            if ($_FILES['operadores']['tmp_name']['imagen']) {
                //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
                $image = Image::make($_FILES['operadores']['tmp_name']['imagen'])->fit(600, 800);
                $operador->setImagen($nombreImagen);


            }

            //revizar que el arreglo de errores esté vacío
            $errores=$operador->validar();
            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }


                    //Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                //subir imagen
                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $operador->guardar();
                header('Location:/nuestroEquipo/operadoresadmin');
            }

        }

        $router->render('operadores/crear', [
            'operador' => $operador,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validatRedireccionar('/');
        $operador = Operadores::find($id);
        $errores = Operadores::getErrores();
        // debuguear($operador);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $args = $_POST['operadores'];
            
            $operador->sincronizar($args);
            $errores = $operador->validar();
        //debuguear($operador);

        
            //generar nombre único
            $nombreImagen = md5(uniqid(rand(), true));
        
            if ($_FILES['operadores']['tmp_name']['imagen']) {
                //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
                $image = Image::make($_FILES['operadores']['tmp_name']['imagen'])->fit(600, 800);
                $operador->setImagen($nombreImagen);
           
        
            }
        
            //revizar que el arreglo de errores esté vacío
        
            if (empty($errores)) {
                if($_FILES['operadores']['tmp_name']['imagen']){        
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                } //subir imagen
        //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $operador->guardar();
                header('Location:/nuestroEquipo/operadoresadmin');
            }
        }

        $router->render('operadores/actualizar', [
            'operador'=> $operador,
            'errores'=> $errores

        ]);
    }

    public static function nuestroEquipo(Router $router)
    {
        $operadores=Operadores::all();
    //    debuguear( $operadores);
        $router->render('paginas/nuestroEquipo', [
            'operadores'=> $operadores
        ]);
    }

    public static function operadoresadmin(Router $router)
    {
        $operadores=Operadores::all();
    //    debuguear( $operadores);
        $router->render('paginas/operadoresadmin', [
            'operadores'=> $operadores
        ]);
    }

    public static function eliminar (){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //validadr id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $operador = Operadores::find($id);

                    $operador->eliminar('/nuestroEquipo/operadoresadmin');
                }
        
            }
        }
    }



}