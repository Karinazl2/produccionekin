<?php

namespace Controllers;

use Model\Vista_cremalleras_ordenes;
use MVC\Router;
use cremalleras;
use Model\Anuncios;
use Model\Propiedad;
use Model\Operadores;
use Model\Nuevas_ordenes;
use Model\Vista_nuevas_ordenes;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {

    //    $propiedades = Propiedad::get(3);
        $inicio = true;
        $anuncios = Anuncios::get(2);

        $router->render('paginas/index', [
            // 'propiedades' => $propiedades,
            'inicio' => $inicio,
            'anuncios' => $anuncios

        ]);
    }

    public static function brochasNuevas(Router $router)
    {

        $vista_nuevas_jarbe = Vista_nuevas_ordenes::ordenasc('nombre_maquina','JARBE','prioridad_orden');
        $vista_nuevas_122 = Vista_nuevas_ordenes::ordenasc('nombre_maquina','MAQ. 122.','prioridad_orden');
        $vista_nuevas_india = Vista_nuevas_ordenes::ordenasc('nombre_maquina','INDIA','prioridad_orden');    
        $vista_nuevas_29 = Vista_nuevas_ordenes::ordenasc('nombre_maquina','ACANALADO MAQ. 29','prioridad_orden');    
        $vista_nuevas_24 = Vista_nuevas_ordenes::ordenasc('nombre_maquina','ACANALADO MAQ. 24','prioridad_orden');    
        $vista_nuevas_23 = Vista_nuevas_ordenes::ordenasc('nombre_maquina','ACANALADO MAQ. 23','prioridad_orden');    
        $vista_nuevas_1200 = Vista_nuevas_ordenes::ordenasc('nombre_maquina','AFILADO MAQ. 1200','prioridad_orden');    
        $vista_nuevas_116 = Vista_nuevas_ordenes::ordenasc('nombre_maquina','AFILADO MAQ. 116','prioridad_orden');
        $vista_nuevas_131 = Vista_nuevas_ordenes::ordenasc('nombre_maquina','AFILADO MAQ. 131','prioridad_orden');
        $vista_nuevas_tachella = Vista_nuevas_ordenes::ordenasc('nombre_maquina','TACHELLA','prioridad_orden');
        $vista_nuevas_doimak = Vista_nuevas_ordenes::ordenasc('nombre_maquina','DOIMAK','prioridad_orden');
        // debuguear($vista_nuevas_jarbe);
        $vista_nuevas_danobat = Vista_nuevas_ordenes::ordenasc('nombre_maquina','DANOBAT','prioridad_orden');


        $router->render('paginas/brochasNuevas',[
            'vista_nuevas_jarbe' => $vista_nuevas_jarbe,
            'vista_nuevas_122' => $vista_nuevas_122,
            'vista_nuevas_india' => $vista_nuevas_india,
            'vista_nuevas_29' => $vista_nuevas_29,
            'vista_nuevas_24' => $vista_nuevas_24,
            'vista_nuevas_23' => $vista_nuevas_23,
            'vista_nuevas_1200' => $vista_nuevas_1200,
            'vista_nuevas_116' => $vista_nuevas_116,
            'vista_nuevas_131' => $vista_nuevas_131,
            'vista_nuevas_tachella' =>$vista_nuevas_tachella,
            'vista_nuevas_doimak' => $vista_nuevas_doimak,
            'vista_nuevas_danobat' => $vista_nuevas_danobat,
        ]);
    }

    public static function cremalleras(Router $router)
    {
        $vista_cremalleras_39 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina','PLANEADO MAQ. 39','prioridad_orden');
        $vista_cremalleras_41 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina','PLANEADO MAQ. 41','prioridad_orden');
        $vista_cremalleras_58 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina','MECANIZADO MAQ. 58','prioridad_orden');
        $vista_cremalleras_54 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina','MECANIZADO MAQ. 54','prioridad_orden');
        $vista_cremalleras_125 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina','MECANIZADO MAQ. 125','prioridad_orden');

        $router->render('paginas/cremalleras', [
            'vista_cremalleras_39'=> $vista_cremalleras_39,
            'vista_cremalleras_41'=> $vista_cremalleras_41,
            'vista_cremalleras_58'=> $vista_cremalleras_58,
            'vista_cremalleras_54'=> $vista_cremalleras_54,
            'vista_cremalleras_125'=> $vista_cremalleras_125
        ]);
    }

    public static function afilado(Router $router)
    {
        $router->render('paginas/afilado');
    }

    public static function busquedaPersonalizada(Router $router)
    {
        $router->render('paginas/busquedaPersonalizada');
    }

    public static function materiaprima(Router $router){
        $vista_materiaprima = Vista_nuevas_ordenes::ordenasc('nombre_area','MATERIA PRIMA','prioridad_orden');

        $router->render('paginas/materiaprima', 
        ['vista_materiaprima'=>$vista_materiaprima
        ]);
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