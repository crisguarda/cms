@php
    $action = $route = '';
    if ($isCreate){
        $action = 'Criar';
        $route = route('product.store');
    } else {
        $action = 'Editar';
        $route = route('product.update', $product->id);
    }
@endphp
@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Produtos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item">Produtos</li>
                                <li class="breadcrumb-item active">{{ $action }} Produtos</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aqui pode {{ mb_strtolower($action) }} o seu Produto</h4>
                            <br>
                            <form method="post" action="{{ $route }}" enctype="multipart/form-data">
                                @csrf
                                {!! \App\Models\Form::getSelect('Categoria', 'product_category_id', $productCategories, $category ?? null) !!}
                                {!! \App\Models\Form::getInputText('Titulo', 'title', $product->title ?? null) !!}
                                {!! \App\Models\Form::getInputTextarea('Descrição', 'desc', $product->desc ?? null) !!}
                                {!! \App\Models\Form::getInputNumber('Preço', 'price', $product->price ?? null) !!}
                                {!! \App\Models\Form::getInputImage('Imagem', 'image', $product->image ?? null) !!}
                                {!! \App\Models\Form::getInputText('Alt Imagem', 'image_alt', $product->image_alt ?? null) !!}
                                {!! \App\Models\Form::getInputCheckbox('Produto Novo', 'is_new', $product->is_new ?? null, $product->is_new ?? '0') !!}
                                {!! \App\Models\Form::getInputCheckbox('Produto em Promoção', 'is_promo', $product->is_promo ?? null, $product->is_promo ?? '0') !!}
                                {!! \App\Models\Form::getInputNumber('Order', 'order', $product->order ?? null) !!}
                                {!! \App\Models\Form::getInputCheckbox('Active', 'active', $product->active ?? null) !!}

                                <input type="submit" class="btn btn-info btn waves-effect waves-light" value="{{ $action }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
