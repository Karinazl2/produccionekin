<section class="n">
    <h1>Materia Prima</h1>
</section>
<main class="contenedor seccion">
<?php if (!empty($admin) || !empty($operador)) { ?>

    <section class="botonop">
        <a href="/busquedanuevas/crear" class="boton-nuevas-mp">+ Añadir Órdenes en Materia Prima para Brochas Nuevas</a>
        <a href="/busquedacremalleras/crear" class="boton-nuevas-mp1">+ Añadir Órdenes en Materia Prima para Planas y Cremalleras</a>
    </section>
    <?php } ?>

    <section class="tutul">
        <div class="hto2">
            <h2>Materia prima para Brochas Nuevas</h2>
        </div>
    </section>

    <table class="materiapnuevas">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Última actualización</th>
                <th>Prioridad</th>
                <th>Área</th>
                <th>Cliente</th>
                <th>Editado por:</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vista_nuevas_materiaprima as $orden) { ?>
                <tr>
                    <td><?php echo $orden->numero_orden; ?></td>
                    <td><?php echo $orden->descripcion_orden; ?></td>
                    <td><?php echo $orden->hora_orden . " el " . $orden->fecha_orden; ?></td>
                    <td><?php echo $orden->prioridad_orden; ?></td>
                    <td><?php echo $orden->nombre_area; ?></td>
                    <td><?php echo $orden->referencia_cliente . " " . $orden->nombre_cliente; ?></td>
                    <td><?php echo $orden->nombre_usuario . " " . $orden->apellido_usuario; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="contenedorimg">
        <section class="imagen-estadisticas">
            <h3><?php echo $cuenta_materiaprima; ?></h3>
            <p>BROCHAS NUEVAS EN MATERIA PRIMA</p>
        </section>
    </div>

    <section class="negritas">
        <h2>Materia prima para Cremalleras y Planas</h2>
    </section>

    <table class="materiapnuevas1">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Última actualización</th>
                <th>Prioridad</th>
                <th>Área</th>
                <th>Cliente</th>
                <th>Editado por:</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vista_cremalleras_materiaprima as $orden) { ?>
                <tr>
                    <td><?php echo $orden->numero_orden; ?></td>
                    <td><?php echo $orden->descripcion_orden; ?></td>
                    <td><?php echo $orden->hora_orden . " el " . $orden->fecha_orden; ?></td>
                    <td><?php echo $orden->prioridad_orden; ?></td>
                    <td><?php echo $orden->nombre_area; ?></td>
                    <td><?php echo $orden->referencia_cliente . " " . $orden->nombre_cliente; ?></td>
                    <td><?php echo $orden->nombre_usuario . " " . $orden->apellido_usuario; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="contenedorimg1">
        <section class="imagen-estadisticas1">
            <h3><?php echo $cuenta_materiaprimac; ?></h3>
            <p>CREMALLERAS Y PLANAS EN MATERIA PRIMA</p>
        </section>
    </div>

</main>