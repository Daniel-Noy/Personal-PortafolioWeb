<?php
declare(strict_types=1);

namespace Controllers;

use Classes\Pager;
use Intervention\Image\ImageManagerStatic as Image;
use Models\Project;
use MVC\Router;

class ProjectController {
    public static function index(Router $router)
    {
        isAuth();
        if (!isset($_GET['page'])) {
            header('Location: /admin/projects?page=1');
            return;
        }
        
        $recordsPerPage = 5;
        $pager = new Pager($_GET['page'], $recordsPerPage);
        $offset = $pager->offset();

        $projects = Project::paginar($recordsPerPage, $offset);

        $router->render('/admin/projects/index', [
            'title' => 'Proyectos',
            'projects' => $projects
        ]);
    }

    public static function addProject(Router $router)
    {
        isAuth();
        $project = new Project();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_FILES['image']['tmp_name'])) {
                $imagesDir = '../public/img/';

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
            'title' => 'Añadir Proyecto',
            'alerts' => Project::getAlerts(),
            'project' => $project
        ]);
    }

    public static function editProject(Router $router)
    {
        isAuth();

        $router->render('/admin/projects/edit', [
            'title' => 'Editar Proyecto'
        ]);
    }
}
