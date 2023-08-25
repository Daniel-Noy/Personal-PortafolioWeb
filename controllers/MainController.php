<?php

namespace Controllers;

use MVC\Router;

class MainController {
    public static function index(Router $router)
    {
        $router->render('main/index', [
            'title' => 'Inicio'
        ]);
    }

    public static function nopage()
    {
        debugguing('Not page');
    }
}
