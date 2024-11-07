<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//routes for handling functionalities
$routes->post('/loginauth', 'LoginController::loginauth');
$routes->get('/home', 'Home::index');

//routes for pages
$routes->get('/', 'Home::index');
$routes->get('/alumni', 'AlumniController::index');
$routes->get('/login', 'LoginController::showLoginPage');
$routes->get('/logout', 'LoginController::logout');