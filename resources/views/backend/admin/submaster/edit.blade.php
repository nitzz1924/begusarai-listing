@extends('backend.layouts.master')
@section('title', 'Edit SubMaster')
@section('content')

    @if (session('error'))
        <section class="container">
            <div class="row py-3 justify-content-center">
                <div class="col-3 alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            </div>
        </section>
    @endif

    <div class="card">
        <h5 class="card-header">Edit SubMaster</h5>
        <div class="card-body">
            <form id='update' action="{{ route('admin.submaster.update', $submaster->id) }}" method="post"
                enctype="multipart/form-data" accept-charset="utf-8" class="needs-validation" novalidate>
                @csrf
                @method('PATCH')

                <div id="status"></div>
                <div class="form-row">
                    <div class="clearfix"></div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="">Sub Master Type<span style="color:red">*</span></label>
                        <select class="form-select form-control" id="type" name="type" aria-label="category-form-select">
                            <option selected disabled>Select Category Type</option>
                            @foreach ($master as $value)
                                <option {{ $submaster->type == $value->title ? 'selected' : '' }}>{{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('type')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="">Sub Master Title<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $submaster->title }}"
                            placeholder="" />
                        @error('title')
                            <span id="error_description" class="has-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="">Sub Master Value<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="value" name="value" value="{{ $submaster->value }}"
                            placeholder="" />
                        @error('value')
                            <span id="error_description" class="has-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label class="form-label" for="formFile">Upload Logo<span style="color:red">*</span></label>
                        <div class="input-group mb-3 bg-white rounded-2 border border-1 shadow-sm border-secondary">
                            <input name="logo" id="logo" type="file" onchange="readURL(this);" class="form-control">
                        </div>
                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <p class="font-italic text-center"></p>
                        <div class="image-area mt-4">
                            <img id="imageResult" src="{{ asset('path-to-your-image/' . $submaster->logo) }}" alt=""
                                class="img-fluid rounded shadow-sm mx-auto d-block" style="width: 250px;">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success button-submit" data-loading-text="Loading..."><span
                                class="fa fa-save fa-fw"></span> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
