<fieldset>
    <legend>Nuevo Afilado</legend>

    <label for="orden">Orden:</label>
    <input type="text" id="orden" name="afilado_ordenes[orden]" placeholder="Número de Orden" value="<?php echo s($afilado_ordenes->orden);?>">

    <label for="descripcion">Descripcion:</label>
    <input type="text" id="descripcion" name="afilado_ordenes[descripcion]" placeholder="Descripcion"
        value="<?php echo s($afilado_ordenes->descripcion); ?>">

    <label for="prioridad">Prioridad</label>
    <input type="text" id="prioridad" name="afilado_ordenes[prioridad]" placeholder="Prioridad"
        value="<?php echo s($afilado_ordenes->prioridad); ?>">


    <label for="vista_clientes">Cliente</label>
    <select name="afilado_ordenes[cliente_id]" id="vista_clientes">
        <option selected value="">----Seleccione el cliente----</option>
        <?php foreach ($vista_clientes as $cliente) { ?>
            <option <?php echo $afilado_ordenes->cliente_id == $cliente->cliente_id ? 'selected' : ''; ?>
                value="<?php echo s($cliente->cliente_id); ?>">
                <?php echo s($cliente->referencia_cliente) . " " . s($cliente->nombre_cliente); ?>
            </option>
        <?php } ?>
    </select>

    <label for="maquina">Máquina</label>
    <select name="afilado_ordenes[maquina_id]" id="maquina">
        <option selected value="">----Seleccione la máquina----</option>
        <?php foreach ($maquinas as $maquina) { ?>
            <option <?php echo $afilado_ordenes->maquina_id === $maquina->id ? 'selected' : ''; ?> value="<?php echo s($maquina->id); ?>">
                <?php echo s($maquina->maquina); ?>
            </option>
        <?php } ?>
    </select>

    <label for="operadores">Operador</label>
    <select name="afilado_ordenes[operador_id]" id="operadores">
        <option selected value="">----Seleccione el nombre del técnico----</option>
        <?php foreach ($operadores as $operador) { ?>
            <option <?php echo $afilado_ordenes->operador_id === $operador->id ? 'selected' : ''; ?> value="<?php echo s($operador->id); ?>"><?php echo s($operador->nombre) . " " . s($operador->apellido); ?> </option>
        <?php } ?>
    </select>

</fieldset>