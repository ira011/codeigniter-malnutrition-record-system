<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

$routes->get('/', 'Home::index');

$routes->group('children', function ($routes) {
    $routes->get('/', 'Children::index');
    $routes->get('create', 'Children::create');
    $routes->post('store', 'Children::store');
    $routes->get('dashboard', 'Children::dashboard');
    $routes->get('profile/(:num)', 'Children::profile/$1');
    $routes->post('add-intervention/(:num)', 'Children::addIntervention/$1');
    $routes->get('edit/(:num)', 'Children::edit/$1');
    $routes->post('update/(:num)', 'Children::update/$1');
    $routes->post('delete/(:num)', 'Children::delete/$1');
});

$routes->group('children/high-risk', function ($routes) {
    $routes->get('/', 'HighRiskController::index');
    $routes->get('export', 'HighRiskController::export');
});

$routes->group('', function ($routes) {
    $routes->get('login', 'UserController::login');
    $routes->post('login', 'UserController::authenticate');
    $routes->get('register', 'UserController::register');
    $routes->post('register', 'UserController::store');
    $routes->get('logout', 'UserController::logout');
});
