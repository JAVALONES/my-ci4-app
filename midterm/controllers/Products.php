<?php
namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Product Catalog',
            'heading' => 'Products',
            'products' => $this->productModel->orderBy('name')->findAll(),
        ];
        return view('products/index', $data);
    }

    public function new()
    {
        $data = [
            'title'   => 'Add Product',
            'heading' => 'Add New Product',
            'product' => null,
            'validation' => \Config\Services::validation(),
        ];
        return view('products/form', $data);
    }

    public function create()
    {
        $rules = [
            'name'           => 'required|min_length[2]',
            'price'          => 'required|numeric|greater_than[0]',
            'stock_quantity' => 'required|integer|greater_than[-1]',
            'image'          => 'is_image[image]|mime_in[image, image/jpg,image/jpeg,image/png,image/gif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/products/new')
                ->withInput()
                ->with('validation', $this->validator);
        }

        $imageName = null;
        if ($this->request->getFile('image')->isValid()) {
            $file = $this->request->getFile('image');
            $imageName = $file->getRandomizedName();
            $file->move(FCPATH . 'uploads', $imageName);
        }

        $this->productModel->save([
            'name'           => $this->request->getPost('name'),
            'price'          => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'image'          => $imageName,
        ]);

        return redirect()->to('/products')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product #{$id} not found.");
        }

        $data = [
            'title'   => 'Edit Product',
            'heading' => 'Edit Product',
            'product' => $product,
            'validation' => \Config\Services::validation(),
        ];
        return view('products/form', $data);
    }

    public function update($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product #{$id} not found.");
        }

        $rules = [
            'name'           => 'required|min_length[2]',
            'price'          => 'required|numeric|greater_than[0]',
            'stock_quantity' => 'required|integer|greater_than[-1]',
            'image'          => 'is_image[image]|mime_in[image, image/jpg,image/jpeg,image/png,image/gif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/products/new')
                ->withInput()
                ->with('validation', $this->validator);
        }

        $imageName = $product['image'];
        if ($this->request->getFile('image')->isValid()) {
            if ($product['image'] && file_exists(FCPATH . 'uploads/' . $product['image'])) {
                unlink(FCPATH . 'uploads/' . $product['image']);
            }
            $file = $this->request->getFile('image');
            $imageName = $file->getRandomizedName();
            $file->move(FCPATH . 'uploads', $imageName);
        }

        $this->productModel->update($id, [
            'name'           => $this->request->getPost('name'),
            'price'          => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'image'          => $imageName,
        ]);

        return redirect()->to('/products')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product #{$id} not found.");
        }

        if ($product['image'] && file_exists(FCPATH . 'uploads/' . $product['image'])) {
            unlink(FCPATH . 'uploads/' . $product['image']);
        }

        $this->productModel->delete($id);

        return redirect()->to('/products')->with('success', 'Product deleted successfully.');
    }
}
