<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {

        $comments = Comment::where('approved', 1);
        if (\request()->unapproved) {
            $comments = Comment::where('approved', 0);
        }

        if ($keyword = \request('search')) {
            $comments = $comments->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('phone', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%");
        }

        $comments = $comments->latest()->paginate('20');
        $comments->appends(\request()->query())->links();
        return view('admin.comment.index', compact('comments'));

    }

    public function send(Request $request)
    {

        $data = $request->validate([
            'parent_id' => 'required',
            'name' => ['required'],
            'comment' => ['required'],
        ]);
        $data['approved'] = 1;

        $data['phone'] = auth()->user()->phone ?? '';
        $parent = Comment::findorfail($data['parent_id']);
        $data['commentable_type'] = $parent->commentable_type;
        $data['commentable_id'] = $parent->commentable_id;
        auth()->user()->comments()->create($data);
        //TODO SEND SMS
        alert()->success('با موفقیت ارسال شد.');
        return back();

    }

    public function approve(Comment $id)
    {

        $id->update(['approved' => 1]);
        alert()->success('با موفقیت تایید شد.');
        return back();
    }

    public function delete(Comment $id)
    {
        $id->delete();
        alert()->success('با موفقیت حذف شد.');
        return back();
    }
}
