<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Password;
use Config\Services;

class Dashboard extends BaseController
{
    public function getIndex()
    {
        return $this->blade->run('admin.dashboard',$this->data);
    }

    public function getAdmin(){
//        $userPassword = trim('12345678');
//        $password= Password::hash($userPassword);
//
//        $encryptService = Services::encrypter();
//        $hashPassword =base64_encode( $encryptService->encrypt($userPassword) );
//
//        $data = [
//            'name'=> 'YourApps',
//            'email'=> 'qrcode@yourapps.co.ke',
//            'password'=> $password,
//            'passwordHash'=> $hashPassword,
//            'roleId'=> 1,
//        ];
//        // Using Query Builder
//        $this->adminModel->insertInToTable('tbl_user',$data);
    }
}
