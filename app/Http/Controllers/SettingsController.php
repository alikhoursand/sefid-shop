<?php

namespace App\Http\Controllers;

use App\Classes\SiteHelper;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function settings()
    {
        $settings_array = SiteHelper::getAllSetting(true, false);
        return view('admin.settings', compact('settings_array'));
    }

    public function settingsTelegramUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'telegram_messenger' => 'nullable|integer',
                'telegram_apikey' => 'required|string',
                'telegram_chatid' => 'required|string',
            ],
            [
                'telegram_apikey.required' => 'لطفا مقدار را وارد کنید',
                'telegram_apikey.string' => 'لطفا مقدار را درست وارد کنید',
                'telegram_chatid.required' => 'لطفا مقدار را وارد کنید',
                'telegram_chatid.string' => 'لطفا مقدار را درست وارد کنید',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $update_messenger = SiteSetting::where('key', 'telegram_messenger')->first()->update(['value' => $request->telegram_messenger ? 'enabled' : 'disabled']);
        $update_apikey = SiteSetting::where('key', 'telegram_apikey')->first()->update(['value' => $request->telegram_apikey]);
        $update_chatid = SiteSetting::where('key', 'telegram_chatid')->first()->update(['value' => $request->telegram_chatid]);

        if ($update_messenger && $update_apikey && $update_chatid) {
            return redirect()->back()->with('success', 'تنظیمات تلگرام ویرایش شد');
        } else {
            return redirect()->back()->with('error', 'خطا! لطفا دوباره تلاش کنید.');
        }

    }

    public function settingsInfoUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'footer_desc' => ['required', 'string'],
                'address' => ['required', 'string'],
                'phone1' => ['required', 'string'],
                'phone2' => ['nullable', 'string'],
                'telegram' => ['required', 'string'],
                'instagram' => ['required', 'string'],
                'email' => ['required', 'string'],
            ],
            [
                'footer_desc.required' => 'توضیحات را وارد کنید',
                'footer_desc.string' => 'توضیحات را درست وارد کنید',

                'address.required' => 'آدرس را وارد کنید',
                'address.string' => 'آدرس را درست وارد کنید',

                'phone1.required' => 'شماره تماس را وارد کنید',
                'phone1.string' => 'شماره تماس را درست وارد کنید',

                'phone2.string' => 'شماره تماس را درست وارد کنید',

                'telegram.required' => 'تلگرام را وارد کنید',
                'telegram.string' => 'تلگرام را درست وارد کنید',

                'instagram.required' => 'اینستاگرام را وارد کنید',
                'instagram.string' => 'اینستاگرام را درست وارد کنید',

                'email.required' => 'ایمیل را وارد کنید',
                'email.string' => 'ایمیل را درست وارد کنید',

            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        foreach ($request->except('_token') as $key => $value) {
            SiteSetting::where('key', $key)->update(['value' => $value]);
        }

        return redirect()->back()->with('success', 'اطلاعات به‌روز رسانی شد');
    }

    public function settingsTaxUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tax_percent' => 'required',
            ],
            [
                'tax_percent.required' => 'لطفا مقدار را وارد کنید',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $update = SiteSetting::where('key', 'tax_percent')->update(['value' => $request->tax_percent]);

        if ($update) {
            return redirect()->back()->with('success', 'درصد مالیات ویرایش شد');
        } else {
            return redirect()->back()->with('error', 'خطا! لطفا دوباره تلاش کنید.');
        }

    }

    public function settingsPostUpdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'post_cost' => 'required',
            ],
            [
                'post_cost.required' => 'لطفا مقدار را وارد کنید',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $update = SiteSetting::where('key', 'post_cost')->update(['value' => $request->post_cost]);

        if ($update) {
            return redirect()->back()->with('success', 'هزینه ارسال ویرایش شد');
        } else {
            return redirect()->back()->with('error', 'خطا! لطفا دوباره تلاش کنید.');
        }

    }


    public function variables()
    {
        $settings = SiteSetting::whereIn('key', SiteSetting::HOME_VARIABLES)->get();

        return view('admin.variables', [
            'settings_list' => $settings
        ]);
    }

    public function updateVariable(SiteSetting $setting, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'value' => 'nullable',
            ],
            [
                'value.nullable' => 'لطفا مقدار را وارد کنید',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $update = $setting->update(['value' => $request->value]);

        if ($update) {
            return redirect()->back()->with('success', 'اطلاعات به‌روز رسانی شد');
        }

        return redirect()->back()->with('error', 'خطا در به‌روز رسانی');

    }
}
