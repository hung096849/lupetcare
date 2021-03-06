<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderPet;
use App\Models\PetInformartion;
use App\Models\Services;
class PaymentController extends Controller
{
    protected $services;
    protected $customer;
    protected $petInfo;
    protected $orderPet;
    protected $orders;
    public function __construct(
        Services $services,
        Customers $customer,
        PetInformartion $petInfo,
        OrderPet $orderPet,
        Order $orders
    ) {
        $this->services = $services;
        $this->customer = $customer;
        $this->petInfo = $petInfo;
        $this->orderPet = $orderPet;
        $this->orders = $orders;
    }

    public function getPayment()
    {
        return view('frontend/payment/payment');
    }

    public function postPayment(Request $request)
    {
        try {
            // DB::beginTransaction();
            // // $token = getenv("TWILIO_AUTH_TOKEN");
            // // $twilio_sid = getenv("TWILIO_SID");
            // // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            // // $twilio_number = getenv("TWILIO_NUMBER");
            // // dd($request->all());

            // // $customer = $this->customer->where('email', $request->email)->where('phone', $request->phone)->first();
            // $total = $request->total;
            
            // // $customerForm = $this->customer->create([
            // //     "name"  =>  'abs',
            // //     "phone" =>  $request->phone,
            // //     "email" =>  $request->email,
            // //     "note" =>   $request->note,
            // //     "status" => Customers::MEMBER,
            // //     'slug' => SlugService::createSlug(Customers::class, 'slug', 'abs'),
            // // ]);

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => 1000 * 100,
                    "currency" => "VND",
                    "source" => $request->stripeToken,
                    "description" => "Test Payment" 
            ]);

            // for ($i = 1 ; $i <= count($request->service_id) ; $i ++ ){
            //     $serviceId[] = $request->service_id[$i];
            // }

            // foreach ($request['code'] as $key => $value) {
            //         // if($this->checkHasPet($value[0])){
            //         // $createPet = $this->petInfo->where('code', $value[0])->update([
            //         //     // 'code' => $value[0],
            //         //     'name' => $request['pet_name'][$key][0],
            //         //     'weight' => $request['weight'][$key][0],
            //         //     'gender' => $request['gender'][$key][0],
            //         // ]);
            //         // }
                    
            //         $createPet = $this->petInfo->create([
            //             'code' => 'LUPETCARE-'.rand(1,1000),
            //             'name' => $request['pet_name'][$key][0],
            //             'weight' => $request['weight'][$key][0],
            //             'gender' => $request['gender'][$key][0],
            //         ]);
            //         $idPet[] = $createPet->id;
            //         $quantity[] = $createPet->weight;
            //     }
            //     dd($createPet);
            //     if($createPet) {
            //             $order = $this->orders->create([
            //                 'vocher_id' => 1,
            //                 'customer_id' => 1,
            //                 "payment_method" => 1,
            //                 'is_paid' => 1,
            //                 'status' => 1,
            //                 'date' => null,
            //                 'time' => null
            //             ]);
            //             foreach ($serviceId as $key => $value) {
            //                 foreach ($value as $service) {
            //                     $orderPetInfo = $this->orderPet->create([
            //                         'order_id'  => $order->id,
            //                         'pet_id'     => $idPet[$key],
            //                         'service_id' => $service,
            //                         'quantity' => $quantity[$key]
            //                     ]);
            //                 }
            //             }
            //         }
            // DB::commit();
            Session::flash('success', '?????t l???ch th??nh c??ng !!!');
            Session::flash('total', '1000');
            // );
            // // $twilio = new Client($twilio_sid, $token);
            // // $message = $twilio->messages->create(
            // //     '+84962845342', // Text this number
            // //     [
            // //       'from' => $twilio_number, // From a valid Twilio number
            // //       'body' => 'Test send sms !'
            // //     ]
            // //   );

            return back();
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('message', $th->getMessage());
            return back();
        }
    }
}
