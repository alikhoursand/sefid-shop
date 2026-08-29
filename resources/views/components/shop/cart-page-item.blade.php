<div class="flex flex-col md:flex-row py-4 gap-2 items-center border-base-200">
    <div class="w-full md:basis-6/12 flex gap-4 justify-start">
        <a href="{{ route('shop.product.view', $item->product->slug) }}">
            <img src="{{ Storage::url($item->product->image) }}" class="w-20 object-cover rounded-box aspect-square"
                alt="">
        </a>
        <div class="grow-1 text-sm md:text-base line-clamp-3 h-15 md:h-18">
            {{ $item->product->title }}
        </div>
    </div>
    <div class="w-full py-2 md:basis-3/12 text-center flex md:block justify-between items-center">
        <div class="opacity-75 text-sm md:hidden">قیمت:</div>
        <div class="font-medium">
            <span class="text-base">{{ $item->product->off_price ? number_format($item->product->off_price) : number_format($item->product->price) }}</span>
            <span class="text-sm">تومان</span>
        </div>
    </div>
    <div class="w-full md:basis-3/12 py-2 text-center flex md:block justify-between items-center">
        <div class="opacity-75 md:hidden text-sm">تعداد:</div>
        <div>
            <form action="{{ route('cart.store', $item->product->id) }}" id="qty-form-{{ $item->product->id }}" method="POST"
                class="border-2 bg-base-100 border-base-300 flex w-fit mx-auto items-center rounded-full">
                @csrf
                <input type="hidden" name="action" value="add" id="qty-action-{{ $item->product->id }}">


                <button class="btn btn-sm btn-primary  btn-circle add-btn" onclick="add({{ $item->product->id }})">
                    <span class="add-loading hidden loading loading-spinner loading-sm 2xs:loading-md"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
                <div class="w-10 text-center ">{{ $item->qty }}</div>
                <button class="btn btn-sm btn-error btn-soft btn-circle sub-btn" onclick="sub({{ $item->product->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="{{ $item->qty > 1 ? '' : 'hidden' }} size-4"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                    </svg>

                    {{-- trash --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="{{ $item->qty > 1 ? 'hidden' : '' }} size-5"
                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_4418_98082s{{ $item->product->id }})">
                            <path
                                d="M21 5.98047C17.67 5.65047 14.32 5.48047 10.98 5.48047C9 5.48047 7.02 5.58047 5.04 5.78047L3 5.98047"
                                stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97"
                                stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M18.85 9.14062L18.2 19.2106C18.09 20.7806 18 22.0006 15.21 22.0006H8.79002C6.00002 22.0006 5.91002 20.7806 5.80002 19.2106L5.15002 9.14062"
                                stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_98082s{{ $item->product->id }}">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>


                    <span class="sub-loading hidden loading loading-spinner loading-sm 2xs:loading-md"></span>
                </button>
            </form>
        </div>
    </div>
</div>
