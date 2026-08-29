@extends('user.panel.main')
@section('user_panel')
    <div class="bg-base-100 rounded-box p-4 shadow-md shadow-base-300">
        <div class="">
            <p class="font-medium flex gap-x-2 items-center lg:text-lg">
                <svg class="size-7 inline text-primary" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="#fff">
                    <g clip-path="url(#clip0_4418_1697761598)">
                        <path
                            d="M11.2499 8.08008V10.9401L10.2399 10.5901C9.72992 10.4101 9.41992 10.2401 9.41992 9.37008C9.41992 8.66008 9.94992 8.08008 10.5999 8.08008H11.2499Z"
                            fill="currentColor" />
                        <path
                            d="M14.58 14.6296C14.58 15.3396 14.05 15.9196 13.4 15.9196H12.75V13.0596L13.76 13.4096C14.27 13.5896 14.58 13.7596 14.58 14.6296Z"
                            fill="currentColor" />
                        <path
                            d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.19C2 19.83 4.17 22 7.81 22H16.19C19.83 22 22 19.83 22 16.19V7.81C22 4.17 19.83 2 16.19 2ZM14.26 12C15.04 12.27 16.08 12.84 16.08 14.63C16.08 16.17 14.88 17.42 13.4 17.42H12.75V18C12.75 18.41 12.41 18.75 12 18.75C11.59 18.75 11.25 18.41 11.25 18V17.42H10.89C9.25 17.42 7.92 16.03 7.92 14.33C7.92 13.92 8.25 13.58 8.67 13.58C9.08 13.58 9.42 13.92 9.42 14.33C9.42 15.21 10.08 15.92 10.89 15.92H11.25V12.53L9.74 12C8.96 11.73 7.92 11.16 7.92 9.37C7.92 7.83 9.12 6.58 10.6 6.58H11.25V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V6.58H13.11C14.75 6.58 16.08 7.97 16.08 9.67C16.08 10.08 15.75 10.42 15.33 10.42C14.92 10.42 14.58 10.08 14.58 9.67C14.58 8.79 13.92 8.08 13.11 8.08H12.75V11.47L14.26 12Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_1697761598">
                            <rect width="24" height="24" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
                <span>تراکنش‌ها <span class="text-sm opacity-75">({{ $transactions->total() }})</span></span>
            </p>
        </div>
        <div class="mt-8 flex flex-col gap-y-2">
            @if (count($transactions) > 0)
                @foreach ($transactions as $transaction)
                    <x-user-panel.transaction-single :transaction="$transaction"></x-user-panel.transaction-single>
                @endforeach

                @if ($transactions->total() > 16)
                    <div class="my-8">
                        {{ $transactions->links() }}
                    </div>
                @endif
            @else
                <div class="my-10 flex flex-col gap-y-2">
                    <svg class="size-15 lg:size-20  mx-auto opacity-75" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_4418_169854swds)">
                            <path
                                d="M8.67188 14.3298C8.67188 15.6198 9.66188 16.6598 10.8919 16.6598H13.4019C14.4719 16.6598 15.3419 15.7498 15.3419 14.6298C15.3419 13.4098 14.8119 12.9798 14.0219 12.6998L9.99187 11.2998C9.20187 11.0198 8.67188 10.5898 8.67188 9.36984C8.67188 8.24984 9.54187 7.33984 10.6119 7.33984H13.1219C14.3519 7.33984 15.3419 8.37984 15.3419 9.66984"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 6V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H15C20 2 22 4 22 9V15C22 20 20 22 15 22Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_169854swds">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <span class="opacity-75 text-center mt-4"> تراکنشی ثبت نشده</span>
                </div>
            @endif

        </div>
    </div>
@endsection
