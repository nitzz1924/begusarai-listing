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
            <div>
                <a href="{{route('adduser')}}">
                    <button type="button" class="btn btn-success"><i class="bi bi-plus-lg"></i>&nbsp;Add User</button>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-nowrap table-bordered" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Mo. Number</th>
                                <th>Address</th>
                                <th>Block Number</th>
                                <th>Village/Ward</th>
                                <th>Password</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $counter = 1; // Initialize the counter
                            @endphp

                            @foreach ($user as $value)
                            @if ($value->id === 1)
                            @continue
                            @endif
                            <tr>
                                <td class="serial-number">{{ $counter }}</td>
                                @php
                                $counter++; // Increment the counter for the next iteration
                                @endphp
                                <td class="fw-bold text-nowrap">{{ $value->name }}</td>
                                <td class="fw-bold">{{ $value->mobileNumber }}</td>


                                <td class="fw-bold">
                                    @if(empty($value->address_filing))

                                    @else
                                    {{ ucwords(str_replace('_', ' ', $value->address_filing)) }}

                                    @endif

                                </td>
                                <td class="fw-bold">@if(!empty($value->block_number))
                                    {{ $value->block_number }}
                                    @elseif(!empty($value->city_name))
                                    {{ $value->city_name }}
                                    @else
                                    Default Value
                                    @endif
                                </td>
                                <td class="fw-bold"> @if(!empty($value->block_number))
                                    {{ $value->village_ward }}
                                    @elseif(!empty($value->city_name))
                                    {{ $value->city_name }}
                                    @else
                                    Default Value
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $value->viewPassword }}</td>

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
                                    <a href="/userlistings/{{$value->id}}">
                                        <button type="button" class="btn btn-secondary ms-3 text-nowrap">
                                            <i class="metismenu-icon bi bi-eye"></i>&nbsp;View Listings
                                        </button>
                                    </a>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            },

        });
    });
</script>
@stop
