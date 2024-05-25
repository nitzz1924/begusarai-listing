@extends('backend.layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            @if ($message = Session::get('success'))
                    <div class="alert border-0 alert-success text-center" role="alert" id="successAlert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('failure'))
                    <div class="alert border-0 alert-danger text-center" role="alert" id="dangerAlert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
            <div class="card-body">
                <h5 class="card-title">Add User</h5>
                <form id="edit" action="{{route('createuser')}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8"
                    class="needs-validation">
                    @csrf
                    <div id="status"></div>
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter user name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select id="duration" name="type" class="form-control custom-select" required>
                            <option value="guest">Guest</option>
                            <option value="owner">Owner</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number">Mobile Number</label>
                        <input type="text" class="form-control" id="number" name="mobileNumber" value=""
                            placeholder="Enter number">
                        @error('number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" class="form-control" id="name" name="address_filing" value=""
                            placeholder="Enter user name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number">Block Number</label>
                        <input type="text" class="form-control" id="number" name="block_number" value=""
                            placeholder="Enter number">
                        @error('number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number">Village/Ward</label>
                        <input type="text" class="form-control" id="number" name="village_ward" value=""
                            placeholder="Enter number">
                        @error('number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file_path" name="image">
                                <label class="custom-file-label" for="file_path">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 2000);

    setTimeout(function() {
        $('#dangerAlert').fadeOut('slow');
    }, 2000);
</script>
@stop
