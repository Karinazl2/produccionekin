<?php

date_default_timezone_set('America/Mexico_City');

function conectarDB(): mysqli {
    $db =new mysqli(
        $_ENV['DB_HOST'] ?? '',
        $_ENV['DB_USER'] ?? '',
        $_ENV['DB_PASS'] ?? '',
        $_ENV['DB_BD'] ?? ''
    );
    $db->set_charset("utf8");

    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}