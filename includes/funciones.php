<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/$nombre.php";
}

function estaAutenticado()
{
    session_start();
    if (!$_SESSION['login']) {
        header('Location: /');
    }
}


function convertDateFormat($dateStr) {
    $dateObj = DateTime::createFromFormat("Y-m-d", $dateStr);
    if ($dateObj === false) {
        // Manejo de errores en caso de que el formato de fecha sea incorrecto
        return "Fecha inválida";
    }
    return $dateObj->format("d-m");
}

function convertTimeFormat($timeStr) {
    $timeObj = DateTime::createFromFormat("H:i:s", $timeStr);
    if ($timeObj === false) {
        // Manejo de errores en caso de que el formato de tiempo sea incorrecto
        return "Hora inválida";
    }
    return $timeObj->format("H:i");
}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa en HTML //Sanitizar el html
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad', 'operador','anuncio', 'nuevas_ordenes', 'cremalleras_ordenes','afilado_ordenes','referencia_cliente', 'cliente'];
    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1;
            $mensaje = 'Creado correctamente';
            break;
        case 2;
            $mensaje = 'Actualizado correctamente';
            break;
        case 3;
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validatRedireccionar(string $url)
{
    // Validad url por id válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: $url");
    }
    return $id;
}

function aos_animacion() : void{
    $efectos = ['fade-up', 'fade-down', 'fade-left' , 'fade-right', 'flip-up', 'flip-down', 'flip-left', 'flip-right', 'zoom-in', 'zoom-in-up', 'zoom-in-down',  'zoom-out'];
    $efecto = array_rand($efectos, 1);
    echo ' data-aos="'.  $efectos[$efecto] . ' " ';
}