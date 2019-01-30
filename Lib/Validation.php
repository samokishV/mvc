<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 23.01.19
 * Time: 17:45
 */

namespace App\Lib;

use App\Models\User;
use App\ActiveRecord\Users;
use App\Lib\Session as Session;
use App\Lib\Validation as Validation;

class Validation
{
    public static function checkPasswordChange($oldPassword, $password1, $password2)
    {
        $passwordExist = Validation::passwordExists($oldPassword);
        $isEqual = Validation::passwordsEqual($password1, $password2);
        if($passwordExist && $isEqual) {
            echo "Passwords successfully changed!";
            return true;
        }
        else return false;
    }

    public static function passwordsEqual($password1, $password2)
    {
        if($password1 == $password2) return true;
        else {
            echo "Passwords aren't equal!";
            return false;
        }
    }

    public static function passwordExists($oldPassword)
    {
        $name = Session::get('email');
        $user = new User();
        $data = $user->getByEmail($name);
        $password = $data->password;
        if($password == hash('md5', $oldPassword)) return true;
        else {
            echo "Password is incorrect!";
            return false;
        }
    }

    public static function emailsEqual($email1, $email2)
    {
        if($email1 == $email2) return true;
        else return false;
    }

    public static function emailNotExists($email)
    {
        $user = Users::find_by_email($email);
        if(!$user) return true;
        else return false;
    }

    public static function emailExists($email) 
    {
        $user = Users::find_by_email($email);
        if($user) return true;
        else {
            echo "Incorrect email. Please try again.";
            return false;
        }
    }
}
