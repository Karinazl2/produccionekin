<?php

namespace Controllers;
use MVC\Router;
use Model\Anuncios;
use Intervention\Image\ImageManagerStatic as Image;


class AnunciosController
{

    public static function crear(Router $router)
    {
        $anuncio = new Anuncios;

        //arreglo con mrnsaje de errores
        $errores = Anuncios::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $errores = Anuncios::getErrores();
            $anuncio = new Anuncios($_POST['anuncios']);


            //generar nombre único
            $nombreImagen = md5(uniqid(rand(), true));


            if ($_FILES['anuncios']['tmp_name']['imagen']) {
                //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
                $image = Image::make($_FILES['anuncios']['tmp_name']['imagen'])->fit(600, 800);
                $anuncio->setImagen($nombreImagen);


            }

            $errores = $anuncio->validar();
            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }


                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                //subir imagen
                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $anuncio->guardar();
                header('Location:/nuestroEquipo/operadoresadmin');
            }

        }

        $router->render('anuncios/crear', [
            'anuncio' => $anuncio,
            'errores' => $errores
        ]);
    }

    public static function anunciosadmin(Router $router){

        $anuncios=Anuncios::all();

        if($_SERVER['REQUEST_METHOD']==='POST'){
            debuguear($_POST);
        }

        $router->render('paginas/anunciosadmin',[
            'anuncios'=> $anuncios
        ]);

    }


}
