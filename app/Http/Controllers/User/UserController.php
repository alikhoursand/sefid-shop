<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order;
use App\Models\Shop\Transaction;
use App\Models\User\Message;
use App\Models\User\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function panelMessages()
    {
        $messages = Message::where([
            ['user_id', Auth::id()],
        ])->orderBy('id', 'desc')->paginate(16);

        return view('user.panel.sections.messages', compact('messages'));
    }

    public function readMessage(Request $request)
    {
        $message = Message::where([
            ['id', $request->message_id],
            ['user_id', Auth::id()],
            ['status', Message::STATUS_PENDING],
        ])->first();

        if ($message) {
            $message->update(['status' => Message::STATUS_READ]);

            return response()->json('read!', 200);
        } else {
            return response()->json('Message not found, or maybe not for you', 400);
        }
    }

    public function updateProfile(Request $request)
    {
        //        if (Auth::user()->fname != null && Auth::user()->lname != null && Auth::user()->birth != null) {
        //            return redirect()->back()->with('error', 'خطا! لطفا دوباره تلاش کنید.');
        //        } else if ($request->fname == null && $request->lname == null && $request->birth == null) {
        //            return redirect()->back()->with('error', 'لطفا اطلاعات لازم را وارد کنید');
        //        }

        $validator = Validator::make(
            $request->all(),
            [
                'fname' => ['required', 'string'],
                'lname' => ['required', 'string'],
                'birth' => ['required',  'regex:/^\d{4}\/\d{2}\/\d{2}$/'],
            ],
            [
                'fname.required' => 'نام را وارد کنید',
                'fname.string' => 'نام را درست وارد کنید',
                'lname.required' => 'نام خانوادگی را وارد کنید',
                'lname.string' => 'نام خانوادگی را درست وارد کنید',
                'birth.required' => 'تاریخ تولد را انتخاب کنید',
                'birth.regex' => 'فرمت تاریخ تولد نامعتبر است',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        $update = $user->update([
            'fname' => $user->fname ?? $request->fname ?? null,
            'lname' => $user->lname ?? $request->lname ?? null,
            'birth' => $user->birth ?? ($request->birth ? Verta::parse($request->birth)->toCarbon() : null),
        ]);

        if ($update) {
            return redirect()->back()->with('success', 'اطلاعات ویرایش شد');
        } else {
            return redirect()->back()->with('error', 'خطا! لطفا دوباره تلاش کنید.');
        }
    }

    public function panelProfile()
    {
        return view('user.panel.sections.profile');
    }

    public function panelOrders()
    {
        $orders = Order::where('user_id', Auth::id())->with('items')->orderBy('id', 'desc')->paginate(10);

        return view('user.panel.sections.orders', compact('orders'));
    }

    public function panelTransactions()
    {
        $transactions = Transaction::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(10);

        return view('user.panel.sections.transactions', compact('transactions'));
    }

    public function panel()
    {
        $orders = Order::where('user_id', Auth::id())
            ->whereIn('status', [
                Order::STATUS_PENDING,
                Order::STATUS_PAID,
                Order::STATUS_DONE,
                Order::STATUS_FAILED,
            ])
            ->select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->get()
            ->keyBy('status');

        $latest_orders = Order::where([
            ['user_id', Auth::id()],
            ['updated_at', '>=', now()->subWeek()],
        ])->orderByDesc('updated_at')->take(3)->get();

        return view('user.panel.sections.dashboard', compact('orders', 'latest_orders'));
    }

    public function changeRole(User $user, Request $request)
    {
        if ($user->id == Auth::id()) {
            return redirect()->back()->with('error', 'سمت خود را نمی‌توانید تغییر دهید');
        }

        if (! $user) {
            return redirect()->back()->with('error', 'خطا در تغییر سمت');
        }

        if ($user->update(['role' => $user->role == 1 ? 2 : 1])) {
            if ($request->entity == 'admin') {
                return redirect()->back()->with('success', "مدیر با شماره $user->phone به کاربر تغییر یافت");
            } else {
                return redirect()->back()->with('success', "کاربر با شماره $user->phone به مدیر تغییر یافت");
            }
        } else {
            return redirect()->back()->with('error', 'خطا در تغییر سمت');
        }
    }

    public function changeStatus(User $user, Request $request)
    {

        if ($user->id == Auth::id()) {
            return redirect()->back()->with('error', 'وضعیت خود را نمی‌توانید تغییر دهید');
        }

        if ($user->update(['status' => $user->status == 1 ? 0 : 1])) {
            return redirect()->back()->with('success', "وضعیت $request->entity تغییر کرد");
        } else {
            return redirect()->back()->with('error', "خطا در تغییر وضعیت $request->entity");
        }
    }

    public function adminsList()
    {
        $admins = User::where('role', 2)->orderBy('id', 'desc')->paginate(16);

        return view('admin.user.adminsList', compact('admins'));
    }

    public function usersList()
    {
        $users = User::where('role', 1)->orderBy('id', 'desc')->paginate(16);

        return view('admin.user.usersList', compact('users'));
    }

    public function usersSearch(Request $request)
    {
        $query = User::query();

        $query->where('role', 1);

        if ($request->filled('name')) {
            $query->where('fname', 'like', '%'.$request->name.'%');
            $query->orWhere('lname', 'like', '%'.$request->name.'%');
        }

        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%'.$request->phone.'%');
        }

        $users = $query->paginate(16);

        return view('admin.user.usersList', compact('users'));
    }

    public function adminsSearch(Request $request)
    {
        $query = User::query();

        $query->where('role', 2);

        if ($request->filled('name')) {
            $query->where('fname', 'like', '%'.$request->name.'%');
            $query->orWhere('lname', 'like', '%'.$request->name.'%');
        }

        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%'.$request->phone.'%');
        }

        $admins = $query->paginate(16);

        return view('admin.user.adminsList', compact('admins'));
    }
}
