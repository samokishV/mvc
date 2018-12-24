<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 6:12 PM
 */
namespace App\Controllers;

use App\Lib\Controller as Controller;

class Main extends Controller
{
    public function action_index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}