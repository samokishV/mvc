<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.12.18
 * Time: 10:21
 */
namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Models\Stock as ModelStock;
use App\Lib\View as View;

class Stock extends Controller
{
    public function __construct()
    {
        $this->model = new ModelStock();
        $this->view = new View();
    }

    public function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('stock_view.php', 'template_view.php', $data);
    }
}
