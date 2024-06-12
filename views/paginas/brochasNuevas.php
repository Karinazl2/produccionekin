<section class="n">
    <h1>Brochas Nuevas</h1>
</section>

<section class="imagen-materiaPrima">
    <h3>Materia prima</h3>
    <p>Vea las brochas disponibles en materia prima.</p>
    <a href="/brochasNuevas" class="boton-amarillo">Ver Materia Prima</a>
</section>

<section class="negritas">
    <h1>Monitor</h1>
    <p>Encuentra la herramienta que necesitas en un instante.</p>
</section>

<section class="titulo">
    <h3>Producción de Brochas Nuevas>> </h3>
    <p>Ekin México</p>
</section>

<main class="agenda">
    <div class="eventos">
        <p class="eventos__fecha">Asientos de Luneta</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias_v'] as $evento) { ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>

                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

        <p class="eventos__fecha">Rectificado de Dientes</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias_s'] as $evento) { ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>

                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</main>

<!-- <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" srcset="build/img/nosotros.jpg" alt="Sobre Nosotros">
            </picture>
        </div> -->
<!-- 
        <div class="texto-nosotros">
            <blockquote>
                25 Años de experiencia
            </blockquote>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur maiores, veniam ut eos reprehenderit,
                dolore magnam rerum laboriosam dolores tenetur ratione quasi, sit natus vel cumque dolorum. Modi
                molestias
                enim perferendis, pariatur deleniti ullam aspernatur ipsa accusantium rem earum neque amet iure eligendi
                voluptates facere odio repellat expedita tenetur consequatur animi harum? Iusto aut dolore incidunt
                aliquid. Voluptatem, molestias in!

            </p>

            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque atque aspernatur voluptates corporis
                tempore. Reiciendis neque facilis nulla architecto sunt optio odio totam ipsam dolorum. Y a parte no
                hay más que decir.xxx.oooo Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nisi
                sunt maiores quos harum suscipit incidunt nihil, quis placeat explicabo!
            </p>

        </div>

    </div>
    </main> -->

<section class="contenedor seccion">
    <h2>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</section>