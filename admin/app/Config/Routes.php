<?php

use App\Controllers\AlumniController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');

$routes->post('/loginauth', 'LoginController::loginauth');
$routes->get('/login', 'LoginController::showLoginPage');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/alumni', 'AlumniController::index');
$routes->post('/alumni/updateVisibility', 'AlumniController::updateVisibility');
$routes->post('/alumni/updateApproval', 'AlumniController::updateApproval');
$routes->post('/alumni/deleteAlumni', 'AlumniController::deleteAlumni');
$routes->post('/alumni/updateAlumni', 'AlumniController::updateAlumni');
$routes->get('/alumni/exportAlumni', 'AlumniController::exportAlumni');
$routes->post('/alumni/importAlumni', 'AlumniController::importAlumni');
$routes->post('/alumni/getAlumni', 'AlumniController::getAlumni');

$routes->get('/products', 'ProductController::index');
$routes->post('/products/createCategory', 'ProductController::createCategory');
$routes->post('/products/updateCategory/(:num)', 'ProductController::updateCategory/$1');
$routes->post('/products/deleteCategory/(:num)', 'ProductController::deleteCategory/$1');
$routes->post('/products/createSubcategory', 'ProductController::createSubcategory');
$routes->post('/products/updateSubcategory/(:num)', 'ProductController::updateSubcategory/$1');
$routes->post('/products/deleteSubcategory/(:num)', 'ProductController::deleteSubcategory/$1');

$routes->post('/products/createProduct', 'ProductController::createProduct');
$routes->get('/products/editProduct/(:num)', 'ProductController::editProduct/$1');
$routes->post('/products/updateProduct/(:num)', 'ProductController::updateProduct/$1');
$routes->post('/products/deleteProduct/(:num)', 'ProductController::deleteProduct/$1');

$routes->post('/products/uploadSliderAndBulletPhoto', 'ProductController::uploadSliderAndBulletPhoto');
$routes->post('/products/deleteSliderPhoto/(:num)', 'ProductController::deleteSliderPhoto/$1');

