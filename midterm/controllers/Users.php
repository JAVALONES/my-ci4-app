<?php
namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $validation;
    public function __construct() { $this->validation = \Config\Services::validation(); }

    public function index()
    {
        $model = new UserModel(); $users = $model->findAll();
        $data = ['title'=>'User Accounts','heading'=>'User Accounts','users'=>$users,'mode'=>'tfa'];
        return view('users/index', $data);
    }

    public function new() { return view('users/form', ['title'=>'New User','heading'=>'New User','mode'=>'tfa','user'=>null,'errors'=>null]); }

    public function create()
    {
        $rules = ['username'=>'required|is_unique[users.username]','full_name'=>'required'];
        if (! $this->validate($rules)) {
            return view('users/form', ['title'=>'New User','heading'=>'New User','mode'=>'tfa','user'=>null,'errors'=>$this->validator,'old'=>$this->request->getPost()]);
        }
        $post = $this->request->getPost(); if (!isset($post['avatar'])) $post['avatar'] = null;
        $model = new UserModel(); $model->insert($post);
        return redirect()->to('/users')->with('message', 'User created');
    }

    public function edit($id = null)
    {
        $model = new UserModel(); $user = $model->find($id);
        if (! $user) return redirect()->to('/users');
        return view('users/form', ['title'=>'Edit User','heading'=>'Edit User','mode'=>'tfa','user'=>$user,'errors'=>null]);
    }

    public function update($id = null)
    {
        $rules = ['username'=>'required','full_name'=>'required'];
        $post = $this->request->getPost();
        $avatarFile = $this->request->getFile('avatar');
        if ($avatarFile && $avatarFile->isValid() && ! $avatarFile->hasMoved()) {
            $filename = $avatarFile->getRandomName();
            $path = ROOTPATH . 'public/uploads/';
            if (! is_dir($path)) mkdir($path, 0775, true);
            $avatarFile->move($path, $filename);
            $post['avatar'] = $filename;
        } else { $post['avatar'] = null; }
        $rules['username'] = "required|is_unique[users.username,id,$id]";
        if (! $this->validate($rules)) {
            $model = new UserModel(); $user = $model->find($id);
            return view('users/form', ['title'=>'Edit User','heading'=>'Edit User','mode'=>'tfa','user'=>$user,'errors'=>$this->validator]);
        }
        $model = new UserModel(); $model->update($id, $post);
        return redirect()->to('/users')->with('message', 'User updated');
    }
}
