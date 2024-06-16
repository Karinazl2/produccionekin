<fieldset>
    <legend>Nueva herramienta</legend>

    <label for="orden">Orden:</label>
    <input type="text" id="orden" name="afilado_ordenes[orden]" placeholder="Número de Orden"
        value="<?php echo s($afilado_ordenes->orden); ?>">

    <label for="descripcion">Descripcion:</label>
    <input type="text" id="descripcion" name="afilado_ordenes[descripcion]" placeholder="Descripcion"
        value="<?php echo s($afilado_ordenes->descripcion); ?>">

    <label for="prioridad">Prioridad</label>
    <input type="text" id="prioridad" name="afilado_ordenes[prioridad]" placeholder="Prioridad"
        value="<?php echo s($afilado_ordenes->prioridad); ?>">

    <label for="maquina">Máquina</label>
    <select name="nuevas_maquinas[maquina]" id="maquina">
        <option selected value="">----Seleccione----</option>
        <?php foreach ($maquinas as $maquina) { ?>
            <option <?php echo $maquina->$id === $maquina->id ? 'selected' : ''; ?> value="<?php echo s($maquina->id); ?>">
                <?php echo s($maquina->maquina); ?> 
            </option>
        <?php } ?>
    </select>

    <label for="cliente">Cliente</label>
    <select name="cliente[nombre]" id="cliente">
        <option selected value="">----Seleccione----</option>
        <?php foreach ($clientes as $cliente) { ?>
            <option <?php echo $cliente->$id === $cliente->id ? 'selected' : ''; ?>            
                value="<?php echo s($cliente->id); ?>"><?php echo s($cliente->nombre); ?>
                <?php echo s($cliente->nombre); ?>
            
            </option>
        <?php } ?>
    </select>

    <label for="operador">Operador</label>
    <select name="cliente[vendedores_id]" id="vendedor">
        <option selected value="">----Seleccione----</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre) . " " . s
                   ($vendedor->apellido); ?> </option>
        <?php } ?>
    </select>

</fieldset>