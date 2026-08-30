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
            <span
                class="text-base">{{ $item->product->off_price ? number_format($item->product->off_price) : number_format($item->product->price) }}</span>
            <span class="text-sm">تومان</span>
        </div>
    </div>
    <div class="w-full md:basis-3/12 py-2 text-center flex md:block justify-between items-center">
        <div class="opacity-75 md:hidden text-sm">تعداد:</div>
        <div>
            <form action="{{ route('cart.store', $item->product->id) }}" id="qty-form-{{ $item->product->id }}"
                method="POST"
                class="border-2 bg-base-100 border-base-300 flex w-fit mx-auto items-center rounded-full">
                @csrf
                <input type="hidden" name="action" value="add" id="qty-action-{{ $item->product->id }}">


                <button class="btn btn-sm btn-primary  btn-circle add-btn" onclick="add({{ $item->product->id }})">
                    <span class="add-loading hidden loading loading-spinner loading-sm 2xs:loading-md"></span>
                    <x-heroicon-m-plus class="size-4" />
                </button>
                <div class="w-10 text-center ">{{ $item->qty }}</div>
                <button class="btn btn-sm btn-error btn-soft btn-circle sub-btn"
                    onclick="sub({{ $item->product->id }})">

                    {{-- minus --}}
                    <x-heroicon-m-minus class="size-4 {{ $item->qty > 1 ? '' : 'hidden' }}" />

                    {{-- trash --}}
                    <x-heroicon-o-trash class="{{ $item->qty > 1 ? 'hidden' : '' }} size-5" />
                    <span class="sub-loading hidden loading loading-spinner loading-sm 2xs:loading-md"></span>
                </button>
            </form>
        </div>
    </div>
</div>
