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
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $customer = $this->customer->where('phone', "0$request->phone")->orWhere('email', $request->email)->first();

            if(!$customer){
                $customer = $this->customer->create([
                    "name"  =>  $request->name,
                    "phone" =>  "0$request->phone",
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

            Session::flash('success', 'Đặt lịch thành công !!!');

            $twilio = new Client($twilio_sid, $token);
            $message = $twilio->messages->create(
                "$request->phone", // Text this number
                [
                    'from' => $twilio_number, // From a valid Twilio number
                    'body' => "Cám ơn bạn đã đặt lịch ! Chúng tôi sẽ liên lạc với bạn lại sớm nhất ! Mã đơn hàng của bạn là $order->order_code"
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

    function checkHasPet(string $code)
    {
        $listPetInfo = $this->petInfo->where('code', $code)->first();
        if ($listPetInfo) {
            return true;
        }
        return false;
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
                "description" => "Thanh toán thành công !!!"
            ]);
            for ($i = 1; $i <= count($request->service_id); $i++) {
                $serviceId[] = $request->service_id[$i];
            }
            $customer = $this->customer->where('phone', "0$request->phone")->orWhere('email', $request->email)->first();

            if(!$customer){
                $customer = $this->customer->create([
                    "name"  =>  $request->name,
                    "phone" =>  "0$request->phone",
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
                    'is_paid' => Order::PAID,
                    'status' => Order::STATUS_PROCESS,
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

            Session::flash('success', 'Đặt lịch thành công !!!');
            Session::flash('pile', $pile);

            $twilio = new Client($twilio_sid, $token);
            $message = $twilio->messages->create(
                "+84$request->phone", // Text this number
                [
                    'from' => $twilio_number, // From a valid Twilio number
                    'body' => "Cám ơn bạn đã đặt lịch bên LupetCare !
                    Chúng tôi sẽ liên lạc với bạn lại sớm nhất ! Mã đơn hàng của bạn là $order->order_code ! Tiền cọc của bạn là $pile VNĐ
                    Vui lòng không chia sẻ mã đơn hàng này này cho bất kì ai !"
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
