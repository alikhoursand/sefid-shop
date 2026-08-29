@foreach($faqs as $faq)
    <div class="mt-1 collapse collapse-arrow bg-base-100 shadow-md shadow-base-300">
        <input type="checkbox" name="my-accordion-2"/>
        <div class="text-sm sm:text-base collapse-title font-medium">{{$faq->question}}</div>
        <div class="collapse-content bg-base-100 text-sm opacity-80 border-t-2 border-base-content/10">
            <div class="mt-4 text-justify">{{$faq->answer}}</div>
        </div>
    </div>
@endforeach
