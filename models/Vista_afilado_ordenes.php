<?php

namespace Model;

class Vista_afilado_ordenes extends ActiveRecord
{
    protected static $tabla = 'vista_afilado_ordenes';

    protected static $columnasDB = [
        'orden_id',
        'numero_orden',
        'descripcion_orden',
        'hora_orden',
        'fecha_orden',
        'prioridad_orden',
        'nombre_maquina',
        'nombre_cliente',
        'nombre_operador',
        'apellido_operador',
        'nombre_usuario',
        'apellido_usuario',
        'email_usuario'
    ];

    public $orden_id;
    public $numero_orden;
    public $descripcion_orden;
    public $hora_orden;
    public $fecha_orden;
    public $prioridad_orden;
    public $nombre_area;
    public $nombre_maquina;
    public $nombre_cliente;
    public $referencia_cliente;

    public $nombre_operador;
    public $apellido_operador;
    public $nombre_usuario;
    public $apellido_usuario;
    public $email_usuario;

    public function __construct($args = [])
    {

        $this->orden_id = $args["orden_id"] ?? null;
        $this->numero_orden = $args["numero_orden"] ?? '';
        $this->descripcion_orden = $args["descripcion_orden"] ?? '';
        $this->hora_orden = $args["hora_orden"] ?? '';
        $this->fecha_orden = $args["fecha_orden"] ?? '';
        $this->prioridad_orden = $args["prioridad_orden"] ?? '';
        $this->nombre_maquina = $args["nombre_maquina"] ?? '';
        $this->nombre_cliente = $args["nombre_cliente"] ?? '';
        $this->referencia_cliente = $args["referencia_cliente"] ?? '';
        $this->nombre_operador = $args["nombre_operador"] ?? '';
        $this->apellido_operador = $args["apellido_operador"] ?? '';
        $this->nombre_usuario = $args["nombre_usuario"] ?? '';
        $this->apellido_usuario = $args["apellido_usuario"] ?? '';
        $this->email_usuario = $args["email_usuario"] ?? '';

    }

    public function consulta(){
        $consulta = "select `ao`.`id` AS `orden_id`,`ao`.`orden` AS `numero_orden`, ";
        $consulta .= "`ao`.`descripcion` AS `descripcion_orden`, ";
        $consulta .= "`ao`.`hora` AS `hora_orden`,`ao`.`fecha` AS `fecha_orden`,";
        $consulta .= "`ao`.`prioridad` AS `prioridad_orden`, ";
        $consulta .= "`am`.`maquina` AS `nombre_maquina`,`cl`.`nombre` AS `nombre_cliente`, ";
        $consulta .= "`rc`.`referencia` AS `referencia_cliente`, ";
        $consulta .= "`op`.`nombre` AS `nombre_operador`, ";
        $consulta .= "`op`.`apellido` AS `apellido_operador`, ";
        $consulta .= "`u`.`nombre`  AS `nombre_usuario`, ";
        $consulta .= "`u`.`apellido` AS `apellido_usuario`,`u`.`email` AS `email_usuario` ";
        $consulta .= " from (((((`produccionekin`.`afilado_ordenes` `ao` left join ";
        $consulta .= "`produccionekin`.`afilado_maquinas` `am` ";
        $consulta .= " on((`ao`.`maquina_id` = `am`.`id`))) left join ";
        $consulta .= "`produccionekin`.`cliente` `cl` on((`ao`.`cliente_id` = `cl`.`id`))) ";
        $consulta .= "left join `produccionekin`.`referencia_cliente` `rc` ";
        $consulta .= " on((`cl`.`referencia_cliente_id` = `rc`.`id`))) ";
        $consulta .= " left join `produccionekin`.`operadores` ";
        $consulta .= " `op` on((`ao`.`operador_id` = `op`.`id`))) left join ";
        $consulta .= " `produccionekin`.`usuarios` `u` on((`ao`.`usuario_id` = `u`.`id`)))";

        $resultado = self::SQL($consulta);
        return $resultado;
        // return $consulta;
    }


}