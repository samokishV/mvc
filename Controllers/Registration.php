<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 6:12 PM
 */

namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Lib\Session as Session;
use App\Lib\Route as Route;

class Registration extends Controller
{
    public function action_index()
    {
        $data['title'] = "Registration page";
        $this->view->generate('registration_view.php', 'template_view.php', $data);
    }

    public function action_new() 
    {
         if($_POST && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
            $user = \Users::find_by_email($_POST['email']);
            if(isset($user)) {
                Session::setFlash('This email is already registered.', 'danger');
            } else {
                $user = \Users::create(array('email' => $_POST['email'], 'password' => hash('md5', $_POST['password']), 'name' => $_POST['name'], 'hash' => hash('md5', $_POST['email'])));
                if(isset($user)) {
                    $config = include(__DIR__.'/../config/config.php');
                    $data['name'] = $_POST['name'];      
                    $data['link'] = 'localhost/registration/registration_approve/'.hash('md5', $_POST['email']);
                    $mailer = \Sender\Transport\SwiftMailerTransport::create($config);
                    \Sender\Messenger::send('RegistrationApprove', $_POST, $data, $config, $mailer); 
                    Session::setFlash('Registration completed successfully. A confirmation email has been sent to your email.', 'success');            
                }
           
            }
            $data['title'] = "Registration page";
            $this->view->generate('registration_view.php', 'template_view.php', $data); 
        }
    }

    public function action_registration_approve()
    {            
        $route = new Route();
        $route->start();
        $params = $route->getParams();
        $user = \Users::find_by_hash($params);
        if(isset($user)) {
            $user->confirm = 1;
            $user->save();
            echo "Your account confirmed successfully";
        }
    }
}
