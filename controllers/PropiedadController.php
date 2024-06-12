<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;
use Model\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router)
    {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
    //arreglo con mrnsaje de errores
        $errores = Propiedad::getErrores();
    //metodo post actuslizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['propiedad'];
            
            $propiedad->sincronizar($args);
            $errores = $propiedad->validar();
        //    debuguear($_FILES);
        
            //generar nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
        
            }
        
            //revizar que el arreglo de errores esté vacío
        
            if (empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']){        
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                } //subir imagen
        //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,  
            'errores' => $errores      
        ]);

    }

    public static function actualizar(Router $router)
    {
        $id = \validatRedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        
        
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['propiedad'];
            
            $propiedad->sincronizar($args);
            $errores = $propiedad->validar();
        //    debuguear($_FILES);
        
            //generar nombre único
            $nombreImagen = md5(uniqid(rand(), true));
        
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                //REALIZA UN RESIZE A LA IMAGEN CON INTERVENTION
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
        
            }
        
            //revizar que el arreglo de errores esté vacío
        
            if (empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']){        
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                } //subir imagen
        //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
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
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
        
            }
        }
    }
}
