<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// PUBLIC & AUTH ROUTES
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login/process', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/register/process', 'Auth::registerProcess');

// ADMIN AREA (FILTER ADMIN)
$routes->group('admin', ['filter' => 'admin'], function($routes) {

    // Buku (Admin)
    $routes->group('buku', function($routes) {
        $routes->get('/', 'Buku::index');
        $routes->get('create', 'Buku::create');
        $routes->post('store', 'Buku::store');
        $routes->get('edit/(:num)', 'Buku::edit/$1');
        $routes->post('update/(:num)', 'Buku::update/$1');
        $routes->get('delete/(:num)', 'Buku::delete/$1');
    });

    // Kategori (Admin)
    $routes->group('kategori', function($routes) {
        $routes->get('/', 'Kategori::index');
        $routes->post('create', 'Kategori::create');
        $routes->post('edit/(:num)', 'Kategori::edit/$1');
        $routes->get('delete/(:num)', 'Kategori::delete/$1');
    });

    // Mahasiswa (Admin)
    $routes->group('mahasiswa', function($routes) {
        $routes->get('/', 'Mahasiswa::index');
        $routes->get('create', 'Mahasiswa::create');
        $routes->post('store', 'Mahasiswa::store');
        $routes->post('update/(:num)', 'Mahasiswa::update/$1');
        $routes->get('delete/(:num)', 'Mahasiswa::delete/$1');
    });
});

// DASHBOARD (AUTH REQUIRED)
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// BUKU (AUTH REQUIRED)
$routes->group('buku', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Buku::index');
    $routes->get('create', 'Buku::create');
    $routes->post('store', 'Buku::store');
    $routes->get('edit/(:num)', 'Buku::edit/$1');
    $routes->post('update/(:num)', 'Buku::update/$1');
    $routes->get('delete/(:num)', 'Buku::delete/$1');
});

// KATEGORI (AUTH REQUIRED)
$routes->group('kategori', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Kategori::index');
    $routes->post('create', 'Kategori::create');
    $routes->post('edit/(:num)', 'Kategori::edit/$1');
    $routes->get('delete/(:num)', 'Kategori::delete/$1');
});

// MAHASISWA (AUTH REQUIRED)
$routes->group('mahasiswa', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Mahasiswa::index');
    $routes->post('store', 'Mahasiswa::store');
    $routes->post('update/(:num)', 'Mahasiswa::update/$1');
    $routes->get('delete/(:num)', 'Mahasiswa::delete/$1');
});

// PEMINJAMAN (AUTH REQUIRED)
$routes->group('peminjaman', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Peminjaman::index');
    $routes->get('create', 'Peminjaman::create');
    $routes->post('store', 'Peminjaman::store');
    $routes->get('return/(:num)', 'Peminjaman::returnBook/$1');
});
