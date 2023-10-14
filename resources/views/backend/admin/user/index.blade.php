@extends('backend.layouts.master')
@section('title', ' All Users')
@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>All Users</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Mo. Number</th>
                                    <th>Verification Code</th>
                                    <th>Password</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $value)
                                    <tr>
                                        <td class="serial-number">{{ $loop->iteration }}</td>
                                        <td class="fw-bold text-nowrap">{{ $value->name }}</td>
                                        <td class="fw-bold">{{ $value->mobileNumber }}</td>
                                        <td class="fw-bold">{{ $value->verificationCode }}</td>
                                        <!-- <td class="fw-bold">{{ $value->password }}</td> -->
                                        <td class="fw-bold">
                                            @php
                                                try {
                                                    $decryptedValue = Crypt::decryptString($value->password);
                                                    echo $decryptedValue;
                                                } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
                                                    echo 'Decryption failed or the data is invalid.';
                                                }
                                            @endphp
                                        </td>

                                        <td style="width: 58px;">
                                            @if (!$value->image)
                                                <img class="img-thumbnail img-fluid tool-img-edit" style="width: 51px;"
                                                    src="    {{ asset('assets/images/users/default.png') }}" />
                                            @else
                                                <img class="img-thumbnail img-fluid tool-img-edit" style="width: 51px;"
                                                    src="{{ URL::to('/uploads/' . $value->image) }}" />
                                            @endif
                                        </td>

                                        <td class="fw-bold">
                                            @if ($value->status == 1)
                                                <p class="badge badge-success">Active</p>
                                            @elseif ($value->status == 0)
                                                <p class="badge badge-danger">Inactive</p>
                                            @else
                                                Unknown
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.users.edit', $value->id) }}"
                                                class="btn fw-bold btn-primary text-nowrap" data-mdb-ripple-color="dark">
                                                <i class="metismenu-icon bi bi-gear-wide-connected"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $value->id) }}" method="POST"
                                                id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger ms-3 text-nowrap"
                                                    onclick="confirmDelete(this)">
                                                    <i class="metismenu-icon bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media screen and (min-width: 768px) {
            #myModal .modal-dialog {
                width: 70%;
                border-radius: 5px;
            }
        }
    </style>

    <script>
        function confirmDelete(button) {
            if (confirm("Are you sure you want to delete this item?")) {
                var form = button.parentElement; // Get the parent element of the button, which is the form
                form.submit();
            } else {
                alert("Delete operation cancelled.");
            }
        }
    </script>

    <script>
        new DataTable('#example');
    </script>
@stop
