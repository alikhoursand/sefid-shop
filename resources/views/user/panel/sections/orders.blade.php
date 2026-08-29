@extends('user.panel.main')
@section('user_panel')

    <div class="bg-base-100 rounded-box p-4 shadow-md shadow-base-300">
        <div class="">
            <p class="font-medium flex gap-x-2 items-center lg:text-lg">

                <svg class="size-7 inline text-primary" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="#fff">
                    <g clip-path="url(#clip0_4418_8474ws)">
                        <path
                            d="M20.0001 19.2591H10.9301C10.4801 19.2591 10.1101 18.8891 10.1101 18.4391C10.1101 17.9891 10.4801 17.6191 10.9301 17.6191H20.0001C20.4501 17.6191 20.8201 17.9891 20.8201 18.4391C20.8201 18.8991 20.4501 19.2591 20.0001 19.2591Z"
                            fill="currentColor" />
                        <path
                            d="M20.0001 12.9701H10.9301C10.4801 12.9701 10.1101 12.6001 10.1101 12.1501C10.1101 11.7001 10.4801 11.3301 10.9301 11.3301H20.0001C20.4501 11.3301 20.8201 11.7001 20.8201 12.1501C20.8201 12.6001 20.4501 12.9701 20.0001 12.9701Z"
                            fill="currentColor" />
                        <path
                            d="M20.0001 6.6693H10.9301C10.4801 6.6693 10.1101 6.2993 10.1101 5.8493C10.1101 5.3993 10.4801 5.0293 10.9301 5.0293H20.0001C20.4501 5.0293 20.8201 5.3993 20.8201 5.8493C20.8201 6.2993 20.4501 6.6693 20.0001 6.6693Z"
                            fill="currentColor" />
                        <path
                            d="M4.90993 8.02992C4.68993 8.02992 4.47993 7.93992 4.32993 7.78992L3.41993 6.87992C3.09993 6.55992 3.09993 6.03992 3.41993 5.71992C3.73993 5.39992 4.25993 5.39992 4.57993 5.71992L4.90993 6.04992L7.04993 3.90992C7.36993 3.58992 7.88993 3.58992 8.20993 3.90992C8.52993 4.22992 8.52993 4.74992 8.20993 5.06992L5.48993 7.78992C5.32993 7.93992 5.12993 8.02992 4.90993 8.02992Z"
                            fill="currentColor" />
                        <path
                            d="M4.90993 14.3307C4.69993 14.3307 4.48993 14.2507 4.32993 14.0907L3.41993 13.1807C3.09993 12.8607 3.09993 12.3407 3.41993 12.0207C3.73993 11.7007 4.25993 11.7007 4.57993 12.0207L4.90993 12.3507L7.04993 10.2107C7.36993 9.8907 7.88993 9.8907 8.20993 10.2107C8.52993 10.5307 8.52993 11.0507 8.20993 11.3707L5.48993 14.0907C5.32993 14.2507 5.11993 14.3307 4.90993 14.3307Z"
                            fill="currentColor" />
                        <path
                            d="M4.90993 20.3307C4.69993 20.3307 4.48993 20.2507 4.32993 20.0907L3.41993 19.1807C3.09993 18.8607 3.09993 18.3407 3.41993 18.0207C3.73993 17.7007 4.25993 17.7007 4.57993 18.0207L4.90993 18.3507L7.04993 16.2107C7.36993 15.8907 7.88993 15.8907 8.20993 16.2107C8.52993 16.5307 8.52993 17.0507 8.20993 17.3707L5.48993 20.0907C5.32993 20.2507 5.11993 20.3307 4.90993 20.3307Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_8474ws">
                            <rect width="24" height="24" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
                <span>سفارش‌ها <span class="text-sm opacity-75">({{ $orders->total() }})</span></span>
            </p>
        </div>
        <div class="mt-8 flex flex-col gap-y-2">
            @if (count($orders) > 0)
                @foreach ($orders as $order)
                    <x-user-panel.order-single :order="$order"></x-user-panel.order-single>
                @endforeach

                @if ($orders->total() > 16)
                    <div class="my-8">
                        {{ $orders->links() }}
                    </div>
                @endif
            @else
                <div class="my-10 flex flex-col gap-y-2">
                    <svg class="size-15 lg:size-20  mx-auto opacity-75" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_4418_736199lons)">
                            <path d="M11 19.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11 12.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11 5.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M3 5.5L4 6.5L7 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M3 12.5L4 13.5L7 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M3 19.5L4 20.5L7 17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_736199lons">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="opacity-75 text-center mt-4"> سفارشی ثبت نشده</span>
                </div>
            @endif
        </div>
    </div>

@endsection
