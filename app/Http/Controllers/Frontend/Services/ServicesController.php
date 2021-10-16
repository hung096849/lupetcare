<?php

namespace App\Http\Controllers\Frontend\Services;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Class constructor.
     */
    protected $services;
    public function __construct(Services $services)
    {
        $this->services = $services;
    }
    public function index() {
        $services = $this->services->all();
        return view("frontend/services/services", compact('services'));
    }

    public function detail(Request $request) {
        $service = $this->services->where('id', $request->id)->first();
        return view("frontend/services/service_detail", compact('service'));
    }
}
