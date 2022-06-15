<?php

namespace App\Http\Controllers\Admin\Job\category;

use App\Http\Controllers\Controller;
use App\Models\CategoryJob;
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
        $category = CategoryJob::query();

        if ($keyword = \request()->search) {
            $category->where('name', 'LIKE', "%{$keyword}%");
        }
        return view('admin.job.category.list', [
            'cateogry' => $category->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job.category.create');
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
            'name' => 'required',

        ]);
        $status = CategoryJob::create($data);
        if (!$status) {
            alert()->error('عملیات ثبت با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('category.index'));
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
    public function edit(CategoryJob $category)
    {
        return view('admin.job.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryJob $category)
    {
        $data = $request->validate([
            'name' => 'required',

        ]);
        $status = $category->update($data);
        if (!$status) {
            alert()->error('عملیات ویرایش با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ویرایش با موفقیت انجام شد', 'موفق!');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryJob $category)
    {
        $category->delete();
        alert()->success('حذف با موفقیت انجام شد', 'موفق!');
        return redirect(route('category.index'));
    }
}
