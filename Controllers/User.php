<?php

namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Lib\View as View;
use App\Lib\Authorization as Authorization;
use App\Lib\Session as Session;
use App\Lib\Validation as Validation;
use App\Lib\Sender as Sender;

class User extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new \App\Models\User();
    }

    public function action_profile()
    {
        if(Authorization::isAuth()) {
            $email = Session::get('email');
            $data = $this->model->getByEmail($email);
            $this->view->generate('profile_view.php', 'template_view.php', $data);
        }
        else header("Location: /auth/");
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
			$this->model->passwordRecovery($email);
		}
	}

	public function action_password_recovery_page()
	{
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
            ob_start();
			$this->model->passwordRecovery($email);
            ob_end_clean();
		}
        $this->view->generate('recovery_view.php', 'template_view.php');
	}    
}
