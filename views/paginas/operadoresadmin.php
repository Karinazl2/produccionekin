<main class="contenedor seccion">
    <h1>Administrador de operadores</h1>
    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php }
    }
    ?>


<section class="botonop">
    <a href="/nuestroEquipo/crear" class="boton-rojo1"> + Anadir Nuevo Miembro</a>
    <a href="/nuestroEquipo" class="boton-naranja1">Volver</a>
</section>

    <h2>Operadores</h2>
    <table class="propiedades1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>

            <?php foreach ($operadores as $operador): ?>

                <tr>
                    <td> <?php echo $operador->id; ?> </td>
                    <td> <?php echo $operador->nombre . " " .  $operador->apellido; ?> </td>
                    <td> <img src="/imagenes/<?php echo $operador->imagen;?>" class="imagen-tabla"> </td>
                    <td>
                        <form method="POST" class="w-100" action="/nuestroEquipo/eliminar">
                            <input type="hidden" name="id" value="<?php echo $operador->id; ?>">
                            <input type="hidden" name="tipo" value="operador">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/nuestroEquipo/actualizar?id=<?php echo $operador->id; ?>"
                        class="boton-rosa-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table class="propiedades1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>

            <?php foreach ($operadores as $operador): ?>

                <tr>
                    <td> <?php echo $operador->id; ?> </td>
                    <td> <?php echo $operador->nombre . " " .  $operador->apellido; ?> </td>
                    <td> <img src="/imagenes/<?php echo $operador->imagen;?>" class="imagen-tabla"> </td>
                    <td>
                        <form method="POST" class="w-100" action="/nuestroEquipo/eliminar">
                            <input type="hidden" name="id" value="<?php echo $operador->id; ?>">
                            <input type="hidden" name="tipo" value="operador">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/nuestroEquipo/actualizar?id=<?php echo $operador->id; ?>"
                        class="boton-rosa-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>