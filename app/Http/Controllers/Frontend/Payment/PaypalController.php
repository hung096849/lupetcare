<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    //
    public function getPaypal(){
        return view('frontend.payment.paypal');
    }
}
