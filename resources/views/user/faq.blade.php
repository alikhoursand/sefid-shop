@extends('layouts.index')
@section('content')
    <section class="mt-4 md:mt-8 lg:mt-12 max-w-screen-xl mx-auto px-2 ">
        <x-main.section-title :show_divider="false" :position="'center'" :icon="'faq'" :title="'سوالات متداول'" />

        <x-main.faq :faqs="$faqs" class="my-8" />
    </section>
@endsection
