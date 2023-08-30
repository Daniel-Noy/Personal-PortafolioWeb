<?php
declare(strict_types=1);

namespace Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Models\Project;
use MVC\Router;

class ProjectController {
    public static function index() {
        
    }

    public static function addProject(Router $router)
    {
        $project = new Project();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_FILES['image']['tmp_name'])) {
                $imagesDir = '../public/img/speakers';

                if(!is_dir($imagesDir)) mkdir($imagesDir, 0777, true);

                $imageWebp = Image::make($_FILES['image']['tmp_name'])->resize(900, 500);
                $imageName = md5( uniqid( strval(rand()), true ) );
                $_POST['image'] = $imageName;
            }

            $project->sync($_POST);
            $alerts = $project->validate();

            if(empty($alerts)) {
                $imageWebp->save("{$imagesDir}/{$imageName}.webp");

                $res = $project->save();
                if ($res) {
                    header('Location: /admin/projects');
                }
            }
        }
        
        $router->render('/admin/projects/add', [
            'title' => 'Añadir proyecto',
            'alerts' => Project::getAlerts(),
            'project' => $project
        ]);
    }
}
