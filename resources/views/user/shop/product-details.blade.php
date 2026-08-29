@extends('layouts.index')
@section('content')

    <section class="max-w-screen-xl mt-4 md:mt-8 lg:mt-12 mx-auto px-2">
       <div class="px-4 mb-4">
           <x-main.breadcrumbs :breadcrumbs="[
                       [
                           'title' => 'صفحه اصلی',
                           'link' => route('home'),
                       ],
                       [
                           'title' => 'فروشگاه',
                           'link' => route('shop.product.list'),
                       ],
                       [
                           'title' => $product->category->title,
                           'link'=>route('shop.category.view',$product->category->slug),
                           'color'=>'primary'
                       ],
                   ]"></x-main.breadcrumbs>
       </div>
        <div class=" grid grid-cols-12 gap-6 ">
            <div
                class="col-span-12 col-start-1 col-end-13 xs:col-span-10 xs:col-start-2 xs:col-end-12 sm:col-span-8 sm:col-start-3 sm:col-end-11 lg:col-span-5 xl:col-span-5">
                {{--slider start--}}
                <div class="swiper product-gallery">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{Storage::url($product->image)}}"
                                 class="mx-auto aspect-square object-cover rounded-box max-w-[500px] w-full"/>
                        </div>
                        @foreach($product->images as $image)
                            <div class="swiper-slide">
                                <img src="{{Storage::url($image->image)}}" alt="{{$product->slug}}"
                                     class="mx-auto aspect-square object-cover rounded-box max-w-[500px] w-full"/>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div thumbsSlider="" class="swiper product-thumbs mt-2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{Storage::url($product->image)}}"
                                 class="opacity-90 aspect-square object-cover rounded-box"/>
                        </div>
                        @foreach($product->images as $image)
                            <div class="swiper-slide">
                                <img src="{{Storage::url($image->image)}}"
                                     class="opacity-90 aspect-square object-cover rounded-box"/>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{--slider end--}}
            </div>
            <div class="col-span-12 lg:col-span-7 xl:col-span-7">

                <h3 class="text-base pt-2 xs:text-lg lg:text-2xl font-bold lg:font-medium line-clamp-2 h-12 xs:h-14 lg:h-16 mt-4 md:mt-0">
                    {{ $product->title }}
                </h3>
                <div class="flex items-center gap-x-1 opacity-75 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="24" height="24" viewBox="0 0 24 24"
                         fill="none">
                        <g clip-path="url(#clip0_4418_8711tt)">
                            <path
                                d="M18.6699 2H16.7699C14.5899 2 13.4399 3.15 13.4399 5.33V7.23C13.4399 9.41 14.5899 10.56 16.7699 10.56H18.6699C20.8499 10.56 21.9999 9.41 21.9999 7.23V5.33C21.9999 3.15 20.8499 2 18.6699 2Z"
                                fill="currentColor"/>
                            <path
                                d="M7.24 13.4297H5.34C3.15 13.4297 2 14.5797 2 16.7597V18.6597C2 20.8497 3.15 21.9997 5.33 21.9997H7.23C9.41 21.9997 10.56 20.8497 10.56 18.6697V16.7697C10.57 14.5797 9.42 13.4297 7.24 13.4297Z"
                                fill="currentColor"/>
                            <path
                                d="M6.29 10.58C8.6593 10.58 10.58 8.6593 10.58 6.29C10.58 3.9207 8.6593 2 6.29 2C3.9207 2 2 3.9207 2 6.29C2 8.6593 3.9207 10.58 6.29 10.58Z"
                                fill="currentColor"/>
                            <path
                                d="M17.7099 21.9999C20.0792 21.9999 21.9999 20.0792 21.9999 17.7099C21.9999 15.3406 20.0792 13.4199 17.7099 13.4199C15.3406 13.4199 13.4199 15.3406 13.4199 17.7099C13.4199 20.0792 15.3406 21.9999 17.7099 21.9999Z"
                                fill="currentColor"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_8711tt">
                                <rect width="24" height="24" fill="currentColor"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p>دسته‌بندی: {{ $product->category->title }}</p>
                </div>
                <div class="flex items-center gap-x-1 opacity-75 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="24" height="24" viewBox="0 0 24 24"
                         fill="none">
                        <g clip-path="url(#clip0_4418_8272)">
                            <path
                                d="M20.21 7.81945L12.51 12.2795C12.2 12.4595 11.81 12.4595 11.49 12.2795L3.78997 7.81945C3.23997 7.49945 3.09997 6.74945 3.51997 6.27945C3.80997 5.94945 4.13997 5.67945 4.48997 5.48945L9.90997 2.48945C11.07 1.83945 12.95 1.83945 14.11 2.48945L19.53 5.48945C19.88 5.67945 20.21 5.95945 20.5 6.27945C20.9 6.74945 20.76 7.49945 20.21 7.81945Z"
                                fill="currentColor"/>
                            <path
                                d="M11.43 14.1409V20.9609C11.43 21.7209 10.66 22.2209 9.97998 21.8909C7.91998 20.8809 4.44998 18.9909 4.44998 18.9909C3.22998 18.3009 2.22998 16.5609 2.22998 15.1309V9.97086C2.22998 9.18086 3.05998 8.68086 3.73998 9.07086L10.93 13.2409C11.23 13.4309 11.43 13.7709 11.43 14.1409Z"
                                fill="currentColor"/>
                            <path
                                d="M12.5701 14.1409V20.9609C12.5701 21.7209 13.3401 22.2209 14.0201 21.8909C16.0801 20.8809 19.5501 18.9909 19.5501 18.9909C20.7701 18.3009 21.7701 16.5609 21.7701 15.1309V9.97086C21.7701 9.18086 20.9401 8.68086 20.2601 9.07086L13.0701 13.2409C12.7701 13.4309 12.5701 13.7709 12.5701 14.1409Z"
                                fill="currentColor"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_8272">
                                <rect width="24" height="24" fill="currentColor"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p>موجودی انبار: {{$product->qty > 0 ? $product->qty .' عدد' : 'ناموجود'}} </p>
                </div>
                <div class="mt-12 text-center lg:text-right hidden sm:block">

                    <div class="text-2xl font-bold {{$product->off_price ? 'opacity-75 line-through text-error':''}}">
                        {{number_format($product->price)}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14"
                             class="size-6 {{$product->off_price ? 'hidden':'inline'}}">
                            <path fill-rule="evenodd"
                                  d="M3.057 1.742L3.821 1l.78.75-.776.741-.768-.749zm3.23 2.48c0 .622-.16 1.111-.478 1.467-.201.221-.462.39-.783.505a3.251 3.251 0 01-1.083.163h-.555c-.421 0-.801-.074-1.139-.223a2.045 2.045 0 01-.9-.738A2.238 2.238 0 011 4.148c0-.059.001-.117.004-.176.03-.55.204-1.158.525-1.827l1.095.484c-.257.532-.397 1-.419 1.403-.002.04-.004.08-.004.12 0 .252.055.458.166.618a.887.887 0 00.5.354c.085.028.178.048.278.06.079.01.16.014.243.014h.555c.458 0 .769-.081.933-.244.14-.139.21-.383.21-.731V2.02h1.2v2.202zm5.433 3.184l-.72-.7.709-.706.735.707-.724.7zm-2.856.308c.542 0 .973.19 1.293.569.297.346.445.777.445 1.293v.364h.18v-.004h.41c.221 0 .377-.028.467-.084.093-.055.14-.14.14-.258v-.069c.004-.243.017-1.044 0-1.115L13 8.05v1.574a1.4 1.4 0 01-.287.863c-.306.405-.804.607-1.495.607h-.627c-.061.733-.434 1.257-1.117 1.573-.267.122-.58.21-.937.265a5.845 5.845 0 01-.914.067v-1.159c.612 0 1.072-.082 1.38-.247.25-.132.376-.298.376-.499h-.515c-.436 0-.807-.113-1.113-.339-.367-.273-.55-.667-.55-1.18 0-.488.122-.901.367-1.24.296-.415.728-.622 1.296-.622zm.533 2.226v-.364c0-.217-.048-.389-.143-.516a.464.464 0 00-.39-.187.478.478 0 00-.396.187.705.705 0 00-.136.449.65.65 0 00.003.067c.008.125.066.22.177.283.093.054.21.08.352.08h.533zM9.5 6.707l.72.7.724-.7L10.209 6l-.709.707zm-6.694 4.888h.03c.433-.01.745-.106.937-.29.024.012.065.035.12.068l.074.039.081.042c.135.073.261.133.379.18.345.146.67.22.977.22a1.216 1.216 0 00.87-.34c.3-.285.449-.714.449-1.286a2.19 2.19 0 00-.335-1.145c-.299-.457-.732-.685-1.3-.685-.502 0-.916.192-1.242.575-.113.132-.21.284-.294.456-.032.062-.06.125-.084.191a.504.504 0 00-.03.078 1.67 1.67 0 00-.022.06c-.103.309-.171.485-.205.53-.072.09-.214.14-.427.147-.123-.005-.209-.03-.256-.076-.057-.054-.085-.153-.085-.297V7l-1.201-.5v3.562c0 .261.048.496.143.703.071.158.168.296.29.413.123.118.266.211.43.28.198.084.42.13.665.136v.001h.036zm2.752-1.014a.778.778 0 00.044-.353.868.868 0 00-.165-.47c-.1-.134-.217-.201-.35-.201-.18 0-.33.103-.447.31-.042.071-.08.158-.114.262a2.434 2.434 0 00-.04.12l-.015.053-.015.046c.142.118.323.216.544.293.18.062.325.092.433.092.044 0 .086-.05.125-.152z"
                                  clip-rule="evenodd" fill="currentColor">
                            </path>
                        </svg>
                    </div>
                    @if($product->off_price != 0)
                        <div class="text-2xl font-bold">
                            {{number_format($product->off_price)}}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" class="size-6 inline">
                                <path fill-rule="evenodd"
                                      d="M3.057 1.742L3.821 1l.78.75-.776.741-.768-.749zm3.23 2.48c0 .622-.16 1.111-.478 1.467-.201.221-.462.39-.783.505a3.251 3.251 0 01-1.083.163h-.555c-.421 0-.801-.074-1.139-.223a2.045 2.045 0 01-.9-.738A2.238 2.238 0 011 4.148c0-.059.001-.117.004-.176.03-.55.204-1.158.525-1.827l1.095.484c-.257.532-.397 1-.419 1.403-.002.04-.004.08-.004.12 0 .252.055.458.166.618a.887.887 0 00.5.354c.085.028.178.048.278.06.079.01.16.014.243.014h.555c.458 0 .769-.081.933-.244.14-.139.21-.383.21-.731V2.02h1.2v2.202zm5.433 3.184l-.72-.7.709-.706.735.707-.724.7zm-2.856.308c.542 0 .973.19 1.293.569.297.346.445.777.445 1.293v.364h.18v-.004h.41c.221 0 .377-.028.467-.084.093-.055.14-.14.14-.258v-.069c.004-.243.017-1.044 0-1.115L13 8.05v1.574a1.4 1.4 0 01-.287.863c-.306.405-.804.607-1.495.607h-.627c-.061.733-.434 1.257-1.117 1.573-.267.122-.58.21-.937.265a5.845 5.845 0 01-.914.067v-1.159c.612 0 1.072-.082 1.38-.247.25-.132.376-.298.376-.499h-.515c-.436 0-.807-.113-1.113-.339-.367-.273-.55-.667-.55-1.18 0-.488.122-.901.367-1.24.296-.415.728-.622 1.296-.622zm.533 2.226v-.364c0-.217-.048-.389-.143-.516a.464.464 0 00-.39-.187.478.478 0 00-.396.187.705.705 0 00-.136.449.65.65 0 00.003.067c.008.125.066.22.177.283.093.054.21.08.352.08h.533zM9.5 6.707l.72.7.724-.7L10.209 6l-.709.707zm-6.694 4.888h.03c.433-.01.745-.106.937-.29.024.012.065.035.12.068l.074.039.081.042c.135.073.261.133.379.18.345.146.67.22.977.22a1.216 1.216 0 00.87-.34c.3-.285.449-.714.449-1.286a2.19 2.19 0 00-.335-1.145c-.299-.457-.732-.685-1.3-.685-.502 0-.916.192-1.242.575-.113.132-.21.284-.294.456-.032.062-.06.125-.084.191a.504.504 0 00-.03.078 1.67 1.67 0 00-.022.06c-.103.309-.171.485-.205.53-.072.09-.214.14-.427.147-.123-.005-.209-.03-.256-.076-.057-.054-.085-.153-.085-.297V7l-1.201-.5v3.562c0 .261.048.496.143.703.071.158.168.296.29.413.123.118.266.211.43.28.198.084.42.13.665.136v.001h.036zm2.752-1.014a.778.778 0 00.044-.353.868.868 0 00-.165-.47c-.1-.134-.217-.201-.35-.201-.18 0-.33.103-.447.31-.042.071-.08.158-.114.262a2.434 2.434 0 00-.04.12l-.015.053-.015.046c.142.118.323.216.544.293.18.062.325.092.433.092.044 0 .086-.05.125-.152z"
                                      clip-rule="evenodd" fill="currentColor">
                                </path>
                            </svg>
                        </div>
                    @endif
                    @if($in_cart)
                        <div class="text-primary mt-4 text-sm">
                            <svg class="inline my-2 size-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="#fff">
                                <g clip-path="url(#clip0_4418_4786)">
                                    <path opacity="0.4"
                                          d="M16.1899 8.86039C15.7999 8.86039 15.4899 8.55039 15.4899 8.16039V6.88039C15.4899 5.90039 15.0699 4.96039 14.3499 4.30039C13.6099 3.63039 12.6599 3.32039 11.6599 3.41039C9.97986 3.57039 8.50986 5.28039 8.50986 7.06039V7.96039C8.50986 8.35039 8.19986 8.66039 7.80986 8.66039C7.41986 8.66039 7.10986 8.35039 7.10986 7.96039V7.06039C7.10986 4.56039 9.12986 2.25039 11.5199 2.02039C12.9099 1.89039 14.2499 2.33039 15.2799 3.27039C16.2999 4.19039 16.8799 5.51039 16.8799 6.88039V8.16039C16.8799 8.55039 16.5699 8.86039 16.1899 8.86039Z"
                                          fill="currentColor"/>
                                    <path
                                        d="M19.9602 8.96008C19.1202 8.03008 17.7402 7.58008 15.7202 7.58008H8.28023C6.26023 7.58008 4.88023 8.03008 4.04023 8.96008C3.07023 10.0401 3.10023 11.4801 3.21023 12.4801L3.91023 18.0501C4.12023 20.0001 4.91023 22.0001 9.21023 22.0001H14.7902C19.0902 22.0001 19.8802 20.0001 20.0902 18.0601L20.7902 12.4701C20.9002 11.4801 20.9302 10.0401 19.9602 8.96008ZM12.0002 18.5801C9.91023 18.5801 8.21023 16.8801 8.21023 14.7901C8.21023 12.7001 9.91023 11.0001 12.0002 11.0001C14.0902 11.0001 15.7902 12.7001 15.7902 14.7901C15.7902 16.8801 14.0902 18.5801 12.0002 18.5801Z"
                                        fill="currentColor"/>
                                    <path opacity="0.4"
                                          d="M12 18.58C14.0931 18.58 15.79 16.8832 15.79 14.79C15.79 12.6968 14.0931 11 12 11C9.9068 11 8.20996 12.6968 8.20996 14.79C8.20996 16.8832 9.9068 18.58 12 18.58Z"
                                          fill="currentColor"/>
                                    <path
                                        d="M11.4299 16.64C11.2399 16.64 11.0499 16.57 10.8999 16.42L9.90988 15.43C9.61988 15.14 9.61988 14.66 9.90988 14.37C10.1999 14.08 10.6799 14.08 10.9699 14.37L11.4499 14.85L13.0499 13.37C13.3499 13.09 13.8299 13.11 14.1099 13.41C14.3899 13.71 14.3699 14.19 14.0699 14.47L11.9399 16.44C11.7899 16.57 11.6099 16.64 11.4299 16.64Z"
                                        fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_4418_4786">
                                        <rect width="24" height="24" fill="currentColor"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="font-medium">در سبد خرید موجود است</span>
                        </div>
                    @endif
                    @if($product->qty > 0)
                        <form action="{{route('cart.store',$product->id)}}" method="post" class="mt-4" id="qty-form">
                            @csrf
                            <input type="hidden" name="action" value="add" id="qty-action">
                            @if($in_cart)
                                <div
                                    class="w-fit rounded-full items-center border-2 border-base-300 flex lg:ml-auto lg:mr-0 mx-auto bg-base-100">
                                    <button type="button" class="btn btn-lg btn-primary btn-circle"
                                            @disabled($in_cart==$product->qty)
                                            onclick="add()">
                                        <span class="add-loading hidden loading loading-spinner loading-lg"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" class="size-7" fill="none">
                                            <g clip-path="url(#clip0_4418_98252)">
                                                <path d="M6 12H18" stroke="currentColor" stroke-width="2"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 18V6" stroke="currentColor" stroke-width="2"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_4418_98252">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                    <div class="text-lg font-semibold text-center w-20">{{$in_cart}}</div>
                                    <input type="hidden" value="{{$in_cart}}" readonly style="pointer-events: none"
                                           tabindex="-1"
                                           class="text-lg input-lg font-semibold text-center no-arrows input rounded-none focus:outline-none"
                                           name="qty" id="qty">
                                    <button type="button" class="btn btn-lg btn-error btn-circle btn-soft"
                                            onclick="sub()">
                                        @if($in_cart == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 class="size-6" viewBox="0 0 24 24" fill="none">
                                                <g clip-path="url(#clip0_4418_980821)">
                                                    <path
                                                        d="M21 5.98047C17.67 5.65047 14.32 5.48047 10.98 5.48047C9 5.48047 7.02 5.58047 5.04 5.78047L3 5.98047"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                    <path
                                                        d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                    <path
                                                        d="M18.85 9.14062L18.2 19.2106C18.09 20.7806 18 22.0006 15.21 22.0006H8.79002C6.00002 22.0006 5.91002 20.7806 5.80002 19.2106L5.15002 9.14062"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                    <path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="2"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="2"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_4418_980821">
                                                        <rect width="24" height="24" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 class="size-7" viewBox="0 0 24 24" fill="none">
                                                <g clip-path="url(#clip0_4418_9826)">
                                                    <path d="M6 12H18" stroke="currentColor" stroke-width="2"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_4418_9826">
                                                        <rect width="24" height="24" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        @endif
                                        <span class="sub-loading hidden loading loading-spinner loading-lg"></span>
                                    </button>
                                </div>
                            @else
                                <button class=" btn btn-lg btn-primary btn-block lg:w-80">افزودن به سبد خرید</button>
                            @endif
                        </form>
                    @elseif($product->qty > 0 && $in_cart == $product->qty)
                        <div class="mt-4">
                            <button class=" btn btn-lg btn-error btn-block lg:w-64 max-w-80 btn-soft">ناموجود</button>
                        </div>
                    @else
                        <div class="mt-4">
                            <button class=" btn btn-lg btn-error btn-block lg:w-64 max-w-80 btn-soft">ناموجود</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class=" max-w-screen-xl mx-auto px-2 mt-8">
        <div>
            <div class="tabs tabs-border">
                <label class="tab font-medium ">
                    <input type="radio" name="my_tabs_4" checked="checked"/>
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 ml-2" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_4418_79204850)">
                            <path
                                d="M21 5.25H14C13.59 5.25 13.25 4.91 13.25 4.5C13.25 4.09 13.59 3.75 14 3.75H21C21.41 3.75 21.75 4.09 21.75 4.5C21.75 4.91 21.41 5.25 21 5.25Z"
                                fill="currentColor"/>
                            <path
                                d="M21 10.25H14C13.59 10.25 13.25 9.91 13.25 9.5C13.25 9.09 13.59 8.75 14 8.75H21C21.41 8.75 21.75 9.09 21.75 9.5C21.75 9.91 21.41 10.25 21 10.25Z"
                                fill="currentColor"/>
                            <path
                                d="M21 15.25H3C2.59 15.25 2.25 14.91 2.25 14.5C2.25 14.09 2.59 13.75 3 13.75H21C21.41 13.75 21.75 14.09 21.75 14.5C21.75 14.91 21.41 15.25 21 15.25Z"
                                fill="currentColor"/>
                            <path
                                d="M21 20.25H3C2.59 20.25 2.25 19.91 2.25 19.5C2.25 19.09 2.59 18.75 3 18.75H21C21.41 18.75 21.75 19.09 21.75 19.5C21.75 19.91 21.41 20.25 21 20.25Z"
                                fill="currentColor"/>
                            <path
                                d="M7.92 3.5H5.08C3.68 3.5 3 4.18 3 5.58V8.43C3 9.83 3.68 10.51 5.08 10.51H7.93C9.33 10.51 10.01 9.83 10.01 8.43V5.58C10 4.18 9.32 3.5 7.92 3.5Z"
                                fill="currentColor"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_79204850">
                                <rect width="24" height="24" fill="currentColor"/>
                            </clipPath>
                        </defs>
                    </svg>
                    توضیحات محصول
                </label>
                <div class="tab-content rounded-box bg-base-300 p-4 md:p-6">
                    <p class="text-justify text-sm sm:text-base">
                        {{$product->desc}}
                    </p>
                </div>
                @if($product->help)
                    <label class="tab font-medium ">
                        <input type="radio" name="my_tabs_4" checked="checked"/>
                        <svg class="size-6 ml-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="#fff">
                            <g clip-path="url(#clip0_4418_8725lo)">
                                <path
                                    d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM11.5 17.25C11.5 17.61 11.14 17.85 10.81 17.71C9.6 17.19 8.02 16.71 6.92 16.57L6.73 16.55C6.12 16.47 5.62 15.9 5.62 15.28V7.58C5.62 6.81 6.24 6.24 7 6.3C8.25 6.4 10.1 7 11.26 7.66C11.42 7.75 11.5 7.92 11.5 8.09V17.25ZM18.38 15.27C18.38 15.89 17.88 16.46 17.27 16.54L17.06 16.56C15.97 16.71 14.4 17.18 13.19 17.69C12.86 17.83 12.5 17.59 12.5 17.23V8.08C12.5 7.9 12.59 7.73 12.75 7.64C13.91 6.99 15.72 6.41 16.95 6.3H16.99C17.76 6.3 18.38 6.92 18.38 7.69V15.27Z"
                                    fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_8725lo">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                        آموزش استفاده
                    </label>
                    <div class="tab-content rounded-box bg-base-300 p-4 md:p-6">
                        <p class="text-justify text-sm sm:text-base">
                            {{$product->desc}}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class=" bg-base-300  mt-12 py-8 px-2">
        <div class="max-w-screen-xl mx-auto">
            <x-main.section-title :title="'محصولات مرتبط'" :show_divider="true"></x-main.section-title>
            <x-shop.product-slider :products="$similar_products"></x-shop.product-slider>
        </div>
    </section>

    <div
        class="absolute sticky bg-base-100 bottom-0 w-full z-10  border-t-2 border-base-content/10 p-2 sm:hidden w-full ">
        <div class="flex items-center justify-between">
            <div class="">
                @if($in_cart)
                    <div class="text-primary text-xs grow-1 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 inline" width="24" height="24"
                             viewBox="0 0 24 24" fill="currentColor">
                            <g clip-path="url(#clip0_4418_4946)">
                                <path opacity="0.4"
                                      d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2Z"
                                      fill="currentColor"/>
                                <path
                                    d="M10.5799 15.5796C10.3799 15.5796 10.1899 15.4996 10.0499 15.3596L7.21994 12.5296C6.92994 12.2396 6.92994 11.7596 7.21994 11.4696C7.50994 11.1796 7.98994 11.1796 8.27994 11.4696L10.5799 13.7696L15.7199 8.62961C16.0099 8.33961 16.4899 8.33961 16.7799 8.62961C17.0699 8.91961 17.0699 9.39961 16.7799 9.68961L11.1099 15.3596C10.9699 15.4996 10.7799 15.5796 10.5799 15.5796Z"
                                    fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_4946">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span>در سبد خرید موجود است</span>
                    </div>
                @endif
                @if($product->qty <= 0)
                    <div class="text-error text-xs grow-1 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 inline" width="24" height="24"
                             viewBox="0 0 24 24" fill="currentColor">
                            <g clip-path="url(#clip0_4418_4946)">
                                <path opacity="0.4"
                                      d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2Z"
                                      fill="currentColor"/>
                                <path
                                    d="M10.5799 15.5796C10.3799 15.5796 10.1899 15.4996 10.0499 15.3596L7.21994 12.5296C6.92994 12.2396 6.92994 11.7596 7.21994 11.4696C7.50994 11.1796 7.98994 11.1796 8.27994 11.4696L10.5799 13.7696L15.7199 8.62961C16.0099 8.33961 16.4899 8.33961 16.7799 8.62961C17.0699 8.91961 17.0699 9.39961 16.7799 9.68961L11.1099 15.3596C10.9699 15.4996 10.7799 15.5796 10.5799 15.5796Z"
                                    fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_4946">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span>در انبار موجود نیست</span>
                    </div>
                @endif
                <input type="hidden" name="action" value="add" id="qty-action">

                @if($product->qty > 0)
                    @if($in_cart)
                        <div
                            class="flex lg:ml-auto lg:mr-0 w-fit items-center border-2 bg-base-300 rounded-full border-base-content/10">
                            <button type="button" class="btn btn-sm 2xs:btn-md btn-soft btn-circle btn-primary "
                                    onclick="add()">
                                <span
                                    class="add-loading hidden loading loading-spinner loading-sm 2xs:loading-md"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <g clip-path="url(#clip0_4418_98252)">
                                        <path d="M6 12H18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M12 18V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_98252">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <div class="w-10 text-center">{{$in_cart}}</div>
                            <button type="button" class="btn btn-sm 2xs:btn-md btn-circle btn-soft btn-error "
                                    onclick="sub()">

                                @if($in_cart > 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class=" size-5"
                                         viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_4418_9826)">
                                            <path d="M6 12H18" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_4418_9826">
                                                <rect width="24" height="24" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class=" size-5"
                                         viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_4418_980821)">
                                            <path
                                                d="M21 5.98047C17.67 5.65047 14.32 5.48047 10.98 5.48047C9 5.48047 7.02 5.58047 5.04 5.78047L3 5.98047"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                            <path
                                                d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                            <path
                                                d="M18.85 9.14062L18.2 19.2106C18.09 20.7806 18 22.0006 15.21 22.0006H8.79002C6.00002 22.0006 5.91002 20.7806 5.80002 19.2106L5.15002 9.14062"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                            <path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_4418_980821">
                                                <rect width="24" height="24" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                @endif

                                <span
                                    class="sub-loading hidden loading loading-spinner loading-sm 2xs:loading-md"></span>
                            </button>
                        </div>
                    @else
                        <button class="btn btn-primary btn-wide" onclick="add()">افزودن به سبد خرید</button>
                    @endif

                @elseif($product->qty > 0 && $in_cart == $product->qty)
                    <div class="mt-4">
                        <button class=" btn btn-error btn-wide btn-soft">ناموجود
                        </button>
                    </div>
                @else
                    <div class="mt-4">
                        <button class=" btn btn-error btn-wide btn-soft">ناموجود
                        </button>
                    </div>

                @endif
            </div>
            <div class=" flex flex-row gap-x-2 items-center">
                <div class="text-base xs:text-lg font-medium">{{number_format($product['price'])}}</div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" class="size-5 inline">
                    <path fill-rule="evenodd"
                          d="M3.057 1.742L3.821 1l.78.75-.776.741-.768-.749zm3.23 2.48c0 .622-.16 1.111-.478 1.467-.201.221-.462.39-.783.505a3.251 3.251 0 01-1.083.163h-.555c-.421 0-.801-.074-1.139-.223a2.045 2.045 0 01-.9-.738A2.238 2.238 0 011 4.148c0-.059.001-.117.004-.176.03-.55.204-1.158.525-1.827l1.095.484c-.257.532-.397 1-.419 1.403-.002.04-.004.08-.004.12 0 .252.055.458.166.618a.887.887 0 00.5.354c.085.028.178.048.278.06.079.01.16.014.243.014h.555c.458 0 .769-.081.933-.244.14-.139.21-.383.21-.731V2.02h1.2v2.202zm5.433 3.184l-.72-.7.709-.706.735.707-.724.7zm-2.856.308c.542 0 .973.19 1.293.569.297.346.445.777.445 1.293v.364h.18v-.004h.41c.221 0 .377-.028.467-.084.093-.055.14-.14.14-.258v-.069c.004-.243.017-1.044 0-1.115L13 8.05v1.574a1.4 1.4 0 01-.287.863c-.306.405-.804.607-1.495.607h-.627c-.061.733-.434 1.257-1.117 1.573-.267.122-.58.21-.937.265a5.845 5.845 0 01-.914.067v-1.159c.612 0 1.072-.082 1.38-.247.25-.132.376-.298.376-.499h-.515c-.436 0-.807-.113-1.113-.339-.367-.273-.55-.667-.55-1.18 0-.488.122-.901.367-1.24.296-.415.728-.622 1.296-.622zm.533 2.226v-.364c0-.217-.048-.389-.143-.516a.464.464 0 00-.39-.187.478.478 0 00-.396.187.705.705 0 00-.136.449.65.65 0 00.003.067c.008.125.066.22.177.283.093.054.21.08.352.08h.533zM9.5 6.707l.72.7.724-.7L10.209 6l-.709.707zm-6.694 4.888h.03c.433-.01.745-.106.937-.29.024.012.065.035.12.068l.074.039.081.042c.135.073.261.133.379.18.345.146.67.22.977.22a1.216 1.216 0 00.87-.34c.3-.285.449-.714.449-1.286a2.19 2.19 0 00-.335-1.145c-.299-.457-.732-.685-1.3-.685-.502 0-.916.192-1.242.575-.113.132-.21.284-.294.456-.032.062-.06.125-.084.191a.504.504 0 00-.03.078 1.67 1.67 0 00-.022.06c-.103.309-.171.485-.205.53-.072.09-.214.14-.427.147-.123-.005-.209-.03-.256-.076-.057-.054-.085-.153-.085-.297V7l-1.201-.5v3.562c0 .261.048.496.143.703.071.158.168.296.29.413.123.118.266.211.43.28.198.084.42.13.665.136v.001h.036zm2.752-1.014a.778.778 0 00.044-.353.868.868 0 00-.165-.47c-.1-.134-.217-.201-.35-.201-.18 0-.33.103-.447.31-.042.071-.08.158-.114.262a2.434 2.434 0 00-.04.12l-.015.053-.015.046c.142.118.323.216.544.293.18.062.325.092.433.092.044 0 .086-.05.125-.152z"
                          clip-rule="evenodd" fill="currentColor">
                    </path>
                </svg>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            let qtyForm = document.getElementById('qty-form');
            let action = document.getElementById('qty-action');
            let loading = false;

            window.add = () => {
                if (loading) {
                    return;
                }

                loading = true;

                let adds = document.querySelectorAll('.add-loading');
                adds.forEach(addBtn => {
                    addBtn.parentElement.querySelector('svg').classList.add('hidden');
                    addBtn.parentElement.querySelector('.add-loading').classList.remove('hidden');
                })

                action.value = 'add';
                qtyForm.submit();
            }

            window.sub = () => {
                if (loading) {
                    return;
                }

                let subs = document.querySelectorAll('.sub-loading');
                subs.forEach(subBtn => {
                    subBtn.parentElement.querySelector('svg').classList.add('hidden');
                    subBtn.classList.remove('hidden');

                    console.log(subBtn.parentElement.querySelector('svg'));
                })

                action.value = 'sub';
                qtyForm.submit();
            }
        });
        document.addEventListener('DOMContentLoaded', () => {


            function hideFooter() {
                if (window.innerWidth <= 640) {
                    document.querySelector('footer').classList.add('hidden')
                } else {
                    document.querySelector('footer').classList.remove('hidden')
                }
            }

            window.addEventListener('resize', function () {
                hideFooter()
            });

            hideFooter()
        });

    </script>
@endpush
