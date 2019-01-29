<?php

namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Lib\View as View;
use App\Lib\Authorization as Authorization;
use App\Lib\Session as Session;
use App\Lib\Validation as Validation;
use App\Lib\Sender as Sender;
use App\Lib\Route as Route;
use App\Models\Order as Order;

class User extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new \App\Models\User();
    }

    public function action_login()
    {
        if ($_POST && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            Authorization::login($email, $password);
        }
        $data['title'] = "Authorization page";
        $this->view->generate('auth_view.php', 'template_view.php');
    }

    public function action_logout()
    {
        Authorization::logout();
        header("Location: /main/");
    }

    public function action_registration() 
    {
        if($_POST && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
           $name = $_POST['name'];
           $email = $_POST['email'];
           $password = $_POST['password'];
           $result = $this->model->create($name, $email, $password);
           if($result) {
                Authorization::login($email, $password);
            } 
        }
        $data['title'] = "Registration page";
        $this->view->generate('registration_view.php', 'template_view.php', $data);
    }

    public function action_registration_approve()
    {            
        $route = new Route();
        $route->start();
        $params = $route->getParams();
        $result = $this->model->confirmRegistration($params);
        if($result) {
            echo "Your account confirmed successfully";
        }
    }

    public function action_profile()
    {
        if(Authorization::isAuth()) {
            $email = Session::get('email');
            $user = $this->model->getByEmail($email);
            $route = new Route();
            $route->start();
            $params = $route->getParams(); 
            if($params==1 || $params=='settings')  {          
                $this->view->generate('profile_view.php', 'template_view.php', $user);
            } elseif($params=='order-history') {
                $id = $user->id;
                $order = new Order();
                $data = $order->getByUserId($id);
                $this->view->generate('history_view.php', 'template_view.php', $data);
            }
        }
        else header("Location: /user/login");
    }

    public function action_edit_data()
    {
        if(isset($_POST['name'] , $_POST['email'], $_POST['phone'], $_POST['address'])) {
            $sessionEmail = Session::get('email');

            $postEmail = $_POST['email'];
            $emailChange = $this->model->changeEmail($postEmail, $sessionEmail);

			if($emailChange) {
                Session::set('email', $postEmail); 

                $name = $_POST['name'];
                $nameChange = $this->model->changeValue('name', $name, $sessionEmail);
                if($nameChange) Session::set('name', $name); 

                $phone = $_POST['phone'];
                $phoneChange = $this->model->changeValue('phone', $phone, $sessionEmail);

                $address = $_POST['address'];
                $addressChange = $this->model->changeValue('address', $address, $sessionEmail);
                echo "Data successfully changed!";
			}
        }  
    }

    public function action_edit_password()
    {
        if(isset($_POST['old-password'], $_POST['new-password'], $_POST['confirm-password'])){
            $oldPassword = $_POST['old-password'];
            $newPassword = $_POST['new-password'];
            $confirmPassword = $_POST['confirm-password'];
            $email = Session::get('email');
            $this->model->changePassword($email, $oldPassword, $newPassword, $confirmPassword);
        }
    }

	public function action_password_recovery()
	{
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
			$result = $this->model->passwordRecovery($email);
		}
	}

	public function action_password_recovery_page()
	{
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
			$this->model->passwordRecovery($email);
		}
        $this->view->generate('recovery_view.php', 'template_view.php');
	}    
}
