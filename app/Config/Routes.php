<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda::index');
$routes->get('/beranda', 'Beranda::index');
$routes->get('/aboutme', 'Aboutme::index');
$routes->get('/education', 'Education::index');
$routes->get('/detail', 'Detail::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/kategori', 'Kategori::index');
$routes->add('/kategori/add', 'Kategori::tambah');
$routes->add('/kategori/(:segment)/edit', 'Kategori::edit/$1');
$routes->get('/kategori/(:segment)/delete', 'Kategori::delete/$1');
$routes->get('/barang', 'Barang::index');
$routes->add('/barang/add', 'Barang::tambah');
$routes->add('/barang/(:segment)/edit', 'Barang::edit/$1');
$routes->get('/barang/(:segment)/delete', 'Barang::delete/$1');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->post('/login_action', 'Login::login_action');
$routes->get('/register', 'Register::index');
$routes->add('/register/simpan', 'Register::simpan');
$routes->add('/kategorimobil', 'KategoriMobil::index');
$routes->add('/kategorimobil/(:segment)/view', 'KategoriMobil::view/$1');
$routes->add('/kategorimobil/(:segment)/detail', 'KategoriMobil::detail/$1');
$routes->get('/cart', 'Cart::index');
$routes->add('/cartAdd', 'Cart::tambahCart');
$routes->get('/cart/(:segment)/delete', 'Cart::delete/$1');
$routes->add('/checkout', 'Cart::checkout');
$routes->add('/cart/(:segment)/finishTrans', 'Cart::finishTrans/$1');
$routes->get('/transaksi', 'Transaksi::index');
$routes->add('/transaksi/(:segment)/detail', 'Transaksi::detail/$1');
$routes->get('/mobil', 'Mobil::index');
$routes->get('/mobil/detail/(:any)', 'Mobil::detail/$1');
$routes->get('stok', 'Stok::index');                     
$routes->get('stok/tambah', 'Stok::tambah');             
$routes->post('stok/tambah', 'Stok::tambah');            
$routes->get('stok/(:num)/edit', 'Stok::edit/$1');       
$routes->post('stok/(:num)/edit', 'Stok::edit/$1');      
$routes->get('stok/(:num)/delete', 'Stok::delete/$1');   
$routes->get('KategoriMobil/view/(:num)', 'KategoriMobil::view/$1');
$routes->get('KategoriMobil/detail/(:any)', 'KategoriMobil::detail/$1');
$routes->get('/contact', 'Contact::index');
$routes->post('/contact/kirim', 'Contact::kirim_feedback');
$routes->get('profil', 'Profil::index');
$routes->get('login/logout', 'Login::logout');
$routes->post('contact/kirim', 'Contact::kirim');
$routes->get('admin/feedback', 'AdminFeedback::index');
$routes->get('admin/feedback/delete/(:num)', 'AdminFeedback::delete/$1');
$routes->get('admin/feedback', 'AdminFeedback::index');
$routes->get('admin/feedback/delete/(:num)', 'AdminFeedback::delete/$1');
$routes->get('riwayat', 'Riwayat::index');
$routes->post('cart/finishTrans/(:num)', 'Cart::finishTrans/$1');
$routes->get('transaksi', 'Transaksi::index');
$routes->get('transaksi/detail/(:num)', 'Transaksi::detail/$1');
$routes->get('transaksi/konfirmasi/(:num)', 'Transaksi::konfirmasi/$1');
$routes->get('riwayat/invoice/(:num)', 'Riwayat::invoice/$1');