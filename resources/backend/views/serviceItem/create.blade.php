@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Itens do Serviço</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item">Itens do Serviço</li>
                                <li class="breadcrumb-item active">Criar Itens do Serviço</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aqui pode criar o seu Item do Serviço</h4>
                            <br>
                            <form method="post" action="{{ route('serviceItem.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service_id }}">
                                {{--Titulo--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control {{ $errors->has('title') ? 'error' : '' }}" type="text" placeholder="Titulo" id="title" name="title">
                                        @if ($errors->has('title'))
                                            <div class="error">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{--SubTitulo--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Subitulo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control {{ $errors->has('subtitle') ? 'error' : '' }}" type="text" placeholder="Subitulo" id="subtitle" name="subtitle">
                                        @if ($errors->has('subtitle'))
                                            <div class="error">
                                                {{ $errors->first('subtitle') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{--icon--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Icon</label>
                                    <div class="col-sm-10">
                                        <input class="form-control {{ $errors->has('icon') ? 'error' : '' }}" type="text" placeholder="Icon" id="icon" name="icon">
                                        @if ($errors->has('icon'))
                                            <div class="error">
                                                {{ $errors->first('icon') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                {{--Ordem--}}
                                <div class="row mb-3">
                                    <label for="meta_description" class="col-sm-2 col-form-label">Ordem</label>
                                    <div class="col-sm-10">
                                        <input class="form-control {{ $errors->has('order') ? 'error' : '' }}" type="number" placeholder="Ordem" id="order" name="order" value="0">
                                        @if ($errors->has('order'))
                                            <div class="error">
                                                {{ $errors->first('order') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{--Active--}}
                                <div class="row mb-3 form-switch">
                                    <label class="form-check-label col-sm-2 col-form-label" for="active">Activo</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="active" value="1">
                                        <input type="checkbox" class="form-check-input mx-0 {{ $errors->has('active') ? 'error' : '' }}" id="active" name="active" checked value="1">
                                        @if ($errors->has('active'))
                                            <div class="error">
                                                {{ $errors->first('active') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info btn waves-effect waves-light" value="Criar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src', e.target.result);
                }
                console.log(e.target.files[0]);
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
