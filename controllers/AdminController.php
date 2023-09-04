<?php

namespace Controllers;

use Models\User;
use MVC\Router;

class AdminController {
    public static function login(Router $router) {
        if (isAdmin()){
            header('Location: /admin/dashboard');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = User::where('email', $_POST['email']);

            if (empty($user)) {
                User::setAlert('error', 'El usuario no existe');  
            } else {
                if ($user->verifyPassword($_POST['password'])) {
                    startSession();
                    $_SESSION['id'] = $user->id;
                    $_SESSION['email'] = $user->email;
                    $_SESSION['isAdmin'] = $user->admin;

                    // header('Location: /admin/dashboard');
                    header('Location: /admin/projects/add');
                    return;
                } else {
                    User::setAlert('error', 'Contraseña incorrecta');
                }
            }
        }

        $router->render('/admin/login',[
            'title' => 'Login',
            'alerts' => User::getAlerts()
        ]);
    }

    public static function dashboard(Router $router)
    {
        startSession();
        // debugguing($_SESSION);
        $router->render('/admin/dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    public static function createPass()
    {
        $pass = '';
        $hash = password_hash($pass, PASSWORD_BCRYPT);

        echo '<pre>';
        var_dump($hash);
        echo '</pre>';
    }
}
