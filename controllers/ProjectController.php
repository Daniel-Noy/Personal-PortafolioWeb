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
        $page = $_GET['page'] ?? '';
        $page = filter_var($page, FILTER_VALIDATE_INT);
        if (!isset($_GET['page']) || !$page) {
            header('Location: /admin/projects?page=1');
            return;
        }
        
        $recordsPerPage = 5;
        $totalRecords = Project::total();
        $pager = new Pager($_GET['page'], $recordsPerPage, $totalRecords);
        $pager->validate('/admin/projects');
        
        $offset = $pager->offset();
        $projects = Project::paginar($recordsPerPage, $offset);

        $pagerDiv = $pager->pager();

        $router->render('/admin/projects/index', [
            'title' => 'Proyectos',
            'projects' => $projects,
            'pager' => $pagerDiv
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
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /admin/projects?page=1');
            return;
        }

        $project = Project::find($id);
        if (!$project) {
            header('Location: /admin/projects?page=1');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_FILES['image']['tmp_name'])) {
                $imagesDir = '../public/img/';

                if(!is_dir($imagesDir)) mkdir($imagesDir, 0777, true);

                $imageWebp = Image::make($_FILES['image']['tmp_name'])->resize(900, 500);
                $imageName = md5( uniqid( strval(rand()), true ) );
                $_POST['image'] = $imageName;
            }

            $previousImage = $project->image;
            $project->sync($_POST);
            $alerts = $project->validate();

            if(empty($alerts)) {
                if (isset($imageWebp)) {
                    $imageWebp->save("{$imagesDir}/{$imageName}.webp");
                    deleteImage($previousImage);
                }

                $res = $project->save();
                if ($res) {
                    header('Location: /admin/projects');
                }
            }
        }

        $router->render('/admin/projects/edit', [
            'title' => 'Editar Proyecto',
            'project' => $project
        ]);
    }
}
