<div class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
    @foreach ($categories as $category)
        <div class="">
            <x-shop.category-single :category="$category"></x-shop.category-single>
        </div>
    @endforeach
</div>
