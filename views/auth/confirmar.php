<main class="contenedor seccion contenido-centrado">

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php }
    if (empty($errores)) { ?>
        <h1>Cuenta Confirmada Correctamente</h1>

        <div class="acciones-auth">
            <a href="/login">¿Ya Tienes una Cuenta? Inicia Sesión</a>
            <a href="/recuperar">¿Olvidaste tu Password? Reestablécelos</a>
        </div>

    <?php } ?>
</main>