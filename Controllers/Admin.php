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
use App\Models\Products as Products;
use App\Models\User as User;

class Admin extends Controller
{
    public function __construct()
    {
        $this->model = new Products();
        $this->view = new View();
    }

    public function action_index()
    {
        if(User::isAdmin()) {
            $data = $this->model->get_list();
            $this->view->generate('products/admin_index.html', 'template_view.php', $data);
        } else
            header("Location: /auth/");
    }

    public function action_add()
    {
        if(User::isAdmin()) {
            $add = $this->model->add();
            if ($add) header("Location: /admin/");
            $this->view->generate('products/admin_add.html', 'template_view.php');
        } else
            header("Location: /auth/");
    }

    public function action_edit()
    {
        if(User::isAdmin()) {
            $add = $this->model->edit();
            if ($add) header("Location: /admin/");
            $data = $this->model->get_product();
            $this->view->generate('products/admin_edit.html', 'template_view.php', $data);
        } else
            header("Location: /auth/");
    }

    public function action_delete()
    {
        if(User::isAdmin()) {
            $this->model->delete();
            header("Location: /admin/");
        }
        else
            header("Location: /auth/");
    }
}
