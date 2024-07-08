<?php

namespace Model;

class TablaClientes extends ActiveRecord
{
    protected static $tabla = 'tabla_clientes';
    protected static $columnasDB = [
        'id',
        'nombre_cliente',
        'referencia_id',
        'referencia_cliente'
    ];
    public $id;
    public $nombre_cliente;

    public $referencia_id;
    public $referencia_cliente;


    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->nombre_cliente = $args["nombre_cliente"] ?? '';

        $this->referencia_id = $args["referencia_id"] ?? '';
        $this->referencia_cliente = $args["referencia_cliente"] ?? '';
    }

    public function validar()
    {

        if (!$this->nombre_cliente) {
            self::$errores[] = "Debes añadir un cliente.";
        }

        if (!$this->referencia_cliente) {
            self::$errores[] = "Debes añadir una referencia.";
        }

        return self::$errores;

    }

}