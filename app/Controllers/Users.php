<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        // Static PHP array as a temporary data source (stand-in for database)
        $users = [
            [
                'id'       => 1,
                'username' => 'admin',
                'fullName' => 'Admin User',
                'role'     => 'Administrator',
            ],
            [
                'id'       => 2,
                'username' => 'juan',
                'fullName' => 'Juan Dela Cruz',
                'role'     => 'Cashier',
            ],
            [
                'id'       => 3,
                'username' => 'maria',
                'fullName' => 'Maria Santos',
                'role'     => 'Cashier',
            ],
            [
                'id'       => 4,
                'username' => 'pedro',
                'fullName' => 'Pedro Reyes',
                'role'     => 'Manager',
            ],
            [
                'id'       => 5,
                'username' => 'sara',
                'fullName' => 'Sara Tan',
                'role'     => 'Inventory Staff',
            ],
        ];

        $data = [
            'title'    => 'User Accounts',
            'heading'  => 'User Accounts',
            'users'    => $users,
        ];

        return view('users/index', $data);
    }
}
