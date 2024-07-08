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

    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor'";
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function SQL($query)
    {
        $resultado = self::consultarSQL($query);
        return $resultado;

    }

    public static function arraywhere($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor'";
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        return $resultado;
    }


    public function crear($ruta = null)
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
        if ($resultado) {
            //redireccionar al usuario
            if (!$ruta) {
                header('Location:/admin?resultado=1');
            } else {
                header("Location: $ruta");
            }

        }

    }

    public function actualizar($ruta = null)
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

        if ($resultado) {
            //redireccionar al usuario
            if (!$ruta) {
                header('Location:/admin?resultado=2');
            } else {
                header("Location: $ruta");
            }

        }
    }



    public function eliminar($ruta = null)
    {
        //Eliminar la propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        // debuguear($query);

        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            //redireccionar al usuario
            if (!$ruta) {
                header('Location:/admin?resultado=3');
            } else {
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

    public static function setError($mensaje)
    {
        static::$errores[] = $mensaje;

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

    public static function where2_colums_asc($columna1, $columna2, $valor1, $valor2, $columna_orden)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ($columna1,$columna2) = ('$valor1','$valor2') ORDER BY $columna_orden " . "ASC";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function totalenproduccion($columna1, $columna2, $columna3, $columna4, $columna5, $columna6, $columna7, $valor1, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $columna_orden)
    {
        $query = "SELECT * FROM vista_nuevas_ordenes WHERE nombre_area IN ('ASIENTOS DE LUNETA', 'RECTIFICADO DE DIENTES', 'RECTIFICADO DE MANGOS', 'ACANALADO', 'RECUBRIMIENTO', 'PLANOS Y ENGANCHES', 'AFILADO') ORDER BY id ASC";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function totalafi()
    {
        $query = "SELECT * FROM vista_afilado_ordenes WHERE nombre_maquina IN ('AFILADO MAQ. 1200', 'AFILADO MAQ. 116', 'AFILADO MAQ. 131') ORDER BY id ASC";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function totalafiView($consultaBase)
    {
        $consultaBase .= " WHERE am.maquina IN ('AFILADO MAQ. 1200', 'AFILADO MAQ. 116', 'AFILADO MAQ. 131') ORDER BY ao.id ASC";
        // debuguear($consultaBase);
        $resultado = self::consultarSQL($consultaBase);
        return $resultado;
    }


    public static function ordenasc($columna, $valor, $columna_orden)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor' ORDER BY $columna_orden " . "ASC";
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function ordenascView($consultaBase, $columna, $valor, $columna_orden)
    {
        $consultaBase .= " WHERE $columna = '$valor' ORDER BY $columna_orden ASC";
        $resultado = self::consultarSQL($consultaBase);
        return $resultado;
    }
    public static function ordenasc4($columna1, $valor1, $valor2, $valor3, $valor4)
    {
        $query = "SELECT * FROM vista_cremalleras_ordenes WHERE $columna1 IN ('$valor1','$valor2','$valor3','$valor4') ORDER BY id ASC";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function ordenasc3($columna1, $valor1, $valor2, $valor3)
    {
        $query = "SELECT * FROM vista_cremalleras_ordenes WHERE $columna1 IN ('$valor1','$valor2','$valor3') ORDER BY id ASC";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function contarmes($columna, $valor, $columna_orden)
    {
        $mes_actual = date('m');
        $año_actual = date('Y');
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor' AND MONTH(fecha_orden) = '$mes_actual' AND YEAR(fecha_orden) = '$año_actual' " . "ORDER BY $columna_orden ASC";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function contarmesView($consultaBase, $columna, $valor)
    {
        $mes_actual = date('m');
        $año_actual = date('Y');
        $consultaBase .= " WHERE $columna = '$valor' AND MONTH(ao.fecha) = '$mes_actual' AND YEAR(ao.fecha) = '$año_actual'";
        // debuguear($consultaBase);
        $resultado = self::consultarSQL($consultaBase);
        return $resultado;
    }


    public static function ordendesc($columna, $valor, $columna_orden)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $columna = '$valor' ORDER BY $columna_orden " . "DESC";
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        return $resultado;
    }


}