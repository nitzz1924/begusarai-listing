@extends('backend.layouts.master')
@section('title', 'User-Create')
@section('content')




    @if (session('error'))
        <section class="container">
            <div class="row py-3 justify-content-center">
                <div class="col-3 alert alert-danger  text-center ">
                    {{ session('error') }}

                </div>
            </div>
        </section>
    @endif

    <div class="card">
        <h5 class="card-header">User-Create</h5>
        <div class="card-body">
            <form id='create' action="{{ Route('admin.users.store') }}" enctype="multipart/form-data" method="post"
                accept-charset="utf-8" class="needs-validation" novalidate>
                @csrf
                <div id="status"></div>
                <div class="form-row">
                    <div class="clearfix"></div>



                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> User Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value=""
                            placeholder="" />

                        @error('name')
                            <span id="error_description" class="has-error">{{ $message }}</span>
                        @enderror

                    </div>



                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Mob. Number<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value=""
                            placeholder="" />

                        @error('mobileNumber')
                            <span id="error_description" class="has-error">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="">Email <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" value=""
                            placeholder="" />

                        @error('email')
                            <span id="error_description" class="has-error">{{ $message }}</span>
                        @enderror

                    </div>







                    <div class="form-group col-md-12 col-sm-12">
                        <label class="form-label" for="formFile">Upload Logo<span style="color:red">*</span></label>

                        <div class="input-group mb-3 bg-white rounded-2 border border-1 shadow-sm border-secondary">
                            <input name="logo" id="logo" type="file" onchange="readURL(this);"
                                class="form-control" required>
                        </div>

                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror


                        <p class="font-italic text-center">
                        </p>
                        <div class="image-area mt-4">
                            <img id="imageResult" src="#" alt=""
                                class="img-fluid rounded shadow-sm mx-auto d-block"
                                style="
                                width: 250px;
                            ">
                        </div>
                    </div>









                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success button-submit" data-loading-text="Loading..."><span
                                class="fa fa-save fa-fw"></span> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@stop
