<section class="n">
    <h1>Brochas Planas y Cremalleras</h1>
</section>

<section class="botonop">
    <a href="busquedaPersonalizada/busquedacremalleras" class="boton-rosa">ADMINISTRADOR DE CREMALLERAS Y BROCHAS
        PLANAS</a>
    <a href="/busquedacremalleras/crear" class="boton-rosa">+ Añadir ordenes para Brochas Planas y Cremalleras</a>
</section>

<section class="imagen-materiaPrima">
    <h3>Materia prima</h3>
    <p>Vea las cremalleras y brochas planas disponibles en materia prima.</p>
    <a href="/brochasNuevas" class="boton-azul">Ver Materia Prima</a>
</section>

<main class="agenda">
    <h2 class="agenda__heading">Monitor</h2>
    <p class="agenda__descripcion">Observa aquí la producción actual de brochas nuevas en tiempo real.</p>
</main>

<!-- //comentar -->

<section class="seccion contenedor">
    <h3 class="eventos__heading">Brochas Planas y Cremalleras>></h3>
    <p class="eventos__fecha">Secuencia de Producción de Cremalleras y Planas</p>
</section>

<!-- //inincio -->
<div class="monitor">
    <!-- 39-1 -->
    <div>
        <p class="tout1">MAQ. 39</p>
        <div class="card1">
            <p>PLANEADO</p>
            <table>
                <thead>
                    <tr>
                        <th>Prioridad</th>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vista_nuevas_39 as $orden) { ?>
                        <tr>
                            <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                            <td><?php echo $orden->numero_orden; ?></td>
                            <td><?php echo $orden->referencia_cliente; ?></td>
                            <td><?php echo $orden->fecha_orden; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="imgmaq">
                <div>
                    <img src="../build/img/Jarbe.jpg">

                </div>
                <div>
                    <p>MAQ.39</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 41-2 -->
    <div>
        <p class="tout1">MAQ. 41</p>
        <div class="card1">
            <p>PLANEADO</p>
            <table>
                <thead>
                    <tr>
                        <th>Prioridad</th>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vista_nuevas_41 as $orden) { ?>
                        <tr>
                            <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                            <td><?php echo $orden->numero_orden; ?></td>
                            <td><?php echo $orden->referencia_cliente; ?></td>
                            <td><?php echo $orden->fecha_orden; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="imgmaq">
                <div>
                    <img src="../build/img/Jarbe.jpg">
                </div>
                <div>
                    <p>MAQ.41</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 58-1 -->
    <div>
        <p class="tout1">MAQ. 58</p>
        <div class="card1">
            <p>MECANIZADO</p>
            <table>
                <thead>
                    <tr>
                        <th>Prioridad</th>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vista_nuevas_58 as $orden) { ?>
                        <tr>
                            <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                            <td><?php echo $orden->numero_orden; ?></td>
                            <td><?php echo $orden->referencia_cliente; ?></td>
                            <td><?php echo $orden->fecha_orden; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="imgmaq">
                <div>
                    <img src="../build/img/Jarbe.jpg">

                </div>
                <div>
                    <p>MAQ.58</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 54-1 -->
    <div>
        <p class="tout1">MAQ. 54</p>
        <div class="card1">
            <p>MECANIZADO</p>
            <table>
                <thead>
                    <tr>
                        <th>Prioridad</th>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vista_nuevas_54 as $orden) { ?>
                        <tr>
                            <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                            <td><?php echo $orden->numero_orden; ?></td>
                            <td><?php echo $orden->referencia_cliente; ?></td>
                            <td><?php echo $orden->fecha_orden; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="imgmaq">
                <div>
                    <img src="../build/img/Jarbe.jpg">

                </div>
                <div>
                    <p>MAQ.54</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 125-1 -->
    <div>
        <p class="tout1">MAQ. 125
        </p>
        <div class="card1">
            <p>MECANIZADO</p>
            <table>
                <thead>
                    <tr>
                        <th>Prioridad</th>
                        <th>Orden</th>
                        <th>Cliente</th>
                        <th>Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vista_nuevas_125 as $orden) { ?>
                        <tr>
                            <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                            <td><?php echo $orden->numero_orden; ?></td>
                            <td><?php echo $orden->referencia_cliente; ?></td>
                            <td><?php echo $orden->fecha_orden; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="imgmaq">
                <div>
                    <img src="../build/img/Jarbe.jpg">

                </div>
                <div>
                    <p>MAQ.125</p>

                </div>
            </div>
        </div>
    </div>
</div>



<section class="contenedor seccion">
    <h2>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</section>
</main>