<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Auth;
use App\Libraries\Password;
use CodeIgniter\HTTP\RedirectResponse;

class Login extends BaseController
{
    public function getIndex()
    {
        $auth = new Auth();
        $isLogin = $auth::isLogin();

        if($isLogin){
            return redirect()->to('admin');
        }
        return $this->blade->run('login',$this->data);
    }

    public function postAuth(){
        $post = $this->request->getPost();

        $this->validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required'
        ]);
        $validation = $this->validation->run($post);
        if ($validation) {
            $matchPassword = false;
            $result = $this->adminModel->getUserByEmailId($post['email']);
            if ($result) {
                $matchPassword = Password::is_valid($post['password'], $result['password']);
            }

            if ($result && $matchPassword) {

                $doLogin['user'] = [
                    'id' => $result['id'],
                    'email' => $result['email'],
                    'logged_in' => true,
                    'roleName' => 'admin',
                ];

                $this->session->set($doLogin);

                return redirect()->to('admin');

            }else{
                $errors = array(
                    'email' => "Email Or Password did not match",
                );
                return redirect()->back()->with('validation', $errors)->withInput();
            }
        }else{
            $errors = $this->validation->getErrors();
            return redirect()->back()->with('validation', $errors)->withInput();
        }
    }

    public function getLogout(): RedirectResponse
    {
        if ($this->session->has('user')) {
            $this->session->remove('user');
        }
        return redirect()->to(base_url());
    }
}
