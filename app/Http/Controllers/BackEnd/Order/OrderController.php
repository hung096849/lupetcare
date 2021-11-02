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

    public function view(Request $request , $id)
    {
        $orders = $this->orders
        ->join('order_pets', 'orders.id', '=', 'order_pets.order_id')
        ->join('pet_informartions', 'order_pets.pet_id', '=', 'pet_informartions.id')
        ->select('orders.*', 'pet_informartions.name', 'order_pets.service_id')
        ->where('orders.customer_id', '=', $id)
        ->get();
        return view('backend.admin.orders.searchOrder', compact('orders'));
    }

    public function viewOrder(Request $request , $id)
    {
        $orders = $this->orders
        ->where('orders.id', '=', $id)
        ->join('order_pets', 'orders.id', '=', 'order_pets.order_id')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->join('pet_informartions', 'order_pets.pet_id', '=', 'pet_informartions.id')
        ->select('orders.*', 'customers.*', 'order_pets.*', 'pet_informartions.*')
        ->get();
        // dd($orders->id);
        return view('backend.admin.orders.viewOrder', compact('orders'));

    }


}
