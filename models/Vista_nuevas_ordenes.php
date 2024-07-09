<?php

namespace Model;

class Vista_nuevas_ordenes extends ActiveRecord
{
    protected static $tabla = 'vista_nuevas_ordenes';
    protected static $columnasDB = [
        'id',
        'numero_orden',
        'descripcion_orden',
        'hora_orden',
        'fecha_orden',
        'prioridad_orden',
        'nombre_area',
        'nombre_maquina',
        'nombre_cliente',
        'referencia_cliente',
        'nombre_operador',
        'apellido_operador',
        'nombre_usuario',
        'apellido_usuario',
        'email_usuario'
    ];

    public $id;
    public $numero_orden;
    public $descripcion_orden;
    public $hora_orden;
    public $fecha_orden;
    public $prioridad_orden;
    public $nombre_area;
    public $nombre_maquina;
    public $nombre_cliente;
    public $referencia_cliente;

    public $nombre_operador;
    public $apellido_operador;
    public $nombre_usuario;
    public $apellido_usuario;
    public $email_usuario;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->numero_orden = $args["numero_orden"] ?? '';
        $this->descripcion_orden = $args["descripcion_orden"] ?? '';
        $this->hora_orden = $args["hora_orden"] ?? '';
        $this->fecha_orden = $args["fecha_orden"] ?? '';
        $this->prioridad_orden = $args["prioridad_orden"] ?? '';
        $this->nombre_area = $args["nombre_area"] ?? '';
        $this->nombre_maquina = $args["nombre_maquina"] ?? '';
        $this->nombre_cliente = $args["nombre_cliente"] ?? '';
        $this->referencia_cliente = $args["referencia_cliente"] ?? '';
        $this->nombre_operador = $args["nombre_operador"] ?? '';
        $this->apellido_operador = $args["apellido_operador"] ?? '';
        $this->nombre_usuario = $args["nombre_usuario"] ?? '';
        $this->apellido_usuario = $args["apellido_usuario"] ?? '';
        $this->email_usuario = $args["email_usuario"] ?? '';

    }

    public function eliminar($ruta = null)
    {
        //Eliminar la propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        // debuguear($query);

        $resultado = self::$db->query($query);

    }

}