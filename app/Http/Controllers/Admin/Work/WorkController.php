<?php

namespace App\Http\Controllers\Admin\Work;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\Work_experience;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = Work_experience::query();

        if ($keyword = \request()->search) {
            $work->where('title', 'LIKE', "%{$keyword}%")->orWhere('body', 'LIKE', "%{$keyword}%")->orWhere('place', 'LIKE', "%{$keyword}%");
        }
        return view('admin.work.list', [
            'works' => $work->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work.create');
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
            'body' => 'required',
            'start' => 'required',
            'end' => 'nullable',
            'place' => 'nullable',
            'order_number' => 'required',
            'company' => 'required'
        ]);
        $status = Work_experience::create($data);
        if (!$status) {
            alert()->error('عملیات ثبت با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('Work.index'));
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


    public function edit(Work_experience $Work)
    {
        return view('admin.work.edit', [
            'work' => $Work,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work_experience $Work)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'start' => 'required',
            'end' => 'nullable',
            'place' => 'nullable',
            'top' => 'nullable',
            'order_number' => 'required',
             'company' => 'required'
        ]);
        $status = $Work->update($data);
        if (!$status) {
            alert()->error('عملیات ویرایش با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ویرایش با موفقیت انجام شد', 'موفق!');
        return redirect(route('Work.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work_experience $Work)
    {
        $Work->delete();
        alert()->success('حذف با موفقیت انجام شد', 'موفق!');
        return redirect(route('Work.index'));
    }
}
