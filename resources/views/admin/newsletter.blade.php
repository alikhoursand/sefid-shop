@extends('layouts.admin')
@section('content')
    @include('panel.components.pageTitle', ['page_title' => 'لیست عضویت های خبرنامه'])

    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-2 w-[100px] text-center ">
                        #
                    </th>
                    <th scope="col" class="px-6 py-2 text-center">
                        شماره تماس
                    </th>
                    <th scope="col" class="px-6 py-2">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsletters as $newsletter)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="w-[100px] text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $newsletter->id }}
                        </th>
                        <th scope="row"
                            class="w-[250px] text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $newsletter->phone }}
                        </th>

                        <td class="px-6 py-4 text-center">
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $newsletters->links() }}


    </div>
@endsection
