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
//use App\Models\Images as Images;

class Images extends Controller
{
    public function __construct()
    {
        $this->model = new \App\Models\Images();
        $this->view = new View();
    }

    public function action_add()
    {
        $add = $this->model->add();
        header("Location: /admin/");
    }

    public function action_delete()
    {
        $id = Route::getParams();
        $this->model->delete($id);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
