<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class TestController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/api/testing/{mytest}",
     *   summary="Get Testing",
     *   operationId="testing",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
	 *		@SWG\Parameter(
     *          name="mytest",
     *          in="path",
     *          required=true, 
     *          type="string" 
     *      ),
     * )
     *
     */
    
	public function index(Request $request){

        $gateway = Omnipay::create('MoMo_AllInOne');
        $gateway->initialize([
            'accessKey' => 'dIyoXZmuJ6zlvXE0',
            'partnerCode' => 'rwFz9gXJ04Csy8ztS40J2hDtgCkbtuUt',
            'secretKey' => 'MOMOJMLG20211102',
        ]);


        $response = $gateway->purchase([
            'amount' => 20000,
            'returnUrl' => 'http://127.0.0.1:8000/thanh-toan-thanh-cong/',
            'notifyUrl' => 'http://127.0.0.1:8000/ipn/',
            'orderId' => 'Test',
            'requestId' => '1',
        ])->send();

        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
        }

        return view('test');
        
	}
}
