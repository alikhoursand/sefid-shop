@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'لیست مدیران'"></x-admin.page-title>

    <div class="mb-4">
        <form action="{{ route('admin.user.admin.search') }}" method="get">
            <div class="flex items-end flex-wrap gap-4">
                <div class="w-[250px]">
                    <label for="name" class="text-sm block mb-2">نام مدیر</label>
                    <input type="text" value="{{ request()->name }}" name="name" id="name"
                        class="input  w-full input-sm focus:outline-none">
                </div>
                <div class="w-[250px]">
                    <label for="phone" class="text-sm block mb-2">موبایل</label>
                    <input type="text" value="{{ request()->phone }}" id="phone" name="phone"
                        class="input  w-full input-sm focus:outline-none">
                </div>
                <button class="btn btn-success btn-sm">جستحو</button>
            </div>
        </form>
    </div>


    <div class="relative overflow-x-auto rounded-box bg-base-100">
        <table class="w-full text-xs sm:text-sm text-left rtl:text-right">
            <thead class=" bg-base-200">
                <tr>
                    <th scope="col" class="p-4 w-[100px] text-center ">
                        #
                    </th>
                    <th scope="col" class="p-4">
                        نام مدیر
                    </th>
                    <th scope="col" class="p-4 text-center">
                        شماره تماس
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        وضعیت
                    </th>
                    <th scope="col" class="p-4 text-center">
                        تاریخ عضویت
                    </th>
                    <th scope="col" class="p-4">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y-2">
                @foreach ($admins as $admin)
                    <tr class="border-base-300 hover:bg-base-content/10">
                        <th scope="row" class="min-w-[50px] text-center  font-medium whitespace-nowrap ">
                            {{ $admin->id }}
                        </th>
                        <td class="min-w-[150px] p-4">
                            {{ $admin->fname . ' ' . $admin->lname }}
                        </td>
                        <td class="text-center min-w-[150px] p-4">
                            {{ $admin->phone }}
                        </td>
                        <td class="text-center min-w-[100px]">
                            <div class="p-4">
                                @if ($admin->status == 1)
                                    <form action="{{ route('admin.user.change-status', $admin->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="entity" value="مدیر">
                                        <button class="btn btn-success btn-sm">
                                            فعال
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.user.change-status', $admin->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="entity" value="مدیر">
                                        <button class="btn btn-error btn-sm">
                                            غیرفعال
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </td>
                        <td class="text-center min-w-[200px] p-4" dir="rtl">
                            {{ verta($admin->created_at)->format(' %d %B %Y - H:i') }}
                        </td>
                        <td class="text-right min-w-[100px] p-4">
                            <div class="flex justify-center items-center">
                                <button onclick="setModalUID({{ $admin->id }},'{{ $admin->phone }}')"
                                    class="btn btn-error btn-sm ">
                                    <x-heroicon-o-chevron-double-down class="size-4" />
                                    تبدیل به کاربر
                                </button>
                                <form id="roleForm-{{ $admin->id }}" class="hidden"
                                    action="{{ route('admin.user.change-role', $admin->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="entity" value="admin">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <dialog id="demote_modal" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">
                        <x-heroicon-o-x-mark class="size-5" />
                    </button>
                </form>
                <div class="p-4 md:p-5 text-center">
                    <x-heroicon-c-exclamation-triangle class="mx-auto mb-4 text-error size-16" />

                    <h3 class="mb-5 text-lg font-normal text-base-content/70">
                        مدیر با شماره "<span id="uname" class="text-base-content"></span>" به <span
                            class="text-error font-semibold">کاربر</span>
                        تغییر کند؟
                    </h3>

                    <div class="flex justify-center gap-x-2">
                        <button type="button" onclick="sendForm()" class="btn btn-error ">
                            تغییر به کاربر
                        </button>

                        <form method="dialog">
                            <button class="btn btn-ghost">
                                انصراف
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </dialog>

        <script>
            let currentAdmin = null;

            function setModalUID(uid, uname) {
                document.getElementById('uname').innerText = uname;
                currentAdmin = uid;
                demote_modal.showModal()
            }

            function sendForm() {
                document.getElementById(`roleForm-${currentAdmin}`).submit();
            }
        </script>

    </div>

    {{ $admins->links() }}
@endsection
