<?php

namespace Controllers;

use MVC\Router;
use Model\Cliente;
use Model\Operadores;
use Model\Afilado_areas;
use Model\TablaClientes;
use Model\Vista_clientes;
use Model\Afilado_ordenes;
use Model\Afilado_maquinas;
use Model\Referencia_cliente;
use Model\Vista_afilado_ordenes;

class BusquedaAfiladoController
{
    public static function busquedaafilado(Router $router)
    {
        $afilado_areas=Afilado_areas::all();
        $clientes=Cliente::all();

        $vista_clientes=Vista_clientes::all();
        $afilado_maquinas=Afilado_maquinas::all();
        $operadores=Operadores::all();

        $vista_afilado_ordenes = Vista_afilado_ordenes::all();
        $script = '<script src="../build/js/filtrosAfilado.js"></script>';


        $router->render('paginas/busquedaafilado',[
            'vista_afilado_ordenes' => $vista_afilado_ordenes,
            'afilado_areas' => $afilado_areas,
            'afilado_maquinas' => $afilado_maquinas,
            'clientes' => $clientes,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'script' => $script 

        ]);
    }

    public static function crear(Router $router)
    {
        $afilado_ordenes = new Afilado_ordenes();
        //arreglo con mrnsaje de errores


        $errores = Afilado_maquinas::getErrores();
        $maquinas = Afilado_maquinas::all();
        $clientes = Cliente::all();
        $referencia_cliente = Referencia_cliente::all();
        $vista_clientes = Vista_clientes::all();
        $operadores = Operadores::all();
        $afilado_areas = Afilado_areas::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $args = $_POST['afilado_ordenes'];

            $afilado_ordenes->sincronizar($args);
            $errores = $afilado_ordenes->validar();
            //    debuguear($_FILES);

            //generar nombre único

            //Guarda en la base de datos.
            $afilado_ordenes->guardar();
            header('Location:/busquedaPersonalizada/busquedaafilado');
        }

        $router->render('busquedaafilado/crear', [
            'afilado_ordenes' => $afilado_ordenes,
            'maquinas' => $maquinas,
            'clientes' => $clientes,
            'referencia_cliente_id' => $referencia_cliente,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'afilado_areas' => $afilado_areas,
            'errores' => $errores
        ]);


    }

    public static function actualizar(Router $router)
    {
        $id = validatRedireccionar('/');


        $afilado_ordenes = Afilado_ordenes::find($id);

        $maquinas = Afilado_maquinas::find($id);
        //arreglo con mrnsaje de errores


        $errores = Afilado_maquinas::getErrores();
        $maquinas = Afilado_maquinas::all();
        $clientes = Cliente::all();

        $referencia_cliente = Referencia_cliente::all();
        $vista_clientes = Vista_clientes::all();
        $operadores = Operadores::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['afilado_ordenes'];
            $afilado_ordenes->sincronizar($args);
            $errores = $afilado_ordenes->validar();

            //    debuguear($_FILES);



            //revizar que el arreglo de errores esté vacío

            if (empty($errores)) {
                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $afilado_ordenes->guardar();
                header('Location:/busquedaPersonalizada/busquedaafilado');

            }
        }

        $router->render('/busquedaafilado/actualizar', [
            'afilado_ordenes' => $afilado_ordenes,
            'maquinas' => $maquinas,
            'clientes' => $clientes,
            'referencia_cliente_id' => $referencia_cliente,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //validadr id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $afilado_ordenes = Afilado_ordenes::find($id);
                    $afilado_ordenes->eliminar('/busquedaPersonalizada/busquedaafilado');
                }

            }
        }
    }

    public static function filtrar()
    {
        $vista_afilado_ordenes = Vista_afilado_ordenes::all();
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
            'vista_afilado_ordenes' => $vista_afilado_ordenes,
            'vista_clientes' => $clientes_concatenados,
        ]);
    }
}

