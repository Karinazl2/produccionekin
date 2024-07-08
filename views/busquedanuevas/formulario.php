<fieldset>
    <legend>Nueva herramienta</legend>

    <label for="orden">Orden:</label>
    <input type="text" id="orden" name="nuevas_ordenes[orden]" placeholder="Número de Orden"
        value="<?php echo s($nuevas_ordenes->orden); ?>">

    <label for="descripcion">Descripcion:</label>
    <input type="text" id="descripcion" name="nuevas_ordenes[descripcion]" placeholder="Descripcion"
        value="<?php echo s($nuevas_ordenes->descripcion); ?>">

    <label for="prioridad">Prioridad</label>
    <input type="number" min="1" max="15" id="prioridad" name="nuevas_ordenes[prioridad]" placeholder="Prioridad"
        value="<?php echo s($nuevas_ordenes->prioridad); ?>">


    <label for="vista_clientes">Cliente</label>
    <select name="nuevas_ordenes[cliente_id]" id="vista_clientes">
        <option selected value="">----Seleccione el cliente----</option>
        <?php foreach ($vista_clientes as $cliente) { ?>
            <option <?php echo $nuevas_ordenes->cliente_id == $cliente->id ? 'selected' : ''; ?>
                value="<?php echo s($cliente->id); ?>">
                <?php echo s($cliente->referencia_cliente) . " " . s($cliente->nombre_cliente); ?>
            </option>
        <?php } ?>
    </select>

    <label for="area">Área</label>
    <select name="nuevas_ordenes[area_id]" id="area">
        <option selected value="">----Seleccione el área----</option>
        <?php foreach ($nuevas_areas as $area) { ?>
            <option <?php echo $nuevas_ordenes->area_id === $area->id ? 'selected' : ''; ?>
                value="<?php echo s($area->id); ?>">
                <?php echo s($area->area); ?>
            </option>
        <?php } ?>
    </select>

    <label for="maquina">Máquina</label>
    <select name="nuevas_ordenes[maquina_id]" id="maquina">
        <option selected value="">----Seleccione la máquina----</option>
        <?php foreach ($maquinas as $maquina) { ?>
            <option <?php echo $nuevas_ordenes->maquina_id === $maquina->id ? 'selected' : ''; ?>
                value="<?php echo s($maquina->id); ?>">
                <?php echo s($maquina->maquina); ?>
            </option>
        <?php } ?>
    </select>

    <label for="operadores">Operador</label>
    <select name="nuevas_ordenes[operador_id]" id="operadores">
        <option selected value="">----Seleccione el nombre del técnico----</option>
        <?php foreach ($operadores as $operador) { ?>
            <option <?php echo $nuevas_ordenes->operador_id === $operador->id ? 'selected' : ''; ?>
                value="<?php echo s($operador->id); ?>"><?php echo s($operador->nombre) . " " . s($operador->apellido); ?>
            </option>
        <?php } ?>
    </select>

</fieldset>