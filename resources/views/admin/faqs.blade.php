@extends('layouts.admin')
@section('content')
    @include('panel.components.pageTitle', ['page_title' => 'سوالات متداول'])

    <div class="grid gap-6 mb-6 grid-cols-4">
        <div class="col-span-4 lg:col-span-2 col-start-0 lg:col-start-2 ">
            <form action="{{ route('admin.faq.store') }}" method="post">
                @csrf
                <label for="ques" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">سوال</label>
                <input type="text" id="ques" name="question" dir="ltr"
                    class="bg-gray-50 text-left border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                @if (session('type'))
                    @if (session('type') == 'create')
                        @error('question')
                            <div class="error text-xs md:text-sm text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    @endif
                @endif
                <label for="ans" class="block mb-2 mt-5 text-sm font-medium text-gray-900 dark:text-white">پاسخ</label>
                <textarea id="ans" rows="4" name="answer"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                @if (session('type'))
                    @if (session('type') == 'create')
                        @error('answer')
                            <div class="error text-xs md:text-sm text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    @endif
                @endif

                <button type="submit"
                    class="text-sm lg:text-base font-medium px-3 py-2 bg-blue-500 hover:bg-blue-500 shadow-md shadow-blue-500/50 dark:shadow-none hover:shadow-none duration-200 transition-all rounded-lg text-white mr-auto mt-3 block">
                    ثبت سوال و پاسخ
                </button>
            </form>
        </div>

        <div class="col-span-4 lg:col-span-2 col-start-0 lg:col-start-2 border-t mt-10 dark:border-white/20 ">
            <div class="my-10">
                <div class=" text-xl text-center dark:text-white">لیست سوالات</div>
            </div>
            <div id="accordion-color" data-accordion="collapse" class=" border-b dark:border-white/10"
                data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                @foreach ($faqs as $key => $faq)
                    <h2 id="acc-{{ $key + 1 }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 {{ $key == 0 ? 'rounded-t-xl' : '' }}  dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#faq-body-{{ $key + 1 }}" aria-expanded="true"
                            aria-controls="faq-body-{{ $key + 1 }}">
                            <span class="question-holder-{{ $key }}">{{ $faq->question }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="faq-body-{{ $key + 1 }}" class="hidden" aria-labelledby="acc-{{ $key + 1 }}">
                        <div class="p-5 border border-b-1 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400 answer-holder" key="{{ $key }}">
                                {{ $faq->answer }}
                            </p>


                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button"
                                faq="{{ $faq->id }}"
                                class="faq-btn px-2 mt-5 mr-auto block lg:px-3 py-1 lg:py-2 text-sm lg:text-base bg-amber-500 shadow-md duration-200 hover:bg-amber-600  transition-all shadow-amber-500/50 dark:shadow-none hover:shadow-none text-white rounded-lg font-medium">
                                ویرایش
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>


            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                ویرایش سوال
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" method="post" action="{{ route('admin.faq.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="faq_id" name="faq_id">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="question"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">سوال</label>
                                    <input type="text" name="question" id="question"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                    @if (session('type'))
                                        @if (session('type') == 'edit')
                                            @error('question')
                                                <div class="error text-xs md:text-sm text-red-500 mt-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                    @endif


                                </div>

                                <div class="col-span-2">
                                    <label for="answer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">پاسخ</label>
                                    <textarea id="answer" name="answer" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    @if (session('type'))
                                        @if (session('type') == 'edit')
                                            @error('answer')
                                                <div class="error text-xs md:text-sm text-red-500 mt-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                    @endif


                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-amber-500 hover:bg-amber-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                ویرایش سوال
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
