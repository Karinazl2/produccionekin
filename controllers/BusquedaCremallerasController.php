<?php

namespace Controllers;

use MVC\Router;
use cremalleras;
use Model\Cliente;
use Model\Usuarios;
use Model\Operadores;
use Model\Vista_clientes;
use Model\Cremalleras_areas;
use Model\Referencia_cliente;
use Model\Cremalleras_ordenes;
use Model\Cremalleras_maquinas;
use Model\Vista_cremalleras_ordenes;

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
        $vista_clientes = Vista_clientes::all();
        $cremalleras_areas = Cremalleras_areas::all();
        $operadores = Operadores::all();




        // metodo post actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // debuguear($_POST);
            $args = $_POST['cremalleras_ordenes'];

            $numeroOrden = $args['orden'];
            $descripcion_orden = $args['descripcion'];
            $prioridad_orden = $args['prioridad'];
            $cliente_id = $args['cliente_id'];
            $area_id = $args['area_id'];
            $maquina_id = $args['maquina_id'];
            $operador_id = $args['operador_id'];

            $cliente = Vista_clientes::find($cliente_id);
            $nombre_cliente = $cliente->nombre_cliente;
            $referencia_cliente = $cliente->referencia_cliente;
            $area = Cremalleras_areas::find($area_id);
            $nombre_area = $area->area;
            $maquina = Cremalleras_maquinas::find($maquina_id);
            $nombre_maquina = $maquina->maquina;
            $operador = Operadores::find($operador_id);
            $nombre_operador = $operador->nombre;
            $apellido_operador = $operador->apellido;
            // debuguear($cliente);
            // debuguear($args);

            $tansftabla = new Vista_cremalleras_ordenes();
            $tansftabla->numero_orden = $numeroOrden;
            $tansftabla->descripcion_orden = $descripcion_orden;
            $tansftabla->prioridad_orden = $prioridad_orden;
            $tansftabla->nombre_cliente = $nombre_cliente;
            $tansftabla->referencia_cliente = $referencia_cliente;
            $tansftabla->nombre_area = $nombre_area;
            $tansftabla->nombre_maquina = $nombre_maquina;
            $tansftabla->nombre_operador = $nombre_operador;
            $tansftabla->apellido_operador = $apellido_operador;
            

            $cremalleras_ordenes->sincronizar($args);
            // debuguear($cremalleras_ordenes);
            $hora_orden = $cremalleras_ordenes->hora;
            $fecha_orden = $cremalleras_ordenes->fecha;
            $tansftabla->hora_orden = $hora_orden;
            $tansftabla->fecha_orden = $fecha_orden;
            $usuario_id = $cremalleras_ordenes->usuario_id;
            $usuario = Usuarios::find($usuario_id);
            $nombre_usuario = $usuario->nombre;
            $apellido_usuario = $usuario->apellido;
            $email_usuario = $usuario->email;
            $tansftabla->nombre_usuario = $nombre_usuario;
            $tansftabla->apellido_usuario = $apellido_usuario;
            $tansftabla->email_usuario = $email_usuario;

            $errores = $cremalleras_ordenes->validar();
                // debuguear($tansftabla);

            //generar nombre único

            //Guarda en la base de datos.
            if (empty($errores)) {
            $cremalleras_ordenes->guardar();
            $tansftabla->guardar();
            header('Location:/busquedaPersonalizada/busquedacremalleras');
            }
        }


        $router->render('busquedacremalleras/crear', [
            'cremalleras_ordenes' => $cremalleras_ordenes,
            'maquinas' => $maquinas,
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

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //validadr id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $cremalleras_ordenes = Cremalleras_ordenes::find($id);
                    $cremalleras_ordenes->eliminar('/busquedaPersonalizada/busquedacremalleras');
                }

            }
        }
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
