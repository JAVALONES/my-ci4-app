<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->findAll();

        $data = [
            'title'     => 'User Accounts',
            'heading'   => 'User Accounts',
            'users'     => $users,
        ];

        return view('users/index', $data);
    }
}