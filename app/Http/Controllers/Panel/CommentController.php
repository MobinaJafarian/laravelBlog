<?php

namespace App\Http\Controllers\Panel;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->approved)) {
            $comments = Comment::where('is_approved', !! $request->approved)->with(['user', 'post'])->withCount('replies')->paginate();
        } else {
            $comments = Comment::with(['user', 'post'])->withCount('replies')->paginate();
        }

        return view('panel.comments.index', compact('comments'));
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'is_approved' => ! $comment->is_approved
        ]);

        session()->flash('status', 'نظر به درستی ویرایش شد.');

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        session()->flash('status', 'نظر به درستی حذف شد.');

        return back();
    }
}
