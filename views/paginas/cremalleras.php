<section class="n">
    <h1>Brochas Planas y Cremalleras</h1>
</section>

<section class="botonop">
    <a href="busquedaPersonalizada/busquedacremalleras" class="boton-rosadito1">ADMINISTRADOR DE CREMALLERAS Y BROCHAS
        PLANAS</a>
    <a href="/busquedacremalleras/crear" class="boton-rosadito2">+ Añadir ordenes para Brochas Planas y Cremalleras</a>
</section>

<section class="imagen-materiaPrima">
    <h3>Materia prima</h3>
    <p>Vea las cremalleras y brochas planas disponibles en materia prima.</p>
    <a href="/materiaprima" class="boton-rosado10">Ver Materia Prima</a>
</section>

<main class="agenda">
    <h2 class="agenda__heading">Monitor</h2>
    <p class="agenda__descripcion">Observa aquí la producción actual de cremalleras y brochas planas en tiempo real.</p>
</main>

<!-- //comentar -->

<section class="seccion contenedor">
    <h3 class="eventos1__heading">Brochas Planas y Cremalleras>></h3>
    <p class="eventos__fecha">Secuencia de Producción de Cremalleras y Planas. Ekin México</p>
</section>

<!-- //inincio -->
<div class="monitorcremalleras">
    <!-- 39-1 -->
    <?php if (!empty($vista_cremalleras_39)) { ?>
        <div>
            <p class="toutc1">MAQ. 39</p>
            <div class="cardc1">
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
                        <?php foreach ($vista_cremalleras_39 as $orden) { ?>
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
                        <img src="../build/img/39.jpg">

                    </div>
                    <div>
                        <p>MAQ.39</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 41-2 -->
    <?php if (!empty($vista_cremalleras_41)) { ?>
        <div>
            <p class="toutc2">MAQ. 41</p>
            <div class="cardc2">
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
                        <?php foreach ($vista_cremalleras_41 as $orden) { ?>
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
                        <img src="../build/img/41.jpg">
                    </div>
                    <div>
                        <p>MAQ.41</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 58-3 -->
    <?php if (!empty($vista_cremalleras_58)) { ?>
        <div>
            <p class="toutc3">MAQ. 58</p>
            <div class="cardc3">
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
                        <?php foreach ($vista_cremalleras_58 as $orden) { ?>
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
                        <img src="../build/img/58.jpg">

                    </div>
                    <div>
                        <p>MAQ.58</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 54-4 -->
    <?php if (!empty($vista_cremalleras_54)) { ?>
        <div>
            <p class="toutc4">MAQ. 54</p>
            <div class="cardc4">
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
                        <?php foreach ($vista_cremallleras_54 as $orden) { ?>
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
                        <img src="../build/img/58.jpg">

                    </div>
                    <div>
                        <p>MAQ.54</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 125-5 -->
    <?php if (!empty($vista_cremalleras_125)) { ?>
        <div>
            <p class="toutc5">MAQ. 125
            </p>
            <div class="cardc5">
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
                        <?php foreach ($vista_cremalleras_125 as $orden) { ?>
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
                        <img src="../build/img/125.jpg">

                    </div>
                    <div>
                        <p>MAQ.125</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 60-6 -->
    <?php if (!empty($vista_cremalleras_60)) { ?>
        <div>
            <p class="toutc6">MAQ. 60
            </p>
            <div class="cardc6">
                <p>AFILADO DE PLANAS</p>
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
                        <?php foreach ($vista_cremalleras_60 as $orden) { ?>
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
                        <img src="../build/img/58.jpg">

                    </div>
                    <div>
                        <p>MAQ.60</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 59-7 -->
    <?php if (!empty($vista_cremalleras_59)) { ?>
        <div>
            <p class="toutc7">MAQ. 59
            </p>
            <div class="cardc7">
                <p>AFILADO DE CIL Y HELIC</p>
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
                        <?php foreach ($vista_cremalleras_59 as $orden) { ?>
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
                        <img src="../build/img/58.jpg">

                    </div>
                    <div>
                        <p>MAQ.59</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="tituloimg">
<section class="n">
    <h1>Resumen de Cremalleras</h1>
</section>
</div>

<section>
    <div class="estadisticas2">
        <div>
            <p>Cantidad de Cremalleras y Planas en Producción por Área</p>
            <canvas id="myChart1" width="400" height="400"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </div>
        <div>
            <p>Cantidad Cremalleras y Planas en Producción por Máquina</p>
            <canvas id="myChart2" width="400" height="400"></canvas>
        </div>
    </div>
</section>

<div class="contenedorimg">
<section class="imagen-estadisticas">
    <h3><?php echo $cuenta; ?></h3>
    <p>CREMALLERAS Y PLANAS EN PRODUCCIÓN</p>
</section>
</div>

<div class="contenedorimg1">
<section class="imagen-estadisticas1">
    <h3><?php echo $cuenta_terminadas; ?></h3>
    <p>CREMALLERAS Y PLANAS TERMINADAS EN <?php echo $mes_actual; ?></p>
</section>
</div>

<section class="contenedor seccion">
    <h2>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</section>
</main>