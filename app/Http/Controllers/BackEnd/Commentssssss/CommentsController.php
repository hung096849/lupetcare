<?php

namespace App\Http\Controllers\Backend\Commentssssss;

use App\Constant\PermissionConstant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->can(PermissionConstant::COMMENTS_PERMISSION_LIST)) {
        $comments = $this->comments->all();
        $comments->load('customer', 'serivce');
        return view('backend.admin.comments.index', compact('comments'));
        }
    }

    public function delete(Request $request)
    {
        if(Auth::user()->can(PermissionConstant::COMMENTS_PERMISSION_EDIT)) {
        $comments = $this->comments->find($request->id);
        $comments->delete();
        return redirect()->route('backend.admin.news.show')->with('success', Lang::get('message.delete', ['model' => 'Bình luận']));
    }
    }

    public function commentsDelete(Request $request)
    {
        if(Auth::user()->can(PermissionConstant::COMMENTS_PERMISSION_EDIT)) {
        $this->comments->whereIn('id', explode(",", $request->id))->delete();
        return response()->json(['success' => "Xóa thành công"]);
        }
    }

}
