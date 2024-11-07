<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function loginauth()
    {
        $model = new LoginModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $model->where('email', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            session()->set('is_logged_in', true);
            session()->set('user_id', $user['id']);
            return redirect()->to('/home');
        } else {
            $login_error = 'Invalid email or password';
            return view('login', ['login_error' => $login_error]);
        }
    }
    public function showLoginPage(){
        return view('login'); 
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
