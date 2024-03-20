<?php
//use App\Models\ProductCategory;
//use App\Models\Product;
//
//    $productCategory = ProductCategory::where('url', last(explode('/', current())))->where('active', 1)->first();
//    $product = Product::where('url', last(explode('/', current())))->where('active', 1)->first();
//
//    $isCategory = false;
//    $isProduct = false;
//
//    if($productCategory) {
//        $isCategory = true;
//    }
//
//    if($product) {
//        $isProduct = true;
//    }
//
//?>

@extends('frontend.views.layouts.master')

@section('content')
    <div class="page-header" style="background-color: #f9f8f4">
        <h1 class="page-title font-weight-light text-capitalize pt-2">{{ $page->title }}</h1>
    </div>
    <nav class="breadcrumb-nav has-border">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{ $page->title }}</li>
            </ul>
        </div>
    </nav>
    @php
        $isCategory = false
    @endphp
        @foreach($page->modules as $module)
            @php
                if($module->model === 'ProductCategory'){
                   if ($isCategory) continue;
                    $isCategory = true;
                }
            @endphp
            @include('modules.'.mb_strtolower($module->model))
        @endforeach
@endsection
