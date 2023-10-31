<?php
declare(strict_types=1);

namespace Controllers;

use Models\Category;
use Models\Tool;
use MVC\Router;

class TechController {
    protected static $iconsDir = '../public/img/icons';

    public static function index(Router $router) {
        isAuth();

        $tools = Tool::all('ASC');
        $categories = Category::all();
        
        foreach($tools as $tool) {
            foreach($categories as $category) {
                if ($tool->category_id === $category->id) {
                    $tool->category = $category->name;
                }
            }
        }

        $router->render('admin/technologies/index', [
            'title' => 'Tecnologías',
            'tools' => $tools
        ]);
    }

    public static function addTech(Router $router) {
        $tool = new Tool();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tempIcon = $_FILES['icon']['tmp_name'];
            $iconName = '';

            if (!empty($tempIcon)) {
                $iconName = md5( uniqid( strval(rand()), true ) );
            }
            
            $tool->sync([
                'name' => $_POST['name'],
                'category_id' => $_POST['category'],
                'icon' => $iconName
            ]);
            $errors = $tool->validate();
            if (empty($errors)){
                move_uploaded_file($tempIcon, static::$iconsDir."/{$iconName}.svg");
                $res = $tool->save();
                
                if($res) {
                    header('Location: /admin/technologies');
                    return; 
                }
            }
        }
        
        $categories = Category::all('ASC');
        $router->render('/admin/technologies/add', [
            'title' => 'Agregar Tecnología',
            'categories' => $categories,
            'tool' => $tool,
            'alerts' => Tool::getAlerts()
        ]);
    }

    public static function editTech(Router $router) {
        isAuth();
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id ) {
            header('Location /admin/technologies');
            return;
        }

        $categories = Category::all('ASC');
        $tool = Tool::find($id);

        if (!$tool) {
            header('Location: /admin/technologies?page=1');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $iconName = null;
            $tempIcon = $_FILES['icon']['tmp_name'];
            if (!empty($tempIcon)) {
                $iconName = md5( uniqid( strval(rand()), true ) );
            }

            $previousIcon = $tool->icon;
            $tool->sync([
                'name' => $_POST['name'],
                'category_id' => $_POST['category'],
                'icon' => $iconName ?? $previousIcon
            ]);
            $alerts = $tool->validate();

            if(empty($alerts)) {
                if (!empty($tempIcon)) {
                    move_uploaded_file($tempIcon, static::$iconsDir."/{$iconName}.svg");
                    deleteImage("icons/{$previousIcon}", '.svg');
                }

                $res = $tool->save();
                if ($res) {
                    header('Location: /admin/technologies');
                }
            }
        }

        $router->render('/admin/technologies/edit', [
            'title' => 'Editar tecnología',
            'tool' => $tool,
            'categories' => $categories
        ]);
    }

    public static function deleteTech() {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/technologies');
            return;
        }

        $tool = Tool::find($id);
        if ($tool) {
            $res = $tool->delete();
            if ($res) {
                deleteImage("icons/{$tool->icon}", '.svg');
                header('Location: /admin/technologies');
                return;
            }
        }

    }
}
