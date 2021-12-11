<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderPet;
use App\Models\PetInformartion;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

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
        $orders = $this->orders->get();
        return view('backend.admin.orders.index', compact('orders'));
    }

    public function view(Request $request, $id)
    {
        $orderPet = $this->orderPet->with('petInformation', 'petServices')
            ->where('order_id', $id)
            ->get();

        $services = $this->services->all();
        $customer = $this->customers->find($id);

        return view('backend.admin.orders.view', compact('orders', 'customer', 'services'));
    }

    public function create()
    {
        $services = $this->services->all();
        $customers = $this->customers->all();
        $petInfomation = $this->petInfo->all();
        return view('backend.admin.orders.create', compact('services', 'customers', 'petInfomation'));
    }

    public function store(Request $request)
    {
        $date = Carbon::parse($request->date.' '.$request->time)->format("Y-m-d H:i:s");

        $petInfomation = $this->petInfo->find($request->pet_id);

        $order = $this->orders->create([
            'customer_id' => $request->customer_id,
            'order_code' => "ORDER-LUPET-".rand(1, 100000),
            "payment_method" => $request->payment_method,
            "vocher_id" => isset($request->vocher_id) ? $request->vocher_id : "",
            'status' => Order::PROCESS,
            'date' => $date,
            'pile' => isset($request->pile) ? $request->pile : null,
            'total_price' => ($request->total_price_input)*$petInfomation->weight
        ]);

        if($order) {
            foreach ($request->service_id as $value) {
                $this->orderPet->create([
                    'order_id' => $order->id,
                    'pet_id' => $petInfomation->id,
                    'service_id' => $value,
                    'quantity' => $petInfomation->weight
                ]);
            }
        }

        return redirect()->back()->with('success', Lang::get('message.create', ['model' => 'Dịch vụ thú cưng']));
    }

    public function edit(Request $request)
    {
        $orderPet = $this->orderPet->with('petInformation', 'petServices')
            ->find($request->id);
        $services = $this->services->all();
        return view('backend.admin.orders.edit', compact('orderPet', 'services'));
    }

    public function delete($id)
    {
        $orderPet = $this->orderPet->where('order_pets.order_id', $id)->get();
        $orders = $this->orders->find($id);
        // $orders->delete();
        // $orderPet->delete();
        dd( $orders,$orderPet , $id);
        return redirect()->route('backend.admin.orders.view');
    }
}
