<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/nosotros', 'Home::acerca_de');
$routes->get('/servicios', 'Home::servicios');
$routes->get('/login', 'Auth::index');


$routes->post('/login/auth', 'Auth::auth');
