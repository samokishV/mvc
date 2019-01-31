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
use App\Models\Products as Products;

class CartController extends Controller
{
    public function __construct()
    {
        $this->model = new ModelCart();
        $this->view = new View();

        $this->route = new Route();
        $this->route->start();
    }

    public function index()
    {
        $data = $this->model->getProducts();
        $this->view->generate('cart_view.php', 'template_view.php', $data);
    }

    public function add()
    {
        if (isset($_POST['id']) && isset($_POST['qt'])) {
            $id = $_POST['id'];
            $qt = $_POST['qt'];
            $result = $this->model->addProduct($id, $qt);
            if ($result) {
                $product = new Products();
                $product->decrease($id, $qt);
                echo true;
            } else {
                echo false;
            }
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        $qt = $_POST['qt'];
        $result = $this->model->deleteProduct($id);
        if ($result) {
            $product = new Products();
            $product->increase($id, $qt);
        }
    }

    public function edit()
    {
        if (isset($_POST['id']) && isset($_POST['qt']) && isset($_POST['action'])) {
            $id = $_POST['id'];
            $qt = $_POST['qt'];
            $action = $_POST['action'];
            $result = $this->model->editProduct($id, $qt);
            $product = new Products();
            if ($action == 'increase') {
                $product->increase($id, 1);
            }
            if ($action == 'decrease') {
                $product->decrease($id, 1);
            }
        }
    }
}
