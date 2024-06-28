<section class="n">
    <h1>Clientes</h1>
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
        <a href="/editorclientes/crear" class="boton-azulito"> + Anadir Nuevo Cliente</a>
    </section>

    <table class="ordenes">
        <thead>
            <tr>
                <th>Referencia</th>
                <th>Nombre</th>
                <th>Elimina Cliente</th>
                <th>Actualiza Cliente</th>

            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>

            <?php foreach ($vista_clientes as $cliente): ?>

                <tr>
                    <td> <?php echo $cliente->referencia_cliente; ?>
                    </td>
                    <td> <?php echo $cliente->nombre_cliente; ?>
                    </td>
                    <td>
                        <form method="POST" class="w-100" action="/editorclientes/eliminar">
                            <input type="hidden" name="id" value="<?php echo $cliente->cliente_id; ?>">
                            <input type="hidden" name="tipo" value="cliente">
                            <input type="submit" class="boton-rojo-block-1" value="Eliminar">
                        </form>
                    </td>
                    <td>

                        <a href="/editorclientes/actualizar?id=<?php echo $cliente->cliente_id; ?>"
                        class="boton-verde-block-1">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



</main>