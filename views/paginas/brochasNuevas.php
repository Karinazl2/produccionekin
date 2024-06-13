<section class="n">
    <h1>Brochas Nuevas</h1>
</section>

<section class="botonop">
    <a href="/anuncios/anunciosadmin" class="boton-rosa">+ Añadir ordenes para Brochas Nuevas</a>
</section>

<section class="imagen-materiaPrima">
    <h3>Materia prima</h3>
    <p>Vea las brochas disponibles en materia prima.</p>
    <a href="/brochasNuevas" class="boton-azul">Ver Materia Prima</a>
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

<section class="contenedor seccion">
    <h2>Más sobre nosotros</h2>
    <?php include 'iconos.php'; ?>
</section>