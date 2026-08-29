<dialog id="search_modal" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline" width="24" height="24" viewBox="0 0 24 24"
                 fill="none">
                <path
                    d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M22 22L20 20" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
            جستجو
        </h3>
        <form method="get" action="#" id="search-form" class="my-4">
            <input type="text" name="search" class="input focus:outline-none w-full" placeholder="نام کالا">
        </form>
        <div class="modal-action">
            <button class="btn btn-primary" id="search-btn">جستجو</button>
            <form method="dialog">
                <button class="btn">انصراف</button>
            </form>
        </div>
    </div>
</dialog>

@push('footer_scripts')
    <script>
        document.querySelector('#search-btn').addEventListener('click', function () {
            document.querySelector('#search-form').submit();
        });
    </script>
@endpush
