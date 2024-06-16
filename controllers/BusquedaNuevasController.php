<?php

namespace Controllers;
use Model\Cliente;
use Model\Referencia_cliente;
use MVC\Router;
use Model\Nuevas_ordenes;
use Model\Nuevas_maquinas;

class BusquedaNuevasController
{
    public static function busquedanuevas(Router $router)
    {
        $router->render('paginas/busquedanuevas');
    }

    public static function crear(Router $router)
    {
        $nuevas_ordenes = new Nuevas_ordenes();
        //arreglo con mrnsaje de errores


        $errores = Nuevas_maquinas::getErrores();
        $maquinas = Nuevas_maquinas::all();
        $clientes = Cliente::all();
        $referencia_cliente = Referencia_cliente::all();


        // metodo post actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['nuevas_ordenes'];

            $nuevas_ordenes->sincronizar($args);
            $errores = $nuevas_ordenes->validar();
            //    debuguear($_FILES);

            //generar nombre único

            //Guarda en la base de datos.
            $nuevas_ordenes->guardar();
        }


        $router->render('busquedanuevas/crear', [
            'nuevas_ordenes' => $nuevas_ordenes,
            'maquinas' => $maquinas,
            'clientes' => $clientes,
            'referencia_cliente_id' => $referencia_cliente,

            'errores' => $errores
        ]);

    }
}