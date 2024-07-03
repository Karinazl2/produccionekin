<main class="contenedor seccion contenido-centrado">
    <h1>Coloca tu Nuevo Password</h1>

    <?php foreach ($exito as $exitomsg) { ?>
        <div class="alerta exito">
            <?php echo $exitomsg; ?>
        </div>
    <?php } ?>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <?php if($token_valido){ ?>
    <form method="POST" class="formulario">
        <fieldset>
            <legend>Escribe tu nuevo Password</legend>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu nuevo password" id="password">
        </fieldset>
        <input type="submit" value="Guardar password" class="boton boton-verde">
    </form>
    <?php } ?>

    <div class="acciones-auth">
        <a href="/registar">¿No tienes cuenta? Crea una</a>
        <a href="/login">¿Ya tienes una cuenta? Inicia sesión</a>
    </div>
</main>