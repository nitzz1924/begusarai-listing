@extends('backend.layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit User</h5>
                <form id="edit" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data"
                    method="post" accept-charset="utf-8" class="needs-validation">
                    @csrf
                    <div id="status"></div>
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            placeholder="Enter user name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="text" class="form-control" id="number" name="number"
                            value="{{ $user->mobileNumber }}" placeholder="Enter number">
                        @error('number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                        <label for="verificationCode">Verification Code</label>
                        <input type="text" class="form-control" id="verificationCode" name="verificationCode" value="{{ $user->verificationCode }}" placeholder="Enter verification code">
                        @error('verificationCode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file_path">Image</label>
                        <div class="input-group">
                            @if ($user->file_path)
                            <img class="img-thumbnail img-fluid tool-img-edit"
                                src="{{ URL::to('/uploads/' . $user->file_path) }}" style="
    width: 54px;
" />
                            @endif
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file_path" name="file_path">
                                <label class="custom-file-label" for="file_path">Choose file</label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="custom-radio">
                            <input type="radio" id="active" name="status" value="1" @if ($user->status == 1) checked
                            @endif>
                            <label for="active">Active</label>
                        </div>
                        <div class="custom-radio">
                            <input type="radio" id="inactive" name="status" value="0" @if ($user->status == 0) checked
                            @endif>
                            <label for="inactive">Inactive</label>
                        </div>
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
