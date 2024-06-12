<?php

namespace Controllers;

use Model\Anuncios;
use Model\Operadores;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {

    //    $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            // 'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function brochasNuevas(Router $router)
    {
        $router->render('paginas/brochasNuevas');
    }

    public static function cremalleras(Router $router)
    {
        $router->render('paginas/cremalleras');
    }

    public static function afilado(Router $router)
    {
        $router->render('paginas/afilado');
    }

    public static function busquedaPersonalizada(Router $router)
    {
        $router->render('paginas/busquedaPersonalizada');
    }


    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
            
        ]);

    }

    public static function propiedad(Router $router)
    {

        $id = \validatRedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);

    }

    public static function blog(Router $router)
    {
        $anuncios=Anuncios::all();


        $router->render('paginas/anuncios',[
            'anuncios' => $anuncios
        ]);

    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            //crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar smtp
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $_ENV['EMAIL_PORT'];

            //configurar contenido de email
            $mail->setFrom($_ENV['EMAIL_FROM']);
            $mail->addAddress($_ENV['EMAIL_FROM'], $_ENV['EMAIL_TO_2']);
            $mail->Subject = 'Tienes un nuevo mensaje';

            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contedido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

            //enviar de forma condicional agunos campos
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado por Teléfono:</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha Contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';

            
            
            } else {
                $contenido .= '<p>Eligió ser contactado por email:</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            
            }


            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: $' . $respuestas['precio'] . '</p>';
            $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] . '</p>';

            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin html';
            //Enviar el email
            if ($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

}