<?php

namespace App\Http\Controllers\Frontend\Services;

use App\Http\Controllers\Controller;
use App\Models\CategoriesServices;
use App\Models\Comment;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Class constructor.
     */
    protected $services;
    protected $comments;
    public function __construct(Services $services , Comment $comments)
    {
        $this->services = $services;
        $this->comments = $comments;

    }
    
    public function index() {
        $services = $this->services->all();
        $categories = CategoriesServices::all();
        $serviceBasic = $this->services->where('category_id', 1)->get();
        $serviceWC = $this->services->where('category_id', 2)->get();
        $serviceAdvanced = $this->services->where('category_id', 3)->get();
        $serviceBeautify = $this->services->where('category_id', 4)->get();
        $serviceDifferent = $this->services->where('category_id', 5)->get();

        return view("frontend/services/services", compact('services', 'categories', 'serviceBasic', 'serviceWC', 'serviceAdvanced', 'serviceBeautify', 'serviceDifferent'));
    }

    public function detail(Request $request) {
        $service = $this->services->where('id', $request->id)->first();
        $comments = $this->comments->where('service_id', $service->id)->get();
        return view("frontend/services/service_detail", compact('service','comments'));
    }
}
