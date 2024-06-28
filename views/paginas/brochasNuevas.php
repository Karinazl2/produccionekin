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
    <p class="eventos__fecha">Secuencia de Producción de Brochas Nuevas</p>
</section>

<!-- //inincio -->
<div class="monitor">
    <!-- jarbe1 -->
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
                    <?php foreach ($vista_nuevas_jarbe as $orden) { ?>
                        <tr>
                            <td><?php echo $orden->prioridad_orden === '1' ? 'EN MAQUINA' : $orden->prioridad_orden; ?></td>
                            <td><?php echo $orden->numero_orden; ?></td>
                            <td><?php echo $orden->referencia_cliente; ?></td>
                            <td><?php echo $orden->fecha_orden . " a " .  $orden->hora_orden;?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="imgmaq">
                <div>
                    <img src="../build/img/Jarbe.jpg">

                </div>
                <div>
                    <p>MAQ.17</p>

                </div>
            </div>
        </div>
    </div>
    <!-- INDIA 2-->
    <div>
        <p class="tout2">INDIA</p>
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
                    <?php foreach ($vista_nuevas_india as $orden) { ?>
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
                    <img src="../build/img/INDIA.jpg">
                </div>
                <div>
                    <p>MAQ.249</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 122 3 -->
    <div>
        <p class="tout3">MAQ.122</p>
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
                    <?php foreach ($vista_nuevas_122 as $orden) { ?>
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
                    <img src="../build/img/122.jpg">

                </div>
                <div>
                    <p>MAQ.122</p>

                </div>
            </div>
        </div>
    </div>
    <!-- DOIMAK 4-->
    <div>
        <p class="tout4">DOIMAK</p>
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
                    <?php foreach ($vista_nuevas_doimak as $orden) { ?>
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
                    <img src="../build/img/DOIMAK.jpg">

                </div>
                <div>
                    <p>MAQ.251</p>

                </div>
            </div>
        </div>
    </div>
    <!-- DANOBAT 5 -->
    <div>
        <p class="tout5">DANOBAT</p>
        <div class="card5">
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
                    <img src="../build/img/DANOBAT.png">

                </div>
                <div>
                    <p>MAQ.17</p>

                </div>
            </div>
        </div>
    </div>
    <!-- INDIA 6 -->
    <div>
        <p class="tout6">INDIA</p>
        <div class="card6">
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
                    <?php foreach ($vista_nuevas_india as $orden) { ?>
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
                    <img src="../build/img/INDIA.jpg">

                </div>
                <div>
                    <p>MAQ.249</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 122 7-->
    <div>
        <p class="tout7">MAQ. 121</p>

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
                    <?php foreach ($vista_nuevas_122 as $orden) { ?>
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
                    <img src="../build/img/122.jpg">

                </div>
                <div>
                    <p>MAQ.121</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 23 8-->
    <div>
        <p class="tout8">MAQ. 23</p>
        <div class="card8">
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
                    <img src="../build/img/23.jpg">
                </div>
                <div>
                    <p>MAQ.23</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 29 9-->
    <div>
        <p class="tout9">MAQ. 29</p>
        <div class="card9">
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
                    <img src="../build/img/29.jpg">

                </div>
                <div>
                    <p>MAQ.29</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 24 10-->
    <div>
        <p class="tout10">MAQ. 24</p>
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
                    <?php foreach ($vista_nuevas_24 as $orden) { ?>
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
                    <img src="../build/img/24.jpg">

                </div>
                <div>
                    <p>MAQ.24</p>

                </div>
            </div>
        </div>
    </div>
    <!-- Planos y enganches 11-->
    <div>
        <p class="tout11">TACHELLA</p>
        <div class="card11">
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
                    <img src="../build/img/TACHELLA.jpg">

                </div>
                <div>
                    <p>MAQ.252</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 1200 12 -->
    <div>
        <p class="tout12">MAQ.1200</p>
        <div class="card12">
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
                    <img src="../build/img/1200.jpg">

                </div>
                <div>
                    <p>MAQ.1200</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 116 13-->
    <div>
        <p class="tout13">MAQ. 116</p>
        <div class="card13">
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
                    <img src="../build/img/116.jpg">

                </div>
                <div>
                    <p>MAQ.116</p>

                </div>
            </div>
        </div>
    </div>
    <!-- 131 14-->
    <div>
        <p class="tout14">MAQ. 131</p>
        <div class="card14">
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
                    <img src="../build/img/131.jpg">

                </div>
                <div>
                    <p>MAQ.131</p>

                </div>
            </div>
        </div>
    </div>
</div>

<section class="contenedor seccion">
    <h2>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</section>