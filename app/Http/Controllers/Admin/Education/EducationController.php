<?php

namespace App\Http\Controllers\Admin\Education;

use App\Http\Controllers\Controller;

use App\Models\education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = education::query();

        if ($keyword = \request()->search) {
            $education->where('title', 'LIKE', "%{$keyword}%")->orWhere('body', 'LIKE', "%{$keyword}%")->orWhere('place', 'LIKE', "%{$keyword}%");
        }
        return view('admin.education.list', [
            'education' => $education->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.create');
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
            'title' => 'required',
            'body' => 'required',
            'start' => 'required',
            'end' => 'nullable',
            'place' => 'nullable',
            'order_number' => 'required',
            'company' => 'required',
            'img' => 'nullable'
        ]);
        $status = education::create($data);
        if (!$status) {
            alert()->error('عملیات ثبت با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('education.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(education $education)
    {

        return view('admin.education.edit_ducation', [
            'education' => $education,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, education $education)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'start' => 'required',
            'end' => 'nullable',
            'place' => 'nullable',
            'top' => 'nullable',
            'order_number' => 'required',
            'company' => 'required',
            'img' => 'required'
        ]);
        $status = $education->update($data);
        if (!$status) {
            alert()->error('عملیات ویرایش با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ویرایش با موفقیت انجام شد', 'موفق!');
        return redirect(route('education.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(education $education)
    {
        $education->delete();
        alert()->success('حذف با موفقیت انجام شد', 'موفق!');
        return redirect(route('education.index'));
    }
}
