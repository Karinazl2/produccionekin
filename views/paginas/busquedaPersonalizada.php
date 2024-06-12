<section class="n">
    <h1>Administrador de Producción</h1>
</section>
<section class="botonop">
    <a href="/nuestroEquipo/crear" class="boton-rosa"> + Anadir Nueva Herramienta</a>
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
    <h2>Brochas Nuevas</h2>
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
    <h2>Brochas Planas y Cremalleras</h2>
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

            <?php foreach ($vendedores as $vendedor): ?>

                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                    <td> <?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar" >
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>"
                            class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Afilado</h2>
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

            <?php foreach ($vendedores as $vendedor): ?>

                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                    <td> <?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar" >
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>"
                            class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>