<fieldset>
    <legend>Nuevo anuncio</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="anuncios[titulo]" placeholder="Titulo del anuncio:"
        value="<?php echo s($anuncio->titulo); ?>">

    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="anuncios[autor]" placeholder="Autor" value="<?php echo s($anuncios->autor); ?>">


    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="anuncios[descripcion]"><?php echo s($anuncio->descripcion); ?></textarea>


    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="anuncios[imagen]">

    <?php if ($anuncio->imagen) { ?>

        <img src="/imagenes/<?php echo $anuncio->imagen; ?>" class="imagen-small">

    <?php } ?>

</fieldset>