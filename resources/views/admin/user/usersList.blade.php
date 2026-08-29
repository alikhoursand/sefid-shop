@extends('layouts.panel')
@section('content')

    <x-admin.page-title :page_title="'لیست کاربران'"></x-admin.page-title>

    <div class="mb-4">
        <form action="{{route('user.search')}}" method="get">
            <div class="flex items-end flex-wrap gap-4">
                <div class="w-[250px]">
                    <label for="name" class="text-sm block mb-2">نام کاربر</label>
                    <input type="text" value="{{request()->name}}" name="name" id="name" class="input  w-full input-sm focus:outline-none">
                </div>
                <div class="w-[250px]">
                    <label for="phone" class="text-sm block mb-2">موبایل</label>
                    <input type="text" value="{{request()->phone}}" id="phone" name="phone" class="input  w-full input-sm focus:outline-none">
                </div>
                <button class="btn btn-success btn-sm">جستحو</button>
            </div>
        </form>
    </div>

    <div class="relative overflow-x-auto rounded-box bg-base-200">
        <table class="w-full text-xs sm:text-sm text-left rtl:text-right">
            <thead class=" bg-base-100">
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
                <tr class="border-base-300 hover:bg-base-content/10">
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
                                <form action="{{ route('user.change.status', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="entity" value="کاربر">
                                    <button class="btn btn-sm  btn-success">
                                        فعال
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('user.change.status', $user->id) }}" method="post">
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
                                    class="btn btn-accent btn-sm btn-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m4.5 18.75 7.5-7.5 7.5 7.5"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m4.5 12.75 7.5-7.5 7.5 7.5"/>
                                </svg>
                            </button>

                            <form id="roleForm-{{ $user->id }}" class="hidden"
                                  action="{{ route('user.change.role', $user->id) }}" method="post">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_4418_9821dma)">
                                <path
                                    d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                    stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.17004 14.8299L14.83 9.16992" stroke="#fff" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.83 14.8299L9.17004 9.16992" stroke="#fff" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_9821dma">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </form>
                <div class="p-4 md:p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         class="mx-auto mb-4 opacity-75 size-16">
                        <g clip-path="url(#pm)">
                            <path opacity="0.4"
                                  d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2C10.69 2 9.49998 2.85 8.63998 4.4L2.23998 15.92C1.42998 17.39 1.33998 18.8 1.98998 19.91C2.63998 21.02 3.91998 21.63 5.59998 21.63H18.4C20.08 21.63 21.36 21.02 22.01 19.91C22.66 18.8 22.57 17.38 21.76 15.92Z"
                                  fill="white"/>
                            <path
                                d="M12 14.75C11.59 14.75 11.25 14.41 11.25 14V9C11.25 8.59 11.59 8.25 12 8.25C12.41 8.25 12.75 8.59 12.75 9V14C12.75 14.41 12.41 14.75 12 14.75Z"
                                fill="white"/>
                            <path
                                d="M12 18.0005C11.94 18.0005 11.87 17.9905 11.8 17.9805C11.74 17.9705 11.68 17.9505 11.62 17.9205C11.56 17.9005 11.5 17.8705 11.44 17.8305C11.39 17.7905 11.34 17.7505 11.29 17.7105C11.11 17.5205 11 17.2605 11 17.0005C11 16.7405 11.11 16.4805 11.29 16.2905C11.34 16.2505 11.39 16.2105 11.44 16.1705C11.5 16.1305 11.56 16.1005 11.62 16.0805C11.68 16.0505 11.74 16.0305 11.8 16.0205C11.93 15.9905 12.07 15.9905 12.19 16.0205C12.26 16.0305 12.32 16.0505 12.38 16.0805C12.44 16.1005 12.5 16.1305 12.56 16.1705C12.61 16.2105 12.66 16.2505 12.71 16.2905C12.89 16.4805 13 16.7405 13 17.0005C13 17.2605 12.89 17.5205 12.71 17.7105C12.66 17.7505 12.61 17.7905 12.56 17.8305C12.5 17.8705 12.44 17.9005 12.38 17.9205C12.32 17.9505 12.26 17.9705 12.19 17.9805C12.13 17.9905 12.06 18.0005 12 18.0005Z"
                                fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="pm">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-base-content/70">
                        کاربر با شماره "<span id="uname" class="text-base-content"></span>" به <span
                            class="text-accent font-semibold">مدیر</span>
                        ارتقا پیدا کند؟
                    </h3>
                    <div class="flex justify-center gap-x-2">
                        <button data-modal-hide="promote-modal" type="button" onclick="sendForm()"
                                class="btn btn-accent">
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
