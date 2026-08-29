@extends('user.panel.main')
@section('user_panel')

    <div class="bg-base-100 rounded-box p-4 shadow-md shadow-base-300">
        <div class="">
            <p class="font-medium flex gap-x-2 items-center lg:text-lg">
                <svg class="size-7 inline text-primary" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <g clip-path="url(#clip0_4418_8207sws)">
                        <path
                            d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2ZM14 15.25H7C6.59 15.25 6.25 14.91 6.25 14.5C6.25 14.09 6.59 13.75 7 13.75H14C14.41 13.75 14.75 14.09 14.75 14.5C14.75 14.91 14.41 15.25 14 15.25ZM17 10.25H7C6.59 10.25 6.25 9.91 6.25 9.5C6.25 9.09 6.59 8.75 7 8.75H17C17.41 8.75 17.75 9.09 17.75 9.5C17.75 9.91 17.41 10.25 17 10.25Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_8207sws">
                            <rect width="24" height="24" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
                <span>پیام‌ها</span>
            </p>
        </div>
        <div class="mt-8 flex flex-col gap-y-2">
            @if (count($messages) > 0)
                @foreach ($messages as $message)
                    <div class="collapse collapse-arrow bg-base-300 border border-base-300">
                        <input onclick="readMessage(event,'{{ $message->id }}')"
                            data="{{ $message->status == 1 ? '1' : '2' }}" type="checkbox" name="my-accordion-2" />
                        <div id="message-{{ $message->id }}"
                            class="collapse-title  {{ $message->status == 1 ? 'font-medium' : '' }}  flex flex-col gap-y-4 md:flex-row justify-between md:items-center items-start">

                            <div class="text-right basis-1/4">
                                @if ($message->status == 1)
                                    <div class="status status-secondary"></div>
                                @endif
                                <span class=" mr-2">{{ $message->title }}</span>
                            </div>
                            <div class="text-right basis-1/4">
                                <span class=" mr-2">{{ verta($message->created_at)->format(' %d %B %Y ') }}</span>
                            </div>

                        </div>
                        <div class="collapse-content border-t-2 border-base-content/10">
                            <p class="pt-4">
                                {{ $message->msg }}
                            </p>
                        </div>
                    </div>
                @endforeach

                @if ($messages->total() > 16)
                    <div class="my-8">
                        {{ $messages->links() }}
                    </div>
                @endif
            @else
                <div class=" col-span-full text-center my-10 flex flex-col gap-y-2 ">

                    <svg class="size-15 lg:size-20 mx-auto opacity-75" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_4418_939921)">
                            <path d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 9.5H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 14.5H14" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_939921">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div class="opacity-75 text-center mt-4">
                        پیامی دریافت نشده
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
@section('footer_js')
    <script>
        function readMessage(e, id) {
            if (e.target.getAttribute('data') != 1) {
                return;
            }

            fetch("{{ route('user.message.read') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        message_id: id
                    })
                })
                .then(async res => {
                    if (!res.ok) {
                        const error = await res.json();
                        throw new Error(error.message || 'Something went wrong');
                    }
                    return res.json();
                })
                .then(data => {
                    let msg = document.getElementById(`message-${id}`)
                    if (msg) {
                        msg.classList.remove('font-medium')
                        e.target.setAttribute('data', 2)
                    }
                })

        }
    </script>
@endsection
