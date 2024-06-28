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
    public $password2;
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
        $this->password2 = $args["password2"] ?? '';
        $this->telefono = $args["telefono"] ?? '';
        $this->rol_id = $args["rol_id"] ?? '';
        $this->confirmado = $args["confirmado"] ?? '';
        $this->token = $args["token"] ?? '';


    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre.";
        }

        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio.";
        }

        if (!$this->email) {
            self::$errores[] = "El email es obligatorio.";
        }
        if (!$this->password) {
            self::$errores[] = "La contraseña es obligatoria.";
        }
        if (!$this->telefono) {
            self::$errores[] = "El telefono es obligatorio.";
        }

        return self::$errores;

    }

    public function validarNuevacuenta()
    {

        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre.";
        }

        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio.";
        }

        if (!$this->email) {
            self::$errores[] = "El email es obligatorio.";
        }
        if (!$this->password) {
            self::$errores[] = "La contraseña es obligatoria.";
        }
        if (strlen($this->password) < 6) {
            self::$errores[] = "La contraseña debe tener al menos 6 caracteres.";
        }

        if ($this->password !== $this->password2) {
            self::$errores[] = "Los password son diferentes.";
        }
        if (!$this->telefono) {
            self::$errores[] = "El telefono es obligatorio.";
        }

        return self::$errores;
    }

    public function existeUsuario()
    {

        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$errores[] = "El usuario ya está registrado";
        }
        return $resultado;
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$errores[] = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$errores[] = 'El Password es obligatorio';
        }
        return self::$errores;
    }

    public function validarEmail()
    {
        if (!$this->email) {
            self::$errores[] = 'El email es obligatorio';
        }
        return self::$errores;

    }


    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

    }

    public function crearToken()
    {

        $this->token = uniqid();

    }

    public function comprobarPasswordAndVerificado($password)
    {

        $resultado = password_verify($password, $this->password);

        if (!$resultado || !$this->confirmado) {
            self::$errores[] = 'Password incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }

    }
}