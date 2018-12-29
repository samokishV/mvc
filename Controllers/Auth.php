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

class Auth extends Controller
{
    public function action_index()
    {
        $this->view->generate('auth_view.php', 'template_view.php');
    }

    public function action_quit()
    {
        Authorization::logout();
        header("Location: /main/");
    }
}