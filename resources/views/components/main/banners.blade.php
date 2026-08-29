<section class="max-w-screen-xl mx-auto">
    {{-- 600 x 200 --}}
    <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
        @foreach($banners as $banner)
            <div class="basis-full lg:basis-1/2">
                <a class="text-white h-48">
                    <img src="{{Storage::url($banner->image)}}" alt="" class="rounded-box shadow-md shadow-base-300  w-full">
                </a>
            </div>
        @endforeach
    </div>


</section>
