<main class="contenedor seccion">
    <section class="n">
        <h1>Actualizar Anuncio</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>

            </div>
        <?php endforeach; ?>

    </section>

    <section class="botonop">
        <a href="/anuncios/anunciosadmin" class="boton-rosadito1">Volver</a>
    </section>

    <form class="formulariobrochas" method="POST"  enctype ="multipart/form-data" >
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Actualizar Anuncio" class="boton-rosa-1">
    </form>

</main>