<?php

use Controllers\AdminController;
use Controllers\MainController;
use Controllers\ProjectController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';

$router = new Router();

//? Public section
$router->get('/404', [MainController::class, 'nopage']);
$router->get('/', [MainController::class, 'index']);


//? Admin
// $router->get('/admin/getpass', [AdminController::class, 'createPass']);
$router->get('/admin', [AdminController::class, 'login']);
$router->post('/admin', [AdminController::class, 'login']);

$router->get('/admin/dashboard', [AdminController::class, 'dashboard']);

$router->get('/admin/projects', [ProjectController::class, 'index']);
$router->get('/admin/projects/add', [ProjectController::class, 'addProject']);
$router->post('/admin/projects/add', [ProjectController::class, 'addProject']);

$router->checkRoutes();