<footer class="bg-base-100 p-2 pt-8 pb-20 mt-12">
    <div class="flex flex-wrap items-start justify-between max-w-screen-xl mx-auto">
        <div class="basis-full lg:basis-1/2 ">
            <div class="font-bold text-primary text-xl  flex items-center gap-x-2">
                <img src="{{asset('logo.png')}}" class="size-12" alt="">
                <span>{{config('app.site_name')}}</span>
            </div>
            <div class="text-sm mt-4 text-justify">
                {{$settings['footer_desc']}}
            </div>
            <div class="mt-4 font-medium">راه های ارتباطی</div>
            <div class="flex items-center mt-2 gap-4">
                <a href="https://t.me/{{$settings['telegram']}}" class="opacity-75 hover:opacity-100">
                    <svg class="size-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12a12 12 0 0 0 12-12A12 12 0 0 0 12 0zm4.962 7.224c.1-.002.321.023.465.14a.5.5 0 0 1 .171.325c.016.093.036.306.02.472c-.18 1.898-.962 6.502-1.36 8.627c-.168.9-.499 1.201-.82 1.23c-.696.065-1.225-.46-1.9-.902c-1.056-.693-1.653-1.124-2.678-1.8c-1.185-.78-.417-1.21.258-1.91c.177-.184 3.247-2.977 3.307-3.23c.007-.032.014-.15-.056-.212s-.174-.041-.249-.024q-.159.037-5.061 3.345q-.72.495-1.302.48c-.428-.008-1.252-.241-1.865-.44c-.752-.245-1.349-.374-1.297-.789q.04-.324.893-.663q5.247-2.286 6.998-3.014c3.332-1.386 4.025-1.627 4.476-1.635"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/{{$settings['instagram']}}" class="opacity-75 hover:opacity-100">
                    <svg class="size-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="M7.03.084c-1.277.06-2.149.264-2.91.563a5.9 5.9 0 0 0-2.124 1.388a5.9 5.9 0 0 0-1.38 2.127C.321 4.926.12 5.8.064 7.076s-.069 1.688-.063 4.947s.021 3.667.083 4.947c.061 1.277.264 2.149.563 2.911c.308.789.72 1.457 1.388 2.123a5.9 5.9 0 0 0 2.129 1.38c.763.295 1.636.496 2.913.552c1.278.056 1.689.069 4.947.063s3.668-.021 4.947-.082c1.28-.06 2.147-.265 2.91-.563a5.9 5.9 0 0 0 2.123-1.388a5.9 5.9 0 0 0 1.38-2.129c.295-.763.496-1.636.551-2.912c.056-1.28.07-1.69.063-4.948c-.006-3.258-.02-3.667-.081-4.947c-.06-1.28-.264-2.148-.564-2.911a5.9 5.9 0 0 0-1.387-2.123a5.9 5.9 0 0 0-2.128-1.38c-.764-.294-1.636-.496-2.914-.55C15.647.009 15.236-.006 11.977 0S8.31.021 7.03.084m.14 21.693c-1.17-.05-1.805-.245-2.228-.408a3.7 3.7 0 0 1-1.382-.895a3.7 3.7 0 0 1-.9-1.378c-.165-.423-.363-1.058-.417-2.228c-.06-1.264-.072-1.644-.08-4.848c-.006-3.204.006-3.583.061-4.848c.05-1.169.246-1.805.408-2.228c.216-.561.477-.96.895-1.382a3.7 3.7 0 0 1 1.379-.9c.423-.165 1.057-.361 2.227-.417c1.265-.06 1.644-.072 4.848-.08c3.203-.006 3.583.006 4.85.062c1.168.05 1.804.244 2.227.408c.56.216.96.475 1.382.895s.681.817.9 1.378c.165.422.362 1.056.417 2.227c.06 1.265.074 1.645.08 4.848c.005 3.203-.006 3.583-.061 4.848c-.051 1.17-.245 1.805-.408 2.23c-.216.56-.477.96-.896 1.38a3.7 3.7 0 0 1-1.378.9c-.422.165-1.058.362-2.226.418c-1.266.06-1.645.072-4.85.079s-3.582-.006-4.848-.06m9.783-16.192a1.44 1.44 0 1 0 1.437-1.442a1.44 1.44 0 0 0-1.437 1.442M5.839 12.012a6.161 6.161 0 1 0 12.323-.024a6.162 6.162 0 0 0-12.323.024M8 12.008A4 4 0 1 1 12.008 16A4 4 0 0 1 8 12.008"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="basis-full sm:basis-1/2 lg:basis-1/4 text-center p-4 lg:p-2">
            <div class="font-semibold text-sm h-8 p-1">دسترسی سریع</div>
            <div class="flex flex-col justify-center items-center gap-y-2 mt-4">
                <a href="{{route('home')}}" class="opacity-75 hover:opacity-100 text-sm w-fit">صفحه اصلی</a>
                <a href="{{route('shop.product.list')}}" class="opacity-75 hover:opacity-100 text-sm w-fit">محصولات</a>
                <a href="{{auth()->check() ? route('user.panel') : route('login')}}" class="opacity-75 hover:opacity-100 text-sm w-fit">حساب
                    کاربری</a>
            </div>
        </div>
        <div class="basis-full sm:basis-1/2 lg:basis-1/4 flex flex-row flex-wrap gap-2 p-2">
            <img src="{{asset('samandehi.png')}}" class="w-full mx-auto max-w-[80px]" alt="">
            <img src="{{asset('enamad.png')}}" class="w-full mx-auto max-w-[80px]" alt="">
        </div>
    </div>
</footer>
