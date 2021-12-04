<?php

namespace App\Http\Controllers\Frontend\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    function index()
    {
        $news = $this->news->paginate(5);
        return view('frontend.news.news', compact('news'));
    }

    public function view(Request $request)
    {
        $listnews = $this->news->all();
        $news = $this->news->find($request->id);
        return view('frontend.news.news_detail', compact('news', 'listnews'));
    }
}
