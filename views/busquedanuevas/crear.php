<main class="contenedor seccion">
    <section class="n">
        <h1>Crear Orden de Brocha Nueva</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
    </section>


    <section class="botonop">
        <a href="/busquedaPersonalizada/busquedanuevas" class="boton boton-azulito">Volver</a>
    </section>

    <form class="formulariobrochas" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Crear orden" class="boton-azul">
    </form>
</main>