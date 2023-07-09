@php
    $action = $route = '';
    if ($isCreate){
        $action = 'Criar';
        $route = route('image.store');
    } else {
        $action = 'Editar';
        $route = route('image.update', $image->id);
    }
@endphp
@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Imagem</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item">Imagem</li>
                                <li class="breadcrumb-item active">{{ $action }} Imagem</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aqui pode {{ mb_strtolower($action) }} a sua Imagem</h4>
                            <br>
                            <form method="post" action="{{ $route }}" enctype="multipart/form-data">
                                @csrf
                                @if($isCreate)
                                    <input type="hidden" name="gallery_id" value="{{ $gallery_id }}">
                                @endif
                                {!! \App\Models\Form::getInputText('Titulo', 'title', $image->title ?? null) !!}
                                {!! \App\Models\Form::getInputText('Subtitulo', 'subtitle', $image->subtitle ?? null) !!}
                                {!! \App\Models\Form::getInputImage('Imagem', 'image', $image->image ?? null) !!}
                                {!! \App\Models\Form::getInputText('Alt Imagem', 'image_alt', $image->image_alt ?? null) !!}
                                {!! \App\Models\Form::getInputNumber('Order', 'order', $image->order ?? null) !!}
                                {!! \App\Models\Form::getInputCheckbox('Active', 'active', $image->active ?? null) !!}

                                <input type="submit" class="btn btn-info btn waves-effect waves-light" value="{{ $action }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
