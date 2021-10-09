<?php

namespace App\Http\Controllers\BackEnd\Categories;

use App\Http\Controllers\Controller;
use App\Models\CategoriesServices;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoriesController extends Controller
{
    protected $categories;

    public function __construct(CategoriesServices $categories)
    {
        $this->categories = $categories;
    }

    public function index()
    {
        $categories = $this->categories->paginate(3);
        return view('backend.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend/admin/categories/create');
    }

    public function store(Request $request)
    {
        $this->categories->create([
            'name' => $request->name,
            'slug' => SlugService::createSlug(CategoriesServices::class, 'slug', $request->name),
        ]);
        return redirect()->route('backend.categories.show');
        // ->with('success', Lang::get('message.create', ['model' => 'categories']))
    }

    public function edit(Request $request)
    {
        // $categories = $this->categories->find($request->id);
        // return view('backend/admin/categories/edit', compact('categories'));
    }

    public function update(Request $request)
    {
        // $categories = $this->categories->where('id', $request->id)->first();
        // $categories->update($request->all());
        // return redirect()->route('backend.admin.categories.show', $categories->id)->with('success', Lang::get('message.update', ['model' => 'categoriesPlan']));;
    }

    public function view(Request $request)
    {
        // $categories = $this->categories->find($request->id);
        // return view('backend/admin/categories/view', compact('categories'));
    }

    public function delete(Request $request)
    {
        // $categories = $this->categories->find($request->id);
        // $categories->delete();
        // return redirect()->route('backend.admin.categories.show')->with('success', Lang::get('message.delete', ['model' => 'categories']));
    }

    public function categoriesDelete(Request $request)
    {
        // $this->categories->whereIn('id', explode(",", $request->ids))->delete();
        // return response()->json(['success' => "Delete categories successful"]);
    }

    public function search(Request $request)
    {
        // if ($request->search != "") {
        //     $categories = $this->categories
        //         ->where('name', 'like', '%' . $request->search . '%')
        //         ->orWhere('phone', 'like', '%' . $request->search . '%')
        //         ->orWhere('email', 'like', '%' . $request->search . '%')
        //         ->orderBy('id', 'asc')
        //         ->paginate(6);
        // } else {
        //     $categories = $this->categories->listcategories();
        // }
        // if ($request->ajax()) {
        //     $view = view('backend.admin.categories.search', compact('categories'))->render();
        //     return response()->json(['html' => $view]);
        // }
    }
}
