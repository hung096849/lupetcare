<?php

namespace App\Http\Controllers\Frontend\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //
    public function index() {
        return view("frontend/services/services");
    }

    public function detail() {
        return view("frontend/services/service_detail");
    }
}
