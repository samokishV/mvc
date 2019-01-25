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

    }
}
