<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderPet;
use App\Models\PetInformartion;
use App\Models\Services;
use Illuminate\Http\Request;

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
        $customers = $this->customers->paginate(5);
        return view('backend.admin.orders.index', compact('customers'));
    }

    public function view(Request $request)
    {
        $orders = $this->orders->get();
        dd($orders);
        return view('backend.admin.orders.searchOrder', compact('orders'));
    }


}
