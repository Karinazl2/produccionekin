<main class="contenedor seccion contenido-centrado">
    <section class="n">
        <h1>Anuncios</h1>
    </section>

    <?php if (!empty($admin) || !empty($operador)) { ?>
        <section class="botonop">
            <a href="/anuncios/anunciosadmin" class="boton-rosadito2">PANEL DE ADMINISTRACIÓN</a>
        </section>
    <?php } ?>


    <?php foreach ($anuncios as $anuncio) { ?>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="/imagenes/<?php echo $anuncio->imagen; ?>" type="image/webp">
                    <source srcset="/imagenes/<?php echo $anuncio->imagen; ?>" type="image/jpeg">
                    <img loading="lazy" src="/imagenes/<?php echo $anuncio->imagen; ?>.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/anuncios/anuncio?id=<?php echo $anuncio->id; ?>">
                    <h4><?php echo $anuncio->titulo; ?></h4>
                    <p class="informacion-meta">Escrito el: <span><?php echo $anuncio->fecha; ?></span> por:
                        <span><?php echo $anuncio->autor; ?></span>
                    </p>
                    <p>
                        <?php echo $anuncio->descripcion; ?>
                    </p>
                </a>
            </div>

        </article>
    <?php } ?>
</main>


<section class="contenedor seccion">
    <h2>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</section>