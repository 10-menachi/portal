<?php
namespace App\Libraries;

use Config\Services;

class Password extends Services
{
    public static function hash($password){
        $key = env('encryption.key');
        $salt1 = hash('sha512', $key . $password);
        $salt2 = hash('sha512', $password . $key);
        $hashed_password = hash('sha512', $salt1 . $password . $salt2);
        return $hashed_password;
    }


    public static function is_valid($password,$dbpassword){
        $key = env('encryption.key');
        $salt1 = hash('sha512', $key . $password);
        $salt2 = hash('sha512', $password . $key);
        $hashed_password = hash('sha512', $salt1 . $password . $salt2);
        return $hashed_password == $dbpassword;
    }

//    public static function is_valid($password,$dbPassword): bool
//    {
//        $passwordPost = md5($password);
//        return $passwordPost == $dbPassword;
//    }
//
//    public static function hash($password): string
//    {
//      return md5($password);
//    }
}