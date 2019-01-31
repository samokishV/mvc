<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.12.18
 * Time: 10:21
 */
namespace App\Controllers;

use App\Lib\Controller as Controller;
use Sender\Transport\SwiftMailerTransport;
use Sender\Messenger;

class ContactsController extends Controller
{
    public function index()
    {
        if ($_POST) {
            $config = include(__DIR__.'/../config/config.php');

            $sendTo = [
                'name' => $config['name'],
                'email' => $config['email']
            ];

            $mailer = SwiftMailerTransport::create($config);

            Messenger::send('ContactUs', $sendTo, $_POST, $config, $mailer);
        }
        $this->view->generate('contacts_view.php', 'template_view.php');
    }
}
