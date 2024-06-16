<?php

namespace Controllers;

use MVC\Router;

class BusquedaCremallerasController{
public static function busquedacremalleras(Router $router)
    {
        $router->render('paginas/busquedacremalleras');
    }
}
