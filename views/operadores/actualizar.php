<main class="contenedor seccion">
    <section class="n">
        <h1>Actualizar Miembro</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>

            </div>
        <?php endforeach; ?>

    </section>

    <section class="botonop">
        <a href="/nuestroEquipo/operadoresadmin" class="boton-naranja1">Volver</a>
    </section>

    <form class="formulariobrochas" method="POST"  enctype ="multipart/form-data" >
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Actualizar Técnico" class="boton-naranjado">
    </form>

</main>