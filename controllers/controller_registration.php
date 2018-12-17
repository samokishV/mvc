<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 6:12 PM
 */

class Controller_Registration extends Controller
{
    function action_index()
    {
        $this->view->generate('registration_view.php', 'template_view.php');
    }
}