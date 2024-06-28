<main class="contenedor seccion">
    <section class="n">
        <h1>Actualizar Herramienta</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>

            </div>
        <?php endforeach; ?>

    </section>

    <section class="botonop">
        <a href="/busquedaPersonalizada/busquedanuevas" class="boton-azulito">Volver</a>
    </section>

    <form class="formulariobrochas" method="POST"  enctype ="multipart/form-data" >
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Actualizar Herramienta" class="boton-azul">
    </form>
</main>