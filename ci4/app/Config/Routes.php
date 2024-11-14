<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/study/books', 'BooksController::index');
$routes->get('/study/books/search_books', 'BooksController::searchBooks');
$routes->get('/study/books/view_all_books', 'BooksController::viewAllBooks');

$routes->get('/study/calculators', 'CalculatorsController::index');
$routes->get('/study/calculators/length', 'CalculatorsController::length');
$routes->get('/study/calculators/area', 'CalculatorsController::area');
$routes->get('/study/calculators/weight', 'CalculatorsController::weight');
$routes->get('/study/calculators/temperature', 'CalculatorsController::temperature');
$routes->get('/study/calculators/datetime', 'CalculatorsController::datetime');

$routes->get('/ipe/alumni', 'AlumniController::index');
$routes->get('/ipe/alumni/reg', 'AlumniController::diplayRegisterAlumni');
$routes->post('/ipe/alumni/getRegistered', 'AlumniController::RegisterAsAlumni');

$routes->get('/supply/products', 'ProductsController::index');

$routes->get('/circulars/jobs', 'JobsController::index');
