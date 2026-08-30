<nav class=" w-full bg-base-100 lg:bg-base-100 h-18 lg:h-20 p-2 lg:px-4">
    <div class="flex items-center h-full justify-between">
        <div class="flex items-center justify-end p-3 lg:p-5 lg:pr-0 pr-0  lg:hidden">
            {{-- open menu --}}
            <label for="my-drawer-4" class="drawer-button btn btn-soft btn-square">
                <x-heroicon-o-bars-3 class="size-6" />
            </label>

        </div>
        <div></div>
        <div>
            <a href="{{ route('home') }}" class="btn btn-soft">
                <span class="flex-1 whitespace-nowrap ">بازگشت به سایت</span>
                <x-heroicon-s-chevron-left class="size-5" />
            </a>
        </div>
    </div>
</nav>
