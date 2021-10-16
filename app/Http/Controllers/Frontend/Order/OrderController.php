<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $services
    public function __construct(type $ = null)
    {
        $this-> = $;
    }

    public function index(Request $request)
    {
        return view('frontend/order/order');
    }

    public function addForm()
    {
        dd(1);
    }
}
