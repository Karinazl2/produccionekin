<main class="masnosotros">
    <h2>Más sobre nosotros</h2>

    <?php include 'iconos.php'; ?>

</main>

<section class="seccion contenedor">
    <h2>Producción en Tiempo Real</h2>
    <div class="contenedor-anuncios">

        <div class="anuncio">
            <img loading="lazy" src="build/img/brochascilindricas.jpg" alt="anuncio">
            <div class="contenido-anuncio">
                <h3>Brochas cilindricas</h3>
                <a href="/brochasNuevas" class="boton-azul-block">
                    Ver Monitor de Brochas Nuevas
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->


        <div class="anuncio">
            <img loading="lazy" src="build/img/cremalleras.jpg" alt="anuncio">

            <div class="contenido-anuncio">
                <h3>Cremalleras</h3>
                <a href="/cremalleras" class="boton-azul-block">
                    Ver Monitor de Cremalleras
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->

        <div class="anuncio">
            <img loading="lazy" src="build/img/afiladodebrochas.jpeg" alt="anuncio">

            <div class="contenido-anuncio">
                <h3>Afilado de Brochas</h3>
                <a href="/afilado" class="boton-azul-block">
                    Ver Monitor de Afilado de Brochas
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
    </div>
</section>


<section class="imagen-contacto">
    <h2>Búsqueda personalizada</h2>
    <p>Utilice la búsqueda personalizada para filtrar la información de producción según sus necesidades. Puede
        seleccionar diferentes criterios para obtener datos específicos sobre la producción en tiempo real.</p>
    <a href="/busquedaPersonalizada" class="boton-amarillo">Buscar</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Anuncios</h3>

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
                            <span><?php echo $anuncio->autor; ?></span></p>
                        <p>
                            <?php echo substr($anuncio->descripcion, 0, 50) . '...'; ?>
                        </p>
                    </a>
                </div>

            </article>
        <?php } ?>
    </section>


    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal es muy unido, muy buena atención y excelente calidad en las brochas.
            </blockquote>
            <p>- Desconocido</p>
        </div>
    </section>
</div>