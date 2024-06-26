<?php

namespace Model;

class Afilado_ordenes extends ActiveRecord
{
    protected static $tabla = 'afilado_ordenes';
    protected static $columnasDB = [
        'id',
        'orden',
        'descripcion',
        'hora',
        'fecha',
        'prioridad',
        'maquina_id',
        'cliente_id',
        'operador_id',
        'usuario_id'
    ];
    public $id;
    public $orden;
    public $descripcion;
    public $hora;
    public $fecha;
    public $prioridad;
    public $maquina_id;
    public $cliente_id;
    public $operador_id;
    public $usuario_id;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->orden = $args["orden"] ?? '';
        $this->descripcion = $args["descripcion"] ?? '';
        $this->hora = $this->obtenerHoraActual();
        $this->fecha = date('Y/m/d');
        $this->prioridad = $args["prioridad"] ?? '';
        $this->maquina_id = $args["maquina_id"] ?? '';
        $this->cliente_id = $args["cliente_id"] ?? '';
        $this->operador_id = $args["operador_id"] ?? '';
        $this->usuario_id = $args["usuario_id"] ?? 1;
    }

    public function validar()
    {

        if (!$this->orden) {
            self::$errores[] = "Debes añadir una orden.";
        }

        if (!$this->descripcion) {
            self::$errores[] = "La descripcion es obligartoria.";
        }

        if (!$this->maquina_id) {
            self::$errores[] = "La máquina es obligartoria.";
        }

        if (!$this->cliente_id) {
            self::$errores[] = "El cliente es obligartorio.";
        }      

        if (!$this->operador_id) {
            self::$errores[] = "El operador es obligartorio.";
        }
        return self::$errores;

    }

    private function obtenerHoraActual() {
        // Devuelve la hora actual formateada
        return date("Y-m-d H:i:s");
    }

}