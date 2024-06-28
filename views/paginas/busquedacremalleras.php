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
        <a href="/busquedaPersonalizada/busquedanuevas" class="boton-azul">Brochas Nuevas</a>
        <a href="/busquedaPersonalizada/busquedacremalleras" class="boton-rosa-1">Cremalleras y Planas</a>
        <a href="/busquedaPersonalizada/busquedaafilado" class="boton-verde">Afilado</a>
    </div>

    <h2>Brochas Planas y Cremalleras</h2>
    <section class="botonop">
        <a href="/busquedacremalleras/crear" class="boton-rosa">+ Añadir Órdenes en Cremalleras</a>
    </section>

    <section class="botones_editor_tablas">
        <a href="/editorclientes" class="boton-rosa-clientes">Ver Clientes</a>
    </section>

    <section class="n">
        <h3>Filtros</h3>
    </section>

    <div class="mobile-menu1">
        <img src="/build/img/barras.svg" alt="icono menu responsive">
    </div>

    <!-- //filtrosssssssssssssssssssss -->

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
                        <select name="cremalleras_ordenes[cliente_id]" id="cliente">
                            <option selected value="">Seleccione el cliente</option>
                            <?php foreach ($vista_clientes as $cliente) { ?>
                                <option
                                    value="<?php echo s($cliente->referencia_cliente) . " " . s($cliente->nombre_cliente); ?>">
                                    <?php echo s($cliente->referencia_cliente) . " " . s($cliente->nombre_cliente); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="three columns">
                        <label for="operadores">Operador: </label>
                        <select name="cremalleras_ordenes[operador_id]" id="operador">
                            <option selected value="">Seleccione</option>
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

    <!-- filtrossssssssssssssssssssss -->
    <table class="ordenes1">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Actualizado el:</th>
                <th>Prioridad</th>
                <th>Área</th>
                <th>Máquina</th>
                <th>Cliente</th>
                <th>Operador</th>
                <th>Usuario</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>

            <?php foreach ($vista_cremalleras_ordenes as $ordenes): ?>
                <tr>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>