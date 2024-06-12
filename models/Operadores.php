<?php

namespace Model;

class Operadores extends ActiveRecord
{
    protected static $tabla = 'operadores';
    protected static $columnasDB = [
        'id',
        'nombre',
        'apellido',
        'imagen',
    ];
    public $id;
    public $nombre;
    public $apellido;
    public $imagen;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? '';
        $this->apellido = $args["apellido"] ?? '';
        $this->imagen = $args["imagen"] ?? '';
    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre.";
        }

        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligartorio.";
        }

        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligartoria.";
        }

        return self::$errores;

    }

}