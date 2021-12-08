<?php

namespace App\Http\Controllers\BackEnd\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Categories\CategoriesFormRequest;
use App\Models\CategoriesServices;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

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

    public function store(CategoriesFormRequest $request)
    {
        $this->categories->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('backend.admin.categories.show')->with('success', Lang::get('message.create', ['model' => 'Danh mục']));
    }

    public function edit(Request $request)
    {
        $categories = $this->categories->find($request->id);
        return view('backend/admin/categories/edit', compact('categories'));
    }

    public function update(Request $request)
    {
        $category = $this->categories->where('id', $request->id)->first();
        $category->update([
            'name' => $request->name,
            'slug' => SlugService::createSlug(CategoriesServices::class, 'slug', $request->name),
        ]);
        return redirect()->route('backend.admin.categories.show')->with('success', Lang::get('message.update', ['model' => 'Danh mục']));
    }

    public function view(Request $request)
    {
        $categories = $this->categories->find($request->id);
        return view('backend/admin/categories/view', compact('categories'));
    }

    public function delete(Request $request)
    {
        $categories = $this->categories->find($request->id);
        $categories->delete();
        return redirect()->route('backend.admin.categories.show')->with('success', Lang::get('message.delete', ['model' => 'Danh mục']));
    }

    public function categoriesDelete(Request $request)
    {
        $this->categories->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa danh mục thành công"]);
    }

    public function search(Request $request)
    {
        if ($request->search != "") {
            $categories = $this->categories
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'asc')
                ->paginate(6);
        } else {
            $categories = $this->categories->paginate(3);
        }
        if ($request->ajax()) {
            $view = view('backend.admin.categories.search', compact('categories'))->render();
            return response()->json(['html' => $view]);
        }
    }
}
