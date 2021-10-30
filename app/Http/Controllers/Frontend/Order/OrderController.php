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
use Swift_IdGenerator;

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
        foreach ($request['code'] as $key => $value) {
            $this->petInfo->create([
                'code' => $value[0],
                'name' => $request['pet_name'][$key][0],
                'weight' => $request['weight'][$key][0],
                'gender' => $request['gender'][$key][0],
            ]);
        }
    }

    public function addForm(Request $request)
    {
        try {
                DB::beginTransaction();
                $customer = $this->customer->create([
                    "name"  =>  $request->name,
                    "phone" =>  $request->phone,
                    "email" =>  $request->email,
                    "note" =>   $request->note,
                    "status" => Customers::MEMBER,
                    'slug' => SlugService::createSlug(Customers::class, 'slug', $request->name),
                ]);
                $petName = [];
                $gender = [];
                $serviceId = [];
                $weight = [];
                $listPetInfo = $this->petInfo->all();

                foreach ($request->pet_name as $value) {
                    $petName[] = $value;
                }

                foreach ($request->gender as $value) {
                   $gender[] = $value;
                }

                foreach ($request->weight as $value) {
                    $weight[] = $value;
                }

                for ($i = 1 ; $i <= count($request->service_id) ; $i ++ ){
                        $serviceId[] = json_encode($request->service_id[$i]);
                }
                foreach ($request['code'] as $key => $value) {
                    foreach ($listPetInfo as $pet) {
                        if($value == $pet->code) {
                            $createPet = $this->petInfo->update([
                                'code'    => IdGenerator::generate(['table' => 'pet_informartions', 'field'=>'code', 'length' => 10, 'prefix' => "LUPETCARE-"]),
                                'name' => $request['pet_name'][$key][0],
                                'weight' => $request['weight'][$key][0],
                                'gender' => $request['gender'][$key][0],
                            ]);
                        } else {
                            $createPet = $this->petInfo->create([
                                'code'    => IdGenerator::generate(['table' => 'pet_informartions', 'field'=>'code', 'length' => 10, 'prefix' => "LUPETCARE-"]),
                                'name' => $request['pet_name'][$key][0],
                                'weight' => $request['weight'][$key][0],
                                'gender' => $request['gender'][$key][0],
                            ]);

                            if($createPet) {
                                $this->orders->create([
                                    'vocher_id' => 1,
                                    'customer_id' => 1,
                                    'pet_id' => 1,
                                    "payment_method" => 1,
                                    'is_paid' => 1,
                                    'status' => 1,
                                ]);
                            }
                            $this->orderPet->create([
                                'order_id'  => 1,
                                'pet_id'     => 1,
                                'service_id' => $serviceId[0]
                            ]);
                        }
                    }
                }
            DB::commit();
            Session::flash(
                'success', 'Đặt lịch thành công !!!',
            );
            return back();
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('message', $th->getMessage());
            return back();
        }
    }
}
