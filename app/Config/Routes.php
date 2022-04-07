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
$routes->get('/', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->post('/proseslogin', 'Auth::prosesLogin');
$routes->get('/aksesditolak', 'ErrorController::error403');

$routes->group('/karyawan', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('/', 'Karyawan::index');
    $routes->get('cuti/tambah', 'Karyawan::tambahCuti');
    $routes->get('cuti/(:segment)/detail', 'Karyawan::detailCuti/$1');
    $routes->get('cuti/list', 'Karyawan::listCuti');
    $routes->post('cuti/tambah', 'Karyawan::prosesTambahCuti');
});
$routes->group('/manager', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('/', 'Manager::index');
    $routes->get('cuti/(:segment)/detail', 'Manager::detailCutiKaryawan/$1');
    $routes->get('cuti/list', 'Manager::listCuti');
    $routes->post('karyawan/cuti', 'Manager::updateCutiKaryawan');
});
$routes->group('/seniormanager', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('/', 'SeniorManager::index');
    $routes->get('cuti/(:segment)/detail', 'SeniorManager::detailCutiKaryawan/$1');
    $routes->get('cuti/list', 'SeniorManager::listCuti');
    $routes->post('karyawan/cuti', 'SeniorManager::updateCutiKaryawan');
});

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
