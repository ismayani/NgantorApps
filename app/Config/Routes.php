<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/', 'Pages::index');

$routes->get('/Kepegawaian/create', 'Kepegawaian::create');
$routes->get('/Kepegawaian/edit/(:segment)', 'Kepegawaian::edit/$1');
$routes->delete('/Kepegawaian/(:num)', 'Kepegawaian::delete/$1');
$routes->get('/Kepegawaian/(:any)', 'Kepegawaian::detail/$1');
$routes->get('/Kepegawaian', 'Kepegawaian::index');

$routes->get('/Divisi/create', 'Divisi::create');
$routes->get('/Divisi/edit/(:any)', 'Divisi::edit/$1');
$routes->delete('/Divisi/(:any)', 'Divisi::delete/$1');
$routes->get('/Divisi', 'Divisi::index');

$routes->get('/Jabatan/create', 'Jabatan::create');
$routes->get('/Jabatan/edit/(:any)', 'Jabatan::edit/$1');
$routes->delete('/Jabatan/(:any)', 'Jabatan::delete/$1');
$routes->get('/Jabatan', 'Jabatan::index');

$routes->get('/Tunjangan/create', 'Tunjangan::create');
$routes->get('/Tunjangan/edit/(:any)', 'Tunjangan::edit/$1');
$routes->delete('/Tunjangan/(:any)', 'Tunjangan::delete/$1');
$routes->get('/Tunjangan', 'Tunjangan::index');

$routes->get('/Gaji/create', 'Gaji::create');
$routes->get('/Gaji/edit/(:any)', 'Gaji::edit/$1');
$routes->delete('/Gaji/(:any)', 'Gaji::delete/$1');
$routes->get('/Gaji', 'Gaji::index');

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
