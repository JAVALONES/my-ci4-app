<?php
namespace App\Controllers;

use App\Models\SaleModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;

class Sales extends BaseController
{
    protected $saleModel;
    protected $productModel;
    protected $customerModel;

    public function __construct()
    {
        $this->saleModel    = new SaleModel();
        $this->productModel = new ProductModel();
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $sales = $db->table('sales s')
            ->select('s.*, p.name as product_name, p.price as unit_price, c.full_name as customer_name')
            ->join('products p', 'p.id = s.product_id')
            ->join('customers c', 'c.id = s.customer_id')
            ->orderBy('s.created_at', 'DESC')
            ->get()
            ->getResultArray();

        $totalRevenue = $db->table('sales')->selectSum('total_price', 'total')->get()->getRow()->total;

        $data = [
            'title'    => 'Sales History',
            'heading'  => 'Sales History',
            'sales'    => $sales,
            'totalRevenue' => $totalRevenue ?? 0,
        ];
        return view('sales/index', $data);
    }

    public function recordSale()
    {
        $data = [
            'title'    => 'Record Sale',
            'heading'  => 'Record a Sale',
            'products'   => $this->productModel->where('stock_quantity >', 0)->findAll(),
            'customers'  => $this->customerModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('sales/record', $data);
    }

    public function processSale()
    {
        $rules = [
            'product_id'  => 'required|is_not_unique[products.id]',
            'customer_id' => 'required|is_not_unique[customers.id]',
            'quantity'    => 'required|integer|greater_than[0]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        $product = $this->productModel->find($this->request->getPost('product_id'));
        $quantity = (int) $this->request->getPost('quantity');

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if ($product['stock_quantity'] < $quantity) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Insufficient stock. Available: ' . $product['stock_quantity']);
        }

        $totalPrice = $product['price'] * $quantity;

        $this->saleModel->save([
            'product_id'  => $product['id'],
            'customer_id' => $this->request->getPost('customer_id'),
            'sold_by'     => session()->get('username') ?? 'staff',
            'quantity'    => $quantity,
            'total_price' => $totalPrice,
        ]);

        // Decrease stock
        $this->productModel->update($product['id'], [
            'stock_quantity' => $product['stock_quantity'] - $quantity,
        ]);

        return redirect()->to('/sales')->with('success', 'Sale recorded. Total: $' . number_format($totalPrice, 2));
    }
}
