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
$routes->get('/validar/(:segment)/(:segment)','TarjetaJoven::validar_tarjeta/$1/$2');
$routes->get('/tarjeta-info', 'TarjetaJoven::tarjeta_info');
$routes->get('/vitrina', 'TarjetaJoven::beneficios_vitrina');
$routes->get('/tarjeta/(:segment)','TarjetaJoven::detalles_tarjeta/$1');
$routes->get('/editar-tarjeta/(:segment)' , 'TarjetaJoven::editar_tarjeta/$1');
$routes->post('/nueva-tarjeta', 'TarjetaJoven::guardar_tarjeta');
$routes->post('/tarjeta-qr', 'TarjetaJoven::guardar_qr');
$routes->post('/cambios-tarjeta', 'TarjetaJoven::guardar_cambios');

//Rutas socios tarjeta joven
$routes->get('/socios', 'SocioTarjeta::index');
$routes->get('/nuevo-socio', 'SocioTarjeta::formulario_socio');
$routes->get('/obtener-beneficio/(:segment)', 'SocioTarjeta::obtener_propuesta/$1');
$routes->get('/detalles-socio/(:segment)', 'SocioTarjeta::detalles_socio/$1');
$routes->get('/editar-socio/(:segment)', 'SocioTarjeta::editar_socio/$1');
$routes->get('/validar-qr', 'SocioTarjeta::validacion_tarjeta');
$routes->get('/mis-ventas', 'SocioTarjeta::mis_validaciones');
$routes->get('/reportes', 'SocioTarjeta::panel_validaciones');
$routes->post('/nuevo-socio', 'SocioTarjeta::guardar_socio');
$routes->post('/aprobar-socio', 'SocioTarjeta::evaluar_socio');
$routes->post('/cambios-socio', 'SocioTarjeta::guardar_cambios');
$routes->post('/eliminar-beneficio', 'SocioTarjeta::eliminar_beneficio');
$routes->post('/crear-beneficio', 'SocioTarjeta::crear_beneficio');
$routes->post('/crear-validacion', 'SocioTarjeta::crear_validacion');
$routes->post('/asignar-categoria', 'SocioTarjeta::asignar_categoria');

//Rutas Archivos
$routes->get('/imagen/(:segment)','ArchivoController::obtener_archivo/$1');
$routes->post('/guardar-archivo', 'ArchivoController::guardar_documento');
$routes->post('/eliminar-archivos' , 'ArchivoController::eliminar_archivos');