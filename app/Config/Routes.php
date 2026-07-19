<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/articles', 'Articles::index');
$routes->get('/articles/delete/(:num)', 'Articles::delete/$1');

$routes->get('/add', 'Add::index');
$routes->get('/add/(:any)', 'Add::index/$1');         // mode edit by id or slug
$routes->post('/add/save', 'Add::save');              // mode tambah
$routes->post('/add/save/(:any)', 'Add::save/$1');    // mode edit by id or slug

$routes->get('/feedback', 'Feedback::index');
$routes->post('/feedback/store', 'Feedback::store');
