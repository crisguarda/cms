@php
    $currentCat = null;
    if (isset($category)){
        $currentCat = $category;
    }
@endphp
@extends('backend.views.layouts.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                                <li class="breadcrumb-item active">Criar Produto</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Aqui pode criar o seu Produto</h4>
                            <br>
                            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                {{--Category--}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Categoria</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('product_category_id') is-invalid @enderror" aria-label="Default select example" name="product_category_id">
                                            <option disabled selected>Escolha uma opção</option>
                                            @foreach($productCategories as $category)
                                                <option value="{{ $category->id }}" @if($category->id == old('product_category_id') || $category->id == $currentCat) selected @endif>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Titulo--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Titulo" id="title" name="title" value="{{ old('title') }}">
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Desc--}}
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Descrição</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('desc') is-invalid @enderror" id="elm1" name="desc">{{ old('desc') }}</textarea>
                                        @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Unity/Price--}}
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Unidade e Preço</label>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary" id="unity-price">Adicionar linha<i class="fa fa-plus ms-2"></i></button>
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
                                            src="{{ url('upload/no__image.png') }}"
                                            alt=""
                                        >
                                    </div>
                                </div>

                                {{--Image Alt--}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Alt Imagem</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('image_alt') is-invalid @enderror" type="text" placeholder="Alt Imagem" id="image_alt" name="image_alt" value="{{ old('image_alt') }}">
                                        @error('image_alt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Is New--}}
                                <div class="row mb-3 form-switch">
                                    <label class="form-check-label col-sm-2 col-form-label" for="active">Produto Novo</label>
                                    <div class="col-sm-10">
                                        @php
                                            $is_checked = true;
                                            if (!is_null(old('is_new')) and old('is_new') == 0){
                                                $is_checked = false;
                                            }
                                        @endphp
                                        <input type="hidden" name="is_new" value="0">
                                        <input type="checkbox" class="form-check-input mx-0 @error('is_new') is-invalid @enderror" id="is_new" name="is_new" @if($is_checked) checked @endif value="1">
                                        @error('is_new')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Is Promo--}}
                                <div class="row mb-3 form-switch">
                                    <label class="form-check-label col-sm-2 col-form-label" for="is_promo">Produto em Promoção</label>
                                    <div class="col-sm-10">
                                        @php
                                            $is_checked = true;
                                            if (!is_null(old('is_promo')) and old('is_promo') == 0){
                                                $is_checked = false;
                                            }
                                        @endphp
                                        <input type="hidden" name="is_promo" value="0">
                                        <input type="checkbox" class="form-check-input mx-0 @error('is_promo') is-invalid @enderror" id="is_promo" name="is_promo" @if($is_checked) checked @endif value="1">
                                        @error('is_promo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--Ordem--}}
                                <div class="row mb-3">
                                    <label for="meta_description" class="col-sm-2 col-form-label">Ordem</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('order') is-invalid @enderror" type="number" placeholder="Ordem" id="order" name="order" value="{{ old('order') ?? '0' }}">
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
                                            $is_checked = true;
                                            if (!is_null(old('active')) and old('active') == 0){
                                                $is_checked = false;
                                            }
                                        @endphp
                                        <input type="hidden" name="active" value="0">
                                        <input type="checkbox" class="form-check-input mx-0 @error('active') is-invalid @enderror" id="active" name="active" @if($is_checked) checked @endif value="1">
                                        @error('active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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

    <script>
        $(document).ready(function (){
            $('#unity-price').click(function (e){
               // Add a new line before the button
                last_line = $('.unity_price_line').last().index() + 1;
                unities = '';

                @foreach($unities as $unity)
                    unities += `<option value="{{ $unity->id }}">{{ $unity->unity }}</option>`;
                @endforeach

                inputs = `
                <div class="row mb-3 unity_price_line d-flex justify-content-start">
                    <label class="col-form-label">Unidade</label>
                    <div class="">
                        <select class="form-select" aria-label="Default select example" name="unity[]" value="${last_line}">
                            <option disabled selected>Escolha uma opção</option>
                            ${unities}
                        </select>
                    </div>
                    <label class="col-form-label">Unidade</label>
                    <div class="">
                        <input class="form-control" type="number" step='.01' placeholder="Preço" id="price" name="price[]">
                    </div>
                    <a class="btn btn-danger sm" id="delete_line_${last_line}" title="Remover Linha"><i class="fas fa-trash-alt"></i></a>
                </div>`;

                $(inputs).insertBefore(this);
            })
        });
    </script>

@endsection
