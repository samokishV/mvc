<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.12.18
 * Time: 10:21
 */

class Controller_Product extends Controller
{

    function __construct()
    {
        $this->model = new Model_Product();
        $this->view = new View();
    }

    function action_index()
    {      
		$route = new Route();
        $route->start();
        $params = (int) $route->getParams();
        $data = $this->model->get_data($params);
        $this->view->generate('product_view.php', 'template_view.php', $data);
    }
}
