@extends('layouts.admin')
@section('content')
    @if (auth()->user()->hasRole('admin'))
        {{-- top sum --}}
        @include('components.admin.summary')
    @endif
@endsection
