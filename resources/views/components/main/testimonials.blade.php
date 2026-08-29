<div class="">
    <div class="grid grid-cols-1 items-center justify-center">
        <div class="w-full col-span-1 py-8 relative" style="overflow: hidden">
            <div class="swiper testimonials max-w-[250px] sm:max-w-2xs md:max-w-sm xl:max-w-lg w-full px-10">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="bg-base-300 p-4 rounded-box border border-base-300">
                                <div
                                    class="text-justify line-clamp-8 xs:line-clamp-7 md:line-clamp-6 xl:line-clamp-5 h-40 xs:h-35 md:h-36 xl:h-30  text-sm md:text-base ">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                                    شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                    شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                    باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده
                                </div>
                                <div class="flex items-center mt-6 justify-center gap-x-2">
                                    <div class="bg-base-content text-neutral aspect-square w-fit p-2 rounded-box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             class="size-6 md:size-7"
                                             viewBox="0 0 24 24" fill="none">
                                            <g clip-path="url(#clip0_3111_32739{{$testimonial}})">
                                                <path
                                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path
                                                    d="M20.5901 22C20.5901 18.13 16.7402 15 12.0002 15C7.26015 15 3.41016 18.13 3.41016 22"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3111_32739{{$testimonial}}">
                                                    <rect width="24" height="24" fill="currentColor"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium">رضا رضایی</span>
                                        <span class="text-sm md:text-base text-primary">برنامه‌نویس</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>

</div>
