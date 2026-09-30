<?php
namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    protected $validation;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $model = new CustomerModel();
        $customers = $model->findAll();
        $data = [
            'title'     => 'Customer Accounts',
            'heading'   => 'Customer Accounts',
            'customers' => $customers,
            'mode'      => 'tfa',
        ];
        return view('customers/index', $data);
    }

    public function new()
    {
        $data = [
            'title'     => 'New Customer',
            'heading'   => 'New Customer',
            'mode'      => 'tfa',
            'customer'  => null,
        ];
        return view('customers/form', $data);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'permit_empty',
        ];
        if (! $this->validate($rules)) {
            return view('customers/form', [
                'title'     => 'New Customer',
                'heading'   => 'New Customer',
                'mode'      => 'tfa',
                'customer'  => null,
                'errors'    => $this->validator,
                'old'       => $this->request->getPost(),
            ]);
        }
        $model = new CustomerModel();
        $model->insert($this->request->getPost());
        return redirect()->to('/customers')->with('message', 'Customer created');
    }

    public function edit($id = null)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);
        if (! $customer) {
            return redirect()->to('/customers');
        }
        $data = [
            'title'     => 'Edit Customer',
            'heading'   => 'Edit Customer',
            'mode'      => 'tfa',
            'customer'  => $customer,
            'errors'    => null,
            'old'       => $customer,
        ];
        return view('customers/form', $data);
    }

    public function update($id = null)
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'permit_empty',
        ];
        if (! $this->validate($rules)) {
            $model = new CustomerModel();
            $customer = $model->find($id);
            return view('customers/form', [
                'title'     => 'Edit Customer',
                'heading'   => 'Edit Customer',
                'mode'      => 'tfa',
                'customer'  => $customer,
                'errors'    => $this->validator,
                'old'       => array_merge((array)$customer, $this->request->getPost()),
            ]);
        }
        $model = new CustomerModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/customers')->with('message', 'Customer updated');
    }
}
