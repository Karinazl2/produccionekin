<section class="n">
    <h1>Brochas Planas y Cremalleras</h1>
</section>

<section class="imagen-materiaPrima">
    <h3>Materia prima</h3>
    <p>Vea las cremalleras y brochas planas disponibles en materia prima.</p>
    <a href="/brochasNuevas" class="boton-amarillo">Ver Materia Prima</a>
</section>

<section class="negritas">
    <h1>Monitor</h1>
    <p>Encuentra la herramienta que necesitas en un instante.</p>
</section>

<section class="titulo">
    <h3>Producción de Cremalleras y Brochas Planas>> </h3>
    <p>Ekin México</p>
</section>
<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php
    if ($mensaje) { ?>
        <p class='alerta exito'> <?php echo $mensaje; ?></p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o compra:</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>--Selecione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>
            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" placeholder="Tu Precio" id="presupuesto" name="contacto[precio]" required>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <p>Cómo desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>

</main>