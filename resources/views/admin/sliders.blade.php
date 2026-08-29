@extends('layouts.admin')
@section('content')
<x-admin.page-title :page_title="'اسلایدرها'"></x-admin.page-title>

<div class="bg-base-100 shadow-md shadow-base-300 rounded-box p-4">
    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="slider">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="">
                <div class="">
                    <label for="link" class="block mb-2 text-sm ">لینک</label>
                    <input type="text" id="link" name="link" value="{{ old('link') }}" class="input w-full focus:outline-none">
                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('link')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="">
                    <label for="image" class="block mb-2 text-sm font-medium">عکس</label>
                    <input type="file" id="image" name="image" class="file-input w-full focus:outline-none" />
                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </div>

                </div>
                <div class="lg:block hidden">
                    <button class="btn mt-7 btn-success">ثبت</button>
                </div>
            </div>

            <div class="col-span-1 lg:col-span-2 xl:col-span-1">
                <img id="imagePreview" src="#" class="hidden aspect-video w-full mt-2 object-cover" alt="Image Preview">
            </div>
            <div class="block lg:hidden">
                <button class="btn mt-7 btn-success">ثبت</button>
            </div>
        </div>

    </form>

</div>

<div class="flex flex-wrap items-stretch ">
    @foreach ($sliders as $slider)
    <div class="2xl:basis-1/5 lg:basis-1/3 md:basis-1/3 2xs:basis-1/2 basis-full p-2 text-sm md:text-base">
        <div class="h-full border-2 rounded-box overflow-hidden border-base-content/10 flex flex-col justify-between">
            <img src="{{ Storage::url($slider->image) }}" class="aspect-video object-cover">
            <div class="h-30 p-2">

                <div class="mt-4 text-sm">
                    @if ($slider->link)
                    لینک: <a href="{{ $slider->button_link }}">{{ $slider->button_link }}</a>
                    @else
                    لینک نشده
                    @endif
                </div>
                <div class="divider my-2"></div>
                <div class="flex items-center justify-between">
                    <form action="{{ route('admin.slider.change-status', $slider->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @if ($slider->status == 1)
                        <button class="btn btn-success btn-sm">
                            منتشر
                            شده
                        </button>
                        @else
                        <button class="btn btn-error btn-sm btn-soft">
                            منتشر
                            نشده
                        </button>
                        @endif
                    </form>


                    <form action="{{ route('admin.slider.delete', $slider->id) }}" method="post" onsubmit="return confirm('بنر حذف شود؟')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-error btn-sm">حذف</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
