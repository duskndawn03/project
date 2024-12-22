<?php

use App\Controllers\AlumniController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//routes for handling functionalities
$routes->post('/loginauth', 'LoginController::loginauth');
$routes->post('/alumni/updateVisibility', 'AlumniController::updateVisibility');
$routes->post('/alumni/updateApproval', 'AlumniController::updateApproval');
$routes->post('/alumni/deleteAlumni', 'AlumniController::deleteAlumni');
$routes->post('/alumni/updateAlumni', 'AlumniController::updateAlumni');
$routes->get('/alumni/exportAlumni', 'AlumniController::exportAlumni');
$routes->post('/alumni/importAlumni', 'AlumniController::importAlumni');
$routes->post('/alumni/getAlumni', 'AlumniController::getAlumni');
$routes->get('/home', 'Home::index');

//routes for pages
$routes->get('/', 'Home::index');
$routes->get('/alumni', 'AlumniController::index');
$routes->get('/login', 'LoginController::showLoginPage');
$routes->get('/logout', 'LoginController::logout');


$routes->get('/categories', 'CategoryController::index');
$routes->post('/categories/createCategory', 'CategoryController::createCategory');
$routes->post('/categories/updateCategory/(:num)', 'CategoryController::updateCategory/$1');
$routes->post('/categories/deleteCategory/(:num)', 'CategoryController::deleteCategory/$1');

$routes->post('/categories/createSubcategory', 'CategoryController::createSubcategory');
$routes->post('/categories/updateSubcategory/(:num)', 'CategoryController::updateSubcategory/$1');
$routes->post('/categories/deleteSubcategory/(:num)', 'CategoryController::deleteSubcategory/$1');
