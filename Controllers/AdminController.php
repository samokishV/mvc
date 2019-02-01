<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 6:12 PM
 */

namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Lib\View as View;
use App\Lib\Route as Route;
use App\Models\Products as Products;
use App\Models\User as User;
use App\Models\Images;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->model = new Products();
        $this->view = new View();
    }

    public function index()
    {
        if (User::isAdmin()) {
            $data = $this->model->getList();
            $this->view->generate('products/admin_index.html', 'template_view.php', $data);
        } else {
            header("Location: /user/login");
        }
    }

    public function add()
    {
        if (User::isAdmin()) {
            $id = $this->model->add();

            if (isset($_POST['images'])) {
                $images = $_POST['images'];
                $newImg = new Images();
                $newImg->add($images, $id);
            }

            if (isset($id)) {
                header("Location: /admin/");
            }
            $this->view->generate('products/admin_add.html', 'template_view.php');
        } else {
            header("Location: /user/login");
        }
    }

    public function edit()
    {
        if (User::isAdmin()) {
            $id = Route::getParams();

            if (isset($_POST['images'])) {
                $images = $_POST['images'];
                $newImg = new Images();
                $newImg->add($images, $id);
            }

            $edit = $this->model->edit($id);
            if ($edit) header("Location: /admin/");
            $data = $this->model->getProduct($id);
            $this->view->generate('products/admin_edit.html', 'template_view.php', $data);
        } else {
            header("Location: /user/login");
        }
    }

    public function delete()
    {
        if (User::isAdmin()) {
            $id = Route::getParams();
            $this->model->delete($id);
            header("Location: /admin/");
        } else {
            header("Location: /user/login");
        }
    }
}
