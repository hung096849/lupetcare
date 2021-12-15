<?php

namespace App\Http\Controllers\Frontend\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //

    public function index()
    {
        $serviceHot = Services::where('status', Services::SERVICE_HOT)->get();
        $serviceNew = Services::where('status', Services::SERVICE_NEW)->get();
        
        return view('frontend/homepage/index', compact('serviceHot', 'serviceNew'));
    }
}
