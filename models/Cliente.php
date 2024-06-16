<?php

namespace Model;

class Cliente extends ActiveRecord
{
    protected static $tabla = 'cliente';
    protected static $columnasDB = [
        'id',
        'nombre',
        'referencia_cliente_id'
    ];
    public $id;
    public $nombre;

    public $referencia_cliente_id;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? '';
        $this->referencia_cliente_id = $args["referencia_cliente_id"] ?? '';
    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un cliente.";
        }

        return self::$errores;

    }

}