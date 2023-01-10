<?php

namespace Config;

use App\Controllers\RemunProses;
use App\Controllers\OfficePengurus;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->get('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');

$routes->get('/users', 'OfficeUser::index', ['filter' => 'admin']);
$routes->post('/users/data/(:num)', 'Officeuser::data/$1', ['filter' => 'admin']);
$routes->post('/users/baru', 'OfficeUser::insert', ['filter' => 'admin']);
$routes->post('/users/(:num)', 'OfficeUser::update/$1', ['filter' => 'admin']);
$routes->delete('/users/(:num)', 'OfficeUser::delete/$1', ['filter' => 'admin']);
$routes->post('/users/pass', 'OfficeUser::pass', ['filter' => 'admin']);
$routes->post('/users/sql/', 'OfficeUser::userSql', ['filter' => 'admin']);
$routes->get('/users/sql/(:any)', 'OfficeUser::collumns/$1', ['filter' => 'admin']);

$routes->get('/pengurus', 'OfficePengurus::index', ['filter' => 'admin']);
$routes->get('/pengurus/(:num)', 'OfficePengurus::detail/$1', ['filter' => 'admin']);
$routes->post('/pengurus/(:num)', 'OfficePengurus::update/$1', ['filter' => 'admin']);
$routes->get('/pengurus/baru', 'OfficePengurus::detail/', ['filter' => 'admin']);
$routes->post('/pengurus/baru', 'OfficePengurus::insert/', ['filter' => 'admin']);
$routes->delete('/pengurus/(:num)', 'OfficePengurus::delete/$1', ['filter' => 'admin']);
$routes->get('/pengurus/ceklis/(:num)', 'OfficePengurus::ceklis/$1', ['filter' => 'admin']);
$routes->get('/pengurus/pos/(:num)/(:any)', 'OfficePengurus::add_tunj/$1/$2', ['filter' => 'admin']);
$routes->post('/pengurus/import', 'OfficePengurus::import', ['filter' => 'admin']);
$routes->get('/pengurus/export', 'OfficePengurus::export', ['filter' => 'admin']);

$routes->get('/kompetensi', 'OfficeKompetensi::index', ['filter' => 'admin']);
$routes->post('/kompetensi/baru', 'OfficeKompetensi::insert', ['filter' => 'admin']);
$routes->post('/kompetensi/(:num)', 'OfficeKompetensi::update/$1', ['filter' => 'admin']);
$routes->delete('/kompetensi/(:num)', 'OfficeKompetensi::delete/$1', ['filter' => 'admin']);
$routes->get('/kompetensi/santri/(:num)', 'OfficeKompetensi::santri/$1', ['filter' => 'admin']);
$routes->post('/kompetensi/data/(:num)', 'OfficeKompetensi::data/$1', ['filter' => 'admin']);

$routes->post('/absensi/baru', 'OfficeAbsensi::insert', ['filter' => 'admin']);
$routes->post('/absensi/(:num)', 'OfficeAbsensi::update/$1', ['filter' => 'admin']);
$routes->get('/absensi/santri/(:num)', 'OfficeAbsensi::santri/$1', ['filter' => 'admin']);
$routes->post('/absensi/data/(:num)', 'OfficeAbsensi::data/$1', ['filter' => 'admin']);
$routes->get('/absensi/ceklis/(:num)', 'OfficeAbsensi::ceklis/$1', ['filter' => 'admin']);
$routes->post('/absensi/import', 'OfficeAbsensi::import', ['filter' => 'admin']);
$routes->get('/absensi/export', 'OfficeAbsensi::export', ['filter' => 'admin']);
$routes->get('/absensi/(:any)', 'OfficeAbsensi::index/$1', ['filter' => 'admin']);
$routes->get('/absensi', 'OfficeAbsensi::index', ['filter' => 'admin']);
$routes->delete('/absensi/(:num)/(:any)', 'OfficeAbsensi::delete/$1/$2', ['filter' => 'admin']);

$routes->get('/skim', 'RemunSkim::index', ['filter' => 'admin']);
$routes->post('/skim/baru', 'RemunSkim::insert', ['filter' => 'admin']);
$routes->post('/skim/(:num)', 'RemunSkim::update/$1', ['filter' => 'admin']);
$routes->delete('/skim/(:num)', 'RemunSkim::delete/$1', ['filter' => 'admin']);
$routes->post('/skim/data/(:num)', 'RemunSkim::data/$1', ['filter' => 'admin']);
$routes->get('/skim/ceklis/(:num)', 'RemunSkim::ceklis/$1', ['filter' => 'admin']);

$routes->get('/tunjangan', 'RemunTunjangan::index', ['filter' => 'admin']);
$routes->post('/tunjangan/baru', 'RemunTunjangan::insert', ['filter' => 'admin']);
$routes->post('/tunjangan/(:num)', 'RemunTunjangan::update/$1', ['filter' => 'admin']);
$routes->delete('/tunjangan/(:num)', 'RemunTunjangan::delete/$1', ['filter' => 'admin']);
$routes->get('/tunjangan/santri/(:num)', 'RemunTunjangan::santri/$1', ['filter' => 'admin']);
$routes->post('/tunjangan/data/(:num)', 'RemunTunjangan::data/$1', ['filter' => 'admin']);
$routes->get('/tunjangan/ceklis/(:num)', 'RemunTunjangan::ceklis/$1', ['filter' => 'admin']);

$routes->get('/potongan', 'RemunPotongan::index', ['filter' => 'admin']);
$routes->post('/potongan/baru', 'RemunPotongan::insert', ['filter' => 'admin']);
$routes->post('/potongan/(:num)', 'RemunPotongan::update/$1', ['filter' => 'admin']);
$routes->delete('/potongan/(:num)', 'RemunPotongan::delete/$1', ['filter' => 'admin']);
$routes->get('/potongan/santri/(:num)', 'RemunPotongan::santri/$1', ['filter' => 'admin']);
$routes->post('/potongan/data/(:num)', 'RemunPotongan::data/$1', ['filter' => 'admin']);
$routes->get('/potongan/ceklis/(:num)', 'RemunPotongan::ceklis/$1', ['filter' => 'admin']);

$routes->post('/proses/simpan/(:any)/(:any)', 'RemunProses::simpan/$1/$2', ['filter' => 'admin']);
$routes->post('/proses/data/(:any)/(:any)', 'RemunProses::data/$1/$2', ['filter' => 'admin']);
$routes->get('/proses/excel', 'RemunProses::export', ['filter' => 'admin']);
$routes->get('/proses/draft', 'RemunProses::draft', ['filter' => 'admin']);
$routes->get('/proses/(:any)', 'RemunProses::index/$1', ['filter' => 'admin']);

$routes->set404Override(function () {
    return view('errors/404');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
