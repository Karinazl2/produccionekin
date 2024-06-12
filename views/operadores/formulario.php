<fieldset>
    <legend>Nuevo miembro</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="operadores[nombre]" placeholder="Nombre del Operador"
        value="<?php echo s($operador->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="operadores[apellido]" placeholder="Apellido del Operador"
        value="<?php echo s($operador->apellido); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="operadores[imagen]">

    <?php if ($operador->imagen) { ?>

        <img src="/imagenes/<?php echo $operador->imagen; ?>" class="imagen-small">

    <?php } ?>

</fieldset>