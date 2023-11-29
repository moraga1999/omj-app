<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Rutas etapa 1
$routes->get('/', 'Home::index');
$routes->get('/nosotros', 'Home::acerca_de');
$routes->get('/servicios', 'Home::servicios');

//Rutas autenticación
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::auth');
$routes->get('/logout', 'Auth::logout');

//Rutas etapa 2
$routes->get('/panel', 'TarjetaJoven::index');
$routes->get('/nueva-tarjeta', 'TarjetaJoven::formulario_tarjeta');
$routes->post('/nueva-tarjeta', 'TarjetaJoven::guardar_tarjeta');
$routes->post('/guardar-pdf', 'TarjetaJoven::guardar_documento');

