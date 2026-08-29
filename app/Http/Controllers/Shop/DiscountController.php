<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Discount;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::orderBy('id', 'desc')->paginate(16);

        return view('admin.discount.index', compact('discounts'));
    }

    public function search(Request $request)
    {
        $discounts = Discount::where('code', 'like', '%'.$request->code.'%')->orderBy('id', 'desc')->paginate(16);

        return view('admin.discount.index', compact('discounts'));
    }

    public function changeStatus(Discount $discount)
    {
        $change = $discount->update(['status' => $discount->status == 1 ? 0 : 1]);

        if ($change) {
            return redirect()->back()->with('success', 'وضعیت کد تخفیف تغییر کرد');
        } else {
            return redirect()->back()->with('error', 'خطا در تغییر وضعیت کد تخفیف');
        }
    }

    public function create()
    {
        $discounts = Discount::get();

        return view('admin.discount.create', compact('discounts'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'amount' => 'required|integer',
            'type' => 'required|integer',
            'one_time' => 'nullable|integer',
            'expire_at' => 'nullable|date',
        ], [
            'code.required' => 'لطفا کد را وارد کنید',
            'code.string' => 'لطفا کد را درست وارد کنید',
            'amount.required' => 'لطفا مقدار را وارد کنید',
            'amount.integer' => 'لطفا مقدار را درست وارد کنید',
            'type.required' => 'لطفا نوع تخفیف را وارد کنید',
            'type.integer' => 'لطفا نوع تخفیف را درست وارد کنید',
            'one_time.integer' => 'لطفا یکبار مصرف را وارد کنید',
            'expire_at.date' => 'لطفا تاریخ انقضا را درست وارد کنید',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->type == 2 && $request->amount >= 100) {
            return redirect()->back()->with('error', 'خطا! مقدار کد تخفیف درصدی باید کمتر از ۱۰۰ باشد.');
        }

        $discount = Discount::create([
            'code' => $request->code,
            'amount' => $request->amount,
            'type' => $request->type,
            'one_time' => $request->one_time ? 1 : 0,
            'expire_at' => $request->expire_at ? Verta::parse($request->expire_at)->toCarbon() : null,
        ]);

        if ($discount) {
            return redirect()->route('admin.shop.discount.index')->with('success', 'کد تخفیف اضافه شد');
        } else {
            return redirect()->back()->with('error', 'خطا در ثبت کد تخفیف');
        }
    }

    public function update(Discount $discount, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'amount' => 'required|integer',
            'type' => 'required|integer',
        ], [
            'code.required' => 'لطفا کد را وارد کنید',
            'code.string' => 'لطفا کد را درست وارد کنید',
            'amount.required' => 'لطفا مقدار را وارد کنید',
            'amount.integer' => 'لطفا مقدار را درست وارد کنید',
            'type.required' => 'لطفا نوع تخفیف را وارد کنید',
            'type.integer' => 'لطفا نوع تخفیف را درست وارد کنید',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $update = $discount->update([
            'code' => $request->code,
            'amount' => $request->amount,
            'type' => $request->type,
            'one_time' => $request->one_time ? 1 : 0,
            'expire_at' => $request->expire_at ? Verta::parse($request->expire_at)->toCarbon() : null,
        ]);

        if ($update) {
            return redirect()->route('admin.shop.discount.index')->with('success', 'کد تخفیف ویرایش شد');
        } else {
            return redirect()->back()->with('error', 'خطا در ویرایش کد تخفیف');
        }
    }

    public function edit(Discount $discount)
    {
        return view('admin.discount.edit', compact('discount'));
    }
}
