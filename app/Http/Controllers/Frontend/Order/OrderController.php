<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Order\CustomerFormRequest;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderPet;
use App\Models\PetInformartion;
use App\Models\RecurringEvent;
use App\Models\Services;
use App\Models\Sms;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Stripe;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
class OrderController extends Controller
{
    protected $services;
    protected $customer;
    protected $petInfo;
    protected $orderPet;
    protected $orders;
    protected $chedule;
    public function __construct(
        Services $services,
        Customers $customer,
        PetInformartion $petInfo,
        OrderPet $orderPet,
        Order $orders,
        RecurringEvent $chedule
    ) {
        $this->services     = $services;
        $this->customer     = $customer;
        $this->petInfo      = $petInfo;
        $this->orderPet     = $orderPet;
        $this->orders       = $orders;
        $this->chedule      = $chedule;
    }

    public function index()
    {
        $services = $this->services->all();
        return view('frontend/order/order', compact('services'));
    }

    public function orderNormal()
    {
        $services = $this->services->all();
        return view('frontend/order/order-normal', compact('services'));
    }

    public function addFormNormal(Request $request)
    {
        try {
            DB::beginTransaction();
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio_number = getenv("TWILIO_NUMBER");
            $totalPrice = $request->total_price;
            $date = Carbon::parse($request->date.' '.$request->time)->format("Y-m-d H:i:s");

            for ($i = 1; $i <= count($request->service_id); $i++) {
                $serviceId[] = $request->service_id[$i];
            }
            $customer = $this->customer->where('phone', "$request->phone")->orWhere('email', $request->email)->first();

            if(!$customer){
                $customer = $this->customer->create([
                    "name"  =>  $request->name,
                    "phone" =>  "$request->phone",
                    "email" =>  $request->email,
                    "note" =>   $request->note,
                    "status" => Customers::MEMBER,
                    'slug' => Str::slug($request->name),
                ]);
            }
            $customerId = $customer->id;
            
            foreach ($request['code'] as $key => $value) {
                if($this->checkHasPet($value[0])){
                    $createPet = $this->petInfo->where('code', $value[0])->first();
                    $createPet->update([
                        'name' => $request['pet_name'][$key][0],
                        'weight' => $request['weight'][$key][0],
                        'gender' => $request['gender'][$key][0],
                    ]);
                }else{
                    $createPet = $this->petInfo->create([
                        'code' => 'LUPETCARE-' . rand(1, 10000),
                        'name' => $request['pet_name'][$key][0],
                        'weight' => $request['weight'][$key][0],
                        'gender' => $request['gender'][$key][0],
                    ]);
                }
                
                $idPet[] = $createPet->id;
                $quantity[] = $createPet->weight;
            }
            
            if ($createPet) {
                $order = $this->orders->create([
                    'order_code' => "ORDER-LUPET-".rand(1, 100000),
                    'vocher_id' => 1,
                    'customer_id' => $customerId,
                    "payment_method" => Order::CARD,
                    'is_paid' => Order::UNPAID,
                    'status' => Order::STATUS_IN_PROCESS,
                    'date' => $date,
                    'pile' => null,
                    'total_price' => $totalPrice
                ]);
                foreach ($serviceId as $key => $value) {
                    foreach ($value as $service) {
                        $this->orderPet->create([
                            'order_id'  => $order->id,
                            'pet_id'     => $idPet[$key],
                            'service_id' => $service,
                            'quantity' => $quantity[$key]
                        ]);
                    }
                }
            }

            Session::flash('success', Lang::get('message.bookService'));
            $content = "C??m ??n b???n ???? ?????t l???ch ! Ch??ng t??i s??? li??n l???c v???i b???n l???i s???m nh???t ! M?? ????n h??ng c???a b???n l?? $order->order_code";
            Sms::create([
                'order_code'    => $order->order_code,
                'name'          => $customer->name,
                'phone'         => $customer->phone,
                'content'       => $content,
            ]);

            $twilio = new Client($twilio_sid, $token);
            $message = $twilio->messages->create(
                "+84962845342", // Text this number
                // +84$request->phone
                [
                    'from' => $twilio_number, // From a valid Twilio number
                    'body' => $content
                ]
            );
            
            DB::commit();
            return redirect()->back();
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('message', $th->getMessage());
            return back();
        }
    }

