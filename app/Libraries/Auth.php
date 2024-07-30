<?php
namespace App\Libraries;

use App\Models\AdminModel;
use Config\Services;

class Auth {

    public static function isLogin(){
        $login = false;
        $session = session();

        $user = $session->get('user');

        if (is_array($user)) {
            $login= $user['logged_in'];
        }
        return $login;
    }

    public static function isRole($role): bool
    {
        $result = false;
        $session = session();
        $user = $session->get('user');
        if (is_array($user)) {
            $result = ($user['roleName']==$role);
        }
        return $result;
    }

    public static function getRoleName(){
        $roleName = null;
        $session = session();
        $user = $session->get('user');
        if (is_array($user)) {
            $roleName = $user['roleName'];
        }
        return $roleName;
    }

    public static function isAdmin(): bool
    {
        $result = false;
        $session = session();
        $user = $session->get('user');
        if (is_array($user)) {
            $result = ($user['roleName']=='admin');
        }
        return $result;
    }


    public function adminProfile(): \stdClass
    {
        $session = Services::session();
        $user = $session->get('user');
        $aModel = new AdminModel();
        return $aModel->getUserProfile($user['id']);
    }

    public function userProfile(): \stdClass
    {
        $session = Services::session();
        $user = $session->get('user');
        $aModel = new AdminModel();
        return $aModel->getUserProfile($user['id']);
    }


}