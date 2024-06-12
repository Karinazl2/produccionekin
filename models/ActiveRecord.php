<?php

namespace Model;

class ActiveRecord
{

    //Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //Errores 
    protected static $errores = [];


    //Definir la conexión a la base de datos
    public static function setDB($database)
    {
        self::$db = $database;
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
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        if ($resultado) {
            //redireccionar al usuario
            if(!$ruta){
                header('Location:/admin?resultado=1');
            }else{
                header("Location: $ruta");
            }

        }

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

        $resultado = self::$db->query($query);

        if ($resultado) {
            //redireccionar al usuario
            if(!$ruta){
                header('Location:/admin?resultado=2');
            }else{
                header("Location: $ruta");
            }

        }
    }

    public function eliminar($ruta=null)
    {
        //Eliminar la propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            //redireccionar al usuario
            if(!$ruta){
                header('Location:/admin?resultado=3');
            }else{
                header("Location: $ruta");
            }

        }
    }

    //Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id')
                continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;

    }

    public function sanitizarAtributos()
    {

        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;

    }
    //Subida de archivos
    public function setImagen($imagen)
    {
        //Eliminar imagen previa
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }
        //Asignar atributo el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }

    }
    //Eliminar archivo
    public function borrarImagen()
    {
        //comprobar que existe el archivo            
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }



    //Validación
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores = [];
        return static::$errores;

    }

    //Lista todos los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Buca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);

    }


    public static function consultarSQL($query)
    {
        //Consultar la base de datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        //Liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;

    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;


        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objetoen memoria con los cambios realizados 
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;

            }
        }
    }
}