<?php

namespace Controllers;

use MVC\Router;

class BusquedaPersonalizadaController{
    public static function busquedaafilado(Router $router)
    {
        $router->render('paginas/busquedaafilado');
    }
    public static function busquedacremalleras(Router $router)
    {
        $router->render('paginas/busquedacremalleras');
    }

    public static function busquedanuevas(Router $router)
    {
        $router->render('paginas/busquedanuevas');
    }
}