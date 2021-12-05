<?php

namespace App\Http\Controllers\BackEnd\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;


use function App\Helpers\uploadFile;

class NewsController extends Controller
{
    protected $news;
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function index()
    {
        $news = $this->news->paginate(5);

        return view('backend.admin.news.index',compact('news'));
    }

    public function view(Request $request)
    {
        $news = $this->news->find($request->id);
        return view('backend.admin.news.view',compact('news'));
    }

    public function delete(Request $request)
    {
        $news = $this->news->find($request->id);
        $news->delete();
        return redirect()->route('backend.admin.news.show')->with('success', Lang::get('message.delete', ['model' => 'Tin tức']));
    }

    public function newsDelete(Request $request)
    {
        $this->news->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa thành công"]);
    }

    public function create()
    {
        return view('backend.admin.news.create');
    }

    public function store(Request $request)
    {
        $this->news->create([
            'id' => $request->id,
            'title' => $request->title,
            'image' => uploadFile($request->image, 'News_image'),
            'detail' => $request->detail,
            'slug' => Str::slug($request->title),
        ]);
        return redirect()->route('backend.admin.news.show')->with('success', Lang::get('message.create', ['model' => 'Tin tức']));
    }

    public function edit(Request $request)
    {
        $news = $this->news->find($request->id);
        return view('backend.admin.news.edit',compact('news'));
    }

    public function update(Request $request)
    {

        $news = $this->news->where('id', $request->id)->first();
        if($request->image == ""){
            $image = $news->image;
        }else{
            $image = uploadFile($request->image, 'News_image');
        }
        $this->news->create([
            'id' => $request->id,
            'title' => $request->title,
            'image' => uploadFile($request->image, 'News_image'),
            'detail' => $request->detail,
            'slug' => Str::slug($request->title),
        ]);
        return redirect()->route('backend.admin.news.show')->with('success', Lang::get('message.create', ['model' => 'Tin tức']));
    }
}
