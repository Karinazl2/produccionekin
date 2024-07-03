<main class="contenedor seccion">
    <h1>Administrador de anuncios</h1>
    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php }
    }
    ?>


<section class="botonop">
    <a href="/anuncios/crear" class="boton-rosadito1"> + Anadir Nuevo Anuncio</a>
    <a href="/anuncios" class="boton-rosadito2">Volver</a>
</section>

    <h2>Anuncios</h2>
    <table class="ordenes1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Mostrar los resultados -->
        <tbody>

            <?php foreach ($anuncios as $anuncio): ?>

                <tr>
                    <td> <?php echo $anuncio->id; ?> </td>
                    <td> <?php echo $anuncio->titulo; ?> </td>
                    <td> <?php echo $anuncio->fecha; ?> </td>
                    <td> <?php echo $anuncio->autor; ?> </td>
                    <td> <?php echo $anuncio->descripcion; ?> </td>
                    <td> <img src="/imagenes/<?php echo $anuncio->imagen;?>" class="imagen-tabla"> </td>
                    <td>
                        <form method="POST" class="w-100" action="/anuncios/eliminar">
                            <input type="hidden" name="id" value="<?php echo $anuncio->id; ?>">
                            <input type="hidden" name="tipo" value="anuncio">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/anuncios/actualizar?id=<?php echo $anuncio->id; ?>"
                        class="boton-rosa-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>