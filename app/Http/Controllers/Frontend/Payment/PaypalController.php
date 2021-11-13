<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class PaypalController extends Controller
{
    //
    public function getPaypal(){
        return view('frontend.payment.paypal');
    }
}
