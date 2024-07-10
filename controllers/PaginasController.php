<?php

namespace Controllers;

use MVC\Router;
use cremalleras;
use Model\Anuncios;
use Model\Propiedad;
use Model\Operadores;
use Model\Nuevas_ordenes;
use Model\TablaNuevasOrdenes;
use Model\TablaAfiladoOrdenes;
use Model\Vista_nuevas_ordenes;
use Model\Vista_afilado_ordenes;
use Model\TablaCremallerasOrdenes;
use PHPMailer\PHPMailer\PHPMailer;
use Model\Vista_cremalleras_ordenes;

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
        $vista_nuevas_jarbe1 = Vista_nuevas_ordenes::where2_colums_asc('nombre_maquina', 'nombre_area', 'JARBE', 'ASIENTOS DE LUNETA', 'prioridad_orden');
        $vista_nuevas_jarbe2 = Vista_nuevas_ordenes::where2_colums_asc('nombre_maquina', 'nombre_area', 'JARBE', 'RECTIFICADO DE DIENTES', 'prioridad_orden');
        $vista_nuevas_india1 = Vista_nuevas_ordenes::where2_colums_asc('nombre_maquina', 'nombre_area', 'INDIA', 'RECTIFICADO DE DIENTES', 'prioridad_orden');
        $vista_nuevas_122_1 = Vista_nuevas_ordenes::where2_colums_asc('nombre_maquina', 'nombre_area', 'MAQ. 122', 'RECTIFICADO DE DIENTES', 'prioridad_orden');
        $vista_nuevas_doimak = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'DOIMAK', 'prioridad_orden');
        $vista_nuevas_danobat = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'DANOBAT', 'prioridad_orden');
        $vista_nuevas_india2 = Vista_nuevas_ordenes::where2_colums_asc('nombre_maquina', 'nombre_area', 'INDIA', 'RECTIFICADO DE MANGOS', 'prioridad_orden');
        $vista_nuevas_122_2 = Vista_nuevas_ordenes::where2_colums_asc('nombre_maquina', 'nombre_area', 'MAQ. 122', 'RECTIFICADO DE MANGOS', 'prioridad_orden');
        $vista_nuevas_jarbe3 = Vista_nuevas_ordenes::where2_colums_asc('nombre_maquina', 'nombre_area', 'JARBE', 'RECTIFICADO DE MANGOS', 'prioridad_orden');
        $vista_nuevas_23 = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'ACANALADO MAQ. 23', 'prioridad_orden');
        $vista_nuevas_29 = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'ACANALADO MAQ. 29', 'prioridad_orden');
        $vista_nuevas_24 = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'ACANALADO MAQ. 24', 'prioridad_orden');
        $vista_nuevas_recubrimiento = Vista_nuevas_ordenes::ordenasc('nombre_area', 'RECUBRIMIENTO', 'prioridad_orden');
        $vista_nuevas_1200 = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'AFILADO MAQ. 1200', 'prioridad_orden');
        $vista_nuevas_116 = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'AFILADO MAQ. 116', 'prioridad_orden');
        $vista_nuevas_131 = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'AFILADO MAQ. 131', 'prioridad_orden');
        $vista_nuevas_tachella = Vista_nuevas_ordenes::ordenasc('nombre_maquina', 'TACHELLA', 'prioridad_orden');
        $script = '<script src="/build/js/tablas.js"></script>';

        $vista_nuevas_terminadas = Vista_nuevas_ordenes::contarmes('nombre_area', 'TERMINADA', 'prioridad_orden');
        $cuenta_terminadas = count($vista_nuevas_terminadas);

        $vista_nuevas_total = Vista_nuevas_ordenes::totalenproduccion('nombre_area', 'nombre_area', 'nombre_area', 'nombre_area', 'nombre_area', 'nombre_area', 'nombre_area', 'ASIENTOS DE LUNETA', 'RECTIFICADO DE DIENTES', 'RECTIFICADO DE MANGOS', 'ACANALADO', 'RECUBRIMIENTO', 'PLANOS Y ENGANCHES', 'AFILADO', 'orden_id');
        $cuenta = count($vista_nuevas_total);
        $mes_actual_numero = date('n');
        $meses = [
            1 => 'ENERO',
            2 => 'FEBRERO',
            3 => 'MARZO',
            4 => 'ABRIL',
            5 => 'MAYO',
            6 => 'JUNIO',
            7 => 'JULIO',
            8 => 'AGOSTO',
            9 => 'SEPTIEMBRE',
            10 => 'OCTUBRE',
            11 => 'NOVIEMBRE',
            12 => 'DICIEMBRE',
        ];

        $mes_actual = $meses[$mes_actual_numero];

        $router->render('paginas/brochasNuevas', [
            'vista_nuevas_jarbe1' => $vista_nuevas_jarbe1,
            'vista_nuevas_jarbe2' => $vista_nuevas_jarbe2,
            'vista_nuevas_india1' => $vista_nuevas_india1,
            'vista_nuevas_122_1' => $vista_nuevas_122_1,
            'vista_nuevas_doimak' => $vista_nuevas_doimak,
            'vista_nuevas_danobat' => $vista_nuevas_danobat,
            'vista_nuevas_india2' => $vista_nuevas_india2,
            'vista_nuevas_122_2' => $vista_nuevas_122_2,
            'vista_nuevas_jarbe3' => $vista_nuevas_jarbe3,
            'vista_nuevas_23' => $vista_nuevas_23,
            'vista_nuevas_29' => $vista_nuevas_29,
            'vista_nuevas_24' => $vista_nuevas_24,
            'vista_nuevas_recubrimiento' => $vista_nuevas_recubrimiento,
            'vista_nuevas_1200' => $vista_nuevas_1200,
            'vista_nuevas_116' => $vista_nuevas_116,
            'vista_nuevas_131' => $vista_nuevas_131,
            'vista_nuevas_tachella' => $vista_nuevas_tachella,
            'cuenta' => $cuenta,
            'vista_nuevas_total' => $vista_nuevas_total,
            'script' => $script,
            'vista_nuevas_terminadas' => $vista_nuevas_terminadas,
            'cuenta_terminadas' => $cuenta_terminadas,
            'mes_actual' => $mes_actual

        ]);
    }

    public static function cremalleras(Router $router)
    {
        $vista_cremalleras_39 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina', 'PLANEADO MAQ. 39', 'prioridad_orden');
        $vista_cremalleras_41 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina', 'PLANEADO MAQ. 41', 'prioridad_orden');
        $vista_cremalleras_58 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina', 'MECANIZADO MAQ. 58', 'prioridad_orden');
        $vista_cremalleras_54 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina', 'MECANIZADO MAQ. 54', 'prioridad_orden');
        $vista_cremalleras_125 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina', 'MECANIZADO MAQ. 125', 'prioridad_orden');
        $vista_cremalleras_60 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina', 'PLANAS MAQ. 60', 'prioridad_orden');
        $vista_cremalleras_59 = Vista_cremalleras_ordenes::ordenasc('nombre_maquina', 'CIL Y HELIC MAQ. 59', 'prioridad_orden');
        $script = '<script src="/build/js/tablas1.js"></script>';

        $vista_cremalleras_terminadas = Vista_cremalleras_ordenes::contarmes('nombre_area', 'TERMINADA', 'prioridad_orden');
        $cuenta_terminadas = count($vista_cremalleras_terminadas);

        $vista_cremalleras_total = Vista_cremalleras_ordenes::ordenasc4('nombre_area', 'PLANEADO', 'MECANIZADO', 'DETALLES', 'PLANAS');
        $cuenta = count($vista_cremalleras_total);


        $mes_actual_numero = date('n');
        $meses = [
            1 => 'ENERO',
            2 => 'FEBRERO',
            3 => 'MARZO',
            4 => 'ABRIL',
            5 => 'MAYO',
            6 => 'JUNIO',
            7 => 'JULIO',
            8 => 'AGOSTO',
            9 => 'SEPTIEMBRE',
            10 => 'OCTUBRE',
            11 => 'NOVIEMBRE',
            12 => 'DICIEMBRE',
        ];

        $mes_actual = $meses[$mes_actual_numero];

        $router->render('paginas/cremalleras', [
            'vista_cremalleras_39' => $vista_cremalleras_39,
            'vista_cremalleras_41' => $vista_cremalleras_41,
            'vista_cremalleras_58' => $vista_cremalleras_58,
            'vista_cremalleras_54' => $vista_cremalleras_54,
            'vista_cremalleras_125' => $vista_cremalleras_125,
            'vista_cremalleras_60' => $vista_cremalleras_60,
            'vista_cremalleras_59' => $vista_cremalleras_59,
            'cuenta' => $cuenta,
            'cuenta_terminadas' => $cuenta_terminadas,
            'vista_cremalleras_total' => $vista_cremalleras_total,
            'vista_cremalleras_terminadas' => $vista_cremalleras_terminadas,
            'mes_actual' => $mes_actual,
            'script' => $script
        ]);
    }

    public static function afilado(Router $router)
    {
        // $consulta = new Vista_afilado_ordenes;
        // $consulta = $consulta->consulta();
        // debuguear($consulta);
        // $vista_afilado=Vista_afilado_ordenes::SQL($consulta);
        $vista_afilado_1200 = Vista_afilado_ordenes::ordenasc('nombre_maquina', 'AFILADO MAQ. 1200', 'prioridad_orden');
        $vista_afilado_116 = Vista_afilado_ordenes::ordenasc('nombre_maquina', 'AFILADO MAQ. 116', 'prioridad_orden');
        $vista_afilado_131 = Vista_afilado_ordenes::ordenasc('nombre_maquina', 'AFILADO MAQ. 131', 'prioridad_orden');
        // debuguear($vista_afilado_131);


        $script = '<script src="/build/js/tablas2.js"></script>';

        $vista_afilado_terminadas = Vista_afilado_ordenes::contarmes('nombre_maquina', 'TERMINADA', 'id');
        $cuenta_terminadas = count($vista_afilado_terminadas);


        // $vista_afilado_terminadas = Vista_afilado_ordenes::contarmes('nombre_maquina', 'TERMINADA', 'orden_id');
        // $cuenta_terminadas = count($vista_afilado_terminadas);

        $vista_afilado_total = Vista_afilado_ordenes::totalafi();
        $cuenta = count($vista_afilado_total);

        $mes_actual_numero = date('n');
        $meses = [
            1 => 'ENERO',
            2 => 'FEBRERO',
            3 => 'MARZO',
            4 => 'ABRIL',
            5 => 'MAYO',
            6 => 'JUNIO',
            7 => 'JULIO',
            8 => 'AGOSTO',
            9 => 'SEPTIEMBRE',
            10 => 'OCTUBRE',
            11 => 'NOVIEMBRE',
            12 => 'DICIEMBRE',
        ];

        $mes_actual = $meses[$mes_actual_numero];


        $router->render('paginas/afilado', [
            'vista_afilado_1200' => $vista_afilado_1200,
            'vista_afilado_131' => $vista_afilado_131,
            'vista_afilado_116' => $vista_afilado_116,
            'vista_afilado_terminadas' => $vista_afilado_terminadas,
            'vista_afilado_total' => $vista_afilado_total,
            'cuenta' => $cuenta,
            'cuenta_terminadas' => $cuenta_terminadas,
            'mes_actual' => $mes_actual,
            'script' => $script
        ]);
    }

    public static function busquedaPersonalizada(Router $router)
    {
        $router->render('paginas/busquedaPersonalizada');
    }

    public static function materiaprima(Router $router)
    {
        $vista_nuevas_materiaprima = Vista_nuevas_ordenes::ordenasc('nombre_area', 'MATERIA PRIMA', 'prioridad_orden');
        $cuenta_materiaprima = count($vista_nuevas_materiaprima);

        $vista_cremalleras_materiaprima = Vista_cremalleras_ordenes::ordenasc('nombre_area', 'MATERIA PRIMA', 'prioridad_orden');
        $cuenta_materiaprimac = count($vista_cremalleras_materiaprima);

        $router->render('paginas/materiaprima', [
            'vista_nuevas_materiaprima' => $vista_nuevas_materiaprima,
            'vista_cremalleras_materiaprima' => $vista_cremalleras_materiaprima,
            'cuenta_materiaprima' => $cuenta_materiaprima,
            'cuenta_materiaprimac' => $cuenta_materiaprimac

        ]);
    }


    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $vista_nuevas_materiaprima = Vista_nuevas_ordenes::ordenasc('nombre_area', 'MATERIA PRIMA', 'prioridad_orden');

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
        $anuncios = Anuncios::all();


        $router->render('paginas/anuncios', [
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

    public static function error(Router $router) {
        $router->render('paginas/error',[
            'titulo' => 'Página no Encontrada'
        ]);
    }
}