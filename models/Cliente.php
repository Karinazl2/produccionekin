<?php

namespace Model;

class Cliente extends ActiveRecord
{
    protected static $tabla = 'cliente';
    protected static $columnasDB = [
        'id',
        'cliente',
        'referencia_cliente_id'
    ];
    public $id;
    public $cliente;

    public $referencia_cliente_id;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->cliente = $args["cliente"] ?? '';
        $this->referencia_cliente_id = $args["referencia_cliente_id"] ?? '';
    }

    public function validar()
    {

        if (!$this->cliente) {
            self::$errores[] = "Debes añadir un cliente.";
        }

        return self::$errores;

    }

}