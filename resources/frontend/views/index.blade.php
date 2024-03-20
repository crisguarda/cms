@extends('frontend.views.layouts.master')
@section('content')
    @foreach ($modules as $module)
        @include('modules.'.$module->model)
    @endforeach
@endsection
