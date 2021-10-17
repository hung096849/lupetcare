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
class OrderController extends Controller
{
    protected $services;
    protected $customer;
    protected $petInfo;
    protected $orderPet;
    protected $orders;
    public function __construct(Services $services, Customers $customer, PetInformartion $petInfo, OrderPet $orderPet, Order $orders)
    {
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
                
                $petName = $request->pet_name;
                $gender = $request->gender;
                $serviceId = $request->service_id;
                $weight = $request->weight;
                for ($i=0; $i < count($petName) ; $i++) { 
                    $petInfo = $this->petInfo->create([
                        'code'    => IdGenerator::generate(['table' => 'pet_informartions', 'field'=>'code', 'length' => 6, 'prefix' => "PET-$i"]),
                        "name"  =>  $petName[$i],
                        "gender" =>  $gender[$i],
                        "service_id" => $serviceId[$i],
                        "weight" =>   $weight[$i],
                        'slug' => SlugService::createSlug(PetInformartion::class, 'slug', $petName[$i]),
                    ]);
                }
                // $petInfo = $this->petInfo->create([
                //     'code'    => IdGenerator::generate(['table' => 'pet_informartions', 'field'=>'code', 'length' => 6, 'prefix' => "PET-"]),
                //     "name"  =>  $request->pet_name,
                //     "gender" =>  $request->gender,
                //     "service_id" =>   $request->service_id,
                //     "weight" =>   $request->weight,
                //     'slug' => SlugService::createSlug(PetInformartion::class, 'slug', $request->pet_name),
                // ]);

                // if($customer && $petInfo) {
                //     $order = $this->orders->create([
                //         'services_id' => $request->service_id,
                //         'customer_id' => $customer->id,
                //         'time' => $request->time,
                //         'date' => $request->date,
                //     ]);
                // }
            

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
