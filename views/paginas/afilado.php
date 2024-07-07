<section class="n">
    <h1>Afilado de Brochas</h1>
</section>

<section class="botonop">
    <a href="/busquedaPersonalizada/busquedaafilado" class="boton-verdeson1">ADMINISTRADOR DE AFILADO DE BROCHAS</a>
    <a href="/busquedaafilado/crear" class="boton-verdeson2">+ Añadir ordenes para Afilado</a>
</section>


<main class="agenda">
    <h2 class="agenda__heading">Monitor</h2>
    <p class="agenda__descripcion">Observa aquí la producción de afilado en tiempo real.</p>
</main>

<!-- //comentar -->

<section class="seccion contenedor">
    <h3 class="eventos2__heading">Afilado de Brochas>></h3>
    <p class="eventos__fecha">Secuencia de Producción de Afilado. Ekin México</p>
</section>

<div class="monitorafilado">
    <!-- 1200-1 -->
    <?php if (!empty($vista_afilado_1200)) { ?>
        <div>
            <p class="touta1">MAQ. 1200</p>
            <div class="carda1">
                <p>AFILADO 1200</p>
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
                        <?php foreach ($vista_afilado_1200 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                                <td><?php echo $orden->numero_orden; ?></td>
                                <td><?php echo $orden->referencia_cliente; ?></td>
                                <td><?php echo convertTimeFormat($orden->hora_orden) . " el " . convertDateFormat($orden->fecha_orden); ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="imgmaq">
                    <div class="informe">
                        <img src="../build/img/1200.jpg">
                    </div>
                    <div>
                        <p>MAQ.1200</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 116-3 -->
    <?php if (!empty($vista_afilado_116)) { ?>
        <div>
            <p class="touta2">MAQ. 116</p>
            <div class="carda2">
                <p>AFILADO 116</p>
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
                        <?php foreach ($vista_afilado_116 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                                <td><?php echo $orden->numero_orden; ?></td>
                                <td><?php echo $orden->referencia_cliente; ?></td>
                                <td><?php echo convertTimeFormat($orden->hora_orden) . " el " . convertDateFormat($orden->fecha_orden); ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="imgmaq">
                    <div class="informe">
                        <img src="../build/img/116.jpg">

                    </div>
                    <div>
                        <p>MAQ.116</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 131-3 -->
    <?php if (!empty($vista_afilado_131)) { ?>
        <div>
            <p class="touta3">MAQ. 131</p>
            <div class="carda3">
                <p>AFILADO 131</p>
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
                        <?php foreach ($vista_afilado_131 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                                <td><?php echo $orden->numero_orden; ?></td>
                                <td><?php echo $orden->referencia_cliente; ?></td>
                                <td><?php echo convertTimeFormat($orden->hora_orden) . " el " . convertDateFormat($orden->fecha_orden); ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="imgmaq">
                    <div class="informe">
                        <img src="../build/img/131.jpg">

                    </div>
                    <div>
                        <p>MAQ.131</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="tituloimg">
    <section class="n">
        <h1>Resumen de Afilado</h1>
    </section>
</div>

<section>
    <div class="estadisticas1">
        <div>
            <p>Cantidad Afilado en Producción por Máquina</p>
            <canvas id="myChart1" width="400" height="400"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </div>
    </div>
</section>

<div class="contenedorimg">
    <section class="imagen-estadisticas">
        <h3><?php echo $cuenta; ?></h3>
        <p>AFILADOS EN PRODUCCIÓN</p>
    </section>
</div>

<div class="contenedorimg1">
    <section class="imagen-estadisticas1">
        <h3><?php echo $cuenta_terminadas; ?></h3>
        <p>AFILADOS REALIZADOS EN <?php echo $mes_actual; ?></p>
    </section>
</div>

<section class="contenedor seccion">
    <h2>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</section>