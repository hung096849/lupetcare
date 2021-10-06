<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ServicesController extends Controller
{
    protected $services;
    public function __construct(Services $services)
    {
        $this->services = $services;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->services->all();
        return response()->json([
            'status' => 200,
            'message'=> 'success',
            'data'   => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $this->services->uploadFile($request->file('image'),"image");
        $createServices = $this->services->create([
            'category_id'   => $request->category_id,
            'service_name'  => $request->service_name,
            'price'         => $request->price,
            'price_sale'    => $request->price_sale,
            'image'         => $image,
            'detail'        => $request->detail,
            'description'   => $request->description,
            'status'        => $request->status,
            'time'          => $request->time,
            'slug'          => SlugService::createSlug(Services::class, 'slug', $request->service_name),
            'delete_at'     => null
        ]);
        $createServices->save();
        if($createServices){
            return response()->json([
                'status'  => 200,
                'message' => 'success',
                'data'    => $createServices
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
