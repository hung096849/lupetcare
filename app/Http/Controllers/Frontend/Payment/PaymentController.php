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
        dd($request->all());
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        // $twilio_number = getenv("TWILIO_NUMBER");

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "VND",
                "source" => $request->stripeToken,
                "description" => "Test Payment" 
        ]);
  
        Session::flash('success', 'Payment successful!');

        // $twilio = new Client($twilio_sid, $token);
        // $message = $twilio->messages->create(
        //     '+84962845342', // Text this number
        //     [
        //       'from' => $twilio_number,
        //       'body' => 'Thanh toán thành công !'
        //     ]
        //   );
          
        return back();
    }
}
