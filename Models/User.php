<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11.01.19
 * Time: 17:26
 */

namespace App\Models;

use App\Lib\Session as Session;
use App\Lib\Validation as Validation;
use App\Lib\Sender as Sender;

class User
{
    public static function isAdmin()
    {
        if (Session::get('email') == 'admin@mail.ru') {
            return true;
        } else {
            return false;
        }
    }

    public function create($name, $email, $password)
    {
        if (Validation::emailNotExists($email)) {
            $user = \Users::create(array('email' => $email, 'password' => hash('md5', $password), 'name' => $name, 'hash' => hash('md5', $email)));
            $link = 'localhost/user/registration_approve/'.hash('md5', $email);
            $mail = new Sender();
            $mail->sendLink($name, $email, $link);
            return true;
        } else {
            Session::setFlash('This email is already registered.', 'danger');
            return false;
        }
    }

    public function confirmRegistration($hash)
    {
        $user = \Users::find_by_hash($hash);
        if (isset($user)) {
            $user->confirm = 1;
            $user->save();
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
        if (isset($user->$field)) {
            return $user->$field;
        } else {
            return "";
        }
    }

    public function changeValue($field, $value, $email)
    {
        $user = \Users::find_by_email($email);
        $user->$field = $value;
        $user->save();
        return true;
    }

    public function passwordRecovery($email)
    {
        if (Validation::emailExists($email)) {
            $user = \Users::find_by_email($email);
            $name = $user->name;
            $password = random_int(100000, 999999);
            $user->password = hash('md5', $password);
            $user->save();
            $mail = new Sender();
            $mail->sendPassword($name, $email, $password);
            return true;
        } else {
            return false;
        }
    }

    public function changePassword($email, $oldPassword, $newPassword, $confirmPassword)
    {
        if (Validation::checkPasswordChange($oldPassword, $newPassword, $confirmPassword)) {
            $user = \Users::find_by_email($email);
            $passwordHash = hash('md5', $newPassword);
            $user->password = $passwordHash;
            $user->save();
            return true;
        } else {
            return false;
        }
    }

    public function changeEmail($postEmail, $sessionEmail)
    {
        if (!Validation::emailExists($postEmail) || (Validation::emailExists($postEmail) && Validation::emailsEqual($postEmail, $sessionEmail))) {
            $user = \Users::find_by_email($sessionEmail);
            $user->email = $postEmail;
            $user->save();
            return true;
        } else {
            echo "This email adress is already used.";
            return false;
        }
    }
}
