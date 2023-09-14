@extends('backend.layouts.master')
@section('title', 'tools')
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
        <h5 class="card-header">Master</h5>
        <div class="card-body">
            <form id='create' action="{{ Route('admin.master.store') }}" enctype="multipart/form-data" method="post"
                accept-charset="utf-8" class="needs-validation" novalidate>
                @csrf
                <div id="status"></div>
                <div class="form-row">


                    <div class="clearfix"></div>



                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Master Title </label>
                        <input type="text" class="form-control" id="title" name="title" value=""
                            placeholder=""></input>

                        @error('title')
                            <span id="error_description" class="has-error">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Master Value </label>
                        <input type="text" class="form-control" id="value" name="value" value=""
                            placeholder=""></input>

                        @error('title')
                            <span id="error_description" class="has-error">{{ $message }}</span>
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


@stop
