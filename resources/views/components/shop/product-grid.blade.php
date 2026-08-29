@props([
    'has_fade' => [
        'show'=>false
    ],
    'products' => $products,
    'type'=>'normal'
])

<div class="relative">
    <div class="grid grid-cols-12 gap-x-2 sm:gap-x-4 gap-y-6 py-2 lg:gap-8">
        @foreach ($products as $product)
            <div class="col-span-6 sm:col-span-4 lg:col-span-3">
                <x-shop.product-card :product="$product" :type="$type"></x-shop.product-card>
            </div>
        @endforeach
    </div>

    @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator || $products instanceof \Illuminate\Pagination\Paginator)
        <div>
            {{$products->links()}}
        </div>
    @endif

    @if(isset($has_fade) && $has_fade['show'] === true)
        <div
            class="absolute text-center bottom-0 h-80 bg-gradient-to-t from-base-200 from-10% via-base-200/60 via-60% to-transparent to-100% w-full flex justify-center items-center">
            <a href="{{$has_fade['link']}}" class="btn btn-primary">مشاهده بیشتر</a>
        </div>
    @endif
</div>
