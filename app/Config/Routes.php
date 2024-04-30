<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Rutas sistema web
$routes->get('/', 'Home::index');
$routes->get('/mi-tarjeta', 'Home::mi_tarjeta');
$routes->get('/mis-beneficios', 'Home::mis_beneficios');

//Rutas autenticación
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::auth');
$routes->get('/logout', 'Auth::logout');

//Rutas tarjeta joven
$routes->get('/panel', 'TarjetaJoven::index');
$routes->get('/nueva-tarjeta', 'TarjetaJoven::formulario_tarjeta');
$routes->get('/imagen/(:segment)','TarjetaJoven::obtener_archivo/$1');
$routes->get('/tarjeta-info', 'TarjetaJoven::tarjeta_info');
$routes->get('/tarjeta/(:segment)','TarjetaJoven::detalles_tarjeta/$1');
$routes->get('/editar-tarjeta/(:segment)' , 'TarjetaJoven::editar_tarjeta/$1');
$routes->post('/nueva-tarjeta', 'TarjetaJoven::guardar_tarjeta');
$routes->post('/compromiso', 'TarjetaJoven::guardar_documento');
$routes->post('/tarjeta-qr', 'TarjetaJoven::guardar_qr');
$routes->post('/cambios-tarjeta', 'TarjetaJoven::guardar_cambios');
$routes->post('/eliminar-archivos' , 'TarjetaJoven::eliminar_archivos');


//Rutas socios tarjeta joven
$routes->get('/socios', 'SocioTarjeta::index');
$routes->get('/nuevo-socio', 'SocioTarjeta::formulario_socio');
$routes->get('/obtener-beneficio/(:segment)', 'SocioTarjeta::obtener_propuesta/$1');
$routes->get('/detalles-socio/(:segment)', 'SocioTarjeta::detalles_socio/$1');
$routes->get('/editar-socio/(:segment)', 'SocioTarjeta::editar_socio/$1');
$routes->post('/nuevo-socio', 'SocioTarjeta::guardar_socio');
$routes->post('/aprobar-socio', 'SocioTarjeta::evaluar_socio');
$routes->post('/cambios-socio', 'SocioTarjeta::guardar_cambios');
$routes->post('eliminar-beneficio', 'SocioTarjeta::eliminar_beneficio');


