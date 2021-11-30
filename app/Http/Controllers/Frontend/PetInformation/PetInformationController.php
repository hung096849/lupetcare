<?php

namespace App\Http\Controllers\Frontend\PetInformation;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PetInformartion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetInformationController extends Controller
{
    protected $petInformation;
    protected $orders;
    public function __construct(PetInformartion $petInformation, Order $orders)
    {
        $this->petInformation = $petInformation;
        $this->orders = $orders;
    }

    public function show()
    {
        $customer = Auth::guard('customers')->user();
        $orders = $this->orders->where('customer_id', $customer->id)->get();
        $orderPet = $orders->load('order_pets');
        
        return view('frontend/order_pet/index', compact('orders', 'customer'));
    }
}
