<?php

namespace Config;

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
//$routes->setAutoRoute(false);
$routes->setAutoRoute(false);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');

$routes->add('/user', 'User::index');
$routes->add('/user/approveduser', 'User::cutiListUser', ['filter' => 'role:user']);
$routes->add('/user/userapproved/(:num)', 'User::approved/$1', ['filter' => 'role:user']);
$routes->add('/admin/approvedhrd/(:num)', 'Admin::approvedHrd/$1', ['filter' => 'role:admin']);
$routes->add('/listpegawai', 'Pegawai::index', ['filter' => 'role:admin']);
$routes->add('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->add('/admin/tambahpegawai', 'Pegawai::tambahPegawai', ['filter' => 'role:admin']);
$routes->add('/admin/editpegawai/(:num)', 'Pegawai::editPegawai/$1', ['filter' => 'role:admin']);
$routes->add('/admin/hapuspegawai/(:num)', 'Pegawai::deletePegawai/$1', ['filter' => 'role:admin']);
$routes->add('/admin/index', 'Admin::index', ['filter ' => 'role:admin']);
$routes->add('/admin/userlist', 'Admin::userlist', ['filter ' => 'role:admin']);
$routes->add('/admin/hapuscuti/(:num)', 'Cuti::deleteCuti/$1', ['filter' => 'role:admin']);
$routes->add('/admin/hapuscutidetail/(:num)', 'Cuti::deleteCutiDetail/$1', ['filter' => 'role:admin']);
$routes->add('/admin/editdivisi/(:num)', 'Divisi::editDivisi/$1', ['filter ' => 'role:admin']);
// $routes->add('/admin/exportpegawai/(:num)', 'Pegawai::exportDataPegawai/$1', ['filter' => 'role:admin']);
$routes->add('/admin/exportpegawai/(:num)','Pegawai::exportPegawai/$1', ['filter' => 'role:admin']);
$routes->add('/admin/exportcsv', 'Admin::export', ['filter' => 'role:admin']);
$routes->add('/admin/divisilist', 'Divisi::index', ['filter ' => 'role:admin']);
$routes->add('/admin/tambahdivisi', 'Divisi::tambahDivisi', ['filter ' => 'role:admin']);
$routes->add('/admin/hapusdivisi/(:num)', 'Divisi::deleteDivisi/$1', ['filter' => 'role:admin']);
$routes->add('/admin/pegawailist', 'Admin::pegawailist', ['filter ' => 'role:admin']);
$routes->add('/admin/cutilist', 'Admin::cutilist', ['filter ' => 'role:admin']);
$routes->add('/admin/tambahcuti/(:num)', 'Cuti::tambahCuti/$1', ['filter' => 'role:admin']);
$routes->add('/admin/(:num)', 'Admin::detail/$1', ['filter ' => 'role:admin']);
$routes->add('/admin/detailpegawai/(:num)', 'Pegawai::detailpegawai/$1', ['filter ' => 'role:admin']);


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
