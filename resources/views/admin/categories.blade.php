@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'دسته‌بندی محصولات'"></x-admin.page-title>

    <div class="mb-4 flex items-center justify-start gap-x-2">
        <button onclick="new_category.showModal()" class="btn btn-success">
            <x-heroicon-s-plus-circle class="size-6" />
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

                        <td class="text-center">
                            <button
                                onclick="setModalUID('{{ route('admin.shop.category.update', $category->slug) }}','{{ $category->title }}','{{ $category->parent_id }}','{{ Storage::url($category->image) }}')"
                                class="btn btn-warning btn-sm">
                                <x-heroicon-s-pencil-square class="size-4" />
                                ویرایش
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
                    <x-heroicon-s-x-mark class="size-5" />
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
                            class="input w-full block mt-2 focus:outline-none" />
                        @if (session('action') == 'edit')
                            @error('title')
                                {{ $message }}
                            @enderror
                        @endif
                    </div>
                    <div class="mt-4">
                        <label class="text-sm" for="edit_parent_id">زیر مجموعه</label>
                        <select class="select p-3 w-full block mt-2 outline-0 focus:outline-none active:outline-none"
                            name="parent_id" id="edit_parent_id">
                            <option selected value="">دسته بندی را انتخاب کنید</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <label class="text-sm" for="edit_image">عکس</label>
                        <input name="image" class="file-input w-full block mt-2 focus:outline-none" id="edit_image"
                            type="file">
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
                    <x-heroicon-s-x-mark class="size-5" />
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
                            class="input  w-full block mt-2 focus:outline-none" />
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
                        <select class="select w-full outline-0 p-3 block mt-2 focus:outline-none" name="parent_id"
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
                        <input name="image" class="file-input w-full block mt-2 focus:outline-none" id="image"
                            type="file">
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
