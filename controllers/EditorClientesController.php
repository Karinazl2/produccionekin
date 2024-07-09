<?php

namespace Controllers;

use Model\Referencia_cliente;
use Model\Vista_clientes;
use MVC\Router;
use Model\Cliente;

class EditorClientesController
{
    public static function editorclientes(Router $router)
    {
        $clientes = Cliente::all();
        $vista_clientes = Vista_clientes::all();

        $router->render('paginas/editorclientes', [
            'clientes' => $clientes,
            'vista_clientes' => $vista_clientes,
        ]);
    }

    public static function crear(Router $router)
    {
        $referencia_cliente = new Referencia_cliente;
        $cliente = new Cliente();
        $errores = Cliente::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $argsref = $_POST['referencia_cliente'];
            $referencia = $argsref['referencia'];
            // debuguear($argsref);
            $referencia_cliente->sincronizar($argsref);
            $errores = $referencia_cliente->validar();

            $referencia_cliente->guardar();

            $nuevaref = Referencia_cliente::where('referencia', $referencia_cliente->referencia);

            if ($referencia_cliente) {
                $referencia_cliente_id = $nuevaref->id;

                $argscliente = $_POST['cliente'];
                $argscliente['referencia_cliente_id'] = $nuevaref->id;
                // debuguear($argscliente);

                $nombre = $argscliente['nombre'];
                $referencia_id = $argscliente['referencia_cliente_id'];

                $tansftabla = new Vista_clientes();
                $tansftabla->nombre_cliente = $nombre;
                $tansftabla->referencia_id = $referencia_id;
                $tansftabla->referencia_cliente = $referencia;

                $cliente->sincronizar($argscliente);
                // $cliente->referencia_cliente_id = $referencia_cliente_id;

                $errores = $cliente->validar();

                // $errores = $nuevaref->validar();
                // $errores = end($errores);

                if (empty($errores)) {
                    $cliente->guardar();
                    $tansftabla->guardar();
                    header('Location:/editorclientes');
                }
            }
        }
        $router->render('editorclientes/crear', [
            'cliente' => $cliente,
            'referencia_cliente_id' => $referencia_cliente,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validatRedireccionar('/');


        $referencia_cliente = Referencia_cliente::find($id);
        $id = $referencia_cliente->id;
        $cliente = Cliente::where('referencia_cliente_id', $id);
        // debuguear($cliente);
        // debuguear($cliente);
        //arreglo con mrnsaje de errores
        $errores = Cliente::getErrores();
        // $referencia_cliente =Referencia_cliente::all();
        // $cliente = Cliente::all();

        $vista_clientes = Vista_clientes::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $argsref = $_POST['referencia_cliente'];
            $referencia = $argsref['referencia'];
            $referencia_cliente->sincronizar($argsref);
            $errores = $referencia_cliente->validar();

            $referencia_cliente->guardar();

            $nuevaref = Referencia_cliente::where('referencia', $referencia_cliente->referencia);

            if ($referencia_cliente) {
                $referencia_cliente_id = $nuevaref->id;

                $argscliente = $_POST['cliente'];
                $argscliente['referencia_cliente_id'] = $nuevaref->id;

                $nombre = $argscliente['nombre'];
                $referencia_id = $argscliente['referencia_cliente_id'];

                $tansftabla = Vista_clientes::find($id);
                $tansftabla->nombre_cliente = $nombre;
                $tansftabla->referencia_id = $referencia_id;
                $tansftabla->referencia_cliente = $referencia;

                $cliente->sincronizar($argscliente);
                // $cliente->referencia_cliente_id = $referencia_cliente_id;
                $errores = $cliente->validar();

                if (empty($errores)) {
                    $cliente->guardar();
                    $tansftabla->guardar();
                    header('Location:/editorclientes');
                }
            }
        }
        $router->render('editorclientes/actualizar', [
            'cliente' => $cliente,
            'referencia_cliente' => $referencia_cliente,
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
                    $referencia_cliente = Referencia_cliente::find($id);
                    $vista_clientes = Vista_clientes::find($id);

                    $id = $referencia_cliente->id;
                    $cliente = Cliente::where('referencia_cliente_id', $id);

                    $vista_clientes->eliminar();
                    $referencia_cliente->eliminar();
                    $cliente->eliminar();
                    header('Location:/editorclientes');

                }
            }
        }
    }
}