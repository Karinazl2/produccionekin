<main class="contenedor seccion">
    <section class="n">
        <h1>Actualizar Orden de Cremallera o Brocha Plana</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
    </section>


    <section class="botonop">
        <a href="/busquedaPersonalizada/busquedacremalleras" class="boton boton-rosadito2">Volver</a>
    </section>

    <form class="formulariobrochas" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar herramienta" class="boton-rosa-1">
    </form>
</main>