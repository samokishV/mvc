<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.12.18
 * Time: 10:21
 */
namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Models\Cart as ModelCart;
use App\Lib\View as View;
use App\Lib\Route as Route;

class Cart extends Controller
{
    public function __construct()
    {
        $this->model = new ModelCart();
        $this->view = new View();

        $this->route = new \App\Lib\Route();
        $this->route->start();
    }

    public function action_index()
    {      
        $data = $this->model->getProducts();        
        $this->view->generate('cart_view.php', 'template_view.php', $data);
    }

    public function action_add() 
    {
        $id = (int) $this->route->getParams();
        $qt = (int) $_POST[$id.'qt'];
        $this->model->addProduct($id, $qt);
        // echo "<pre>"; var_dump($this->model->getProducts());
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }

    public function action_delete() 
    {
        $id = (int) $this->route->getParams();
        $this->model->deleteProduct($id);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
}


