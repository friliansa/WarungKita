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
$routes->get('/', 'Navigation::index');
$routes->get('/dashboard', 'Navigation::dashboard');
$routes->get('/pembelian', 'Navigation::pembelian');
$routes->get('/tersedia', 'Navigation::tersedia');
$routes->get('/kosong', 'Navigation::kosong');
$routes->get('/penjualan', 'Navigation::penjualan');
$routes->get('/tambah-pembelian/nama', 'Transaksi::tambahPembelian');
$routes->post('/tambah-pembelian/barang', 'Transaksi::savePembelian');
$routes->get('/tambah-pembelian/barang/(:segment)', 'barang::newBarang/$1');
$routes->post('/tambah-pembelian/barang/(:segment)', 'Transaksi::saveTambahPembelian/$1');
$routes->get('/pembelian-detail/(:segment)', 'Transaksi::detailPembelian/$1');
$routes->get('/pembelian-total/(:segment)', 'Transaksi::totalPembelian/$1');
$routes->get('/tambah-penjualan/nama', 'Transaksi::tambahPenjualan');
$routes->post('/tambah-penjualan/barang', 'Transaksi::savePenjualan');
$routes->post('/tambah-penjualan/barang/(:segment)', 'Transaksi::saveBarangPenjualan/$1');
$routes->post('/tambah-penjualan/barang/(:segment)/(:segment)', 'Transaksi::savePenjualan2/$1/$2');
$routes->post('/penjualan/validasi/(:segment)', 'Transaksi::saveTambahPenjualan/$1');
$routes->get('/penjualan/total/(:segment)', 'Transaksi::totalPenjualan/$1');
$routes->get('/penjualan/detail/(:segment)', 'Transaksi::detailPenjualan/$1');
$routes->get('/tambah-barang', 'Barang::tambahBarang');
$routes->get('/tambah-barang/(:segment)', 'Barang::tambahBarangId/$1');
$routes->post('/tambah-barang/save', 'Barang::saveTambahBarang');
$routes->post('/tambah-barang/(:segment)/save', 'Barang::saveTambahBarangId/$1');
$routes->get('/barang/(:segment)/edit/(:segment)', 'Barang::editBarang/$1/$2');
$routes->post('/barang/(:segment)/update/(:segment)', 'Barang::saveBarang/$1/$2');
$routes->post('/barang/delete/(:segment)', 'Barang::delete/$2');

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
