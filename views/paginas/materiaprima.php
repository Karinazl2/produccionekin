<section class="n">
    <h1>Materia Prima</h1>
</section>
<main class="contenedor seccion">
    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php }
    }
    ?>
    <section class="botonop">
        <a href="/busquedanuevas/crear" class="boton-rosa">+ Añadir Órdenes para Brochas Nuevas</a>
        <a href="/busquedacremalleras/crear" class="boton-rosa">+ Añadir Órdenes para Planas y Cremalleras</a>
        <a href="/busquedaafilado/crear" class="boton-rosa">+ Añadir Órdenes para Afilado</a>
    </section>
    <section class="negritas">
        <h1>Materia prima para Brochas Nuevas</h1>
    </section>

    <table class="ordenes">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Última actualización</th>
                <th>Prioridad</th>
                <th>Área</th>
                <th>Cliente</th>
                <th>Editado por:</th>
                <th>Acciones:</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vista_materiaprima as $orden) { ?>
                <tr>
                    <td><?php echo $orden->numero_orden; ?></td>
                    <td><?php echo $orden->descripcion_orden; ?></td>
                    <td><?php echo $orden->hora_orden . " el " . $orden->fecha_orden ; ?></td>
                    <td><?php echo $orden->prioridad_orden; ?></td>
                    <td><?php echo $orden->nombre_area; ?></td>
                    <td><?php echo $orden->referencia_cliente . " " . $orden->nombre_cliente;?></td>
                    <td><?php echo $orden->nombre_usuario . " " . $orden->apellido_uasuario;?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <section class="negritas">
        <h1>Materia prima para Cremalleras y Planas</h1>
    </section>

</main>