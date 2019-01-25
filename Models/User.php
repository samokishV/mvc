<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11.01.19
 * Time: 17:26
 */

namespace App\Models;

use App\Lib\Session as Session;
use App\Lib\Authorization as Authorization;
use App\Lib\Validation as Validation;
use App\Lib\Sender as Sender;

class User
{
    public static function isAdmin()
    {
        if(Session::get('login') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function getByEmail($email)
    {
        $user = \Users::find_by_email($email);
        return $user;
    }

    public static function getValue($user, $field)
    {
        if($user->$field) {
            return $user->$field;
        }
        else return "No data";
    }

    public function changeValue($field, $value, $email)
    {
        $user = \Users::find_by_email($email);
        $user->$field = $value;
        $user->save();
        return true;
    }

	public static function generatePassword()
	{
		$password = random_int(100000, 999999);
		return $password;
	} 

    public function passwordRecovery($email)
    {
        if(Validation::emailExists($email)) {
            $user = \Users::find_by_email($email);
			$name = $user->name;
            $password = User::generatePassword();
            $user->password = hash('md5', $password);
            $user->save();
			$mail = new Sender();
			$mail->send_password($name, $email, $password);
            return true;
        }
        else return false;
    }

    public function changePassword($email, $oldPassword, $newPassword, $confirmPassword)
    {
        if(Validation::checkPasswordChange($oldPassword, $newPassword, $confirmPassword)) {
            $user = \Users::find_by_email($email);
            $passwordHash = hash('md5', $newPassword);
            $user->password = $passwordHash;
            $user->save();
            return true;
        }
        else return false;
    }

    public function changeEmail($postEmail, $sessionEmail) 
    {
        if(!Validation::emailExists($postEmail) || (Validation::emailExists($postEmail) && Validation::emailsEqual($postEmail, $sessionEmail))) {
            $user = \Users::find_by_email($sessionEmail);
            $user->email = $postEmail;
            $user->save();
            return true;
        }
        else {
            echo "This email adress is already used.";
            return false;
        }
    }
}
