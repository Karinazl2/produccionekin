<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekin Producción</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices" class="logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/brochasNuevas">Brochas nuevas</a>
                        <a href="/cremalleras">Cremalleras</a>
                        <a href="/afilado">Afilado de Brochas</a>
                        <a href="/busquedaPersonalizada">Búsqueda personalizada</a>
                        <a href="/nuestroEquipo">Nuestro Equipo</a>
                        <a href="/anuncios">Anuncios</a>
                        <?php if ($auth) { ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php } else { ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php } ?>
                    </nav>
                </div>
            </div> <!--.barra-->
            <?php if ($inicio) { ?>
                <h1>Gestión Integral de Producción</h1>
            <?php } ?>
        </div>
    </header>


    <?php echo $contenido; ?>

    <?php echo $script ?? ''; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/brochasNuevas">Brochas nuevas</a>
                <a href="/cremalleras">Cremalleras</a>
                <a href="/afilado">Afilado de Brochas</a>
                <a href="/busquedaPersonalizada">Búsqueda personalizada</a>
                <a href="/nuestroEquipo">Nuestro Equipo</a>
                <a href="/anuncios">Anuncios</a>
                <?php if ($auth) { ?>
                    <a href="/logout">Cerrar Sesión</a>
                <?php } else { ?>
                    <a href="/login">Iniciar Sesión</a>
                <?php } ?>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>
    <script src="../build/js/bundle.min.js "></script>

</body>

</html>