<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/schema', 'DatabaseSchema::index');

$routes->get('/', 'HomeController::index');

$routes->get('/study/books', 'BooksController::index');
$routes->get('/study/books/search_books', 'BooksController::searchBooks');
$routes->get('/study/books/view_all_books', 'BooksController::viewAllBooks');
$routes->get('/study/books/details/(:segment)', 'BooksController::details/$1');
$routes->get('files/(:segment)', 'FileController::serve/$1');
$routes->get('view-pdf/(:segment)', 'FileController::viewer/$1');



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
$routes->get('/supply/products/category/(:segment)', 'ProductsController::showAllByCategory/$1');
$routes->get('/supply/products/sub-category/(:segment)', 'ProductsController::showAllBySubcategory/$1');
$routes->get('/supply/products/details/(:segment)', 'ProductsController::details/$1');
$routes->get('/supply/business', 'BusinessController::index');


$routes->get('/circulars/jobs', 'JobsController::index');
