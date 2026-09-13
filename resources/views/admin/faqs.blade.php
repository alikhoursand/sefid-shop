@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'سوالات متداول'" />

    <div class="">
        <div class="bg-base-100 rounded-box shadow-md shadow-base-300 p-4">
            <form action="{{ route('admin.faq.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="ques" class="block mb-2 text-sm">سوال</label>
                        <input type="text" id="ques" name="question" class="input focus:outline-none w-full" />
                        @error('question')
                            <div class="error text-xs md:text-sm text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="ans" class="block mb-2 text-sm">پاسخ</label>
                        <textarea id="ans" rows="4" name="answer" class="textarea w-full focus:outline-none"></textarea>
                        @error('answer')
                            <div class="error text-xs md:text-sm text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-4">
                    ثبت سوال و پاسخ
                </button>
            </form>
        </div>
        <div class="bg-base-100 mt-8 rounded-box shadow-md shadow-base-300 p-4">
            <div class="mb-6">
                <div class="text-center text-lg font-medium">لیست سوالات</div>
            </div>
            <div class="space-y-4">
                @foreach ($faqs as $faq)
                    <div>
                        <div>
                            <div class="collapse collapse-arrow bg-base-100 border-2 border-base-300">
                                <input type="checkbox" name="my-accordion-2" id="faq-{{ $faq->id }}" />
                                <div class="text-sm sm:text-base collapse-title" id="faq-ques-{{ $faq->id }}">
                                    {{ $faq->question }}</div>
                                <div class="collapse-content bg-base-100 text-sm ">
                                    <div class="divider"></div>
                                    <div class="mt-4 text-justify" id="faq-ans-{{ $faq->id }}">{{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button onclick="editFaq({{ $faq->id }})" class="mt-2 btn btn-sm btn-warning">
                            <x-heroicon-s-pencil class="size-4" />
                            ویرایش
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <dialog id="edit_faq" class="modal">
        <div class="modal-box p-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold">ویرایش دسته‌بندی</h3>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost">
                        <x-heroicon-s-x-mark class="size-5" />
                    </button>
                </form>
            </div>
            <div class="divider"></div>
            <div>
                <form class="" id="updateFaq" method="post" action="{{ route('admin.faq.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_faq_id" name="faq_id">

                    <div class="space-y-4">
                        <div>
                            <label for="edit_ques" class="block mb-2 text-sm">سوال</label>
                            <input type="text" id="edit_ques" name="question" class="input focus:outline-none w-full" />
                            @error('question')
                                <div class="error text-xs md:text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="edit_ans" class="block mb-2 text-sm">پاسخ</label>
                            <textarea id="edit_ans" rows="4" name="answer" class="textarea w-full focus:outline-none"></textarea>
                            @error('answer')
                                <div class="error text-xs md:text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-action items-center justify-between">
                <button onclick="updateFaq()" class="btn btn-warning grow" id="updateFaqBtn">
                    ویرایش
                </button>
                <form method="dialog">
                    <button class="btn">انصراف</button>
                </form>
            </div>
        </div>
    </dialog>
@endsection

@push('footer_js')
    <script>
        function editFaq(id) {
            document.getElementById('edit_faq_id').value = id;

            if (!document.getElementById(`faq-${id}`).checked) {
                document.getElementById(`faq-${id}`).click();
            }

            setTimeout(() => {
                document.getElementById('edit_ques').value = document.getElementById(`faq-ques-${id}`).innerText;
                document.getElementById('edit_ans').value = document.getElementById(`faq-ans-${id}`).innerText;
                document.getElementById('edit_faq').showModal()
            }, 100);
        }

        function updateFaq() {
            document.getElementById('updateFaq').submit();
        }
    </script>
@endpush
