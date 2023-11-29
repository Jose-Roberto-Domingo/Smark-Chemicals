<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/','Home::index');

// Menu de Inicio "FrontEnd"
$routes->get('/Admin/Menu_Inicio/Inicio', 'Inicio::index');

// Productos
$routes->get('/Admin/producto','Producto::index');
$routes->get('/Admin/producto/mostrar','Producto::mostrar');
$routes->get('/Admin/producto/agregar','Producto::agregar');
$routes->post('/Admin/producto/agregar','Producto::agregar');
$routes->get('/Admin/producto/buscar','Producto::buscar');
$routes->get('/Admin/producto/editar/(:num)','Producto::editar/$1');
$routes->get('/Admin/producto/delete/(:num)','Producto::delete/$1');

$routes->post('/Admin/producto/insert','Producto::insert');
$routes->post('/Admin/producto/update','Producto::update');

// Clientes
$routes->get('/Admin/cliente','Clientes::index');
$routes->get('/Admin/cliente/mostrar','Clientes::mostrar');
$routes->get('/Admin/cliente/agregar','Clientes::agregar');
$routes->get('/Admin/cliente/buscar','Clientes::buscar');
$routes->get('/Admin/cliente/editar/(:num)','Clientes::editar/$1');
$routes->get('/Admin/cliente/delete/(:num)','Clientes::delete/$1');

$routes->post('/Admin/cliente/insert','Clientes::insert');
$routes->post('/Admin/cliente/update','Clientes::update');

// Compras
$routes->get('/Admin/compras','Compras::index');
$routes->get('/Admin/compras/mostrar','Compras::mostrar');
$routes->get('/Admin/compras/agregar','Compras::agregar');
$routes->post('/Admin/compras/agregar','Compras::agregar');
$routes->get('/Admin/compras/buscar','Compras::buscar');
$routes->get('/Admin/compras/editar/(:num)','Compras::editar/$1');
$routes->get('/Admin/compras/delete/(:num)','Compras::delete/$1');

$routes->post('/Admin/compras/insert','Compras::insert');
$routes->post('/Admin/compras/update','Compras::update');

// Empleado
$routes->get('/Admin/empleado','Empleado::index');
$routes->get('/Admin/empleado/mostrar','Empleado::mostrar');
$routes->get('/Admin/empleado/agregar','Empleado::agregar');
$routes->get('/Admin/empleado/buscar','Empleado::buscar');
$routes->get('/Admin/empleado/editar/(:num)','Empleado::editar/$1');
$routes->get('/Admin/empleado/delete/(:num)','Empleado::delete/$1');

$routes->post('/Admin/empleado/insert','Empleado::insert');
$routes->post('/Admin/empleado/update','Empleado::update');

// Proveedor
$routes->get('/Admin/proveedor','Proveedor::index');
$routes->get('/Admin/proveedor/mostrar','Proveedor::mostrar');
$routes->get('/Admin/proveedor/agregar','Proveedor::agregar');
$routes->get('/Admin/proveedor/buscar','Proveedor::buscar');
$routes->get('/Admin/proveedor/editar/(:num)','Proveedor::editar/$1');
$routes->get('/Admin/proveedor/delete/(:num)','Proveedor::delete/$1');

$routes->post('/Admin/proveedor/insert','Proveedor::insert');
$routes->post('/Admin/proveedor/update','Proveedor::update');

// Ventas
$routes->get('/Admin/ventas','Ventas::index');
$routes->get('/Admin/ventas/mostrar','Ventas::mostrar');
$routes->get('/Admin/ventas/agregar','Ventas::agregar');
$routes->get('/Admin/ventas/buscar','Ventas::buscar');
$routes->get('/Admin/ventas/editar/(:num)','Ventas::editar/$1');
$routes->get('/Admin/ventas/delete/(:num)','Ventas::delete/$1');

$routes->post('/Admin/ventas/insert','Ventas::insert');
$routes->post('/Admin/ventas/update','Ventas::update');