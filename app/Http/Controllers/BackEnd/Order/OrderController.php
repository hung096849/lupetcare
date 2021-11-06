<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderPet;
use App\Models\PetInformartion;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $services;
    protected $customer;
    protected $petInfo;
    protected $orderPet;
    protected $orders;
    public function __construct(
        Services $services,
        Customers $customers,
        PetInformartion $petInfo,
        OrderPet $orderPet,
        Order $orders
    ) {
        $this->services = $services;
        $this->customers = $customers;
        $this->petInfo = $petInfo;
        $this->orderPet = $orderPet;
        $this->orders = $orders;
    }

    public function index()
    {
        $customers = $this->orders
        ->select('customer_id', DB::raw('count(*) as total'))
        ->groupBy('customer_id')
        ->get();
        return view('backend.admin.orders.index', compact('customers'));
    }

    public function view(Request $request , $id)
    {
        $orders = $this->orders
        ->where('orders.customer_id', '=', $id)
        ->get();
        $customer = $this->customers->find($id);
        return view('backend.admin.orders.searchOrder', compact('orders','customer'));
    }

}
