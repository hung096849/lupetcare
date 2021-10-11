<?php

namespace App\Http\Controllers\Frontend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //

    public function index()
    {
        return view('frontend/homepage/index');
    }
}
