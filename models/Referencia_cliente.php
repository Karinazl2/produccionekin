<?php

namespace Model;

class Referencia_cliente extends ActiveRecord
{
    protected static $tabla = 'referencia_cliente';
    protected static $columnasDB = [
        'id',
        'referencia'
    ];
    public $id;
    public $referencia;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->referencia = $args["referencia"] ?? '';
    }

    public function validar()
    {

        if (!$this->referencia) {
            self::$errores[] = "Debes añadir una referencia.";
        }

        return self::$errores;

    }

}