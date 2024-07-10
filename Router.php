<?php

namespace MVC;

class Router
{
    public $rutasGET = [];
    public $rutasPOST = [];


    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas()
    {
        session_start();
        $auth = $_SESSION['login'] ?? null;
        $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        $splitURL = explode('?' , $urlActual);

        //Arreglo de rutas protegidas
        $rutas_protegidas = [
            '/nuestroEquipo/operadoresadmin',
            '/nuestroEquipo/crear',
            '/nuestroEquipo/actualizar',
            '/nuestroEquipo/eliminar',
            '/anuncios/anunciosadmin',
            '/anuncios/crear',
            '/anuncios/actualizar',
            '/anuncios/eliminar',
            '/busquedanuevas/crear',
            '/busquedanuevas/actualizar',
            '/busquedanuevas/eliminar',
            '/busquedanuevas/siguiente_area',
            '/busquedacremalleras/crear',
            '/busquedacremalleras/actualizar',
            '/busquedacremalleras/eliminar',
            '/busquedaafilado/crear',
            '/busquedaafilado/actualizar',
            '/busquedaafilado/eliminar',
            '/editorclientes/crear',
            '/editorclientes/actualizar',
            '/editorclientes/eliminar'

        ];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$splitURL[0]] ?? null;
        } else {
            $fn = $this->rutasPOST[$splitURL[0]] ?? null;
        }

        //proteger las rutas
        if (in_array($splitURL[0], $rutas_protegidas) && !$auth) {
            header('Location: /');
        }


        if ($fn) {
            call_user_func($fn, $this);
        } else {
            header('Location: /404');
        }
    }

    //Muestra una vista
    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}