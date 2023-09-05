<?php
declare(strict_types=1);

namespace Controllers;

use Models\Project;
use MVC\Router;

class MainController {
    public static function index(Router $router)
    {

        $projects = Project::all();
        
        $router->render('main/index', [
            'title' => 'Inicio',
            'projects' => $projects
        ]);
    }

    public static function nopage()
    {
        debugguing('Not page');
    }
}
