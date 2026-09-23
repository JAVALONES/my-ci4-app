<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();
        $customers = $model->findAll();

        $data = [
            'title'     => 'Customer Accounts',
            'heading'   => 'Customer Accounts',
            'customers' => $customers,
        ];

        return view('customers/index', $data);
    }
}