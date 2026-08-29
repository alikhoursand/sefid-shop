<div class="flex flex-row items-center">
    <div class="basis-full overflow-hidden shadow-md shadow-base-300 rounded-0 md:rounded-box">
        <div id="hero-swiper" class="swiper hero hero-swiper w-full">
            <div class="swiper-wrapper w-full ">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide overflow-hidden ">
                        <a href="{{ $slider->link ?? '#' }}" class="w-full">
                            <img class="slider-image object-center object-cover " src="{{ Storage::url($slider->image) }}"
                                alt="{{ $slider->link ?? 'اسلایدر' }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination "></div>
        </div>
    </div>
</div>
