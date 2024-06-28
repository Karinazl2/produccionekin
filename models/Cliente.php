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


    public function guardar()
    {
        if (!is_null($this->id)) {
            //Actualizar
            $this->actualizar();

        } else {
            //Crear
            $this->crear();

        }
    }

    public function crear($ruta=null)
    {
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        //insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(", ", array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "') ";
        // debuguear($query);

        $resultado = self::$db->query($query);
 

    }

    public function actualizar($ruta=null)
    {
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}= '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
        // debuguear($query);


        $resultado = self::$db->query($query);


    }

    public function eliminar($ruta=null)
    {
        //Eliminar la propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        // debuguear($query);

        $resultado = self::$db->query($query);

    }

}