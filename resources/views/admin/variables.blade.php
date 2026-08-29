@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'متغیرها'" :return="'admin.settings'"></x-admin.page-title>


    <div class="relative mx-auto max-w-screen-sm overflow-x-auto rounded-box bg-base-100 mt-4 shadow-md shadow-base-300">
        <table class="w-full text-xs sm:text-sm text-left rtl:text-right">
            <thead class="bg-base-300">
            <tr>

                <th scope="col" class="p-4 text-center rounded-tr-box">
                    کلید
                </th>
                <th scope="col" class="p-4 text-center ">
                    مقدار
                </th>

            </tr>
            </thead>
            <tbody class="divide-y-2 rounded-b-box">
            @foreach ($settings_list as $settings)
                <tr class="border-base-300 hover:bg-base-content/10 duration-200">
                    <th scope="row" class="text-center p-4">
                        {{ $settings->key }}
                    </th>
                    <td class="text-center p-4">
                        <form method="post" action="{{route('admin.settings.variables.update',$settings->id)}}">
                            @method('PATCH')
                            @csrf
                            <input type="text" name="value" class="input focus:outline-none text-center"
                                   value="{{$settings->value}}">
                            <button class="btn  btn-warning">ویرایش</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
