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
use App\Models\Products;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->model = new Products();
        $this->view = new View();
    }

    public function typeIndex()
    {
        $page = Route::getParams();
        $data = $this->model->getByType($page);
        $this->view->generate('products/products.html', 'template_view.php', $data);
    }

    public function subtypeIndex()
    {
        $page = Route::getParams();
        $data = $this->model->getBySubtype($page);
        $this->view->generate('products/products.html', 'template_view.php', $data);
    }

    public function show()
    {
        $id = Route::getParams();
        $data = $this->model->getProduct($id);
        $this->view->generate('products/product.html', 'template_view.php', $data);
    }

    public function search()
    {
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $data = $this->model->search($keyword);
            $this->view->generate('products/products.html', 'template_view.php', $data);
        }
    }
}
