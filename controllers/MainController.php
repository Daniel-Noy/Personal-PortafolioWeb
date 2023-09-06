<?php
declare(strict_types=1);

namespace Controllers;

use Models\Category;
use Models\Project;
use Models\Tool;
use MVC\Router;

class MainController {
    public static function index(Router $router)
    {
        $projects = Project::all('ASC');
        $categories = Category::all('ASC');
        $tools = Tool::all('ASC');
        $arrTools = [];
        
        foreach($tools as $tool) {
            $arrTools[$tool->category_id][] = $tool;
        }
        
        $router->render('main/index', [
            'title' => 'Inicio',
            'projects' => $projects,
            'categories' => $categories,
            'tools' => $arrTools
        ]);
    }

    public static function nopage()
    {
        debugguing('Not page');
    }
}
