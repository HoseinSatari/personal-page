<?php

namespace App\Http\Controllers\Admin\article\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryJob;
use App\Models\CategoryPost;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', null)->whereis_active(1)->orderBy('order_number', 'ASC');

        if (\request()->cat_work){
            $categories = Category::where('parent_id', null)->where('type' , 'work')->whereis_active(1)->orderBy('order_number', 'ASC');
        }
        if (\request()->deactive){
            $categories = Category::where('parent_id', null)->whereis_active(0)->orderBy('order_number', 'ASC');
        }
        if ($keyword = \request()->search) {
            $categories = $categories->where('title', 'LIKE', "%{$keyword}%");
        }
        if (\request()->delete) {
            $categories = Category::onlyTrashed();
        }

        $categories = $categories->latest()->paginate(20);
        $categories->appends(\request()->query())->links();
        return view('admin.article.category.list', [
            'cateogry' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'order_number' => 'required',
            'poster' => 'nullable',

        ]);
        if (\request()->parent_id) {
            $data +=  $request->validate([
                'parent_id' => 'exists:categories,id',
            ]);
        }
        $status = Category::create($data);
        if ($request->deactive) {
            $status->update([
                'is_active' => 0,
            ]);
        }

        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('category_post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category_post)
    {
        return view('admin.article.category.edit', [
            'category' => $category_post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category_post)
    {
        $data = $request->validate([
            'title' => 'required',
            'parent_id' => 'nullable',
            'order_number' => 'required' ,
            'poster' => 'nullable'

        ]);

        $category_post->update($data);
        if ($request->deactive) {
            $category_post->update([
                'is_active' => 0,
            ]);
        }else{
            $category_post->update([
                'is_active' => 1,
            ]);
        }
        alert()->success('ویرایش با موفقیت انجام شد', 'موفق!');
        return redirect(route('category_post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category_post)
    {
        $category_post->delete();
        alert()->success('حذف با موفقیت انجام شد', 'موفق!');
        return redirect(route('category_post.index'));
    }
    public function restor(Request $request)
    {
        category::withTrashed()
            ->where('id', $request->id)
            ->restore();

        toastr()->success('با موفقیت برگشت داده شد.');
        return redirect(route('category_post.index'));
    }
}
