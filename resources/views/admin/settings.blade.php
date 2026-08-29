@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'تنظیمات سایت'"></x-admin.page-title>

    <a href="{{route('admin.settings.variables.list')}}" class="btn btn-info btn-wide">متغیرها</a>

    <div class="bg-base-100 shadow-md my-4 shadow-base-300 rounded-box p-4">
        <div class="mb-6 font-semibold">هزینه‌ها</div>
        <div class="grid gap-4 mb-6 grid-cols-4">
            <div class="col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-1">
                <form action="{{ route('admin.settings.post.update') }}" method="post">
                    @method('PUT')
                    @csrf
                    <label for="post-cost" class="block mb-2 text-sm">هزینه
                        ارسال</label>
                    <input type="text" id="post-cost" name="post_cost" dir="ltr" class="input focus:outline-none w-full"
                           value="{{ $settings_array['post_cost'] }}"/>
                    <button type="submit" class="btn btn-success mr-auto mt-2 block">
                        به
                        روز رسانی
                    </button>
                </form>
            </div>
            <div class="col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-1">
                <form action="{{ route('admin.settings.tax.update') }}" method="post">
                    @method('PUT')
                    @csrf
                    <label for="tax" class="block mb-2 text-sm">درصد
                        مالیات</label>
                    <input type="text" id="tax" name="tax_percent" dir="ltr" class="input focus:outline-none w-full"
                           value="{{ $settings_array['tax_percent'] }}"/>
                    <button type="submit" class="btn btn-success mr-auto mt-2 block">
                        به
                        روز رسانی
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-base-100 shadow-md shadow-base-300 rounded-box p-4 mt-4">
        <div class="mb-6 font-semibold">اطلاعات سایت</div>
        <div class="">
            <form method="post" action="{{ route('admin.settings.info.update') }}">
                @method('PUT')
                @csrf
                <div class="grid gap-4 mb-6 grid-cols-4">

                    <div class="col-span-4 xl:col-span-2">
                        <label for="text" class="block mb-2 text-sm">توضیحات فوتر
                            سایت</label>
                        <textarea id="text" rows="4" name="footer_desc"
                                  class="textarea w-full focus:outline-none">{{ $settings_array['footer_desc'] }}</textarea>
                    </div>

                    <div class="col-span-4 xl:col-span-2">
                        <label for="address" class="block mb-2 text-sm">آدرس</label>
                        <textarea id="address" rows="4" name="address"
                                  class="textarea w-full focus:outline-none">{{ $settings_array['address'] }}</textarea>
                    </div>

                    <div class="col-span-4 md:col-span-2 xl:col-span-1">
                        <label for="phone1" class="block mb-2 text-sm  ">شماره تماس
                            ۱</label>
                        <input type="text" id="phone1" name="phone1" dir="ltr" class="input focus:outline-none w-full"
                               value="{{ $settings_array['phone1'] }}"/>
                    </div>
                    <div class="col-span-4 md:col-span-2 xl:col-span-1">
                        <label for="phone2" class="block mb-2 text-sm  ">شماره تماس
                            ۲</label>
                        <input type="text" id="phone2" name="phone2" dir="ltr" class="input focus:outline-none w-full"
                               value="{{ $settings_array['phone2'] }}"/>
                    </div>
                    <div class="col-span-4 md:col-span-2 xl:col-span-1">
                        <label for="telegram" class="block mb-2 text-sm  ">تلگرام</label>
                        <input type="text" id="telegram" name="telegram" dir="ltr"
                               class="input focus:outline-none w-full" value="{{ $settings_array['telegram'] }}"/>
                    </div>
                    <div class="col-span-4 md:col-span-2 xl:col-span-1">
                        <label for="instagram" class="block mb-2 text-sm  ">اینستاگرام</label>
                        <input type="text" id="instagram" name="instagram" dir="ltr"
                               class="input focus:outline-none w-full" value="{{ $settings_array['instagram'] }}"/>
                    </div>

                    <div class="col-span-4 md:col-span-2 xl:col-span-1">
                        <label for="email" class="block mb-2 text-sm  ">ایمیل</label>
                        <input type="text" id="email" name="email" dir="ltr" class="input focus:outline-none w-full"
                               value="{{ $settings_array['email'] }}"/>
                    </div>

                </div>

                <button type="submit" class="btn btn-success">
                    به
                    روز رسانی
                </button>


            </form>
        </div>
    </div>

    <div class="bg-base-100 shadow-md shadow-base-300 rounded-box p-4 mt-4">
        <div class="mb-6 font-semibold">شبکه‌های اجتماعی</div>
        <div>
            <form action="{{ route('admin.settings.telegram.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="flex mb-6 gap-y-4 flex-wrap">
                    <div class="basis-full md:basis-full lg:basis-full xl:basis-1/8 self-start">
                        <label for="telegram-messenger" class="block mb-2 text-sm">تلگرام</label>
                        <div class="h-10 flex items-center">
                            <input type="checkbox" id="telegram-messenger"
                                   {{ $settings_array['telegram_messenger'] == 'enabled' ? 'checked' : '' }} value="1"
                                   name="telegram_messenger" class="toggle toggle-primary toggle-md"/>
                        </div>
                    </div>
                    <div class="basis-full md:basis-1/2 lg:basis-1/2 xl:basis-1/4 md:pl-2">
                        <label for="telegram-apikey" class="block mb-2 text-sm">شناسه ربات (API KEY)</label>
                        <input type="text" id="telegram-apikey" name="telegram_apikey" dir="ltr"
                               class="input focus:outline-none w-full"
                               value="{{ $settings_array['telegram_apikey'] }}"/>
                    </div>
                    <div class="basis-full md:basis-1/2 lg:basis-1/2 xl:basis-1/4 md:pr-2">
                        <label for="telegram-chatid" class="block mb-2 text-sm">شناسه چت ادمین (CHAT ID)</label>
                        <input type="text" id="telegram-chatid" name="telegram_chatid" dir="ltr"
                               class="input focus:outline-none w-full"
                               value="{{ $settings_array['telegram_chatid'] }}"/>

                    </div>
                    <div class="basis-full md:basis-full lg:basis-1/3 self-end xl:pr-4">
                        <button type="submit" class="btn btn-success mt-2 block">
                            به روز رسانی
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
