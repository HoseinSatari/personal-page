<?php

namespace App\Http\Controllers\Admin\Skill;

use App\Http\Controllers\Controller;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = Skills::query();

        if ($keyword = \request()->search) {
            $skill->where('name', 'LIKE', "%{$keyword}%")->orWhere('percent', 'LIKE', "%{$keyword}%");
        }
        return view('admin.skill.list', [
            'skills' => $skill->paginate('50'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill.create');
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
        $status = Skills::create($data);
        if (!$status) {
            alert()->error('عملیات ثبت با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('skill.index'));
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
    public function edit(Skills $skill)
    {
        return view('admin.skill.edit', [
            'skill' => $skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skills $skill)
    {
        $data = $request->validate([
            'title' => 'required',
            'percent' => 'required|integer|between:1,100',
            'year_work' => 'required|integer',
            'order_number' => 'required|integer',
            'icon_code' => 'nullable',

        ]);
        $status = $skill->update($data);
        if (!$status) {
            alert()->error('عملیات ویرایش با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ویرایش با موفقیت انجام شد', 'موفق!');
        return redirect(route('skill.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skills $skill)
    {
        $skill->delete();
        alert()->success('حذف با موفقیت انجام شد', 'موفق!');
        return redirect(route('skill.index'));
    }
}
