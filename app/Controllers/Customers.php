<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        // Static PHP array as a temporary data source (stand-in for database)
        $customers = [
            [
                'id'    => 1,
                'name'  => 'Alice Dela Cruz',
                'email' => 'alice@example.com',
                'phone' => '0917-123-4567',
            ],
            [
                'id'    => 2,
                'name'  => 'Bob Santos',
                'email' => 'bob.santos@example.com',
                'phone' => '0918-234-5678',
            ],
            [
                'id'    => 3,
                'name'  => 'Carol Reyes',
                'email' => 'carol.reyes@example.com',
                'phone' => '0919-345-6789',
            ],
            [
                'id'    => 4,
                'name'  => 'David Tan',
                'email' => 'david.tan@example.com',
                'phone' => '0920-456-7890',
            ],
            [
                'id'    => 5,
                'name'  => 'Elena Martinez',
                'email' => 'elena.martinez@example.com',
                'phone' => '0921-567-8901',
            ],
        ];

        $data = [
            'title'     => 'Customer Accounts',
            'heading'   => 'Customer Accounts',
            'customers' => $customers,
        ];

        return view('customers/index', $data);
    }
}
