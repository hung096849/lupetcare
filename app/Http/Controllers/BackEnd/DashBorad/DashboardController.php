<?php

namespace App\Http\Controllers\Backend\DashBorad;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $customers;
    protected $orders;
    public function __construct(Order $orders, Customers $customers)
    {
        $this->customers = $customers;
        $this->orders = $orders;
    }

    public function index() {
        $customers = $this->customers->all();
        $orders = $this->orders->all();
        return view('backend/admin/dashboard/index', compact('orders', 'customers'));
    }
}
