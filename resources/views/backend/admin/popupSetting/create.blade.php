@extends('backend.layouts.master')
@section('title', 'SubMaster')
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
        <h5 class="card-header">Ads </h5>
        <div class="card-body">
            <form id="create" action="{{ route('admin.popupSetting.store') }}" enctype="multipart/form-data" method="post"
                accept-charset="utf-8" class="needs-validation" novalidate>
                @csrf
                <div id="status"></div>
                <div class="form-row">
                    <div class="clearfix"></div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="type">Sub Master Type <span style="color:red">*</span></label>
                        <select class="form-select form-control" id="type" name="type"
                            aria-label="category-form-select">
                            <option value="" selected disabled>Select</option>
                            @foreach ($model as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('type')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="title">Sub Master Title <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value=""
                            placeholder="" />
                        @error('title')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="content_type">Content Type <span style="color:red">*</span></label>
                        <select class="form-select form-control" id="content-type" name="content_type">
                            <option value="" selected disabled>Select</option>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                        @error('content_type')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12 col-sm-12" id="logo-field">
                        <label for="logo">Upload Logo</label>
                        <div class="input-group mb-3 bg-white rounded-2 border border-1 shadow-sm border-secondary">
                            <input name="logo" id="logo" type="file" onchange="readURL(this);"
                                class="form-control" />
                        </div>
                        @error('logo')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="value">Content Type Value</label>
                        <input type="text" class="form-control" id="value" name="value" value=""
                            placeholder="" />
                        @error('value')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
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

    <script>
        $(document).ready(function() {
            // Initially, hide the "Upload Logo" field
            $("#logo-field").hide();

            // Listen for changes in the "Content Type" dropdown
            $("#content-type").change(function() {
                var selectedValue = $(this).val();

                // Show/hide the "Upload Logo" field based on the selected content type
                if (selectedValue === "image") {
                    $("#logo-field").show();
                } else {
                    $("#logo-field").hide();
                }
            });
        });
    </script>

@stop
