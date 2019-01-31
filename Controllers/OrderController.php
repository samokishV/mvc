<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 25.01.19
 * Time: 16:36
 */

namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Lib\Authorization as Authorization;
use App\Lib\View as View;
use App\Lib\Session as Session;
use App\Models\Cart as Cart;
use App\Models\User as User;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new User();
    }

    public function index()
    {
        $email = Session::get('email');
        $user = $this->model->getByEmail($email);
        $cart = new Cart();
        $cart = $cart->getProducts();
        $data = ['user'=> $user, 'cart'=>$cart];
        $this->view->generate('checkout_view.php', 'template_view.php', $data);
    }

    public function create()
    {
        if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $adress = $_POST['address'];
            $sessionEmail = Session::get('email');
            $order = new Order();
            $order->create($name, $email, $phone, $adress, $sessionEmail);
            echo "Your order saved successfully";
        }
    }
}
