<?php

namespace App\Http\Controllers;

use App\Classes\Uploader;
use App\Models\Banner;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Models\Shop\Transaction;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function imageDelete(Banner $image)
    {
        $type = $image->type == 'banner' ? 'بنر' : 'اسلایدر';

        Storage::disk('public')->delete($image->image);

        $delete = $image->delete();

        if ($delete) {
            return redirect()->back()->with('success', $type.' حذف شد');
        } else {
            return redirect()->back()->with('error', 'خطا! لطفا دوباره تلاش کنید');
        }
    }

    public function imageStatus(Banner $image)
    {
        $update = $image->update([
            'status' => $image->status == 1 ? 0 : 1,
        ]);

        if ($update) {
            $type = $image->type == 'banner' ? 'بنر' : 'اسلایدر';

            return redirect()->back()->with('success', 'وضعیت '.$type.' تغییر کرد');
        } else {
            return redirect()->back()->with('error', 'خطا! لطفا دوباره تلاش کنید.');
        }

    }

    public function imageStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'type' => ['required', 'string'],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'link' => 'nullable|url',
            ],
            [
                'image.required' => 'عکس را وارد کنید',
                'image.mimes' => 'عکس باید jpeg - png - jpg - gif باشد',
                'image.max' => 'عکس نباید بزرگتر از 2 مگابایت باشد',

                'link.url' => 'مقدار لینک باید یک آدرس درست باشد',
                'type.string' => 'خطا! لطفا دوباره تلاش کنید',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        if ($request->hasFile('image')) {
            $uploader = new Uploader;
            $path = $uploader->uploadImage($request->image, $request->type);
        } else {
            $path = null;
        }

        $create = Banner::create([
            'link' => $request->link,
            'position' => $request->type,
            'image' => $path,
        ]);

        if ($create) {
            $type = $request->type == 'banner' ? 'بنر' : 'اسلایدر';

            return redirect()->back()->with('success', "$type ثبت شد");
        } else {
            return redirect()->back()->with('error', 'خطا! لطفا دوباره تلاش کنید.');
        }

    }

    public function banners()
    {
        $banners = Banner::where('position', 'banner')->orderBy('id', 'desc')->get();

        return view('admin.banners', compact('banners'));
    }

    public function sliders()
    {
        $sliders = Banner::where('position', 'slider')->orderBy('id', 'desc')->get();

        return view('admin.sliders', compact('sliders'));
    }

    public function adminPanel()
    {
        $products_count = Product::where([['status', 1], ['qty', '!=', 0]])->count();

        $users_count = User::where([['status', 1], ['role', 1]])->count();

        $orders_count = Order::whereIn('status', [Order::STATUS_PAID, Order::STATUS_DONE])->count();
        $orders = Order::orderBy('id', 'desc')->take(5)->get();

        $transactions = Transaction::orderBy('id', 'desc')->take(5)->get();
        $transactions_count = Transaction::where('status', 1)->count();

        return view('admin.dashboard', compact('products_count', 'transactions', 'transactions_count', 'users_count', 'orders_count', 'orders'));
    }

    public function adminTransactions(Request $request)
    {
        $transactions = Transaction::orderBy('id', 'desc')->paginate(16);

        return view('admin.transactions', compact('transactions'));
    }

    public function adminTransactionsSearch(Request $request)
    {
        $transactions = Transaction::where('id', $request->id)
            ->orWhere('order_id', 'like', '%'.$request->id.'%')
            ->orWhere('code', 'like', '%'.$request->id.'%')
            ->orWhere('bank_order_id', 'like', '%'.$request->id.'%')
            ->orWhere('trace', 'like', '%'.$request->id.'%')
            ->orWhere('ref_id', 'like', '%'.$request->id.'%')
            ->orWhere('track_id', 'like', '%'.$request->id.'%')
            ->orderBy('id', 'desc')->paginate(16);

        return view('admin.transactions', compact('transactions'));
    }

    public function adminOrders(Request $request)
    {
        $orders = Order::orderBy('id', 'desc')->paginate(16);

        return view('admin.orders', compact('orders'));
    }

    public function adminOrdersSearch(Request $request)
    {
        $orders = Order::where('id', $request->id)->orderBy('id', 'desc')->paginate(16);

        return view('admin.orders', compact('orders'));
    }
}
