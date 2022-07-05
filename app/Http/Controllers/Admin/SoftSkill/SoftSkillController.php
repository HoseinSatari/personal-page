<?php

namespace App\Http\Controllers\Admin\SoftSkill;

use App\Http\Controllers\Controller;
use App\Models\Soft_skills;
use Illuminate\Http\Request;

class SoftSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = Soft_skills::query();

        if ($keyword = \request()->search) {
            $skill->where('name', 'LIKE', "%{$keyword}%")->orWhere('percent', 'LIKE', "%{$keyword}%");
        }
        return view('admin.softskill.list', [
            'skills' => $skill->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.softskill.create');
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
            'percent' => 'required|integer|between:1,100',
            'year_work' => 'required|integer',
            'order_number' => 'required|integer',
            'icon_code' => 'nullable',

        ]);
        $status = Soft_skills::create($data);
        if (!$status) {
            alert()->error('عملیات ثبت با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('softskill.index'));
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
    public function edit(Soft_skills $softskill)
    {

        return view('admin.softskill.edit', [
            'skill' => $softskill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soft_skills $softskill)
    {
        $data = $request->validate([
            'title' => 'required',
            'percent' => 'required|integer|between:1,100',
            'year_work' => 'required|integer',
            'order_number' => 'required|integer',
            'icon_code' => 'nullable',

        ]);
        $status = $softskill->update($data);
        if (!$status) {
            alert()->error('عملیات ویرایش با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ویرایش با موفقیت انجام شد', 'موفق!');
        return redirect(route('softskill.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Soft_skills $softskill)
    {
        $softskill->delete();
        alert()->success('حذف با موفقیت انجام شد', 'موفق!');
        return redirect(route('softskill.index'));
    }
}
