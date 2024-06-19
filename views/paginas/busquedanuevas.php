<section class="n">
    <h1>Búsqueda Personalizada</h1>
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
    <div class="botones">
        <a href="/busquedaPersonalizada/busquedanuevas" class="boton-azul-1">Brochas Nuevas</a>
        <a href="/busquedaPersonalizada/busquedacremalleras" class="boton-rosa-1">Cremalleras y Planas</a>
        <a href="/busquedaPersonalizada/busquedaafilado" class="boton-verde">Afilado</a>
    </div>

    <h2>Brochas Nuevas</h2>

    <section class="botonop">
        <a href="/busquedanuevas/crear" class="boton-azulito">+ Añadir Órdenes en Brochas Nuevas</a>
    </section>



    <section class="n">
        <h3>Filtros</h3>
    </section>


    <div class="mobile-menu1">
        <img src="/build/img/barras1.svg" alt="icono menu responsive">
    </div>

    <!-- //filtrossssssssssssssros -->
    <div class="contenedor1 oculto" id="contenedorForm">
        <form id="buscador">
            <fieldset>
                <legend>Personaliza tu búsqueda</legend>
                <div class="row">
                    <div class="three columns">
                        <label for="orden">Orden: </label>
                        <input type="text" id="orden">
                    </div>

                    <div class="three columns">
                        <label for="fecha">Fecha: </label>
                        <select class="u-full-width" id="fecha">
                            <option value="">Seleccione</option>
                        </select>
                    </div>

                    <div class="three columns">
                        <label for="area">Área: </label>
                        <select class="u-full-width" id="area">
                            <option value="">Seleccione</option>
                            <?php foreach ($nuevas_areas as $area) { ?>
                                <option value="<?php echo $area->area; ?>"><?php echo $area->area; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="three columns">
                        <label for="maquina">Máquina: </label>
                        <select class="u-full-width" id="maquina">
                            <option value="">Seleccione</option>
                            <?php foreach ($nuevas_maquinas as $maquina) { ?>
                                <option value="<?php echo $maquina->maquina; ?>"><?php echo $maquina->maquina; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="three columns">
                        <label for="vista_clientes">Cliente</label>
                        <select name="nuevas_ordenes[cliente_id]" id="cliente">
                            <option selected value="">Seleccione el cliente</option>
                            <?php foreach ($vista_clientes as $cliente) { ?>
                                <option value="<?php echo s($cliente->referencia_cliente). " " . s($cliente->nombre_cliente); ?>">
                                    <?php echo s($cliente->referencia_cliente) . " " . s($cliente->nombre_cliente); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="three columns">
                        <label for="operadores">Operador: </label>
                        <select name="nuevas_ordenes[operador_id]" id="operador">
                            <option selected value="">Seleccione el nombre del técnico</option>
                            <?php foreach ($operadores as $operador) { ?>
                                <option value="<?php echo s($operador->nombre) . " " . s($operador->apellido); ?>">
                                    <?php echo s($operador->nombre) . " " . s($operador->apellido); ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>

                </div>
            </fieldset>
        </form>
    </div>
    <!-- //cierrefiltrosssssssssssssssss -->

    <table class="ordenes">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Última actualización</th>
                <th>Prioridad</th>
                <th>Área</th>
                <th>Máquina</th>
                <th>Cliente</th>
                <th>Operador</th>
                <th>Editado por:</th>
                <th>Acciones:</th>
            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>

            <?php foreach ($vista_nuevas_ordenes as $ordenes): ?>
                <tr>
                    <td><?php echo $ordenes->numero_orden; ?> </td>
                    <td><?php echo $ordenes->descripcion_orden; ?> </td>
                    <?php
                    $dateTime = new DateTime($ordenes->fecha_orden);

                    $fechaFormateada = $dateTime->format('d/m/Y');
                    ?>

                    <td><?php echo $ordenes->hora_orden . " el " . $fechaFormateada; ?></td>
                    <td><?php echo $ordenes->prioridad_orden; ?></td>
                    <td><?php echo $ordenes->nombre_area; ?></td>
                    <td><?php echo $ordenes->nombre_maquina; ?></td>
                    <td><?php echo $ordenes->referencia_cliente . " " . $ordenes->nombre_cliente; ?></td>
                    <td><?php echo $ordenes->nombre_operador . " " . $ordenes->apellido_operador; ?></td>
                    <td><?php echo $ordenes->nombre_usuario . " " . $ordenes->apellido_usuario; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/busquedanuevas/eliminar">
                            <input type="hidden" name="id" value="<?php echo $ordenes->orden_id; ?>">
                            <input type="hidden" name="tipo" value="nuevas_ordenes">
                            <input type="submit" class="boton-rojo-block-1" value="Eliminar">
                        </form>

                        <a href="/busquedanuevas/actualizar?id=<?php echo $ordenes->orden_id; ?>"
                            class="boton-verde-block-1">Actualizar</a>

                        <form method="POST" class="w-100" action="/busquedanuevas/siguiente_area">
                            <input type="hidden" name="id" value="<?php echo $ordenes->orden_id; ?>">
                            <input type="hidden" name="tipo" value="nuevas_ordenes">
                            <input type="submit" class="boton-azul-block-1" value="Área  >>">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>