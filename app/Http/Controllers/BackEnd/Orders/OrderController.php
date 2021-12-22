<?php

namespace App\Http\Controllers\Backend\Orders;

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
        $orders = $this->orders->orderBy('status', "DESC")->paginate(10);
        return view('backend.admin.orders.index', compact('orders'));
    }

    public function view(Request $request, $id)
    {
        $orderPet = $this->orderPet->with('petInformation', 'petServices')
            ->where('order_id', $id)
            ->get();
        $orders = $this->orders->find($id);
        return view('backend.admin.orders.view', compact('orderPet', 'orders'));
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
            'status' => $request->status,
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
        $order = $this->orders->find($request->id);
        return view('backend.admin.orders.edit', compact('order'));
    }

    public function updateOrder(Request $request)
    {
        $order = $this->orders->find($request->id);
        $order->update([
            'status' => $request->status,
            'is_paid' => $request->is_paid,
        ]);
        return redirect()->back()->with('success', Lang::get('message.update', ['model' => 'Dịch vụ thú cưng']));
    }

    public function update(Request $request)
    {
        $orderPet = $this->orderPet->find($request->id);
        $orderPet->update([
            'service_id' => $request->service_id,
        ]);

        $orders = $this->orders->find($orderPet->order->id);
        $orders->update([
            'total_price' => '1'
        ]);
        return redirect()->back()->with('success', Lang::get('message.update', ['model' => 'Dịch vụ thú cưng']));
    }

    public function insert()
    {
        $petInfo = $this->petInfo->all();
        $services = $this->services->all();
        $order = $this->orders->where('status', Order::STATUS_IN_PROCESS)->orWhere('status', Order::STATUS_PRIORITIZE)->get();
        
        return view('backend.admin.orders.insert', compact('petInfo', 'services', 'order'));
    }

    public function insertStore(Request $request)
    {
        $petInformation = $this->petInfo->find($request->pet_id);
        $service = $this->services->find($request->service_id);
        $orders = $this->orders->find($request->order_id);

        $orders->update([
            'total_price' => ($orders->total_price)+($petInformation->weight*$service->price)
        ]);

        $this->orderPet->create([
            'order_id' => $orders->id,
            'pet_id' => $petInformation->id,
            'service_id' => $request->service_id,
            'quantity' => $petInformation->weight
        ]);
        return redirect()->back()->with('success', Lang::get('message.create', ['model' => 'Dịch vụ thú cưng']));
    }

    public function delete($id)
    {
        $orderPet = $this->orderPet->find($id);
        $orders =$this->orders->find($orderPet->order_id);
        $orders->update([
            'total_price' => ($orders->total_price)-($orderPet->petServices->price*$orderPet->quantity)
        ]);
        
        $orderPet->delete();
        return redirect()->back()->with('success', Lang::get('message.delete', ['model' => 'Dịch vụ thú cưng']));
    }

    public function orderDeleteMany(Request $request)
    {
        $this->orders->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa thú cưng thành công"]);
    }

    public function orderDelete(Request $request)
    {
        $orders =$this->orders->find($request->id);
        $orders->delete();

        return redirect()->back()->with('success', Lang::get('message.delete', ['model' => 'Đơn hàng']));
    }

    public function exportFile(Request $request)
    {
        $orderPet = $this->orderPet->with('petInformation', 'petServices')
            ->where('order_id', $request->id)
            ->get();
        $order = $this->orders->find($request->id);
        $order->update([
            'is_paid' => Order::PAID,
            'status'  => Order::STATUS_DONE
        ]);
        return view('backend/admin/orders/exportOrderPDF', compact('orderPet', 'order'));
    }
}
