<main class="contenedor seccion">
    <section class="n">
        <h1>Actualizar Cliente</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>

            </div>
        <?php endforeach; ?>

    </section>

    <section class="botonop">
        <a href="/editorclientes" class="boton-azulito">Volver</a>
    </section>

    <form class="formulariobrochas" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar herramienta" class="boton-azul">
    </form>
</main>