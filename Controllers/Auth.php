<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 6:12 PM
 */

namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Lib\Authorization as Authorization;
use App\Lib\Session as Session;
use App\Models\User as User;

class Auth extends Controller
{
    public function action_index()
    {
        if(User::isAdmin()) {
            header("Location: /admin/");
        } else
            $this->view->generate('auth_view.php', 'template_view.php');
    }

    public function action_auth() 
    {
        Authorization::login();     
    } 

    public function action_quit()
    {
        Authorization::logout();
        header("Location: /main/");
    }

    public function action_password_recovery()
    {
        if(isset($_POST['email'])) {
            $user = \Users::find_by_email($_POST['email']);
            if (!isset($user)) {
                Session::setFlash('Incorrect email. Please try again.', 'danger');
            } else {
                $password = random_int(100000, 999999);
                $hash_password = hash('md5', $password);
                $user->password = $hash_password;
                $user->save();

                $config = include(__DIR__.'/../config/config.php');
                $sendTo['email'] = $user->email;
                $sendTo['name'] = $user->name;
                $data['password'] = $password;
                $mailer = \Sender\Transport\SwiftMailerTransport::create($config);
                \Sender\Messenger::send('PasswordRecovery', $sendTo, $data, $config, $mailer);
                Session::setFlash('A password has been sent to your email.', 'success');
            }

        }
        $this->view->generate('recovery_view.php', 'template_view.php');
    }
}
