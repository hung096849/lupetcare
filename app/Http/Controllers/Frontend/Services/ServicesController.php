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
        return view("frontend/services/services", compact('services', 'categories'));
    }

    public function detail(Request $request) {
        $service = $this->services->where('id', $request->id)->first();
        $comments = $this->comments->where('service_id', $service->id)->get();
        return view("frontend/services/service_detail", compact('service','comments'));
    }
}
