<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.12.18
 * Time: 10:21
 */
namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Lib\View as View;
use App\Lib\Route as Route;

class Products extends Controller
{
    public function __construct()
    {
        $this->model = new \App\Models\Products();
        $this->view = new View();
    }

    public function action_type_index()
    {
        $page = Route::getParams();
        $data = $this->model->get_by_type($page);
        $this->view->generate('products/products.html', 'template_view.php', $data);
    }

    public function action_subtype_index()
    {
        $page = Route::getParams();
        $data = $this->model->get_by_subtype($page);
        $this->view->generate('products/products.html', 'template_view.php', $data);
    }

    public function action_show()
    {
        $id = Route::getParams();
        $data = $this->model->get_product($id);
        $this->view->generate('products/product.html', 'template_view.php', $data);
    }

}
