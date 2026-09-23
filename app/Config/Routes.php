<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// CRUD Routes for Bubur Pedas
$routes->get('buburpedas', 'BuburPedasController::index');
$routes->get('buburpedas/create', 'BuburPedasController::create');
$routes->post('buburpedas/store', 'BuburPedasController::store');
$routes->get('buburpedas/edit/(:num)', 'BuburPedasController::edit/$1');
$routes->post('buburpedas/update/(:num)', 'BuburPedasController::update/$1');
$routes->get('buburpedas/delete/(:num)', 'BuburPedasController::delete/$1');
