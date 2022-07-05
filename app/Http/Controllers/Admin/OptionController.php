<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        $option = Option::find(1);

        return view('admin.option.index', compact('option'));
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'sitename' => ['required'],
            'logo'  => ['required'],
            'description' => ['required'],
            'keyword' => ['required'],
            'phone_admin' => ['required'],
            'phone_support' => ['required'],
            'instagram' => ['required'],
            'whatsup' => ['required'],
            'linkdin' => ['required'],
            'github' => ['required'],
            'gitlab' => ['required'],
            'stackoverflow' => ['required'],
            'twitter' => ['required'],
            'telegram' => ['required'],
        ]);

        $option = Option::find(1);
        $option->update($data);
        if ($request->deactive){
            $option->update(['is_active' => 0]);
        }else{
            $option->update(['is_active' => 1]);
        }
        toastr()->success('تنظیمات با موفقیت اعمال شدند');
        return back();
    }
}
