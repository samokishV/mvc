<?php

namespace App\Lib;

use Sender\Transport\SwiftMailerTransport as SwiftMailerTransport;
use \Sender\Messenger as Messenger;

class Sender
{

    public function send_link($name, $email, $link)
    {
        $config = include(__DIR__.'/../config/config.php');
		$sendTo['email'] = $email;
		$sendTo['name'] = $name;        
        $data['name'] = $name;      
        $data['link'] = $link;
        $mailer = SwiftMailerTransport::create($config);
        Messenger::send('RegistrationApprove', $_POST, $data, $config, $mailer); 
        Session::setFlash('Registration completed successfully. A confirmation email has been sent to your email.', 'success');  
    }

	public function send_password($name, $email, $password)
	{
		$config = include(__DIR__.'/../config/config.php');
		$sendTo['email'] = $email;
		$sendTo['name'] = $name;
		$data['password'] = $password;
		$mailer = SwiftMailerTransport::create($config);
		Messenger::send('PasswordRecovery', $sendTo, $data, $config, $mailer);
		Session::setFlash('A password has been sent to your email.', 'success');
		echo "A password has been sent to your email";
	}
}
