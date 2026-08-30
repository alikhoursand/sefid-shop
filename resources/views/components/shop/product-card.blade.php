<div class="mx-auto shadow-md shadow-base-300 relative bg-base-100 group card swiper-slide max-w-96 w-full overflow-hidden">
    <figure class="relative overflow-hidden bg-base-300 rounded-box aspect-square">
        @if ($product->qty <= 0)
            <span class="absolute badge badge-error font-bold top-2 right-2 text-xs z-10">
                ناموجود
            </span>
        @elseif($product->off_price != 0)
            <span class="absolute badge badge-error font-bold top-2 right-2 text-xs z-2">
                {{ (int) (100 - ($product->off_price * 100) / $product->price) }} % تخفیف
            </span>
        @endif
        <a href="{{ route('shop.product.view', $product->slug) }}">
            <img src="{{ Storage::url($product->image) }}"
                class="group-hover:scale-110 {{ $product->qty > 0 ? '' : 'grayscale' }} duration-300 rounded-box object-cover"
                alt="{{ $product->slug }}" />
        </a>
        <div
            class="absolute flex items-center group-hover:backdrop-blur-xs bg-base-100/20 rounded-box justify-center h-full w-full bottom-full group-hover:bottom-0">
        </div>
        <div
            class="absolute flex items-center  rounded-box justify-center duration-300 h-full w-full bottom-full group-hover:bottom-0">
            <a href="{{ route('shop.product.view', $product->slug) }}" class="btn btn-primary">
                <x-heroicon-s-eye class="size-6"/>
                مشاهده و خرید
            </a>
        </div>
    </figure>

    <div class="card-body px-2 pt-4 pb-2">
        <a href="{{ route('shop.product.view', $product->slug) }}"
            class="card-title text-sm text-center line-clamp-2 h-10 duration-200 hover:text-primary">{{ $product->title }}</a>
        <div class="w-fit mr-auto">
            <p class="text-base text-right font-semibold text-error h-6 line-through">
                {{ $product->off_price != 0 ? number_format($product->price) : '' }}
            </p>
            <p class="text-base  font-semibold">
                <span class="text-primary">
                    @if ($product->off_price != 0)
                        {{ number_format($product->off_price) }}
                    @else
                        {{ number_format($product->price) }}
                    @endif
                </span>
                <x-shop.toman/>
            </p>
        </div>
    </div>
</div>
