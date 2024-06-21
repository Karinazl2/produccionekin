<?php

namespace Controllers;

use Model\Cremalleras_ordenes;
use Model\Referencia_cliente;
use Model\Vista_cremalleras_ordenes;
use MVC\Router;
use cremalleras;
use Model\Cliente;
use Model\Operadores;
use Model\Vista_clientes;
use Model\Cremalleras_areas;
use Model\Cremalleras_maquinas;

class BusquedaCremallerasController{
public static function busquedacremalleras(Router $router)
    {

        $nuevas_areas=Cremalleras_areas::all();
        $clientes=Cliente::all();
        $vista_clientes=Vista_clientes::all();
        $nuevas_maquinas=Cremalleras_maquinas::all();
        $operadores=Operadores::all();

        $vista_cremalleras_ordenes=Vista_cremalleras_ordenes::all();
        $script = '<script src="../build/js/filtrosCremalleras.js"></script>';



        $router->render('paginas/busquedacremalleras', [
        'vista_cremalleras_ordenes' => $vista_cremalleras_ordenes,
            'nuevas_areas' => $nuevas_areas,
            'nuevas_maquinas' => $nuevas_maquinas,
            'clientes' => $clientes,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'script' => $script
        
        
        ]);
    }

    public static function crear(Router $router)
    {
        $cremalleras_ordenes = new Cremalleras_ordenes();
        //arreglo con mrnsaje de errores


        $errores = Cremalleras_maquinas::getErrores();
        $maquinas = Cremalleras_maquinas::all();
        $clientes = Cliente::all();
        $referencia_cliente = Referencia_cliente::all();
        $vista_clientes = Vista_clientes::all();
        $operadores = Operadores::all();
        $cremalleras_areas = Cremalleras_areas::all();




        // metodo post actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // debuguear($_POST);
            $args = $_POST['cremalleras_ordenes'];

            $cremalleras_ordenes->sincronizar($args);
            $errores = $cremalleras_ordenes->validar();
            //    debuguear($_FILES);

            //generar nombre único

            //Guarda en la base de datos.
            $cremalleras_ordenes->guardar();
            header('Location:/busquedaPersonalizada/busquedacremalleras');
        }


        $router->render('busquedacremalleras/crear', [
            'cremalleras_ordenes' => $cremalleras_ordenes,
            'maquinas' => $maquinas,
            'clientes' => $clientes,
            'referencia_cliente_id' => $referencia_cliente,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'cremalleras_areas' => $cremalleras_areas,
            'errores' => $errores
        ]);

    }

    
    public static function actualizar(Router $router)
    {
        $id = validatRedireccionar('/');


        $cremalleras_ordenes = Cremalleras_ordenes::find($id);
        $maquinas = Cremalleras_maquinas::find($id);
        //arreglo con mrnsaje de errores


        $errores = Cremalleras_maquinas::getErrores();
        $maquinas = Cremalleras_maquinas::all();
        $clientes = Cliente::all();

        $referencia_cliente = Referencia_cliente::all();
        $vista_clientes = Vista_clientes::all();
        $operadores = Operadores::all();
        $cremalleras_areas = Cremalleras_areas::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['cremalleras_ordenes'];
            $cremalleras_ordenes->sincronizar($args);
            $errores = $cremalleras_ordenes->validar();

            //    debuguear($_FILES);



            //revizar que el arreglo de errores esté vacío

            if (empty($errores)) {
                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $cremalleras_ordenes->guardar();
                header('Location:/busquedaPersonalizada/busquedacremalleras');

            }
        }

        $router->render('busquedacremalleras/actualizar', [
            'cremalleras_ordenes' => $cremalleras_ordenes,
            'maquinas' => $maquinas,
            'clientes' => $clientes,
            'referencia_cliente_id' => $referencia_cliente,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'cremalleras_areas' => $cremalleras_areas,
            'errores' => $errores
        ]);
    }

    public static function filtrar()
    {
        $vista_cremalleras_ordenes = Vista_cremalleras_ordenes::all();
        $vista_clientes = Vista_clientes::all();
    
        // Concatenar referencia_cliente y nombre_cliente
        $clientes_concatenados = [];
        foreach ($vista_clientes as $cliente) {
            $clientes_concatenados[] = [
                'cliente_id' => $cliente->cliente_id,
                'cliente_concatenado' => $cliente->referencia_cliente . ' ' . $cliente->nombre_cliente
            ];
        }
    
        echo json_encode([
            'vista_cremalleras_ordenes' => $vista_cremalleras_ordenes,
            'vista_clientes' => $clientes_concatenados
        ]);
    }


}
