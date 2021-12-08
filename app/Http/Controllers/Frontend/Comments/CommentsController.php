<?php

namespace App\Http\Controllers\Frontend\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommentsController extends Controller
{
    protected $comments;

    public function __construct(Comment $comments)
    {
        $this->comments = $comments;
    }

    public function comment(Request $request)
    {

        $this->comments->create([
            'customer_id' => Auth::guard('customers')->user()->id,
            'service_id' => $request->id,
            'content' => $request->content,
            'slug' => Str::slug($request->content),
        ]);
        return back();

    }
}
