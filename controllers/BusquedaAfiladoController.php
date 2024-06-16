<?php

namespace Controllers;

use MVC\Router;

class BusquedaAfiladoController{
public static function busquedaafilado(Router $router)
    {
        $router->render('paginas/busquedaafilado');
    }
}