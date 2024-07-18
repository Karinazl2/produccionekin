<?php

namespace Model;

class VistaCremallerasExcel extends ActiveRecord
{
    protected static $tabla = 'vista_cremalleras_ordenes';
    protected static $columnasDB = [
        'numero_orden',
        'descripcion_orden',
        'nombre_area',
        'nombre_maquina',
        'nombre_cliente',
        'referencia_cliente',
        'nombre_operador',
        'apellido_operador',
    ];

    public $numero_orden;
    public $descripcion_orden;
    public $nombre_area;
    public $nombre_maquina;
    public $nombre_cliente;
    public $referencia_cliente;

    public $nombre_operador;
    public $apellido_operador;

    public function __construct($args = [])
    {

        $this->numero_orden = $args["numero_orden"] ?? '';
        $this->descripcion_orden = $args["descripcion_orden"] ?? '';
        $this->nombre_area = $args["nombre_area"] ?? '';
        $this->nombre_maquina = $args["nombre_maquina"] ?? '';
        $this->nombre_cliente = $args["nombre_cliente"] ?? '';
        $this->referencia_cliente = $args["referencia_cliente"] ?? '';
        $this->nombre_operador = $args["nombre_operador"] ?? '';
        $this->apellido_operador = $args["apellido_operador"] ?? '';

    }

}