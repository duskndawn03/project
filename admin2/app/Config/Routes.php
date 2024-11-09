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
$routes->get('/alumni/exportAlumni', 'AlumniController::exportAlumni');
$routes->post('/alumni/importAlumni', 'AlumniController::importAlumni');
$routes->post('/alumni/getAlumni', 'AlumniController::getAlumni');
$routes->get('/home', 'Home::index');

//routes for pages
$routes->get('/', 'Home::index');
$routes->get('/alumni', 'AlumniController::index');
$routes->get('/login', 'LoginController::showLoginPage');
$routes->get('/logout', 'LoginController::logout');