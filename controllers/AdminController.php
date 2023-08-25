<?php

namespace Controllers;

use MVC\Router;

class AdminController {
    public static function createPass()
    {
        $pass = '';
        $hash = password_hash($pass, PASSWORD_BCRYPT);

        echo '<pre>';
        var_dump($hash);
        echo '</pre>';
    }
}
