<?php

namespace Model;

class Anuncios extends ActiveRecord
{
    protected static $tabla = 'anuncios';
    protected static $columnasDB = [
        'id',
        'titulo',
        'fecha',
        'autor',
        'descripcion',
        'imagen',
    ];
    public $id;
    public $titulo;
    public $fecha;
    public $autor;
    public $descripcion;
    public $imagen;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->titulo = $args["titulo"] ?? '';
        $this->fecha = date('Y/m/d');
        $this->autor = $args["autor"] ?? '';
        $this->descripcion = $args["descripcion"] ?? '';
        $this->imagen = $args["imagen"] ?? '';
    }

    public function validar()
    {

        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo.";
        }

        if (!$this->imagen) {
            self::$errores[] = "Debes añadir la imagen.";
        }

        if (!$this->descripcion) {
            self::$errores[] = "La descripción es obligatoria";
        }

        return self::$errores;

    }

}