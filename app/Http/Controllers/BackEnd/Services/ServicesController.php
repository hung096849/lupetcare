<?php

namespace App\Http\Controllers\BackEnd\Services;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;


class ServicesController extends Controller
{
    protected $services;

    public function __construct(Services $services )
    {
        $this->services = $services;
    }


    public function index()
    {
        $services = $this->services->paginate(5);
        return view('backend.admin.services.index', compact('services'));
    }
}
