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
                    'link' => route('shop.category.view', $product->category->slug),
                    'color' => 'primary',
                ],
            ]"></x-main.breadcrumbs>
        </div>
        <div class=" grid grid-cols-12 gap-6 ">
            <div
                class="col-span-12 col-start-1 col-end-13 xs:col-span-10 xs:col-start-2 xs:col-end-12 sm:col-span-8 sm:col-start-3 sm:col-end-11 lg:col-span-5 xl:col-span-5">
                {{-- slider start --}}
                <div class="swiper product-gallery">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ Storage::url($product->image) }}"
                                class="mx-auto aspect-square object-cover rounded-box max-w-[500px] w-full" />
                        </div>
                        @foreach ($product->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image->image) }}" alt="{{ $product->slug }}"
                                    class="mx-auto aspect-square object-cover rounded-box max-w-[500px] w-full" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div thumbsSlider="" class="swiper product-thumbs mt-2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ Storage::url($product->image) }}"
                                class="opacity-90 aspect-square object-cover rounded-box" />
                        </div>
                        @foreach ($product->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image->image) }}"
                                    class="opacity-90 aspect-square object-cover rounded-box" />
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- slider end --}}
            </div>
            <div class="col-span-12 lg:col-span-7 xl:col-span-7">

                <h3
                    class="text-base pt-2 xs:text-lg lg:text-2xl font-bold lg:font-medium line-clamp-2 h-12 xs:h-14 lg:h-16 mt-4 md:mt-0">
                    {{ $product->title }}
                </h3>
                <div class="flex items-center gap-x-1 opacity-75 mt-4">
                    <x-heroicon-s-squares-2x2 class="size-5" />
                    <p>دسته‌بندی: {{ $product->category->title }}</p>
                </div>
                <div class="flex items-center gap-x-1 opacity-75 mt-2">
                    <x-heroicon-s-cube class="size-5" />
                    <p>موجودی انبار: {{ $product->qty > 0 ? $product->qty . ' عدد' : 'ناموجود' }} </p>
                </div>
                <div class="mt-12 text-center lg:text-right hidden sm:block">

                    <div class="text-2xl font-bold {{ $product->off_price ? 'opacity-75 line-through text-error' : '' }}">
                        {{ number_format($product->price) }}
                        <x-shop.toman :size="6" />
                    </div>
                    @if ($product->off_price != 0)
                        <div class="text-2xl font-bold">
                            {{ number_format($product->off_price) }}
                            <x-shop.toman :size="6" />
                        </div>
                    @endif
                    @if ($in_cart)
                        <div class="text-primary mt-4 text-sm">
                            <x-heroicon-s-check class="inline my-2 size-7" />
                            <span class="font-medium">در سبد خرید موجود است</span>
                        </div>
                    @endif
                    @if ($product->qty > 0)
                        <form action="{{ route('cart.store', $product->id) }}" method="post" class="mt-4"
                            id="qty-form">
                            @csrf
                            <input type="hidden" name="action" value="add" id="qty-action">
                            @if ($in_cart)
                                <div
                                    class="w-fit rounded-full items-center border-2 border-base-300 flex lg:ml-auto lg:mr-0 mx-auto bg-base-100">
                                    <button type="button" class="btn btn-lg btn-primary btn-circle"
                                        @disabled($in_cart == $product->qty) onclick="add()">
                                        <span class="add-loading hidden loading loading-spinner loading-lg"></span>
                                        <x-heroicon-s-plus class="size-7" />
                                    </button>
                                    <div class="text-lg font-semibold text-center w-20">{{ $in_cart }}</div>
                                    <input type="hidden" value="{{ $in_cart }}" readonly style="pointer-events: none"
                                        tabindex="-1"
                                        class="text-lg input-lg font-semibold text-center no-arrows input rounded-none focus:outline-none"
                                        name="qty" id="qty">
                                    <button type="button" class="btn btn-lg btn-error btn-circle btn-soft" onclick="sub()">
                                        @if ($in_cart == 1)
                                            <x-heroicon-o-trash class="size-6" />
                                        @else
                                            <x-heroicon-s-minus class="size-7" />
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
                    <input type="radio" name="my_tabs_4" checked="checked" />
                    <x-heroicon-o-question-mark-circle class="size-6 ml-2" />
                    توضیحات محصول
                </label>
                <div class="tab-content rounded-box bg-base-300 p-4 md:p-6">
                    <p class="text-justify text-sm sm:text-base">
                        {{ $product->desc }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class=" bg-base-300  mt-12 py-8 px-2">
        <div class="max-w-screen-xl mx-auto">
            <x-main.section-title :title="'محصولات مرتبط'" :show_divider="true"></x-main.section-title>
            <x-shop.product-slider :products="$similar_products"></x-shop.product-slider>
        </div>
    </section>

    <div class="absolute sticky bg-base-100 bottom-0 w-full z-10 border-t-2 border-base-content/10 p-2 sm:hidden">
        <div class="flex items-center justify-between">
            <div class="">
                @if ($in_cart)
                    <div class="text-primary text-xs grow-1 mb-2">
                        <x-heroicon-s-check class="size-5 inline" />
                        <span>در سبد خرید موجود است</span>
                    </div>
                @endif
                @if ($product->qty <= 0)
                    <div class="text-error text-xs grow-1 mb-2">
                        <x-heroicon-s-x-mark class="size-5 inline" />
                        <span>در انبار موجود نیست</span>
                    </div>
                @endif
                <input type="hidden" name="action" value="add" id="qty-action">

                @if ($product->qty > 0)
                    @if ($in_cart)
                        <div
                            class="flex lg:ml-auto lg:mr-0 w-fit items-center border-2 bg-base-300 rounded-full border-base-content/10">
                            <button type="button" class="btn btn-sm 2xs:btn-md btn-soft btn-circle btn-primary "
                                onclick="add()">
                                <span class="add-loading hidden loading loading-spinner loading-sm 2xs:loading-md"></span>
                                <x-heroicon-s-plus class="size-5" />

                            </button>
                            <div class="w-10 text-center">{{ $in_cart }}</div>
                            <button type="button" class="btn btn-sm 2xs:btn-md btn-circle btn-soft btn-error "
                                onclick="sub()">

                                @if ($in_cart == 1)
                                    <x-heroicon-o-trash class="inline size-5" />
                                @else
                                    <x-heroicon-s-minus class="inline size-5" />
                                @endif

                                <span class="sub-loading hidden loading loading-spinner loading-sm 2xs:loading-md"></span>
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
                <div class="text-base xs:text-lg font-medium">{{ number_format($product['price']) }}</div>
                <x-shop.toman />
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

            window.addEventListener('resize', function() {
                hideFooter()
            });

            hideFooter()
        });
    </script>
@endpush
