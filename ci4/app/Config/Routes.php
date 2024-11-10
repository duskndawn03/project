<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/study/books', 'Books::index');
$routes->get('/study/calculators', 'Calculators::index');
$routes->get('/ipe/alumni', 'Alumni::index');
$routes->get('/supply/products', 'Products::index');
$routes->get('/jobs', 'Jobs::index');
