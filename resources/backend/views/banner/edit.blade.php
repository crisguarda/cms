@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Banners</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item">Banners</li>
                                <li class="breadcrumb-item active">Editar Banner</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aqui pode editar o seu Banner</h4>
                            <br>
                            <form method="post" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{--Page--}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Página principal</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('page_id') is-invalid @enderror" aria-label="Default select example" name="page_id">
                                            <option disabled>Escolha uma opção</option>
                                            @php
                                                $selected = old('page_id') ?? $banner->page_id;
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
                                        <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Titulo" id="title" name="title" value="{{ old('title') ?? $banner->title }}">
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--SubTitulo--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Subitulo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('subtitle') is-invalid @enderror" type="text" placeholder="Subitulo" id="subtitle" name="subtitle" value="{{ old('subtitle') ?? $banner->subtitle }}">
                                        @error('subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Button text--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Texto Butão</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('button_text') is-invalid @enderror" type="text" placeholder="Texto Butão" id="button_text" name="button_text" value="{{ old('button_text') ?? $banner->button_text }}">
                                        @error('button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Button link--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Link Butão</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('button_text') is-invalid @enderror" type="text" placeholder="Link Butão" id="button_link" name="button_link" value="{{ old('button_text') ?? $banner->button_link }}">
                                        @error('button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Image--}}
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Imagem</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="image" name="image">
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img
                                            id="showImage"
                                            class="rounded avatar-lg"
                                            src="{{ url($banner->image != 0 ? $banner->image : 'upload/no__image.png') }}"
                                            alt=""
                                        >
                                    </div>
                                </div>

                                {{--Image Alt--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Alt Imagem</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('image_alt') is-invalid @enderror" type="text" placeholder="Alt Imagem" id="image_alt" name="image_alt" value="{{ old('image_alt') ?? $banner->image_alt }}">
                                        @error('image_alt')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Ordem--}}
                                <div class="row mb-3">
                                    <label for="meta_description" class="col-sm-2 col-form-label">Ordem</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('order') is-invalid @enderror" type="number" placeholder="Ordem" id="order" name="order" value="{{ old('order') ?? $banner->order }}">
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
                                            $value = old('active') ?? $banner->active;
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
