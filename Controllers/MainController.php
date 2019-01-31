<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 6:12 PM
 */
namespace App\Controllers;

use App\Lib\Controller as Controller;

class MainController extends Controller
{
    public function index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}
