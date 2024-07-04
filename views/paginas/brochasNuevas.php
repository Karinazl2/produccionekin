<section class="n">
    <h1>Brochas Nuevas</h1>
</section>

<section class="botonop">
    <a href="busquedaPersonalizada/busquedanuevas" class="boton-nuevas-azul1">ADMINISTRADOR DE BROCHAS NUEVAS</a>
    <a href="/busquedanuevas/crear" class="boton-nuevas-azul2">+ Añadir ordenes para Brochas Nuevas</a>

</section>

<section class="imagen-materiaPrima">
    <h3>Materia prima</h3>
    <p>Vea las brochas disponibles en materia prima.</p>
    <a href="/materiaprima" class="boton-nuevas-azul3">Ver Materia Prima</a>
</section>

<main class="agenda">
    <h2 class="agenda__heading">Monitor</h2>
    <p class="agenda__descripcion">Observa aquí la producción actual de brochas nuevas en tiempo real.</p>
</main>

<!-- //comentar -->

<section class="seccion contenedor">
    <h3 class="eventos__heading">Brochas Nuevas>></h3>
    <p class="eventos__fecha">Secuencia de Producción de Brochas Nuevas. Ekin México</p>
</section>

<!-- //inincio -->
<div class="monitor">
    <!-- jarbe1 ASIENTOS1 -->
    <?php if (!empty($vista_nuevas_jarbe1)) { ?>
        <div>
            <p class="tout1">JARBE</p>
            <div class="card1">
                <p>ASIENTOS DE LUNETA</p>
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
                        <?php foreach ($vista_nuevas_jarbe1 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.': $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/Jarbe.jpg">
                    </div>
                    <div>
                        <p>MAQ.17</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- jarbe2 RECTIFICADOD1-->
    <?php if (!empty($vista_nuevas_jarbe2)) { ?>
        <div>
            <p class="tout2">JARBE</p>
            <div class="card2">
                <p>RECTIFICADO DE DIENTES</p>
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
                        <?php foreach ($vista_nuevas_jarbe2 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/Jarbe.jpg">

                    </div>
                    <div>
                        <p>MAQ.17</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- INDIA 3-RECTIFICADOD2-->
    <?php if (!empty($vista_nuevas_india1)) { ?>
        <div>
            <p class="tout3">INDIA</p>
            <div class="card3">
                <p>RECTIFICADO DE DIENTES</p>
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
                        <?php foreach ($vista_nuevas_india1 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.': $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/INDIA.jpg">
                    </div>
                    <div>
                        <p>MAQ.249</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 122 4 RECTIFICADOD3-->
    <?php if (!empty($vista_nuevas_122_1)) { ?>
        <div>
            <p class="tout4">MAQ.122</p>
            <div class="card4">
                <p>RECTIFICADO DE DIENTES</p>
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
                        <?php foreach ($vista_nuevas_122_1 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/122.jpg">

                    </div>
                    <div>
                        <p>MAQ.122</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- DOIMAK 5 RECTIFICADOD4-->
    <?php if (!empty($vista_nuevas_doimak)) { ?>
        <div>
            <p class="tout5">DOIMAK</p>
            <div class="card5">
                <p>RECTIFICADO DE DIENTES</p>
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
                        <?php foreach ($vista_nuevas_doimak as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/DOIMAK.jpg">

                    </div>
                    <div>
                        <p>MAQ.251</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- DANOBAT 6 RECTIFICADOD5 -->
    <?php if (!empty($vista_nuevas_danobat)) { ?>
        <div>
            <p class="tout6">DANOBAT</p>
            <div class="card6">
                <p>RECTIFICADO DE DIENTES </p>
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
                        <?php foreach ($vista_nuevas_danobat as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/DANOBAT.png">

                    </div>
                    <div>
                        <p>MAQ.17</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- INDIA 7 RECTIFICADO MANGOS1-->
    <?php if (!empty($vista_nuevas_india2)) { ?>
        <div>
            <p class="tout7">INDIA</p>
            <div class="card7">
                <p>RECTIFICADO DE MANGOS</p>
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
                        <?php foreach ($vista_nuevas_india2 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/INDIA.jpg">

                    </div>
                    <div>
                        <p>MAQ.249</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 122 8 RECTIFICADO MANGOS2-->
    <?php if (!empty($vista_nuevas_122_2)) { ?>
        <div>
            <p class="tout8">MAQ. 121</p>

            <div class="card8">
                <p>RECTIFICADO DE MANGOS</p>
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
                        <?php foreach ($vista_nuevas_122_2 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/122.jpg">

                    </div>
                    <div>
                        <p>MAQ.121</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- jarbe9 RECTIFICADO MANGOS3-->
    <?php if (!empty($vista_nuevas_jarbe3)) { ?>
        <div>
            <p class="tout9">JARBE</p>
            <div class="card9">
                <p>RECTIFICADO DE MANGOS</p>
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
                        <?php foreach ($vista_nuevas_jarbe3 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/Jarbe.jpg">

                    </div>
                    <div>
                        <p>MAQ.17</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 23 10-->
    <?php if (!empty($vista_nuevas_23)) { ?>
        <div>
            <p class="tout10">MAQ. 23</p>
            <div class="card10">
                <p>ACANALADO</p>
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
                        <?php foreach ($vista_nuevas_23 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/23.jpg">
                    </div>
                    <div>
                        <p>MAQ.23</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 29 11-->
    <?php if (!empty($vista_nuevas_29)) { ?>
        <div>
            <p class="tout11">MAQ. 29</p>
            <div class="card11">
                <p>ACANALADO</p>
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
                        <?php foreach ($vista_nuevas_29 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/29.jpg">

                    </div>
                    <div>
                        <p>MAQ.29</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 24 12-->
    <?php if (!empty($vista_nuevas_24)) { ?>
        <div>
            <p class="tout12">MAQ. 24</p>
            <div class="card12">
                <p>ACANALADO</p>
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
                        <?php foreach ($vista_nuevas_24 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/24.jpg">

                    </div>
                    <div>
                        <p>MAQ.24</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Recubrimiento 13-->
    <?php if (!empty($vista_nuevas_recubrimiento)) { ?>
        <div>
            <p class="tout13">RECUBRIMIENTO</p>
            <div class="card13">
                <p>RECUBRIMIENTO EXTERNO</p>
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
                        <?php foreach ($vista_nuevas_recubrimiento as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/recubrimiento.jpg">
                    </div>
                    <div>
                        <p>RECUBRIMIENTO</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Planos y enganches 14-->
    <?php if (!empty($vista_nuevas_tachella)) { ?>
        <div>
            <p class="tout14">TACHELLA</p>
            <div class="card14">
                <p>PLANOS Y ENGANCHES</p>
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
                        <?php foreach ($vista_nuevas_tachella as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
                        <img src="../build/img/TACHELLA.jpg">

                    </div>
                    <div>
                        <p>MAQ.252</p>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- 1200 15 -->
    <?php if (!empty($vista_nuevas_1200)) { ?>
        <div>
            <p class="tout15">MAQ.1200</p>
            <div class="card15">
                <p>AFILADO</p>
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
                        <?php foreach ($vista_nuevas_1200 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.':  $orden->prioridad_orden; ?></td>
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
    <!-- 116 16-->
    <?php if (!empty($vista_nuevas_116)) { ?>
        <div>
            <p class="tout16">MAQ. 116</p>
            <div class="card16">
                <p>AFILADO</p>
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
                        <?php foreach ($vista_nuevas_116 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.': $orden->prioridad_orden; ?></td>
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
    <!-- 131 17-->
    <?php if (!empty($vista_nuevas_131)) { ?>
        <div>
            <p class="tout17">MAQ. 131</p>
            <div class="card17">
                <p>AFILADO</p>
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
                        <?php foreach ($vista_nuevas_131 as $orden) { ?>
                            <tr>
                                <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQ.': $orden->prioridad_orden; ?></td>
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
    <h1>Resumen Brochas Nuevas</h1>
</section>
</div>

<section>
    <div class="estadisticas">
        <div>
            <p>Cantidad de Brochas Nuevas en Producción por Área</p>
            <canvas id="myChart1" width="400" height="400"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </div>
        <div>
            <p>Cantidad Brochas Nuevas en Producción por Máquina</p>
            <canvas id="myChart2" width="400" height="400"></canvas>
        </div>
    </div>
</section>

<div class="contenedorimg">
<section class="imagen-estadisticas">
    <h3><?php echo $cuenta; ?></h3>
    <p>BROCHAS NUEVAS EN PRODUCCIÓN</p>
</section>
</div>

<div class="contenedorimg1">
<section class="imagen-estadisticas1">
    <h3><?php echo $cuenta_terminadas; ?></h3>
    <p>BROCHAS NUEVAS TERMINADAS EN <?php echo $mes_actual; ?></p>
</section>
</div>

<section class="contenedor seccion">
    <h2>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</section>