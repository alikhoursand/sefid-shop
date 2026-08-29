@extends('layouts.index')
@section('content')
    <section class="mt-4 md:mt-8 lg:mt-12 max-w-screen-xl mx-auto px-2 ">

        <x-main.section-title :icon="'category'" :title="'لیست دسته‌بندی‌ها'" :position="'center'" :show_divider="false"></x-main.section-title>

        @php
            $categories = [
                    [
                        'title'=> 'محصول تستی دو',
                        'slug'=> 'محصول-تستی-دو',
                        'image'=>'/images/p2.jpg',
                    ],
                    [
                        'title'=> 'محصول تستی دو',
                        'slug'=> 'محصول-تستی-دو',
                        'image'=>'/images/p2.jpg',
                    ],
                    [
                        'title'=> 'محصول تستی سه',
                        'slug'=> 'محصول-تستی-سه',
                        'image'=>'/images/p3.jpg',
                    ],
                    [
                        'title'=> 'محصول تستی چهار',
                        'slug'=> 'محصول-تستی-چهار',
                        'image'=>'/images/p4.jpg',
                    ],
                    [
                        'title'=> 'محصول تستی پنج',
                        'slug'=> 'محصول-تستی-پنج',
                        'image'=>'/images/p5.jpg',
                    ],
                    [
                        'title'=> 'محصول تستی پنج',
                        'slug'=> 'محصول-تستی-پنج',
                        'image'=>'/images/p5.jpg',
                    ],

            ];
        @endphp


        <section class="mt-12">
            @foreach($categories as $category)
                <div class="pt-12">
                    @component('user.components.sectionTitle',[
                        'title' => 'دسته بندی یک',
                        'show_divider' => false
                    ])
                    @endcomponent
                </div>
                <div class="flex flex-wrap items-center justify-center  ">
                    @foreach($categories as $category)
                        <div class="basis-1/2 xs:basis-1/3 sm:basis-1/3 md:basis-2/8 lg:basis-1/6 p-2">
                            @component('user.pages.shop.components.categorySingle',['category'=>$category]) @endcomponent
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>

    </section>

@endsection
