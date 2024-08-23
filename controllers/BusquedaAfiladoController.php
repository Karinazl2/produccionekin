<?php

namespace Controllers;

use MVC\Router;
use Model\Cliente;
use Model\Usuarios;
use Model\Operadores;
use Model\Afilado_areas;
use Model\TablaClientes;
use Model\Vista_clientes;
use Model\Afilado_ordenes;
use Model\Afilado_maquinas;
use Model\VistaAfiladoExcel;
use Model\Referencia_cliente;
use Model\Vista_afilado_ordenes;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class BusquedaAfiladoController
{
    public static function busquedaafilado(Router $router)
    {
        $operador = isset($_SESSION['operador']);
        $admin = isset($_SESSION['admin']);
        $afilado_areas = Afilado_areas::all();
        $clientes = Cliente::all();

        $vista_clientes = Vista_clientes::all();
        $afilado_maquinas = Afilado_maquinas::all();
        $operadores = Operadores::all();

        $vista_afilado_ordenes = Vista_afilado_ordenes::all();
        $script = '<script src="../build/js/filtrosAfilado.js"></script>';


        $router->render('paginas/busquedaafilado', [
            'vista_afilado_ordenes' => $vista_afilado_ordenes,
            'afilado_areas' => $afilado_areas,
            'afilado_maquinas' => $afilado_maquinas,
            'clientes' => $clientes,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'script' => $script,
            'operador' => $operador,
            'admin' => $admin

        ]);
    }

    public static function crear(Router $router)
    {
        $usuario_id = $_SESSION['id'];

        is_admin_operador();
        $afilado_ordenes = new Afilado_ordenes();
        //arreglo con mrnsaje de errores


        $errores = Afilado_maquinas::getErrores();
        $maquinas = Afilado_maquinas::all();
        $vista_clientes = Vista_clientes::ordenalf('referencia_cliente');
        $afilado_areas = Afilado_areas::all();
        $operadores = Operadores::all();
        $idDelUsuario = intval($_SESSION['id']);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            is_admin_operador();
            $args = $_POST['afilado_ordenes'];
            $afilado_ordenes->sincronizar($args);
            $afilado_ordenes->usuario_id = $idDelUsuario;
            $errores = $afilado_ordenes->validar();
            if (empty($errores)) {

            $numeroOrden = $args['orden'];
            $descripcion_orden = $args['descripcion'];
            $prioridad_orden = $args['prioridad'];
            $cliente_id = $args['cliente_id'];
            $maquina_id = $args['maquina_id'];
            $operador_id = $args['operador_id'];

            $cliente = Vista_clientes::find($cliente_id);
            $nombre_cliente = $cliente->nombre_cliente;
            $referencia_cliente = $cliente->referencia_cliente;
            $maquina = Afilado_maquinas::find($maquina_id);
            $nombre_maquina = $maquina->maquina;
            $operador = Operadores::find($operador_id);
            $nombre_operador = $operador->nombre;
            $apellido_operador = $operador->apellido;

            $tansftabla = new Vista_afilado_ordenes();
            $tansftabla->numero_orden = $numeroOrden;
            $tansftabla->descripcion_orden = $descripcion_orden;
            $tansftabla->prioridad_orden = $prioridad_orden;
            $tansftabla->nombre_cliente = $nombre_cliente;
            $tansftabla->referencia_cliente = $referencia_cliente;
            $tansftabla->nombre_maquina = $nombre_maquina;
            $tansftabla->nombre_operador = $nombre_operador;
            $tansftabla->apellido_operador = $apellido_operador;
            $hora_orden = $afilado_ordenes->hora;
            $fecha_orden = $afilado_ordenes->fecha;
            $tansftabla->hora_orden = $hora_orden;
            $tansftabla->fecha_orden = $fecha_orden;
            $usuario_id = $afilado_ordenes->usuario_id;
            $usuario = Usuarios::find($usuario_id);
            $nombre_usuario = $usuario->nombre;
            $apellido_usuario = $usuario->apellido;
            $email_usuario = $usuario->email;
            $tansftabla->nombre_usuario = $nombre_usuario;
            $tansftabla->apellido_usuario = $apellido_usuario;
            $tansftabla->email_usuario = $email_usuario;
            // debuguear($tansftabla);
            //    debuguear($_FILES);
            //generar nombre único
            //Guarda en la base de datos.

                $afilado_ordenes->guardar();
                $tansftabla->guardar();

                header('Location:/busquedaPersonalizada/busquedaafilado');
            }
        }

        $router->render('busquedaafilado/crear', [
            'afilado_ordenes' => $afilado_ordenes,
            'maquinas' => $maquinas,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'afilado_areas' => $afilado_areas,
            'errores' => $errores
        ]);


    }

    public static function actualizar(Router $router)
    {
        $usuario_id = $_SESSION['id'];

        is_admin_operador();
        $id = validatRedireccionar('/');
        $vista_afilado_ordenes = Vista_afilado_ordenes::find($id);
        $orden = $vista_afilado_ordenes->numero_orden;
        $afilado_ordenes = Afilado_ordenes::where('orden',$orden);

        $maquinas = Afilado_maquinas::find($id);
        //arreglo con mrnsaje de errores


        $errores = Afilado_maquinas::getErrores();
        $maquinas = Afilado_maquinas::all();
        $clientes = Cliente::all();

        $referencia_cliente = Referencia_cliente::all();
        $vista_clientes = Vista_clientes::ordenalf('referencia_cliente');
        $operadores = Operadores::all();
        $idDelUsuario = intval($_SESSION['id']);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           debuguear($_POST);

            is_admin_operador();
            $args = $_POST['afilado_ordenes'];
            $afilado_ordenes->sincronizar($args);
            $afilado_ordenes->usuario_id = $idDelUsuario;
            $errores = $afilado_ordenes->validar();

            if (empty($errores)) {


            $numeroOrden = $args['orden'];
            $descripcion_orden = $args['descripcion'];
            $prioridad_orden = $args['prioridad'];
            $cliente_id = $args['cliente_id'];
            $maquina_id = $args['maquina_id'];
            $operador_id = $args['operador_id'];

            $cliente = Vista_clientes::find($cliente_id);
            $nombre_cliente = $cliente->nombre_cliente;
            $referencia_cliente = $cliente->referencia_cliente;
            $maquina = Afilado_maquinas::find($maquina_id);
            $nombre_maquina = $maquina->maquina;
            $operador = Operadores::find($operador_id);
            $nombre_operador = $operador->nombre;
            $apellido_operador = $operador->apellido;

            $tansftabla = Vista_afilado_ordenes::find($id);
            $tansftabla->numero_orden = $numeroOrden;
            $tansftabla->descripcion_orden = $descripcion_orden;
            $tansftabla->prioridad_orden = $prioridad_orden;
            $tansftabla->nombre_cliente = $nombre_cliente;
            $tansftabla->referencia_cliente = $referencia_cliente;
            $tansftabla->nombre_maquina = $nombre_maquina;
            $tansftabla->nombre_operador = $nombre_operador;
            $tansftabla->apellido_operador = $apellido_operador;
            $hora_orden = $afilado_ordenes->hora;
            $fecha_orden = $afilado_ordenes->fecha;
            $tansftabla->hora_orden = $hora_orden;
            $tansftabla->fecha_orden = $fecha_orden;
            $usuario_id = $afilado_ordenes->usuario_id;
            $usuario = Usuarios::find($usuario_id);
            $nombre_usuario = $usuario->nombre;
            $apellido_usuario = $usuario->apellido;
            $email_usuario = $usuario->email;
            $tansftabla->nombre_usuario = $nombre_usuario;
            $tansftabla->apellido_usuario = $apellido_usuario;
            $tansftabla->email_usuario = $email_usuario;
            // debuguear($tansftabla);
            //    debuguear($_FILES);
            //revizar que el arreglo de errores esté vacío

                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $afilado_ordenes->guardar();
                $tansftabla->guardar();
                header('Location: /busquedaPersonalizada/busquedaafilado');

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
            isAdmin();
            //validadr id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $afilado_ordenes = Afilado_ordenes::find($id);
                    $vista_afilado_ordenes = Vista_afilado_ordenes::find($id);
                    $vista_afilado_ordenes->eliminar();
                    $afilado_ordenes->eliminar('/busquedaPersonalizada/busquedaafilado');
                }

            }
        }
    }

    public static function filtrar()
    {
        $vista_afilado_ordenes = Vista_afilado_ordenes::ordenalf('numero_orden');
        $vista_clientes = Vista_clientes::all();

        // Concatenar referencia_cliente y nombre_cliente
        $mostrar_botones = isset($_SESSION['admin']) || isset($_SESSION['operador']);
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
            'mostrar_botones' => $mostrar_botones
        ]);
    }

    public static function generarExcel(Router $router)
    {
        is_admin_operador();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['filtros'];
            $resultado = VistaAfiladoExcel::all();
            $excel = new Spreadsheet();
            $hojaActiva = $excel->getActiveSheet();
            $hojaActiva->setTitle("Afilado");

            $hojaActiva->getColumnDimension('A')->setWidth(15);
            $hojaActiva->setCellValue('A1', 'Orden');
            $hojaActiva->getColumnDimension('B')->setWidth(35);
            $hojaActiva->setCellValue('B1', 'Descripcion');
            $hojaActiva->getColumnDimension('C')->setWidth(25);
            $hojaActiva->setCellValue('C1', 'Maquina');
            $hojaActiva->getColumnDimension('D')->setWidth(25);
            $hojaActiva->setCellValue('D1', 'Refererencia Cliente');
            $hojaActiva->getColumnDimension('E')->setWidth(40);
            $hojaActiva->setCellValue('E1', 'Cliente');
            $hojaActiva->getColumnDimension('F')->setWidth(20);
            $hojaActiva->setCellValue('F1', 'Nombre Operador');
            $hojaActiva->getColumnDimension('G')->setWidth(20);
            $hojaActiva->setCellValue('G1', 'Apellido Operador');

            $fila = 2;

            foreach ($resultado as $obj) {
                $hojaActiva->setCellValue('A' . $fila, $obj->numero_orden);
                $hojaActiva->setCellValue('B' . $fila, $obj->descripcion_orden);
                $hojaActiva->setCellValue('C' . $fila, $obj->nombre_maquina);
                $hojaActiva->setCellValue('D' . $fila, $obj->referencia_cliente);
                $hojaActiva->setCellValue('E' . $fila, $obj->nombre_cliente);
                $hojaActiva->setCellValue('F' . $fila, $obj->nombre_operador);
                $hojaActiva->setCellValue('G' . $fila, $obj->apellido_operador);
                $fila++;
            }

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="afilado.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
            exit;

            // debuguear($args);


        }
    }
}

