<nav class=" w-full bg-base-100 lg:bg-base-100 h-18 lg:h-20 p-2 lg:px-4">
    <div class="flex items-center h-full justify-between">
        <div class="flex items-center justify-end p-3 lg:p-5 lg:pr-0 pr-0  lg:hidden">
            {{-- open menu --}}
            <label for="my-drawer-4" class="drawer-button btn btn-soft btn-square">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
                        clip-rule="evenodd" />
                </svg>
            </label>

        </div>
        <div></div>
        <div>
            <a href="{{ route('home') }}" class="btn btn-neutral btn-soft">
                <span class="flex-1 whitespace-nowrap ">بازگشت به سایت</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path opacity="0.4"
                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        fill="currentColor" />
                    <path
                        d="M13.26 16.2802C13.07 16.2802 12.88 16.2102 12.73 16.0602L9.20001 12.5302C8.91001 12.2402 8.91001 11.7602 9.20001 11.4702L12.73 7.94016C13.02 7.65016 13.5 7.65016 13.79 7.94016C14.08 8.23016 14.08 8.71016 13.79 9.00016L10.79 12.0002L13.79 15.0002C14.08 15.2902 14.08 15.7702 13.79 16.0602C13.65 16.2102 13.46 16.2802 13.26 16.2802Z"
                        fill="currentColor" />
                </svg>
            </a>
        </div>
    </div>
</nav>
