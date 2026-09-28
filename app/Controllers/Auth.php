<?php
namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) return redirect()->to('/');
        $data = ['title'=>'Login','heading'=>'Login','mode'=>'tfa'];
        return view('auth/login', $data);
    }

    public function verify()
    {
        $rules = ['username'=>'required','password'=>'required'];
        if (! $this->validate($rules)) {
            return view('auth/login', ['title'=>'Login','heading'=>'Login','mode'=>'tfa','errors'=>$this->validator]);
        }
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $model = new \App\Models\UserModel();
        $user = $model->where('username', $username)->first();
        if ($user && ! empty($user['password_hash']) && password_verify($password, $user['password_hash'])) {
            session()->set('isLoggedIn', true);
            session()->set('user_id', $user['id']);
            session()->set('username', $user['username']);
            return redirect()->to('/customers');
        }
        return view('auth/login', ['title'=>'Login','heading'=>'Login','mode'=>'tfa','errors'=>'Invalid credentials']);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
