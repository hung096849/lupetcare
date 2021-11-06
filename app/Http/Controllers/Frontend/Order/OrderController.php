<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderPet;
use App\Models\PetInformartion;
use App\Models\Services;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Twilio\Rest\Client;
use Illuminate\Support\Collection;
class OrderController extends Controller
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

    public function index()
    {
        $services = $this->services->all();
        return view('frontend/order/order', compact('services'));
    }

    function checkHasPet(string $code) {
        $listPetInfo = $this->petInfo->where('code', $code)->first();
        if ($listPetInfo) {
            return true;
        }
        return false;
    }

    public function addForm2(Request $request) {
        try {
            DB::beginTransaction();
            // $token = getenv("TWILIO_AUTH_TOKEN");
            // $twilio_sid = getenv("TWILIO_SID");
            // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            // $twilio_number = getenv("TWILIO_NUMBER");

            $customer = $this->customer->get();
            
            $customerForm = $this->customer->create([
                "name"  =>  $request->name,
                "phone" =>  $request->phone,
                "email" =>  $request->email,
                "note" =>   $request->note,
                "status" => Customers::MEMBER,
                'slug' => SlugService::createSlug(Customers::class, 'slug', $request->name),
            ]);

            for ($i = 1 ; $i <= count($request->service_id) ; $i ++ ){
                $serviceId[] = $request->service_id[$i];
            }

            foreach ($request['code'] as $key => $value) {
                    // if($this->checkHasPet($value[0])){
                    // $createPet = $this->petInfo->where('code', $value[0])->update([
                    //     // 'code' => $value[0],
                    //     'name' => $request['pet_name'][$key][0],
                    //     'weight' => $request['weight'][$key][0],
                    //     'gender' => $request['gender'][$key][0],
                    // ]);
                    // }
                    $createPet = $this->petInfo->create([
                        'code' => 'LUPETCARE-'.rand(1,1000),
                        'name' => $request['pet_name'][$key][0],
                        'weight' => $request['weight'][$key][0],
                        'gender' => $request['gender'][$key][0],
                    ]);
                    $idPet[] = $createPet->id;
                }
                if($createPet) {
                        $order = $this->orders->create([
                            'vocher_id' => 1,
                            'customer_id' => isset($customer->email) || isset($customer->phone) ? $customer->id : $customerForm->id,
                            "payment_method" => 1,
                            'is_paid' => 1,
                            'status' => 1,
                        ]);
<<<<<<< HEAD

                        foreach ($serviceId as $key => $service) {
                            $this->orderPet->create([
                                'order_id'  => $order->id,
                                'pet_id'     => $idPet[$key],
                                'service_id' => $service
                            ]);
=======
                        
                        foreach ($serviceId as $key => $value) {
                            foreach ($value as $service) {
                                $this->orderPet->create([
                                    'order_id'  => $order->id,
                                    'pet_id'     => $idPet[$key],
                                    'service_id' => $service,
                                    'quantity' => 1
                                ]);
                            }
>>>>>>> 3753c01988b47605c05f2bf52a11987004686ea6
                        }
                    }
            DB::commit();
            Session::flash(
                'success', 'Đặt lịch thành công !!!',
            );
            // $twilio = new Client($twilio_sid, $token);
            // $message = $twilio->messages->create(
            //     '+84962845342', // Text this number
            //     [
            //       'from' => $twilio_number, // From a valid Twilio number
            //       'body' => 'Test send sms !'
            //     ]
            //   );

            return back();
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('message', $th->getMessage());
            return back();
        }
    }
}
