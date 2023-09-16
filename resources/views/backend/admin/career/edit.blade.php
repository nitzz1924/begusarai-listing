@extends('backend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit career Record</h5>
                    <form id="edit" action="{{ route('admin.career.update', $career->id) }}" enctype="multipart/form-data"
                        method="post" accept-charset="utf-8" class="needs-validation">
                        @csrf
                        <div id="status"></div>
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $career->title }}" placeholder="Enter title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" id="value" name="value"
                                value="{{ $career->value }}" placeholder="Enter value">
                            @error('value')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
