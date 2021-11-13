<?php

namespace App\Http\Controllers\Backend\Customer;
use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Auth\CustomerRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Lang;
class CustomerController extends Controller
{ 
    protected $customers;

    public function __construct(Customers $customers)
    {
        $this->customers = $customers;
    }

    public function index()
    {
        $customers = $this->customers->paginate(3);
        return view('backend.admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('backend/admin/customers/create');
    }

    public function store(CustomerRequest $request)
    {
        $this->customers->create([
            'name' => $request->name,
            'slug' => SlugService::createSlug(Customers::class, 'slug', $request->name),
            'phone' => $request->phone,
            'email' =>$request->email,
            'password'=>$request->password,
            'status'=>$request=0
        ]);
        return redirect()->route('backend.admin.customers.show')->with('success', Lang::get('message.create', ['model' => 'Danh sách khách hàng']));
    }

    public function edit(Request $request)
    {
        $customers = $this->customers->find($request->id);
        return view('backend/admin/customers/edit', compact('customers'));
    }

    public function update(Request $request)
    {
        $customer = $this->customers->where('id', $request->id)->first();
        $customer->update([
            'name' => $request->name,
            'slug' => SlugService::createSlug(Customers::class, 'slug', $request->name),
            'phone' => $request->phone,
            'email' =>$request->email,
            'password'=>$request->password,
        ]);
        return redirect()->route('backend.admin.customers.show')->with('success', Lang::get('message.update', ['model' => 'Danh sách khách hàng']));
    }

    public function view(Request $request)
    {
        $customers = $this->customers->find($request->id);
        return view('backend/admin/customers/view', compact('customers'));
    }

    public function delete(Request $request)
    {
        $customers = $this->customers->find($request->id);
        $customers->delete();
        return redirect()->route('backend.admin.customers.show')->with('success', Lang::get('message.delete', ['model' => 'Danh sách khách hàng']));
    }

    public function customersDelete(Request $request)
    {
        $this->customers->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa danh sách khách hàng thành công"]);
    }

    public function search(Request $request)
    {
        if ($request->search != "") {
            $customers = $this->customers
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'asc')
                ->paginate(6);
        } else {
            $customers = $this->customers->paginate(3);
        }
        if ($request->ajax()) {
            $view = view('backend.admin.customers.search', compact('customers'))->render();
            return response()->json(['html' => $view]);
        }
    }
}
