<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $user = $model->first();

        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];

        return view('profile/index', $data);
    }
}
