<a href="{{ route('shop.category.view', $category->slug) }}">
    <div class="border-dashed border-2 border-base-300 hover:border-primary duration-300 rounded-full p-1">
        <img src="{{ Storage::url($category->image) }}" class="aspect-square object-cover rounded-full" alt="">
    </div>
    <div class="text-center text-sm md:text-base mt-2 font-medium h-12">{{ $category->title }}</div>
</a>
