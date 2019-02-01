<?php

namespace App\Lib;

use App\ActiveRecord\Users as Users;
use App\Models\User as User;
use App\Lib\Cookie as Cookie;

class Authorization
{
    public function login($email, $password)
    {
        if (isset($email) && isset($password)) {
            if (!Validation::emailExists($email)) {
                Session::setFlash('Incorrect email. Please try again.', 'danger');
                return false;
            } else {
                $user = new User();
                $user = $user->getByEmail($email);
                $password = $user->password;
                $login = $user->name;
                $email = $user->email;

                if ($password == hash('md5', $_POST['password'])) {
                    Session::set('login', $login);
                    Session::set('email', $email);
                    Cookie::set('login', $login);
                    Cookie::set('email', $email);
                    Session::setFlash('Authorization completed successfully.', 'success');
                    return true;
                } else {
                    Session::setFlash('Incorrect password. Please try again.', 'danger');
                    return false;
                }
            }
        }
    }

    public static function isAuth()
    {
        if (Session::get('login') && Session::get('email')) {
            return true;
        } else {
            if (Cookie::get('login') && Cookie::get('email')) {
                $login = Cookie::get('login');
                $email = Cookie::get('email');
                Session::set('login', $login);
                Session::set('email', $email);
                return true;
            } else {
                return false;
            }
        }
    }

    public static function getlogin()
    {
        if (self::isAuth()) {
            return Session::get('login');
        }
        return null;
    }

    public function logout()
    {
        if (self::isAuth()) {
            Session::delete('login');
            Session::delete('email');
            Cookie::delete('login');
            Cookie::delete('email');
        }
    }
}
