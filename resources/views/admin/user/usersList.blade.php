@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'لیست کاربران'"></x-admin.page-title>

    <div class="mb-4">
        <form action="{{ route('admin.user.search') }}" method="get">
            <div class="flex items-end flex-wrap gap-4">
                <div class="w-[250px]">
                    <label for="name" class="text-sm block mb-2">نام کاربر</label>
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
            <thead class="text-xs sm:text-sm border-b-2 border-base-300 bg-base-100">
                <tr>
                    <th scope="col" class="p-4 text-center ">
                        #
                    </th>
                    <th scope="col" class="p-4 ">
                        نام کاربر
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        شماره تماس
                    </th>
                    <th scope="col" class="p-4 text-center">
                        تاریخ تولد
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        وضعیت
                    </th>
                    <th scope="col" class="p-4 text-center">
                        تاریخ عضویت
                    </th>
                    <th scope="col" class="p-4">
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y-2">
                @foreach ($users as $user)
                    <tr class="border-base-200 hover:bg-base-200 duration-200">
                        <th scope="row" class="text-center  min-w-[50px] font-medium  whitespace-nowrap ">
                            {{ $user->id }}
                        </th>
                        <td class="min-w-[150px] p-4">
                            {{ $user->fname . ' ' . $user->lname }}
                        </td>
                        <td class="text-center min-w-[150px] p-4">
                            {{ $user->phone }}
                        </td>
                        <td class="text-center  min-w-[100px] p-4">
                            <div class="mx-auto">
                                {{ $user->birth ? verta($user->birth)->format(' %d %B %Y ') : 'ثبت نشده' }}
                            </div>
                        </td>

                        <td class="p-4 text-center">

                            <div class="mx-auto min-w-[100px]">
                                @if ($user->status == 1)
                                    <form action="{{ route('admin.user.change-status', $user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="entity" value="کاربر">
                                        <button class="btn btn-sm  btn-success">
                                            فعال
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.user.change-status', $user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="entity" value="کاربر">
                                        <button class="btn btn-sm btn-error">
                                            غیرفعال
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </td>
                        <td class=" text-center min-w-[200px] p-4" dir="rtl">
                            {{ verta($user->created_at)->format(' %d %B %Y - H:i') }}
                        </td>
                        <td class="min-w-[100px] text-right p-4">
                            <div class="flex justify-center items-center gap-x-2">
                                <button onclick="setModalUID('{{ $user->id }}','{{ $user->phone }}')"
                                    class="btn btn-accent btn-sm ">
                                    <x-heroicon-s-chevron-double-up class="size-4" />
                                    تبدیل به مدیر
                                </button>

                                <form id="roleForm-{{ $user->id }}" class="hidden"
                                    action="{{ route('admin.user.change-role', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="entity" value="user">
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <dialog id="promote_modal" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">
                        <x-heroicon-o-x-mark class="size-4" />
                    </button>
                </form>
                <div class="p-4 md:p-5 text-center">
                    <x-heroicon-c-exclamation-triangle class="mx-auto mb-4 text-accent size-16" />

                    <h3 class="mb-5 text-lg font-normal text-base-content/70">
                        کاربر با شماره "<span id="uname" class="text-base-content"></span>" به <span
                            class="text-accent font-semibold">مدیر</span>
                        ارتقا پیدا کند؟
                    </h3>
                    <div class="flex justify-center gap-x-2">
                        <button data-modal-hide="promote-modal" type="button" onclick="sendForm()" class="btn btn-accent">
                            تغییر به مدیر
                        </button>
                        <form method="dialog">
                            <button class="btn btn-ghost">انصراف</button>
                        </form>
                    </div>
                </div>

            </div>
        </dialog>

        <script>
            let currentUser = null;

            function setModalUID(uid, uname) {
                currentUser = uid;
                document.getElementById('uname').innerText = uname;
                promote_modal.showModal()
            }

            function sendForm() {
                document.getElementById(`roleForm-${currentUser}`).submit();
            }


            function giveCourse() {

            }
        </script>

    </div>

    {{ $users->links() }}
@endsection
