<fieldset>
    <legend>Nuevo Cliente</legend>
    <label for="referencia">Referencia:</label>
    <input type="text" id="referencia" name="referencia_cliente[referencia]" placeholder="Referencia"
        value="<?php echo s($referencia_cliente->referencia); ?>">

    <label for="descripcion">Nombre del Cliente:</label>

    <input type="text" id="nombre" name="cliente[nombre]" placeholder="Nombre del cliente"
        value="<?php echo s($cliente->nombre); ?>">

</fieldset>