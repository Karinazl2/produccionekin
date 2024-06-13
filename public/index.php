<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AnunciosController;
use Controllers\BusquedaPersonalizadaController;
use Controllers\OperadoresController;
use MVC\Router;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\VendedorController;
use Controllers\PropiedadController;


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

$router->get('/busquedaPersonalizada/busquedaafilado', [BusquedaPersonalizadaController::class,'busquedaafilado']);
$router->get('/busquedaPersonalizada/busquedacremalleras', [BusquedaPersonalizadaController::class,'busquedacremalleras']);
$router->get('/busquedaPersonalizada/busquedanuevas', [BusquedaPersonalizadaController::class,'busquedanuevas']);

//login y autenticacion 
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);



$router->comprobarRutas();