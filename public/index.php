<?php

use Controllers\AdminController;
use Controllers\MainController;
use Controllers\ProjectController;
use Controllers\TechController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';

$router = new Router();

//? ---- Public section ----
$router->get('/404', [MainController::class, 'nopage']);
$router->get('/', [MainController::class, 'index']);


//? ---- Admin ----
// $router->get('/admin/getpass', [AdminController::class, 'createPass']);
$router->get('/login', [AdminController::class, 'login']);
$router->post('/login', [AdminController::class, 'login']);
$router->get('/logout', [AdminController::class, 'logout']);

$router->get('/admin/dashboard', [AdminController::class, 'dashboard']);

//? ---- Projects ----
$router->get('/admin/projects', [ProjectController::class, 'index']);
$router->get('/admin/projects/add', [ProjectController::class, 'addProject']);
$router->post('/admin/projects/add', [ProjectController::class, 'addProject']);

$router->get('/admin/projects/edit', [ProjectController::class, 'editProject']);
$router->post('/admin/projects/edit', [ProjectController::class, 'editProject']);

$router->post('/admin/projects/delete', [ProjectController::class, 'deleteProject']);

//? Technologies
$router->get('/admin/technologies', [TechController::class, 'index']);

$router->get('/admin/technologies/add', [TechController::class, 'addTech']);
$router->post('/admin/technologies/add', [TechController::class, 'addTech']);

$router->get('/admin/technologies/edit', [TechController::class, 'editTech']);
$router->post('/admin/technologies/edit', [TechController::class, 'editTech']);

$router->post('/admin/technologies/delete', [TechController::class, 'deleteTech']);

$router->checkRoutes();
