<?php

namespace Controllers;

use Model\Cliente;
use Model\Nuevas_areas;
use Model\Operadores;
use Model\Referencia_cliente;
use Model\Vista_clientes;
use Model\Vista_nuevas_ordenes;
use MVC\Router;
use Model\Nuevas_ordenes;
use Model\Nuevas_maquinas;

class BusquedaNuevasController
{
    public static function busquedanuevas(Router $router)
    {
        $nuevas_areas=Nuevas_areas::all();
        $clientes=Cliente::all();
        $vista_clientes=Vista_clientes::all();
        $nuevas_maquinas=Nuevas_maquinas::all();
        $operadores=Operadores::all();

        $vista_nuevas_ordenes = Vista_nuevas_ordenes::all();
        $script = '<script src="../build/js/filtrosNuevas.js"></script>';



        $router->render('paginas/busquedanuevas', [
            'vista_nuevas_ordenes' => $vista_nuevas_ordenes,
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
        $nuevas_ordenes = new Nuevas_ordenes();
        //arreglo con mrnsaje de errores


        $errores = Nuevas_maquinas::getErrores();
        $maquinas = Nuevas_maquinas::all();
        $clientes = Cliente::all();
        $referencia_cliente = Referencia_cliente::all();
        $vista_clientes = Vista_clientes::all();
        $operadores = Operadores::all();
        $nuevas_areas = Nuevas_areas::all();


        // metodo post actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['nuevas_ordenes'];

            $nuevas_ordenes->sincronizar($args);
            $errores = $nuevas_ordenes->validar();
            //    debuguear($_FILES);

            //generar nombre único

            //Guarda en la base de datos.
            $nuevas_ordenes->guardar();
            header('Location:/busquedaPersonalizada/busquedanuevas');
        }


        $router->render('busquedanuevas/crear', [
            'nuevas_ordenes' => $nuevas_ordenes,
            'maquinas' => $maquinas,
            'clientes' => $clientes,
            'referencia_cliente_id' => $referencia_cliente,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'nuevas_areas' => $nuevas_areas,
            'errores' => $errores
        ]);

    }

    public static function actualizar(Router $router)
    {
        $id = validatRedireccionar('/');


        $nuevas_ordenes = Nuevas_ordenes::find($id);

        $maquinas = Nuevas_maquinas::find($id);
        //arreglo con mrnsaje de errores


        $errores = Nuevas_maquinas::getErrores();
        $maquinas = Nuevas_maquinas::all();
        $clientes = Cliente::all();

        $referencia_cliente = Referencia_cliente::all();
        $vista_clientes = Vista_clientes::all();
        $operadores = Operadores::all();
        $nuevas_areas = Nuevas_areas::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['nuevas_ordenes'];
            $nuevas_ordenes->sincronizar($args);
            $errores = $nuevas_ordenes->validar();

            //    debuguear($_FILES);



            //revizar que el arreglo de errores esté vacío

            if (empty($errores)) {
                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $nuevas_ordenes->guardar();
                header('Location:/busquedaPersonalizada/busquedanuevas');

            }
        }

        $router->render('/busquedanuevas/actualizar', [
            'nuevas_ordenes' => $nuevas_ordenes,
            'maquinas' => $maquinas,
            'clientes' => $clientes,
            'referencia_cliente_id' => $referencia_cliente,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'nuevas_areas' => $nuevas_areas,
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
                    $nuevas_ordenes = Nuevas_ordenes::find($id);
                    $nuevas_ordenes->eliminar('/busquedaPersonalizada/busquedanuevas');
                }

            }
        }
    }

    public static function siguiente_area()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //validadr id

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $nuevas_ordenes = Nuevas_ordenes::find($id);

                    $x = $nuevas_ordenes->area_id + 1;
                    $nuevas_ordenes->area_id = "$x";
                    $nuevas_ordenes->sincronizar();

                    //    debuguear($nuevas_ordenes);
                }

                $errores = $nuevas_ordenes->validar();

                //    debuguear($_FILES);

                //revizar que el arreglo de errores esté vacío

                if (empty($errores)) {
                    //Guarda en la base de datos.
                    $nuevas_ordenes->guardar();
                    header('Location:/busquedaPersonalizada/busquedanuevas');
                }
            }
        }
    }

    public static function filtrar()
    {
        $vista_nuevas_ordenes = Vista_nuevas_ordenes::all();
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
            'vista_nuevas_ordenes' => $vista_nuevas_ordenes,
            'vista_clientes' => $clientes_concatenados,
        ]);
    }
    
}




