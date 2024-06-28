<main class="contenedor seccion contenido-centrado">
    <h1>Recuperar contraseña</h1>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form method="POST" class="formulario" action="/login" >
        <fieldset>
            <legend>Email</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu Email" id="email">
        </fieldset>
        <input type="submit" value="Recuperar password" class="boton boton-verde">
    </form>

    <div class="acciones-auth">
        <a href="/registar">¿No tienes cuenta? Crea una</a>
        <a href="/login">¿Ya tienes una cuenta? Inicia sesión</a>
    </div>

</main>