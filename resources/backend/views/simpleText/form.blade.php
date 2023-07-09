@php
    $action = $route = '';
    if ($isCreate){
        $action = 'Criar';
        $route = route('simpleText.store');
    } else {
        $action = 'Editar';
        $route = route('simpleText.update', $simpleText->id);
    }
@endphp
@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Pages</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item">Texto Simples</li>
                                <li class="breadcrumb-item active">{{ $action }} Texto Simples</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aqui pode {{ mb_strtolower($action) }} o seu Texto Simples</h4>
                            <br>
                            <form method="post" action="{{ $route }}" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {!! \App\Models\Form::getSelect('Página', 'page_id', $pages, $simpleText->page_id ?? null) !!}
                                {!! \App\Models\Form::getInputText('Titulo', 'title', $simpleText->title ?? null) !!}
                                {!! \App\Models\Form::getInputText('Subtitulo', 'subtitle', $simpleText->subtitle ?? null) !!}
                                {!! \App\Models\Form::getInputTextarea('Texto', 'text', $simpleText->text ?? null) !!}
                                {!! \App\Models\Form::getInputNumber('Order', 'order', $simpleText->order ?? null) !!}
                                {!! \App\Models\Form::getInputCheckbox('Active', 'active', $simpleText->active ?? null) !!}

                                <input type="submit" class="btn btn-info btn waves-effect waves-light" value="{{ $action }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
