<?php

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();

// Public (no auth needed)
$routes->get('/', 'Pages::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'Pages::about');

// TFA3 Forms + TFA2 Customer/User routes (protected by auth)
$routes->group('customers', ['filter'=>'auth'], function($routes) {
    $routes->get('/', 'Customers::index');
    $routes->get('new', 'Customers::new');
    $routes->post('/', 'Customers::create');
    $routes->get('edit/(:num)', 'Customers::edit/$1');
    $routes->post('update/(:num)', 'Customers::update/$1');
});

$routes->group('users', ['filter'=>'auth'], function($routes) {
    $routes->get('/', 'Users::index');
    $routes->get('new', 'Users::new');
    $routes->post('/', 'Users::create');
    $routes->get('edit/(:num)', 'Users::edit/$1');
    $routes->post('update/(:num)', 'Users::update/$1');
});

// TFA4 Auth
$routes->get('login', 'Auth::login');
$routes->post('auth/verify', 'Auth::verify');
$routes->get('logout', 'Auth::logout');

// TSA2: Task management (public view, protected actions)
$routes->get('tasks/new', 'Tasks::new', ['filter' => 'auth']);
$routes->post('tasks', 'Tasks::create', ['filter' => 'auth']);
$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1', ['filter' => 'auth']);
$routes->get('tasks/delete/(:num)', 'Tasks::delete/$1', ['filter' => 'auth']);

// Midterm POS: Product management (public view, protected actions)
$routes->get('products', 'Products::index');
$routes->get('products/new', 'Products::new', ['filter' => 'auth']);
$routes->post('products', 'Products::create', ['filter' => 'auth']);
$routes->get('products/edit/(:num)', 'Products::edit/$1', ['filter' => 'auth']);
$routes->post('products/update/(:num)', 'Products::update/$1', ['filter' => 'auth']);
$routes->get('products/delete/(:num)', 'Products::delete/$1', ['filter' => 'auth']);

// Midterm POS: Sales (record sale + history, protected)
$routes->get('record-sale', 'Sales::recordSale', ['filter' => 'auth']);
$routes->post('record-sale/process', 'Sales::processSale', ['filter' => 'auth']);
$routes->get('sales', 'Sales::index', ['filter' => 'auth']);
