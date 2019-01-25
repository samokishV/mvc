<?php

namespace App\Lib;

use Sender\Transport\SwiftMailerTransport as SwiftMailerTransport;
use \Sender\Messenger as Messenger;

class Sender
{

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
