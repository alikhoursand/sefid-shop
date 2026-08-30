@foreach ($faqs as $faq)
    <div class="mt-1 collapse collapse-arrow bg-base-100 shadow-md shadow-base-300">
        <input type="checkbox" name="my-accordion-2" />
        <div class="text-sm sm:text-base collapse-title font-medium">{{ $faq->question }}</div>
        <div class="collapse-content bg-base-100 text-sm opacity-80">
            <div class="divider mt-0"></div>
            <div class="mt-4 text-justify">{{ $faq->answer }}</div>
        </div>
    </div>
@endforeach
