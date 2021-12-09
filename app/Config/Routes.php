<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/jenis', 'Jenis::index', ['filter' => 'role:superadmin,bendahara']);
$routes->post('/jenis/add', 'Jenis::add', ['filter' => 'role:superadmin,bendahara']);
$routes->delete('/jenis/(:num)', "Jenis::delete/$1", ['filter' => 'role:superadmin,bendahara']);
$routes->delete('/kategori/(:num)', "Kategori::delete/$1", ['filter' => 'role:superadmin,bendahara']);
$routes->delete('/subkategori/(:num)', "Subkategori::delete/$1", ['filter' => 'role:superadmin,bendahara']);

$routes->post('/transaksi/add', "Transaksi::add", ['filter' => 'role:superadmin,bendahara']);
$routes->post('/transaksi/upload', "Transaksi::upload", ['filter' => 'role:superadmin,bendahara']);
$routes->delete('/transaksi/(:num)', "Transaksi::delete/$1", ['filter' => 'role:superadmin,bendahara']);
$routes->get('/transaksi/(:segment)', "Transaksi::index/$1");
$routes->get('/transaksi/(:segment)/(:segment)', "Transaksi::index/$1/$2");
$routes->get('/transaksi/(:segment)/(:segment)/(:segment)', "Transaksi::index/$1/$2/$3");
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
