<?php

namespace App\Http\Controllers\Admin\InfoBasic;

use App\Http\Controllers\Controller;
use App\Models\info_basic;
use App\Models\InfoBasic;
use Illuminate\Http\Request;

class InfoBasicController extends Controller
{
    public function show()
    {
        return view('admin.InfoBasic.show', [
            'info' => info_basic::find(1),
        ]);
    }

    public function edit(info_basic $id)
    {
        return view('admin.InfoBasic.edit', [
            'basic' => $id,
        ]);
    }

    public function put_edit(info_basic $id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birth' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'country' => 'required|string',
//            'year_work' => 'required',
            'about' => 'required',
            'place' => 'required',
            'img' => 'required',
        ]);

//        $data['birth'] = convertPersianToEnglish($data['birth']);
//        $data['birth'] = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y-m-d', $data['birth']);
        $status = $id->update($data);

        if (!$status) {
            alert()->error('عملیات ویرایش با خطا مواجه شد', 'خطا');
            return back();

        }
        alert()->success('ویرایش با موفقیت انجام شد', 'موفق!');
        return redirect(route('Basic_show'));
    }
}
