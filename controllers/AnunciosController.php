<?php

namespace Controllers;

use MVC\Router;
use Model\Anuncios;
use Intervention\Image\ImageManagerStatic as Image;


class AnunciosController
{

    public static function crear(Router $router)
    {
        isAdmin();

        $anuncio = new Anuncios;

        //arreglo con mrnsaje de errores
        $errores = Anuncios::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            isAdmin();

            $errores = Anuncios::getErrores();
            $anuncio = new Anuncios($_POST['anuncios']);


            //generar nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            if ($_FILES['anuncios']['tmp_name']['imagen']) {
                //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
                $image = Image::make($_FILES['anuncios']['tmp_name']['imagen'])->fit(800, 600);
                $anuncio->setImagen($nombreImagen);


            }

            $errores = $anuncio->validar();
            if (empty($errores)) {
                if ($_FILES['anuncios']['tmp_name']['imagen']) {   


                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                //subir imagen
                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $anuncio->guardar();
                header('Location:/anuncios');
            }

        }

        $router->render('anuncios/crear', [
            'anuncio' => $anuncio,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {

        isAdmin();

        $id = \validatRedireccionar('/anuncios');
        $anuncio = Anuncios::find($id);
        $errores = Anuncios::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            isAdmin();

            $args = $_POST['anuncios'];

            $anuncio->sincronizar($args);
            $errores = $anuncio->validar();

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['anuncios']['tmp_name']['imagen']) {
                //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
                $image = Image::make($_FILES['anuncios']['tmp_name']['imagen'])->fit(800, 600);
                $anuncio->setImagen($nombreImagen);

            }

            if (empty($errores)) {
                if ($_FILES['anuncios']['tmp_name']['imagen']) {
                    //Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                } //subir imagen
                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $anuncio->guardar();
            }

        }


        $router->render('anuncios/actualizar', [
            'anuncio' => $anuncio,
            'errores' => $errores
        ]);


    }


    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            isAdmin();
            //validadr id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $anuncio = Anuncios::find($id);
                    $anuncio->eliminar('/anuncios/anunciosadmin');
                }

            }
        }
    }



    public static function anunciosadmin(Router $router)
    {
        isAdmin();
        $anuncios = Anuncios::all();

        $router->render('paginas/anunciosadmin', [
            'anuncios' => $anuncios
        ]);

    }

    public static function anuncio(Router $router)
    {

        $id = \validatRedireccionar('/anuncios');
        $anuncio = Anuncios::find($id);


        $router->render('paginas/anuncio', [
            'anuncio' => $anuncio
        ]);


    }
}
