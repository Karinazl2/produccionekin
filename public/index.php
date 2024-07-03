<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\EditorClientesController;
use MVC\Router;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\AnunciosController;
use Controllers\VendedorController;
use Controllers\PropiedadController;
use Controllers\OperadoresController;
use Controllers\BusquedaNuevasController;
use Controllers\BusquedaAfiladoController;
use Controllers\BusquedaCremallerasController;
use Controllers\BusquedaPersonalizadaController;


$router = new Router();

//Zona privada
$router->get('/admin', [PropiedadController::class,'index']);
$router->get('/propiedades/crear', [PropiedadController::class,'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class,'actualizar']);
$router->post('/propiedades/crear', [PropiedadController::class,'crear']);
$router->post('/propiedades/actualizar', [PropiedadController::class,'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class,'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class,'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class,'actualizar']);
$router->post('/vendedores/crear', [VendedorController::class,'crear']);
$router->post('/vendedores/actualizar', [VendedorController::class,'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class,'eliminar']);

//Zona pública
$router->get('/', [PaginasController::class,'index']);
$router->get('/brochasNuevas', [PaginasController::class,'brochasNuevas']);
$router->get('/cremalleras', [PaginasController::class,'cremalleras']);
//$router->get('/propiedad', [PaginasController::class,'propiedad']);

$router->get('/afilado', [PaginasController::class,'afilado']);
$router->get('/busquedaPersonalizada', [PaginasController::class,'busquedaPersonalizada']);
$router->post('/busquedaPersonalizada', [PaginasController::class,'busquedaPersonalizada']);
$router->get('/materiaprima', [PaginasController::class,'materiaprima']);

$router->get('/nuestroEquipo', [OperadoresController::class,'nuestroEquipo']);
$router->get('/nuestroEquipo/operadoresadmin', [OperadoresController::class,'operadoresadmin']);

$router->get('/nuestroEquipo/crear', [OperadoresController::class,'crear']);
$router->post('/nuestroEquipo/crear', [OperadoresController::class,'crear']);
$router->get('/nuestroEquipo/actualizar', [OperadoresController::class,'actualizar']);
$router->post('/nuestroEquipo/actualizar', [OperadoresController::class,'actualizar']);
$router->post('/nuestroEquipo/eliminar', [OperadoresController::class,'eliminar']);


$router->get('/anuncios', [PaginasController::class,'blog']);
$router->get('/anuncios/anunciosadmin', [AnunciosController::class,'anunciosadmin']);
$router->get('/anuncios/crear', [AnunciosController::class,'crear']);
$router->post('/anuncios/crear', [AnunciosController::class,'crear']);
$router->get('/anuncios/actualizar', [AnunciosController::class,'actualizar']);
$router->post('/anuncios/actualizar', [AnunciosController::class,'actualizar']);
$router->post('/anuncios/eliminar', [AnunciosController::class,'eliminar']);
$router->get('/anuncios/anuncio', [AnunciosController::class,'anuncio']);

$router->get('/busquedaPersonalizada/busquedaafilado', [BusquedaAfiladoController::class,'busquedaafilado']);
$router->get('/busquedaPersonalizada/busquedacremalleras', [BusquedaCremallerasController::class,'busquedacremalleras']);
$router->get('/busquedaPersonalizada/busquedanuevas', [BusquedaNuevasController::class,'busquedanuevas']);

$router->get('/busquedanuevas/crear', [BusquedaNuevasController::class,'crear']);
$router->post('/busquedanuevas/crear', [BusquedaNuevasController::class,'crear']);
$router->get('/busquedanuevas/actualizar', [BusquedaNuevasController::class,'actualizar']);
$router->post('/busquedanuevas/actualizar', [BusquedaNuevasController::class,'actualizar']);
$router->post('/busquedanuevas/eliminar', [BusquedaNuevasController::class,'eliminar']);
$router->post('/busquedanuevas/siguiente_area', [BusquedaNuevasController::class,'siguiente_area']);
$router->get('/api/ordenes', [BusquedaNuevasController::class,'filtrar']);

$router->get('/busquedacremalleras/crear', [BusquedaCremallerasController::class,'crear']);
$router->post('/busquedacremalleras/crear', [BusquedaCremallerasController::class,'crear']);
$router->get('/busquedacremalleras/actualizar', [BusquedaCremallerasController::class,'actualizar']);
$router->post('/busquedacremalleras/actualizar', [BusquedaCremallerasController::class,'actualizar']);
$router->post('/busquedacremalleras/eliminar', [BusquedaCremallerasController::class,'eliminar']);
$router->post('/busquedacremalleras/siguiente_area', [BusquedaCremallerasController::class,'siguiente_area']);
$router->get('/api/cremalleras', [BusquedaCremallerasController::class,'filtrar']);

$router->get('/busquedaafilado/crear', [BusquedaAfiladoController::class,'crear']);
$router->post('/busquedaafilado/crear', [BusquedaAfiladoController::class,'crear']);
$router->get('/busquedaafilado/actualizar', [BusquedaAfiladoController::class,'actualizar']);
$router->post('/busquedaafilado/actualizar', [BusquedaAfiladoController::class,'actualizar']);
$router->post('/busquedaafilado/eliminar', [BusquedaAfiladoController::class,'eliminar']);
$router->get('/api/afilado', [BusquedaAfiladoController::class,'filtrar']);


$router->get('/editorclientes', [EditorClientesController::class,'editorclientes']);
$router->get('/editorclientes/crear', [EditorClientesController::class,'crear']);
$router->post('/editorclientes/crear', [EditorClientesController::class,'crear']);
$router->get('/editorclientes/actualizar', [EditorClientesController::class,'actualizar']);
$router->post('/editorclientes/actualizar', [EditorClientesController::class,'actualizar']);
$router->post('/editorclientes/eliminar', [EditorClientesController::class,'eliminar']);


//login y autenticacion 
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//Crar cuenta
$router->get('/registrar', [LoginController::class, 'registrar']);
$router->post('/registrar', [LoginController::class, 'registrar']);

//confirmación de la cuenta
$router->get('/mensaje', [LoginController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);

//Formulario de olvidé mi password
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

//colocar el nuevo password
$router->get('/reestablecer', [LoginController::class, 'reestablecer']);
$router->post('/reestablecer', [LoginController::class, 'reestablecer']);



$router->comprobarRutas();