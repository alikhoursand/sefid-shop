@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'دسته‌بندی محصولات'"></x-admin.page-title>

    <div class="mb-4 flex items-center justify-start gap-x-2">
        <button onclick="new_category.showModal()" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                    clip-rule="evenodd" />
            </svg>
            ثبت دسته‌بندی جدید
        </button>

    </div>
    <div class="relative overflow-x-auto bg-base-100 shadow-md shadow-base-300 rounded-box">
        <table class="w-full text-xs sm:text-sm text-left rtl:text-right shadow-lg">
            <thead class="text-xs sm:text-sm bg-base-100 border-b-2 border-base-300">
                <tr>
                    <th scope="col" class="p-4 w-[100px] text-center ">
                        عکس
                    </th>
                    <th scope="col" class="p-4 min-w-[150px]">
                        نام
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[100px]">
                        زیر مجموعه
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[100px]">
                        وضعیت
                    </th>
                    <th scope="col" class="p-4">
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y-2">
                @foreach ($categories as $category)
                    <tr class="border-base-200 hover:bg-base-200 duration-200">
                        <th scope="row" class="text-center font-medium whitespace-nowrap w-[100px]">
                            @if ($category->image)
                                <div class="p-2">
                                    <img src="{{ Storage::url($category->image) }}"
                                        class="w-full rounded-box aspect-square object-cover  mx-auto" alt="">
                                </div>
                            @else
                                ندارد
                            @endif
                        </th>
                        <td class="text-right p-4">
                            {{ $category->title }}
                        </td>
                        <td class="text-center">
                            {{ $category->parent_id ? $category->parent->title : 'بدون زیر مجموعه' }}
                        </td>

                        <td class="p-4 text-center">
                            <div class="mx-auto">
                                @if ($category->status == 1)
                                    <form action="{{ route('admin.shop.category.change-status', $category->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm  btn-success ">
                                            فعال
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.shop.category.change-status', $category->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-error ">
                                            غیرفعال
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </td>

                        <td class="text-right">
                            <button
                                onclick="setModalUID('{{ route('admin.shop.category.update', $category->slug) }}','{{ $category->title }}','{{ $category->parent_id }}','{{ Storage::url($category->image) }}')"
                                class="btn btn-warning btn-sm btn-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path
                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                            </button>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{ $categories->links() }}


    <script>
        let formAction = null;

        function setModalUID(formUrl, title, parent_id, image) {
            currentCategory = formUrl;

            document.getElementById('edit-form').setAttribute('action', formUrl);
            document.getElementById('edit_title').value = title;
            document.getElementById('imageEditPreview').setAttribute('src', image)
            document.getElementById('imageEditPreview').style.display = 'block'

            if (parent_id != null) {
                document.getElementById('edit_parent_id').value = parent_id;
            } else {
                document.getElementById('edit_parent_id').value = "";
            }

            edit_category.showModal()
        }

        // function sendForm() {
        //     document.getElementById(`update_title_${currentCategory}`).value = document.getElementById('edit_title').value;
        //     document.getElementById(`update_parent_id_${currentCategory}`).value = document.getElementById('edit_parent_id')
        //         .value;
        //     document.getElementById(`update_form_${currentCategory}`).submit();
        // }
    </script>


    <dialog id="edit_category" class="modal">
        <div class="modal-box bg-base-300">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <g clip-path="url(#clip0_4418_9821ce)">
                            <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.17004 14.8299L14.83 9.16992" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.83 14.8299L9.17004 9.16992" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_9821ce">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </form>
            <h3 class="text-lg font-bold">ویرایش دسته بندی</h3>
            <div class="divider"></div>
            <div class="mt-4">
                <form action="#" method="post" id="edit-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="text-sm" for="edit_title">نام دسته بندی</label>
                        <input type="text" name="title" id="edit_title"
                            class="input w-full max-w-[350px] block mt-2 focus:outline-none" />
                        @if (session('action') == 'edit')
                            @error('title')
                                {{ $message }}
                            @enderror
                        @endif
                    </div>
                    <div class="mt-4">
                        <label class="text-sm" for="edit_parent_id">زیر مجموعه</label>
                        <select class="select w-full max-w-[350px] block mt-2 focus:outline-none" name="parent_id"
                            id="edit_parent_id">
                            <option selected value="">دسته بندی را انتخاب کنید</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <label class="text-sm" for="edit_image">عکس</label>
                        <input name="image" class="file-input w-full max-w-[350px] block mt-2 focus:outline-none"
                            id="edit_image" type="file">
                        <div class="error text-xs md:text-sm text-error mt-1">
                            @if (session('action') == 'edit')
                                @error('image')
                                    {{ $message }}
                                @enderror
                            @endif
                        </div>
                        <div class="mt-5">
                            <img id="imageEditPreview" src="#" style="display: none"
                                class="aspect-square max-w-[300px] mx-auto object-cover rounded-box" alt="Image Preview">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">ویرایش دسته بندی</button>

                </form>

            </div>
        </div>
    </dialog>

    <dialog id="new_category" class="modal">
        <div class="modal-box bg-base-300">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <g clip-path="url(#clip0_4418_9821cc)">
                            <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.17004 14.8299L14.83 9.16992" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.83 14.8299L9.17004 9.16992" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_9821cc">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </form>
            <h3 class="text-lg font-bold">ثبت دسته بندی جدید</h3>
            <div class="divider"></div>
            <div class="mt-4">
                <form action="{{ route('admin.shop.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" class="text-sm">نام دسته بندی</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="input  w-full max-w-[350px] block mt-2 focus:outline-none" />
                        <div class="error text-xs md:text-sm text-error mt-1">
                            @if (session('action') == 'create')
                                @error('title')
                                    {{ $message }}
                                @enderror
                            @endif
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="parent_id" class="text-sm">زیر مجموعه</label>
                        <select class="select w-full max-w-[350px] block mt-2 focus:outline-none" name="parent_id"
                            id="parent_id">
                            <option disabled selected value="">دسته بندی را انتخاب کنید</option>
                            @foreach ($categories as $category)
                                <option @if ($category->id == old('parent_id')) selected @endif value="{{ $category->id }}">
                                    {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="image" class="text-sm">عکس</label>
                        <input name="image" class="file-input w-full max-w-[350px] block mt-2 focus:outline-none"
                            id="image" type="file">
                        <div class="error text-xs md:text-sm text-error mt-1">
                            @if (session('action') == 'create')
                                @error('image')
                                    {{ $message }}
                                @enderror
                            @endif
                        </div>
                        <div class="mt-5">
                            <img id="imagePreview" src="#" style="display: none"
                                class="aspect-square max-w-[300px] mx-auto object-cover rounded-box" alt="Image Preview">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">ثبت دسته بندی</button>
                </form>
            </div>
        </div>
    </dialog>
@endsection
