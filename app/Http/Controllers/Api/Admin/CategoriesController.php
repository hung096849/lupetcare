<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriesServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoriesController extends Controller
{

    /**
     * Class constructor.
     */
    protected $categories;
    public function __construct(CategoriesServices $categories)
    {
        $this->categories = $categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->all();
        return response()->json([
            'status' => 200,
            'message'=> 'success',
            'data'   => $categories
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
        $createCategories = $this->categories->create([
            'name' => $request->name,
            'slug' => SlugService::createSlug(CategoriesServices::class, 'slug', $request->name),
        ]);
        if($createCategories){
            return response()->json([
                'status'  => 200,
                'message' => 'success',
                'data'    => $createCategories
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
        $category = $this->categories->find($id);
        if(is_null($category)) {
            return response()->json([
                'status'  => 200,
                'message' => 'Category Not Found',
            ]);
        }

        return response()->json([
            'status'  => 200,
            'message' => 'Success',
            'data' => $category
        ]);
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
        $category = $this->categories->where('id',$id)->first();
        if(!$category) {
            return response()->json([
                'status'  => 200,
                'message' => 'Category Not Found',
            ]);
        }

        $category->update([
            'name' => $request->name,
            'slug' => SlugService::createSlug(CategoriesServices::class, 'slug', $request->name),
        ]);
        return response()->json([
            'status'  => 200,
            'message' => 'success',
            'data'    => $category
        ]);
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
