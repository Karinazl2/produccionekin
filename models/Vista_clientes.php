<?php

namespace Model;

class Vista_clientes extends ActiveRecord
{
    protected static $tabla = 'vista_clientes';
    protected static $columnasDB = [
        'cliente_id',
        'nombre_cliente',
        'referencia_cliente'
    ];
    public $cliente_id;
    public $nombre_cliente;

    public $referencia_cliente;

    public function __construct($args = [])
    {

        $this->cliente_id = $args["cliente_id"] ?? null;
        $this->nombre_cliente = $args["nombre_cliente"] ?? '';
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