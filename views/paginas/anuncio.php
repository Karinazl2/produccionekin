<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $anuncio->titulo; ?></h1>

    <section class="botonop">
        <a href="/anuncios" class="boton-rojo1">Volver</a>
    </section>
    <picture>
        <img loading="lazy" src="/imagenes/<?php echo $anuncio->imagen; ?>" alt="imagen del anuncio">
    </picture>
    <p class="informacion-meta">Escrito el: <span><?php echo $anuncio->fecha; ?></span> por:
        <span><?php echo $anuncio->autor; ?></span></p>

    <section>
        <a href="/imagenes/<?php echo $anuncio->imagen; ?>" class="boton-azul" download="">Descargar Imagen</a>
    </section>

    <div class="resumen-propiedad">
        <p class="precio"><?php echo $anuncio->titulo; ?></p>

        <p>
            <?php echo $anuncio->descripcion; ?>
        </p>
    </div>
</main>