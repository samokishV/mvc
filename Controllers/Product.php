<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.12.18
 * Time: 10:21
 */
namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Models\Product as ModelProduct;
use App\Lib\View as View;
use App\Lib\Route as Route;

class Product extends Controller
{
    public function __construct()
    {
        $this->model = new ModelProduct();
        $this->view = new View();
    }

    public function action_index()
    {      
		$route = new Route();
        $route->start();
        $params = (int) $route->getParams();
        $data = $this->model->get_data($params);
        $this->view->generate('product_view.php', 'template_view.php', $data);
    }
}
