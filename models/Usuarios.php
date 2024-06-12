<?php

namespace Model;

class Usuarios extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = [
        'id',
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'rol_id',
        'confirmado',
        'token'
    ];
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $rol_id;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {

        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? '';
        $this->apellido = $args["apellido"] ?? '';
        $this->email = $args["email"] ?? '';
        $this->password = $args["password"] ?? '';
        $this->telefono = $args["telefono"] ?? '';
        $this->rol_id = $args["rol_id"] ?? '';
        $this->confirmado = $args["confirmado"] ?? '';
        $this->apellido = $args["token"] ?? '';


    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre.";
        }

        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligartorio.";
        }

        if (!$this->email) {
            self::$errores[] = "El email es obligartorio.";
        }
        if (!$this->password) {
            self::$errores[] = "La contraseña es obligartoria.";
        }
        if (!$this->telefono) {
            self::$errores[] = "El telefono es obligartorio.";
        }

        return self::$errores;

    }

}