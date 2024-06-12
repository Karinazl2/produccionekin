<?php

namespace Model;

class Cremalleras_maquinas extends ActiveRecord
{
    protected static $tabla = 'cremalleras_maquinas';
    protected static $columnasDB = [
        'id',
        'maquina',
    ];
    public $id;
    public $maquina;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->maquina = $args["maquina"] ?? '';
    }

    public function validar()
    {

        if (!$this->maquina) {
            self::$errores[] = "Debes añadir un titulo.";
        }

        return self::$errores;

    }

}