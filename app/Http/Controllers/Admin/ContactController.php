<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Call_me;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Call_me::query();

        if ($keyword = \request()->search) {
            $contacts = $contacts->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('phone', 'LIKE', "%{$keyword}%");
        }
        $contacts = $contacts->orderBy('seen', 'asc')->paginate();
        $contacts->appends(\request()->query())->links();
        return view('admin.contact.index', compact('contacts'));

    }

    public function approved(Call_me $id)
    {
        if (!$id->approved) {
            $id->update(['seen' => '1']);
        }
        toastr()->success('با موفقیت دیده شد');
        return back();
    }

//    public function send(Contact $id)
//    {
//        return view('panel.contact.send_sms', compact('id'));
//    }
//
//    public function send_sms(Request $request, Contact $id)
//    {
//        $data = $request->validate([
//            'phone' => ['required'],
//            'subject' => ['required'],
//            'text' => ['required'],
//        ]);
//
//        event(new \App\Events\Contact($data));
//
//        toastr()->success('پیامک با موفقیت ارسال شد');
//        return redirect(route('admin.contact.index'));
//    }

    public function delete(Call_me $id)
    {

        $id->delete();
        toastr()->success('با موفقیت حذف شد');
        return back();
    }
}
