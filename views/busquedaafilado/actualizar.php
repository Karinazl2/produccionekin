<main class="contenedor seccion">
    <section class="n">
        <h1>Actualizar Orden de Afilado</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="botonop">
        <a href="/busquedaPersonalizada/busquedaafilado" class="boton boton-verdecito">Volver</a>
    </section>

    <form class="formulariobrochas" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar herramienta" class="boton-verde">
    </form>
</main>