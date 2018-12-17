<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.12.18
 * Time: 10:21
 */

class Controller_Stock extends Controller
{

    function __construct()
    {
        $this->model = new Model_Stock();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('stock_view.php', 'template_view.php', $data);
    }
}
