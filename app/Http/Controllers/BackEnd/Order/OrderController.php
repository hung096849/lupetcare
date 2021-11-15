<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderPet;
use App\Models\PetInformartion;
use App\Models\Services;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $services;
    protected $customer;
    protected $petInfo;
    protected $orderPet;
    protected $orders;
    public function __construct(
        Services $services,
        Customers $customers,
        PetInformartion $petInfo,
        OrderPet $orderPet,
        Order $orders
    ) {
        $this->services = $services;
        $this->customers = $customers;
        $this->petInfo = $petInfo;
        $this->orderPet = $orderPet;
        $this->orders = $orders;
    }

    public function index()
    {
        $customers = $this->orders
            ->select('customer_id', DB::raw('count(*) as total'))
            ->groupBy('customer_id')
            ->get();
        return view('backend.admin.orders.index', compact('customers'));
    }

    public function view(Request $request, $id)
    {
        $orders = $this->orders
            ->where('orders.customer_id', '=', $id)
            ->get();
        $services = $this->services->all();
        $customer = $this->customers->find($id);
        $petInfo = $this->petInfo->all();
        return view('backend.admin.orders.view', compact('orders', 'customer', 'services', 'petInfo'));
    }

    public function create()
    {
        $services = $this->services->all();
        $customers = $this->customers->all();
        return view('backend.admin.orders.create', compact('services', 'customers'));
    }


    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            for ($i = 1; $i <= count($request->service_id); $i++) {
                $serviceId[] = $request->service_id[$i];
            }

            foreach ($request['code'] as $key => $value) {
                $createPet = $this->petInfo->create([
                    'code' => 'LUPETCARE-' . rand(1, 1000),
                    'name' => $request['pet_name'][$key][0],
                    'weight' => $request['weight'][$key][0],
                    'gender' => $request['gender'][$key][0],
                ]);
                $idPet[] = $createPet->id;
            }


            $order = $this->orders->create([
                'vocher_id' => 1,
                'customer_id' => $request->customer_id,
                "payment_method" => $request->payment_method,
                'is_paid' => 1,
                'date' => $request->date,
                'status' => 1,
            ]);

            foreach ($serviceId as $key => $value) {
                foreach ($value as $service) {
                    $this->orderPet->create([
                        'order_id'  => $order->id,
                        'pet_id'     => $idPet[$key],
                        'service_id' => $service,
                        'quantity' => 1
                    ]);
                }
            }

            DB::commit();
            Session::flash(
                'success',
                'Đặt lịch thành công !!!',
            );

            return back();
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('message', $th->getMessage());
            return back();
        }
    }

    public function edit(Request $request)
    {
        $petInfo = $this->orderPet->where('order_id', $request->order_id)->get();
        if($petInfo){
            foreach ($petInfo as $key => $value) {
                $petId[] = $value->pet_id;
                $serviceId[] = $value->service_id;
            }
        }
        dump($petId);
        dd($serviceId);
    } 

    public function delete($id)
    {
        $orderPet = $this->orderPet->where('order_pets.order_id', $id)->get();
        $orders = $this->orders->find($id);
        // $orders->delete();
        // $orderPet->delete();
        dd( $orders,$orderPet , $id);
        return redirect()->route('backend.admin.services.view');
    }
}
