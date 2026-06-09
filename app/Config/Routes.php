<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */


$routes->get('login', 'Auth::login');
$routes->post('login/process', 'Auth::loginProcess');
$routes->get('register', 'Auth::register');
$routes->post('register/process', 'Auth::registerProcess');
$routes->get('logout', 'Auth::logout');
$routes->get('layanan', 'Layanan::index');
$routes->get('vendor', 'Vendor::index');
$routes->get('vendor/detail/(:num)', 'Vendor::detail/$1');
$routes->group('', ['filter' => 'auth'], function($routes) {
$routes->get('/', 'Home::index');
$routes->get('layanan/detail/(:num)', 'Layanan::detail/$1');
$routes->get('profil', 'Profil::index');
$routes->get('profil/edit', 'Profil::edit');
$routes->post('profil/update', 'Profil::update');
$routes->get('profil/detail_booking/(:num)', 'Profil::detail_booking/$1');
$routes->get('booking/form/(:num)', 'Booking::form/$1');
$routes->post('booking/konfirmasi', 'Booking::konfirmasi');
$routes->post('booking/create', 'Booking::create');
$routes->get('booking/detail_booking/(:num)', 'Booking::detail_booking/$1');
$routes->get('booking/pembayaran/(:num)', 'Booking::pembayaran/$1');
$routes->post('booking/proses-pembayaran', 'Booking::proses_pembayaran');
});

$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('vendor', 'Admin\Vendor::index');
    $routes->get('vendor/create', 'Admin\Vendor::create');
    $routes->get('vendor/detail/(:num)', 'Admin\Vendor::show/$1'); 
    $routes->post('vendor/store', 'Admin\Vendor::store');
    $routes->get('vendor/edit/(:num)', 'Admin\Vendor::edit/$1');
    $routes->post('vendor/update/(:num)', 'Admin\Vendor::update/$1');
    $routes->get('vendor/delete/(:num)', 'Admin\Vendor::delete/$1');
    $routes->get('layanan', 'Admin\Layanan::index');
    $routes->get('layanan/create', 'Admin\Layanan::create');
    $routes->post('layanan/store', 'Admin\Layanan::store');
    $routes->get('layanan/edit/(:num)', 'Admin\Layanan::edit/$1');
    $routes->post('layanan/update/(:num)', 'Admin\Layanan::update/$1');
    $routes->get('layanan/delete/(:num)', 'Admin\Layanan::delete/$1');
    $routes->get('booking', 'Admin\Booking::index'); 
    $routes->get('booking/detail/(:num)', 'Admin\Booking::detail/$1');
    $routes->post('booking/status/(:num)', 'Admin\Booking::updateStatus/$1');
    $routes->get('booking/delete/(:num)', 'Admin\Booking::delete/$1');
    $routes->get('pembayaran', 'Admin\Pembayaran::index');
    $routes->get('pembayaran/approve/(:num)', 'Admin\Pembayaran::approve/$1');
    $routes->get('pembayaran/reject/(:num)', 'Admin\Pembayaran::reject/$1');
});

$routes->get('api/test', 'Api\TestController::index');
$routes->get('api/vendor', 'Api\VendorApi::index');
$routes->get('api/vendor/(:num)', 'Api\VendorApi::detail/$1');
$routes->get('api/booking', 'Api\BookingApi::index');
$routes->get('api/booking/(:num)', 'Api\BookingApi::detail/$1');

