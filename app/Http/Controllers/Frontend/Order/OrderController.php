<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function __construct(type $ = null)
    // {
    //     $this-> = $;
    // }

    public function index()
    {
        return view('frontend/order/order');
    }
}
