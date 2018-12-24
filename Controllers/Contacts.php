<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.12.18
 * Time: 10:21
 */
namespace App\Controllers;

use App\Lib\Controller as Controller;
use App\Sender\Messenger as Messenger;

class Contacts extends Controller
{
    public function action_index()
    {
        if ($_POST) {
            $config = include('/home/NIX/phpstudent/www/app/Sender/config/config.php');

            $sendTo = [
                'name' => $config['name'],
                'email' => $config['email']
            ];

            include "/home/NIX/phpstudent/www/app/Sender/Messenger.php";
            Messenger::send('ContactUs', $sendTo, $_POST);
        }

        $this->view->generate('contacts_view.php', 'template_view.php');
    }
}
