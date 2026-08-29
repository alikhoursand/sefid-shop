<div class=" swiper product-slider">
    <div class="swiper-wrapper py-2 rounded-box">
        @foreach ($products as $product)
        <x-shop.product-card :product="$product" :type="'normal'"></x-shop.product-card>
        @endforeach
    </div>
</div>
