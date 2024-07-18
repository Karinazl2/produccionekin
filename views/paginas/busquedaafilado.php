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
        <a href="/busquedaPersonalizada/busquedaafilado" class="boton-verde-1">Afilado</a>
    </div>

    <h2>Afilado</h2>
    <?php if (!empty($admin) || !empty($operador)) { ?>
        <section class="botonop">
            <a href="/busquedaafilado/crear" class="boton-verdecito">+ Añadir Órdenes en afilado</a>
        </section>
    <?php } ?>

        <?php if (!empty($admin)) { ?>

        <section class="botones_editor_tablas">
            <a href="/editorclientes" class="boton-verde-clientes">Ver Clientes</a>
        </section>
    <?php } ?>


    <section class="n">
        <h3>Filtros</h3>
    </section>

    <div class="mobile-menu1">
        <img src="/build/img/barras.svg" alt="icono menu responsive">
    </div>

    <!-- //filtrossssssssssssssros -->
    <div class="contenedor2 oculto" id="contenedorForm">
        <form id="buscador" method="POST" action="/busquedaafilado/generarExcel">
            <fieldset>
                <legend>Personaliza tu búsqueda</legend>
                <div class="row">
                    <div class="three columns">
                        <label for="orden">Orden: </label>
                        <input type="text" id="orden" name="filtros[orden]">
                    </div>

                    <div class="three columns">
                        <label for="maquina">Máquina: </label>
                        <select class="u-full-width" id="maquina" name="filtros[maquina]">
                            <option value="">Seleccione</option>
                            <?php foreach ($afilado_maquinas as $maquina) { ?>
                                <option value="<?php echo $maquina->maquina; ?>"><?php echo $maquina->maquina; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="three columns">
                        <label for="vista_clientes">Cliente</label>
                        <select name="filtros[clientes]" id="cliente">
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
                        <select name="afilado_ordenes[operador_id]" id="operador" name="filtros[operador]">
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
            <?php if (!empty($admin) || !empty($operador)) { ?>
                <section class="botonop">
                    <input type="submit" class="boton-verdecito" value="Generar excel">
                </section>
            <?php } ?>
        </form>
    </div>
    <!-- //cierrefiltrosssssssssssssssss -->

    <table class="ordenes2">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Descripción</th>
                <th>Actualizado el:</th>
                <th>Prioridad</th>
                <th>Máquina</th>
                <th>Cliente</th>
                <th>Operador</th>
                <th>Usuario</th>
                <?php if (!empty($_SESSION)) { ?>
                    <th>Acciones:</th>
                <?php } ?>

            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>

            <?php foreach ($vista_afilado_ordenes as $ordenes): ?>
                <tr>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>