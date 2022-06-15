<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Models\CategoryJob;
use App\Models\Jobs;
use App\Models\Work_samples;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Work_samples::query();

        if ($keyword = \request()->search) {
            $job->where('title', 'LIKE', "%{$keyword}%");
        }
        return view('admin.job.list', [
            'jobs' => $job->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.job.create');
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
            'time_end' => 'required',
            'customer' => 'nullable',
            'link' => 'required',
            'skills' => 'required|array',
            'category' => 'required|array',
            'poster' => 'required',
            'screen_shot' => 'required',
            'order_number' => 'nullable',

        ]);

        $work = Work_samples::create($data);
        $work->category()->sync($data['category']);
        $work->skills()->sync($data['skills']);

        alert()->success('ثبت با موفقیت انجام شد', 'موفق!');
        return redirect(route('job.index'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Work_samples $job)
    {
        return view('admin.job.edit', [
            'job' => $job,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work_samples $job)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'time_end' => 'required',
            'customer' => 'nullable',
            'link' => 'required',
            'skills' => 'required|array',
            'category' => 'required|array',
            'poster' => 'required',
            'screen_shot' => 'required',
            'order_number' => 'nullable',

        ]);

        $job->update($data);
        $job->category()->sync($data['category']);
        $job->skills()->sync($data['skills']);

        alert()->success('ویرایش با موفقیت انجام شد', 'موفق');
        return redirect(route('job.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work_samples $job)
    {
        $job->delete();
        alert()->success('حذف با موفقیت انجام شد', 'موفق!');
        return redirect(route('job.index'));
    }
}
