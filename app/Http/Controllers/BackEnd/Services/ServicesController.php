<?php

namespace App\Http\Controllers\BackEnd\Services;

use App\Http\Controllers\BackEnd\Categories\CategoriesController;
use App\Http\Controllers\Controller;
use App\Models\CategoriesServices;
use App\Models\Services;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\Backend\Services\ServicesFormRequest;


use function App\Helpers\uploadFile;

class ServicesController extends Controller
{
    protected $services;
    protected $categories;

    public function __construct( Services $services, CategoriesServices $categories)
    {
        $this->services = $services;
        $this->categories = $categories;
    }


    public function index()
    {
        $services = $this->services->paginate(5);
        return view('backend.admin.services.index', compact('services'));
    }

    public function view(Request $request)
    {
        $services = $this->services->find($request->id);
        $services->load('categories');
        return view('backend.admin.services.view', compact('services'));
    }

    public function delete(Request $request)
    {
        $services = $this->services->find($request->id);
        $services->delete();
        return redirect()->route('backend.admin.services.show')->with('success', Lang::get('message.delete', ['model' => 'dịch vụ']));
    }

    public function servicesDelete(Request $request)
    {
        $this->services->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa dịch vụ thành công"]);
    }

    public function create()
    {
        $categories = $this->categories->all();
        return view('backend/admin/services/create', compact('categories'));
    }

    public function store(ServicesFormRequest $request)
    {

        $this->services->create([
            'category_id' => $request->category_id,
            'service_name' => $request->service_name,
            'image' => uploadFile($request->image, 'Service_image'),
            'price' => $request->price,
            'price_sale' => $request->price_sale,
            'detail' => $request->detail,
            'description' => $request->description,
            'status' => $request->status,
            'time' => $request->time,
            'slug' => SlugService::createSlug(Services::class, 'slug', $request->service_name),
        ]);
        return redirect()->route('backend.admin.services.show')->with('success', Lang::get('message.create', ['model' => 'dịch vụ']));
    }

    public function edit(Request $request)
    {
        $categories = $this->categories->all();
        $services = $this->services->find($request->id);
        return view('backend/admin/services/edit', compact('categories', 'services'));
    }

    public function update(Request $request)
    {

        $services = $this->services->where('id', $request->id)->first();
        if($request->image == ""){
            $image = $services->image;
        }else{
            $image = uploadFile($request->image, 'Service_image');
        }
        $services->update([
            'category_id' => $request->category_id,
            'service_name' => $request->service_name,
            'image' =>  $image,
            'price' => $request->price,
            'price_sale' => $request->price_sale,
            'detail' => $request->detail,
            'description' => $request->description,
            'status' => $request->status,
            'time' => $request->time,
            'slug' => SlugService::createSlug(Services::class, 'slug', $request->service_name),
        ]);
        return redirect()->route('backend.admin.services.show')->with('success', Lang::get('message.create', ['model' => 'dịch vụ']));
    }


    public function search(Request $request)
    {
        if ($request->search != "") {
            $services = $this->services
                ->where('service_name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'asc')
                ->paginate(6);
        } else {
            $services = $this->services->paginate(3);
        }
        if ($request->ajax()) {
            $view = view('backend.admin.services.search', compact('services'))->render();
            return response()->json(['html' => $view]);
        }
    }


}
