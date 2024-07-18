<?php

namespace Controllers;

use MVC\Router;
use Model\Cliente;
use Model\Usuarios;
use Model\Operadores;
use Model\Nuevas_areas;
use Model\Nuevas_ordenes;
use Model\Vista_clientes;
use Model\Nuevas_maquinas;
use Model\VistaNuevasExel;
use Model\VistaNuevasExcel;
use Model\Referencia_cliente;
use Model\Vista_nuevas_ordenes;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class BusquedaNuevasController
{
    public static function busquedanuevas(Router $router)
    {
        $operador = isset($_SESSION['operador']);
        $admin = isset($_SESSION['admin']);
        $nuevas_areas = Nuevas_areas::all();
        $clientes = Cliente::all();
        $vista_clientes = Vista_clientes::all();
        $nuevas_maquinas = Nuevas_maquinas::all();
        $operadores = Operadores::all();

        $vista_nuevas_ordenes = Vista_nuevas_ordenes::all();
        $script = '<script src="../build/js/filtrosNuevas.js"></script>';


        $router->render('paginas/busquedanuevas', [
            'vista_nuevas_ordenes' => $vista_nuevas_ordenes,
            'nuevas_areas' => $nuevas_areas,
            'nuevas_maquinas' => $nuevas_maquinas,
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
        // debuguear();
        $usuario_id = $_SESSION['id'];
        is_admin_operador();
        $nuevas_ordenes = new Nuevas_ordenes();
        //arreglo con mrnsaje de errores
        $errores = Nuevas_maquinas::getErrores();
        $maquinas = Nuevas_maquinas::all();
        $vista_clientes = Vista_clientes::ordenalf('referencia_cliente');
        $nuevas_areas = Nuevas_areas::all();
        $operadores = Operadores::all();
        $idDelUsuario = intval($_SESSION['id']);
        // debuguear($vista_clientes);



        // metodo post actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            is_admin_operador();
            $args = $_POST['nuevas_ordenes'];
            $nuevas_ordenes->sincronizar($args);
            $nuevas_ordenes->usuario_id = $idDelUsuario;
            $errores = $nuevas_ordenes->validar();


            if (empty($errores)) {
                // debuguear($_POST);
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
                $area = Nuevas_areas::find($area_id);
                $nombre_area = $area->area;
                $maquina = Nuevas_maquinas::find($maquina_id);
                $nombre_maquina = $maquina->maquina;
                $operador = Operadores::find($operador_id);
                $nombre_operador = $operador->nombre;
                $apellido_operador = $operador->apellido;
                // debuguear($cliente);
                // debuguear($args);

                $tansftabla = new Vista_nuevas_ordenes();
                $tansftabla->numero_orden = $numeroOrden;
                $tansftabla->descripcion_orden = $descripcion_orden;
                $tansftabla->prioridad_orden = $prioridad_orden;
                $tansftabla->nombre_cliente = $nombre_cliente;
                $tansftabla->referencia_cliente = $referencia_cliente;
                $tansftabla->nombre_area = $nombre_area;
                $tansftabla->nombre_maquina = $nombre_maquina;
                $tansftabla->nombre_operador = $nombre_operador;
                $tansftabla->apellido_operador = $apellido_operador;
                // debuguear($tansftabla);

                $hora_orden = $nuevas_ordenes->hora;
                $fecha_orden = $nuevas_ordenes->fecha;
                $tansftabla->hora_orden = $hora_orden;
                $tansftabla->fecha_orden = $fecha_orden;
                $usuario_id = $nuevas_ordenes->usuario_id;
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
                $nuevas_ordenes->guardar();
                $tansftabla->guardar();
                header('Location:/busquedaPersonalizada/busquedanuevas');
            }
        }


        $router->render('busquedanuevas/crear', [
            'nuevas_ordenes' => $nuevas_ordenes,
            'maquinas' => $maquinas,
            'vista_clientes' => $vista_clientes,
            'operadores' => $operadores,
            'nuevas_areas' => $nuevas_areas,
            'errores' => $errores
        ]);

    }

    public static function actualizar(Router $router)
    {
        $usuario_id = $_SESSION['id'];

        is_admin_operador();
        $id = validatRedireccionar('/');
        $nuevas_ordenes = Nuevas_ordenes::find($id);

        // debuguear($nuevas_ordenes);

        $maquinas = Nuevas_maquinas::find($id);
        //arreglo con mrnsaje de errores

        $errores = Nuevas_maquinas::getErrores();
        $maquinas = Nuevas_maquinas::all();
        $clientes = Cliente::all();

        $referencia_cliente = Referencia_cliente::all();
        $vista_clientes = Vista_clientes::ordenalf('referencia_cliente');
        $operadores = Operadores::all();
        $nuevas_areas = Nuevas_areas::all();
        $idDelUsuario = intval($_SESSION['id']);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            is_admin_operador();
            $args = $_POST['nuevas_ordenes'];
            $nuevas_ordenes->sincronizar($args);
            $nuevas_ordenes->usuario_id = $idDelUsuario;
            $errores = $nuevas_ordenes->validar();

            if (empty($errores)) {

                $numeroOrden = $args['orden'];
                $descripcion_orden = $args['descripcion'];
                $prioridad_orden = $args['prioridad'];
                $cliente_id = $args['cliente_id'];
                $area_id = $args['area_id'];
                $maquina_id = $args['maquina_id'];
                $operador_id = $args['operador_id'];

                // debuguear($args);

                $cliente = Vista_clientes::find($cliente_id);
                $nombre_cliente = $cliente->nombre_cliente;
                $referencia_cliente = $cliente->referencia_cliente;
                $area = Nuevas_areas::find($area_id);
                $nombre_area = $area->area;
                $maquina = Nuevas_maquinas::find($maquina_id);
                $nombre_maquina = $maquina->maquina;
                $operador = Operadores::find($operador_id);
                $nombre_operador = $operador->nombre;
                $apellido_operador = $operador->apellido;

                $tansftabla = Vista_nuevas_ordenes::find($id);

                $tansftabla->numero_orden = $numeroOrden;
                $tansftabla->descripcion_orden = $descripcion_orden;
                $tansftabla->prioridad_orden = $prioridad_orden;
                $tansftabla->nombre_cliente = $nombre_cliente;
                $tansftabla->referencia_cliente = $referencia_cliente;
                $tansftabla->nombre_area = $nombre_area;
                $tansftabla->nombre_maquina = $nombre_maquina;
                $tansftabla->nombre_operador = $nombre_operador;
                $tansftabla->apellido_operador = $apellido_operador;


                $hora_orden = $nuevas_ordenes->hora;
                $fecha_orden = $nuevas_ordenes->fecha;
                $tansftabla->hora_orden = $hora_orden;
                $tansftabla->fecha_orden = $fecha_orden;
                $usuario_id = $nuevas_ordenes->usuario_id;

                $usuario = Usuarios::find($usuario_id);
                $nombre_usuario = $usuario->nombre;
                $apellido_usuario = $usuario->apellido;
                $email_usuario = $usuario->email;
                $tansftabla->nombre_usuario = $nombre_usuario;
                $tansftabla->apellido_usuario = $apellido_usuario;
                $tansftabla->email_usuario = $email_usuario;
                //revizar que el arreglo de errores esté vacío

                //        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
                //Guarda en la base de datos.
                $nuevas_ordenes->guardar();
                $tansftabla->guardar();
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
            isAdmin();
            //validadr id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $nuevas_ordenes = Nuevas_ordenes::find($id);
                    $vista_nuevas_ordenes = Vista_nuevas_ordenes::find($id);
                    $vista_nuevas_ordenes->eliminar();
                    $nuevas_ordenes->eliminar('/busquedaPersonalizada/busquedanuevas');
                }

            }
        }
    }

    public static function siguiente_area()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            is_admin_operador();
            //validadr id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $nuevas_ordenes = Nuevas_ordenes::find($id);

                    $vista_nuevas_ordenes = Vista_nuevas_ordenes::find($id);

                    $x = $nuevas_ordenes->area_id + 1;
                    $nuevas_ordenes->area_id = "$x";
                    $nueva_area = Nuevas_areas::find($x);
                    $nombre = $nueva_area->area;
                    $nuevas_ordenes->sincronizar();
                    $vista_nuevas_ordenes->nombre_area = $nombre;

                    //    debuguear($nuevas_ordenes);
                }

                $errores = $nuevas_ordenes->validar();

                //    debuguear($_FILES);

                //revizar que el arreglo de errores esté vacío

                if (empty($errores)) {
                    //Guarda en la base de datos.
                    $nuevas_ordenes->guardar();
                    $vista_nuevas_ordenes->guardar();
                    header('Location:/busquedaPersonalizada/busquedanuevas');
                }
            }
        }
    }

    public static function filtrar()
    {

        $vista_nuevas_ordenes = Vista_nuevas_ordenes::ordenalf('numero_orden');
        $vista_clientes = Vista_clientes::all();

        $mostrar_botones = isset($_SESSION['admin']) || isset($_SESSION['operador']);


        // Concatenar referencia_cliente y nombre_cliente
        $clientes_concatenados = [];
        foreach ($vista_clientes as $cliente) {
            $clientes_concatenados[] = [
                'id' => $cliente->id,
                'cliente_concatenado' => $cliente->referencia_cliente . ' ' . $cliente->nombre_cliente
            ];
        }

        echo json_encode([
            'vista_nuevas_ordenes' => $vista_nuevas_ordenes,
            'vista_clientes' => $clientes_concatenados,
            'mostrar_botones' => $mostrar_botones
        ]);
    }

    public static function generarExcel(Router $router)
    {
        is_admin_operador();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['filtros'];
            $resultado = VistaNuevasExcel::all();
            // debuguear($resultado);
            $excel = new Spreadsheet();
            $hojaActiva = $excel->getActiveSheet();
            $hojaActiva->setTitle("Brochas Nuevas");

            $hojaActiva->getColumnDimension('A')->setWidth(15);
            $hojaActiva->setCellValue('A1', 'Orden');
            $hojaActiva->getColumnDimension('B')->setWidth(35);
            $hojaActiva->setCellValue('B1', 'Descripcion');
            $hojaActiva->getColumnDimension('C')->setWidth(25);
            $hojaActiva->setCellValue('C1', 'Area');
            $hojaActiva->getColumnDimension('D')->setWidth(25);
            $hojaActiva->setCellValue('D1', 'Maquina');
            $hojaActiva->getColumnDimension('E')->setWidth(25);
            $hojaActiva->setCellValue('E1', 'Refererencia Cliente');
            $hojaActiva->getColumnDimension('F')->setWidth(40);
            $hojaActiva->setCellValue('F1', 'Cliente');
            $hojaActiva->getColumnDimension('G')->setWidth(20);
            $hojaActiva->setCellValue('G1', 'Nombre Operador');
            $hojaActiva->getColumnDimension('H')->setWidth(20);
            $hojaActiva->setCellValue('H1', 'Apellido Operador');

            $fila = 2;

            foreach ($resultado as $obj) {
                $hojaActiva->setCellValue('A' . $fila, $obj->numero_orden);
                $hojaActiva->setCellValue('B' . $fila, $obj->descripcion_orden);
                $hojaActiva->setCellValue('C' . $fila, $obj->nombre_area);
                $hojaActiva->setCellValue('D' . $fila, $obj->nombre_maquina);
                $hojaActiva->setCellValue('E' . $fila, $obj->referencia_cliente);
                $hojaActiva->setCellValue('F' . $fila, $obj->nombre_cliente);
                $hojaActiva->setCellValue('G' . $fila, $obj->nombre_operador);
                $hojaActiva->setCellValue('H' . $fila, $obj->apellido_operador);
                $fila++;
            }

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="brochasnuevas.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
            exit;

            // debuguear($args);


        }
    }

}




