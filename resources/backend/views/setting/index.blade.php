@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Website Settings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Website Settings</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Here you can update your website settings</h4>
                            <br>
                            <form method="post" action="{{ route('setting.update') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Title" id="title" name="title" value="{{ $setting->title }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Meta Description" id="meta_description" name="meta_description" value="{{ $setting->meta_description }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="meta_keywords" class="col-sm-2 col-form-label">Meta Keywords</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Meta Keywords" id="meta_keywords" name="meta_keywords" value="{{ $setting->meta_keywords }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="contact_email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" placeholder="Email" id="contact_email" name="contact_email" value="{{ $setting->contact_email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="facebook_link" class="col-sm-2 col-form-label">Facebook Link</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Facebook Link" id="facebook_link" name="facebook_link" value="{{ $setting->facebook_link }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="instagram_link" class="col-sm-2 col-form-label">Instagram Link</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Instagram Link" id="instagram_link" name="instagram_link" value="{{ $setting->instagram_link }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="skype_link" class="col-sm-2 col-form-label">Skype</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Skype" id="skype_link" name="skype_link" value="{{ $setting->skype_link }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="linkedin_link" class="col-sm-2 col-form-label">LinkedIn</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="LinkedIn" id="linkedin_link" name="linkedin_link" value="{{ $setting->linkedin_link }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img
                                            id="showImage"
                                            class="rounded avatar-lg"
                                            src="{{ (!empty($setting->image) ? url($setting->image) : url('upload/no__image.png')) }}"
                                            alt="Card image cap"
                                        >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image_alt" class="col-sm-2 col-form-label">Image alt</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Image alt" id="image_alt" name="image_alt" value="{{ $setting->image_alt }}">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info btn waves-effect waves-light" value="Guardar">
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
