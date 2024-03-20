@php
    $action = $route = '';
    if ($isCreate){
        $action = 'Criar';
        $route = route('contact.store');
    } else {
        $action = 'Editar';
        $route = route('contact.update', $contact->id);
    }
@endphp
@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contactos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item">Contactos</li>
                                <li class="breadcrumb-item active">{{ $action }} Contactos</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aqui pode {{ mb_strtolower($action) }} o seu Contacto</h4>
                            <br>
                            <form method="post" action="{{ $route }}" enctype="multipart/form-data">
                                @csrf

                                {!! \App\Models\Form::getSelect('Página', 'page_id', $pages, $contact->page_id ?? null) !!}
                                {!! \App\Models\Form::getInputText('Titulo', 'title', $contact->title ?? null) !!}
                                {!! \App\Models\Form::getInputText('Subtitulo', 'subtitle', $contact->subtitle ?? null) !!}
                                {!! \App\Models\Form::getInputText('Morada', 'address', $contact->address ?? null) !!}
                                {!! \App\Models\Form::getInputNumber('Telefone', 'phone', $contact->phone ?? null) !!}
                                {!! \App\Models\Form::getInputEmail('Email', 'email', $contact->email ?? null) !!}
                                {!! \App\Models\Form::getInputTextarea('Horário', 'timetable', $contact->timetable ?? null) !!}
                                {!! \App\Models\Form::getInputText('Mapa', 'map', $contact->map ?? null) !!}
                                {!! \App\Models\Form::getInputImage('Imagem', 'image', $banner->image ?? null) !!}
                                {!! \App\Models\Form::getInputText('Alt Imagem', 'image_alt', $banner->image_alt ?? null) !!}
                                {!! \App\Models\Form::getInputNumber('Order', 'order', $contact->order ?? null) !!}
                                {!! \App\Models\Form::getInputCheckbox('Active', 'active', $contact->active ?? null) !!}

                                <input type="submit" class="btn btn-info btn waves-effect waves-light" value="{{ $action }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
