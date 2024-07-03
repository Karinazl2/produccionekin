<section class="n">
    <h1>Nuestro equipo</h1>
</section>
<section class="botonop">

    <a href="/nuestroEquipo/operadoresadmin" class="boton-naranja1">PANEL DE ADMINISTRACIÓN</a>
</section>

<div class="l"><p>Conoce a nuestros expertos en fabricación de brochas</p>
</div>

<section class="speakers">
    <div class="speakers__grid">

        <?php foreach ($operadores as $operador) { ?>
            <div <?php aos_animacion(); ?> class="speaker">
                <picture>
                    <source srcset="/imagenes/<?php echo $operador->imagen; ?>" type="image/webp">
                    <source srcset="/imagenes/<?php echo $operador->imagen;?>" type="image/png">
                    <img class="speaker__imagen" loading="lazy" width="200" height="300" src="/imagenes/<?php echo $operador->imagen;?>" alt="Imagen Ponente">
                </picture>

                <div class="speaker__informacion">
                    <h4 class="speaker__nombre">
                        <?php echo $operador->nombre . ' ' . $operador->apellido; ?>
                    </h4>
                </div>
            </div>
        <?php } ?>
    </div>
</section>