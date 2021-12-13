<?php

namespace App\Http\Controllers\Backend\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Lang;

class CommentsController extends Controller
{
    protected $comments;

    public function __construct(Comment $comments)
    {
        $this->comments = $comments;
    }

    public function index()
    {
        $comments = $this->comments->all();
        $comments->load('customer', 'serivce');
        return view('backend.admin.comments.index', compact('comments'));
    }

    public function delete(Request $request)
    {
        $comments = $this->comments->find($request->id);
        $comments->delete();
        return redirect()->route('backend.admin.news.show')->with('success', Lang::get('message.delete', ['model' => 'Bình luận']));
    }

    public function newsDelete(Request $request)
    {
        $this->comments->whereIn('id', explode(",", $request->id))->delete();
        return response()->json(['success' => "Xóa thành công"]);
    }

}
