<?php

namespace Model;

class Cremalleras_ordenes extends ActiveRecord
{
    protected static $tabla = 'cremalleras_ordenes';
    protected static $columnasDB = [
        'id',
        'orden',
        'descripcion',
        'hora',
        'fecha',
        'prioridad',
        'area_id',
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
    public $area_id;
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
        $this->area_id = $args["area_id"] ?? '';
        $this->maquina_id = $args["maquina_id"] ?? '';
        $this->cliente_id = $args["cliente_id"] ?? '';
        $this->operador_id = $args["operador_id"] ?? '';
        $this->usuario_id = $args["usuario_id"] ?? 1;
    }

    public function validar()
    {
        $this->fecha = date('Y/m/d');;
        $this->hora = $this->obtenerHoraActual();

        if (!$this->orden) {
            self::$errores[] = "Debes añadir una orden.";
        }

        if (!$this->descripcion) {
            self::$errores[] = "La descripcion es obligartoria.";
        }

        if (!$this->area_id) {
            self::$errores[] = "El area es obligartoria.";
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
        return date("H:i:s");
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            //Actualizar
            $this->actualizar();

        } else {
            //Crear
            $this->crear();

        }
    }

    public function crear($ruta=null)
    {
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        //insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(", ", array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "') ";
        // debuguear($query);

        $resultado = self::$db->query($query);

    }
    
    public function actualizar($ruta=null)
    {
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}= '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
        // debuguear($query);


        $resultado = self::$db->query($query);
    }

}