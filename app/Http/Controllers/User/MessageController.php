<?php

namespace App\Http\Controllers\User;

use App\Models\User\User;
use App\Models\User\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->paginate(16);

        $users = User::where([
            ['role', 1],
            ['status', 1]
        ])->orderBy('phone')->get();

        return view('admin.messages', compact('messages', 'users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'msg' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id|integer',
            'priority' => 'required|integer',
            'all_users' => 'nullable',
        ], [
            'title.required' => 'لطفا عنوان پیام را وارد کنید',
            'title.string' => 'لطفا عنوان پیام را درست وارد کنید',
            'msg.string' => 'لطفا متن پیام را درست وارد کنید',
            'priority.required' => 'لطفا اولویت پیام را انتخاب کنید',
            'priority.integer' => 'لطفا اولویت پیام را انتخاب کنید',
            'all_users.boolean' => 'کاربر را درست انتخاب کنید'
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        if ($request->all_users) {
            $users = User::where([
                ['role', 1],
                ['status', 1]
            ])->get();

            foreach ($users as $user) {
                $create = Message::create([
                    'title' => $request->title,
                    'msg' => $request->msg,
                    'user_id' => $user->id,
                    'priority' => $request->priority,
                    'admin_id' => Auth::id(),
                ]);
            }
        } else {

            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id|integer',
            ], [
                'user_id.required' => 'کاربر را انتخاب کنید'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $create = Message::create([
                'title' => $request->title,
                'msg' => $request->msg,
                'user_id' => $request->user_id,
                'priority' => $request->priority,
                'admin_id' => Auth::id(),
            ]);
        }


        if ($create) {
            return redirect()->route('admin.message.list')->with('success', 'پیام با موفقیت ثبت شد');
        }

        return redirect()->route('admin.message.list')->with('error', 'پیام ثبت نشد');
    }

    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'پیام حذف شد');
    }
}
