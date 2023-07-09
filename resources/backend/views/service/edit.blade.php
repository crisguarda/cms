@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Serviços</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item">Serviços</li>
                                <li class="breadcrumb-item active">Editar Serviços</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aqui pode editar o seu Serviço</h4>
                            <br>
                            <form method="post" action="{{ route('service.update', $service->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{--Page--}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Página principal</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('page_id') is-invalid @enderror" aria-label="Default select example" name="page_id">
                                            <option disabled>Escolha uma opção</option>
                                            @php
                                                $selected = old('page_id') ?? $service->page_id;
                                            @endphp
                                            <option value="0" @if($selected == 0) selected @endif>Home</option>
                                            @foreach($pages as $page)
                                                <option value="{{ $page->id }}" {{ ( $page->id == $selected) ? 'selected' : '' }}>{{ $page->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('page_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Titulo--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Titulo" id="title" name="title" value="{{ old('title') ?? $service->title }}">
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Ordem--}}
                                <div class="row mb-3">
                                    <label for="meta_description" class="col-sm-2 col-form-label">Ordem</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('order') is-invalid @enderror" type="number" placeholder="Ordem" id="order" name="order" value="{{ old('order') ?? $service->order }}">
                                        @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Active--}}
                                <div class="row mb-3 form-switch">
                                    <label class="form-check-label col-sm-2 col-form-label" for="active">Activo</label>
                                    <div class="col-sm-10">
                                        @php
                                            $value = old('active') ?? $service->active;
                                        @endphp
                                        <input type="hidden" name="active" value="0">
                                        <input type="checkbox" class="form-check-input mx-0 @error('active') is-invalid @enderror" id="active" name="active" @if($value) checked @endif value="1">
                                        @error('active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info btn waves-effect waves-light" value="Editar">
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
