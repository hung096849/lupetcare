<?php

namespace App\Http\Controllers\Frontend\PetInformation;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPet;
use App\Models\PetInformartion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetInformationController extends Controller
{
    protected $petInformation;
    protected $orders;
    protected $orderPet;
    public function __construct(PetInformartion $petInformation, Order $orders, OrderPet $orderPet)
    {
        $this->petInformation = $petInformation;
        $this->orders = $orders;
        $this->orderPet = $orderPet;
    }

    public function info()
    {
        
        $petInformation = $this->petInformation->where('customer_id', Auth::guard('customers')->user()->id)->get();

        dd($petInformation);
    }

    public function show()
    {
        $customer = Auth::guard('customers')->user();
        $orders = $this->orders->with('order_pets')->where('customer_id', $customer->id)->get();

        return view('frontend/order_pet/index', compact('orders', 'customer'));
    }


    public function showDetail(Request $request)
    {
        $order = $this->orders->find($request->id);
        $orderPet = $this->orderPet->where('order_id', $request->id)->get();

        return view('frontend/order_pet/orderDetailCustomer', compact('order', 'orderPet'));
    }
}
