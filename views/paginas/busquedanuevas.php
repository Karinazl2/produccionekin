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
        <a href="/busquedaPersonalizada/busquedacremalleras" class="boton-amarillo">Cremalleras y Planas</a>
        <a href="/busquedaPersonalizada/busquedaafilado" class="boton-verde">Afilado</a>
    </div>

    <h2>Brochas Nuevas</h2>

    <section class="botonop">
        <a href="/anuncios/anunciosadmin" class="boton-rosa">+ Añadir Órdenes en Brochas Nuevas</a>
    </section>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Cliente</th>
                <th>Area</th>
                <th>Máquina</th>
                <th>Prioridad</th>
                <th>Operador</th>
            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>

            <?php foreach ($propiedades as $propiedad): ?>

                <tr>
                    <td> <?php echo $propiedad->id; ?> </td>
                    <td> <?php echo $propiedad->titulo; ?> </td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"> </td>
                    <td>$<?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>"
                            class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
