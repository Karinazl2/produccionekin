<?php

namespace Model;

class Afilado_areas extends ActiveRecord
{
    protected static $tabla = 'afilado_areas';
    protected static $columnasDB = [
        'id',
        'area'
    ];
    public $id;
    public $area;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->area = $args["area"] ?? '';
    }

    public function validar()
    {

        if (!$this->area) {
            self::$errores[] = "Debes añadir un área.";
        }
        return self::$errores;

    }

}