    function checkHasPet(string $code = null)
    {
        if($code !== null) {
            $listPetInfo = $this->petInfo->where('code', $code)->first();
            if ($listPetInfo) {
                return true;
            }
            return false;
        }
    }

    public function checkValidateForm(CustomerFormRequest $request)
    {
        $data = $request->all();
        return response()->json([
            'status' => 200,
            'data' => $data,
            'message' => 'success'
        ]);
    }

    function addForm(Request $request)
    {
        try {
            DB::beginTransaction();
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio_number = getenv("TWILIO_NUMBER");
            $pile = $request->pile ? $request->pile : "";
            $totalPrice = $request->total_price;
            $date = Carbon::parse($request->date.' '.$request->time)->format("Y-m-d H:i:s");

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create([
                "amount" => $pile,
                "currency" => "VND",
                "source" => $request->stripeToken ? $request->stripeToken : "",
                "description" => "Thanh to??n th??nh c??ng !!!"
            ]);
            for ($i = 1; $i <= count($request->service_id); $i++) {
                $serviceId[] = $request->service_id[$i];
            }
            $customer = $this->customer->where('phone', "$request->phone")->orWhere('email', $request->email)->first();

            if(!$customer){
                $customer = $this->customer->create([
                    "name"  =>  $request->name,
                    "phone" =>  "$request->phone",
                    "email" =>  $request->email,
                    "note" =>   $request->note,
                    "status" => Customers::MEMBER,
                    'slug' => Str::slug($request->name),
                ]);
            }
            $customerId = $customer->id;
            foreach ($request['code'] as $key => $value) {
                
                if($this->checkHasPet($value[0])){
                    $createPet = $this->petInfo->where('code', $value[0])->first();
                    $createPet->update([
                        'name' => $request['pet_name'][$key][0],
                        'weight' => $request['weight'][$key][0],
                        'gender' => $request['gender'][$key][0],
                    ]);
                }else{
                    $createPet = $this->petInfo->create([
                        'code' => 'LUPETCARE-' . rand(1, 10000),
                        'name' => $request['pet_name'][$key][0],
                        'weight' => $request['weight'][$key][0],
                        'gender' => $request['gender'][$key][0],
                    ]);
                }

                $idPet[] = $createPet->id;
                $quantity[] = $createPet->weight;
            }

            if ($createPet) {
                $order = $this->orders->create([
                    'order_code' => "ORDER-LUPET-".rand(1, 100000),
                    'vocher_id' => 1,
                    'customer_id' => $customerId,
                    "payment_method" => Order::CARD,
                    'is_paid' => Order::PILE,
                    'status' => Order::STATUS_PRIORITIZE,
                    'date' => $date,
                    'pile' => $pile,
                    'total_price' => $totalPrice
                ]);
                foreach ($serviceId as $key => $value) {
                    foreach ($value as $service) {
                        $this->orderPet->create([
                            'order_id'  => $order->id,
                            'pet_id'     => $idPet[$key],
                            'service_id' => $service,
                            'quantity' => $quantity[$key]
                        ]);
                    }
                }
            }

            Session::flash('success', Lang::get('message.bookService'));
            Session::flash('pile', $pile);
            $content = "C??m ??n b???n ???? ?????t l???ch b??n LupetCare !
            Ch??ng t??i s??? li??n l???c v???i b???n l???i s???m nh???t ! M?? ????n h??ng c???a b???n l?? $order->order_code !
            Ti???n c???c c???a b???n l?? ".number_format($pile)."VN??
            Vui l??ng kh??ng chia s??? m?? ????n h??ng n??y n??y cho b???t k?? ai !";
            
            Sms::create([
                'order_code'    => $order->order_code,
                'name'          => $customer->name,
                'phone'         => $customer->phone,
                'content'       => $content,
            ]);
            
            $twilio = new Client($twilio_sid, $token);
            $message = $twilio->messages->create(
                "+84962845342", // Text this number
                // "+84$request->phone"
                [
                    'from' => $twilio_number, // From a valid Twilio number
                    'body' => $content
                ]
            );
            DB::commit();
            return back();
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('message', $th->getMessage());
            return back();
        }
    }
}
