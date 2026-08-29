@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'لیست پیام ها'"></x-admin.page-title>

    <div class="mb-4 flex items-center justify-start gap-x-2">
        <button onclick="new_message.showModal()" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                    clip-rule="evenodd" />
            </svg>
            ثبت پیام جدید
        </button>

    </div>
    <div class="relative overflow-x-auto rounded-box bg-base-200">
        <table class="w-full text-xs sm:text-sm text-left rtl:text-right">
            <thead class=" bg-base-100">
                <tr>
                    <th scope="col" class="p-4 w-[100px] text-center ">
                        #
                    </th>
                    <th scope="col" class="p-4 text-right">
                        عنوان
                    </th>
                    <th scope="col" class="p-4 text-right">
                        متن
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        مدیر
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        کاربر
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        وضعیت
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        اولویت
                    </th>
                    <th scope="col" class="p-4 text-center">
                        تاریخ ارسال
                    </th>
                    <th scope="col" class="p-4">
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y-2">
                @foreach ($messages as $message)
                    <tr class=" border-base-300 hover:bg-base-content/10">
                        <th scope="row" class="min-w-[50px] text-center  font-medium whitespace-nowrap ">
                            {{ $message->id }}
                        </th>
                        <td class="min-w-[150px] text-right p-4">
                            {{ $message->title }}
                        </td>
                        <td class="text-right min-w-[150px] p-4">
                            {{ $message->msg ?? 'ندارد' }}
                        </td>
                        <td class="text-center min-w-[150px] p-4">
                            {{ $message->admin->fname . ' ' . $message->admin->lname }}
                        </td>
                        <td class="text-center min-w-[150px] p-4">
                            {{ $message->user->fname . ' ' . $message->user->lname . ' | ' . $message->user->phone }}
                        </td>
                        <td class="text-center min-w-[150px] p-4">
                            @if (\App\Models\User\Message::STATUS_PENDING == $message->status)
                                <div class="badge badge-sm badge-neutral">خوانده نشده</div>
                            @else
                                <div class="badge badge-sm badge-success">خوانده شده</div>
                            @endif
                        </td>
                        <td class="text-center min-w-[150px] p-4">
                            @if (\App\Models\User\Message::PRIORITY_LOW == $message->priority)
                                <div class="badge badge-sm badge-primary">کم</div>
                            @elseif(\App\Models\User\Message::PRIORITY_MED == $message->priority)
                                <div class="badge badge-sm badge-warning">متوسط</div>
                            @else
                                <div class="badge badge-sm badge-error">زیاد</div>
                            @endif
                        </td>
                        <td class="text-center min-w-[200px]  p-4" dir="rtl">
                            {{ verta($message->created_at)->format(' %d %B %Y - H:i') }}
                        </td>


                        <td class="text-right min-w-[100px]">
                            <div class="flex justify-center items-center">

                                <button
                                    onclick="setModalUID({{ $message->id }},'{{ $message->title }}','{{ $message->user->fname }}','{{ $message->user->lname }}','{{ $message->user->phone }}')"
                                    class="btn btn-error btn-sm btn-circle ">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>


                                <form id="deleteForm-{{ $message->id }}" class="hidden"
                                    action="{{ route('admin.message.delete', $message->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>


        <script>
            let currentMessage = null;

            function setModalUID(uid, title, fname, lname, phone) {
                document.getElementById('msg_title').innerText = title;
                document.getElementById('msg_user').innerText = `${fname} ${lname} | ${phone}`;
                currentMessage = uid;
                delete_modal.showModal()
            }

            function deleteForm() {
                document.getElementById(`deleteForm-${currentMessage}`).submit();
            }
        </script>

    </div>

    {{ $messages->links() }}

    <dialog id="new_message" class="modal">
        <div class="modal-box bg-base-300">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <g clip-path="url(#clip0_4418_9821ccm)">
                            <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.17004 14.8299L14.83 9.16992" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.83 14.8299L9.17004 9.16992" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_9821ccm">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </form>
            <h3 class="text-lg font-bold">ثبت پیام جدید</h3>
            <div class="divider"></div>
            <div class="mt-4">
                <form action="{{ route('admin.message.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="title">عنوان پیام</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="input  w-full max-w-[350px] block mt-2 focus:outline-none" />
                        <div class="error text-xs md:text-sm text-red-500 mt-1">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="title">متن پیام</label>
                        <textarea name="msg" class="textarea  w-full block mt-2 focus:outline-none" placeholder="متن پیام"></textarea>
                        <div class="error text-xs md:text-sm text-red-500 mt-1">
                            @error('msg')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="priority">اولویت</label>
                        <select class="select w-full max-w-[350px] block mt-2 focus:outline-none" name="priority"
                            id="priority">
                            <option value="{{ \App\Models\User\Message::PRIORITY_LOW }}">کم</option>
                            <option value="{{ \App\Models\User\Message::PRIORITY_MED }}">متوسط</option>
                            <option value="{{ \App\Models\User\Message::PRIORITY_HIGH }}">زیاد</option>
                        </select>
                        <div class="error text-xs md:text-sm text-red-500 mt-1">
                            @error('priority')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="user_id">کاربر</label>
                        <select class="select w-full max-w-[350px] block mt-2 focus:outline-none" name="user_id"
                            id="user_id">
                            <option disabled selected value="">کاربر را انتخاب کنید</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->fname . ' ' . $user->lname . ' | ' . $user->phone }}</option>
                            @endforeach
                        </select>
                        <div class="error text-xs md:text-sm text-red-500 mt-1">
                            @error('user_id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="all_users">ارسال برای همه کاربران</label>
                        <input type="checkbox" id="all_users" name="all_users" class="toggle mr-2 toggle-primary" />
                        <div class="error text-xs md:text-sm text-red-500 mt-1">
                            @error('all_users')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">ثبت پیام</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog id="delete_modal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <g clip-path="url(#clip0_4418_9821dm)">
                            <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.17004 14.8299L14.83 9.16992" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.83 14.8299L9.17004 9.16992" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_9821dm">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </form>
            <div class="p-4 md:p-5 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="mx-auto mb-4 opacity-75 size-16">
                    <g clip-path="url(#dmm)">
                        <path opacity="0.4"
                            d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2C10.69 2 9.49998 2.85 8.63998 4.4L2.23998 15.92C1.42998 17.39 1.33998 18.8 1.98998 19.91C2.63998 21.02 3.91998 21.63 5.59998 21.63H18.4C20.08 21.63 21.36 21.02 22.01 19.91C22.66 18.8 22.57 17.38 21.76 15.92Z"
                            fill="white" />
                        <path
                            d="M12 14.75C11.59 14.75 11.25 14.41 11.25 14V9C11.25 8.59 11.59 8.25 12 8.25C12.41 8.25 12.75 8.59 12.75 9V14C12.75 14.41 12.41 14.75 12 14.75Z"
                            fill="white" />
                        <path
                            d="M12 18.0005C11.94 18.0005 11.87 17.9905 11.8 17.9805C11.74 17.9705 11.68 17.9505 11.62 17.9205C11.56 17.9005 11.5 17.8705 11.44 17.8305C11.39 17.7905 11.34 17.7505 11.29 17.7105C11.11 17.5205 11 17.2605 11 17.0005C11 16.7405 11.11 16.4805 11.29 16.2905C11.34 16.2505 11.39 16.2105 11.44 16.1705C11.5 16.1305 11.56 16.1005 11.62 16.0805C11.68 16.0505 11.74 16.0305 11.8 16.0205C11.93 15.9905 12.07 15.9905 12.19 16.0205C12.26 16.0305 12.32 16.0505 12.38 16.0805C12.44 16.1005 12.5 16.1305 12.56 16.1705C12.61 16.2105 12.66 16.2505 12.71 16.2905C12.89 16.4805 13 16.7405 13 17.0005C13 17.2605 12.89 17.5205 12.71 17.7105C12.66 17.7505 12.61 17.7905 12.56 17.8305C12.5 17.8705 12.44 17.9005 12.38 17.9205C12.32 17.9505 12.26 17.9705 12.19 17.9805C12.13 17.9905 12.06 18.0005 12 18.0005Z"
                            fill="white" />
                    </g>
                    <defs>
                        <clipPath id="dmm">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <h3 class="mb-5 text-lg font-normal opacity-75">
                    پیام <span id="msg_title" class="text-white font-medium"></span> برای کاربر <span id="msg_user"
                        class="text-white font-medium"></span>
                    حذف شود؟
                </h3>

                <div class="flex justify-center gap-x-2">
                    <button type="button" onclick="deleteForm()" class="btn btn-error ">
                        حذف
                    </button>

                    <form method="dialog">
                        <button class="btn ">
                            انصراف
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </dialog>

    @push('footer_js')
        <script>
            let allUsersToggle = document.getElementById('all_users');
            allUsersToggle.addEventListener('change', function() {

                if (allUsersToggle.checked) {
                    document.getElementById('user_id').disabled = true;
                    document.getElementById('user_id').readOnly = true
                } else {
                    document.getElementById('user_id').disabled = false;
                    document.getElementById('user_id').readOnly = false
                }


            })
        </script>
    @endpush
@endsection
