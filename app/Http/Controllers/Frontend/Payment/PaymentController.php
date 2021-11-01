<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class PaymentController extends Controller
{
    //
    public function getPayment()
    {
        return view('frontend/payment/payment');
    }

    public function postPayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "VND",
                "source" => $request->stripeToken,
                "description" => "Test Payment" 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
