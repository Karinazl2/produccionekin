<main class="contenedor seccion contenido-centrado">
    <h1>Registrar</h1>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form method="POST" class="formulario" action="/registrar" >
        <fieldset>
            <legend>Email y password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu Email" id="email" value="<?php echo $usuario->email ;?>">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password">

            <label for="password2">Repite tu password</label>
            <input type="password" name="password2" placeholder="Repite tu password" id="password2">

        </fieldset>
        <fieldset>
            <legend>Datos del usuario</legend>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Tu nombre" id="nombre" value="<?php echo $usuario->nombre ;?>">

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" placeholder="Tu Apellido" id="apellido" value="<?php echo $usuario->apellido ;?>">

            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" placeholder="Tu Telefono" id="telefono" value="<?php echo $usuario->telefono ;?>">

        </fieldset>
        <input type="submit" value="Crear cuenta" class="boton boton-verde">
    </form>

    <div class="acciones-auth">
        <a href="/login">¿Ya tienes una cuenta? Inicia sesión</a>
        <a href="/recuperar">¿Olvidaste tu password? Reestablécelo</a>
    </div>

</main>