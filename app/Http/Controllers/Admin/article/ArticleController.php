<?php

namespace App\Http\Controllers\Admin\article;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
use App\Models\CategoryJob;
use App\Models\CategoryPost;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::whereis_active(1);

        if (\request()->article == 1) {
            $articles = Articles::whereis_active(0);
        }

        if ($keyword = \request()->search) {
            $articles = $articles->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('descrip', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%")
                ->orWhereHas('user', function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                })->orWhereHas('category', function ($query) use ($keyword) {
                    $query->where('title', 'LIKE', "%{$keyword}%");
                });
        }


        $articles = $articles->latest()->paginate(20);
        $articles->appends(\request()->query())->links();
        return view('admin.article.list', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'short_descrip' => ['required'],
            'body' => ['required'],
            'category' => ['required'],
            'poster' => ['required'],
            'keyword' => ['required']
        ]);

        $article = auth()->user()->article()->create($data);

        $article->category()->attach($data['category']);

        if ($request->has('deactive')) $article->update(['is_active' => 0]);

        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('article.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
        return view('admin.article.show', [
            'article' => $article,


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
        return view('admin.article.edit', [
            'article' => $article,


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $article)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'short_descrip' => ['required'],
            'body' => ['required'],
            'category' => ['required'],
            'poster' => ['required'],
            'keyword' => ['required']
        ]);

        $article->update($data);
        $article->category()->sync($data['category']);
        $request->has('deactive') ? $article->update(['is_active' => 0]) : $article->update(['is_active' => 1]);
        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        $article->delete();
        alert()->success('حذف با موفقیت انجام شد', 'موفق!');
        return redirect(route('article.index'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'تصویر با موفقیت بارگذاری شد.';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
