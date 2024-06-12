<main class="contenedor seccion">
    <section class="n">
        <h1>Crear Nuevo Miembro</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>

            </div>
        <?php endforeach; ?>

    </section>

    <section class="botonop">
        <a href="/nuestroEquipo" class="boton-rosa">Volver</a>
    </section>


    <form class="formularioperadores" method="POST" enctype="multipart/form-data">
<?php include 'formulario.php'; ?>

        <input type="submit" value="Añadir Nuevo Técnico" class="boton-azul">

    </form>
</main>