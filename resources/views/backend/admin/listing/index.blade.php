@extends('backend.layouts.master')
@section('title', 'Addtools')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="bi bi-tags icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All Listing</div>
                <div class="d-inline-block ml-3 pb-3">

                </div>
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

                                    <th class="text-nowrap text-center">Name</th>
                                    <th class="text-nowrap text-center">Number</th>
                                    <th class="text-nowrap text-center">Email</th>
                                    <th class="text-nowrap text-center">Address</th>
                                    <th class="text-nowrap text-center">Doc.Image </th>

                                    <th class="text-nowrap text-center">Status </th>
                                    <th class="text-nowrap text-center">Featured</th>
                                    <th class="text-nowrap text-center">Lead Status </th>
                                    <th class="text-nowrap text-center">Action </th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($businesses as $business)
                                    <tr>
                                        <td class="serial-number">{{ $loop->iteration }}</td>
                                        <td class="fw-bold text-nowrap ">{{ $business->businessName }}</td>
                                        <td class="fw-bold text-nowrap ">{{ $business->phoneNumber1 }}</td>
                                        <td class="fw-bold">{{ $business->email }}</td>
                                        <td class="fw-bold">{{ $business->placeAddress }}</td>

                                        <td class="fw-bold">

                                            <a class="btn btn-dark"
                                                href="{{ isset($business) && $business->documentImage ? asset('uploads/' . $business->documentImage) : asset('images/no-image.png') }}"
                                                alt="" download>
                                                Uploaded Document <i class="fa fa-file"></i>
                                            </a>

                                        </td>

                                        <td class="fw-bold">
                                            @if ($business->status == 1)
                                                <a class="fw-bold  btn btn-success"
                                                    href="{{ URL::to('admin/listing/active', $business->id) }} ">Active</a>
                                            @elseif ($business->status == 0)
                                                <a class="fw-bold btn btn-danger"
                                                    href="{{ URL::to('admin/listing/inactive', $business->id) }} ">Inactive</a>
                                            @else
                                                Unknown
                                            @endif
                                            <br />
                                        </td>

                                        <td class="fw-bold">
                                            @if ($business->home_featured == 11)
                                                <a class="fw-bold  btn  btn-danger"
                                                    href="{{ URL::to('admin/listing/homefeturedActive', $business->id) }} ">Inactive</a>
                                            @elseif ($business->home_featured < 11)
                                                <a class="fw-bold btn btn-success"
                                                    href="{{ URL::to('admin/listing/homefeturedinactive', $business->id) }} ">Active</a>
                                            @else
                                                Unknown
                                            @endif
                                            <br />
                                        </td>
                                        <td class="fw-bold">
                                            @if ($business->leadStatus == 0)
                                                <a class="fw-bold  btn btn-danger"
                                                    href="{{ URL::to('admin/listing/leadInactive', $business->id) }} ">Inactive</a>
                                            @elseif ($business->leadStatus == 1)
                                                <a class="fw-bold btn  btn-success"
                                                    href="{{ URL::to('admin/listing/leadActive', $business->id) }} ">Active</a>
                                            @else
                                                Unknown
                                            @endif
                                            <br />
                                        </td>

                                        <td class="d-flex">
                                            <a href="{{ URL::to('listingDetail/' . $business->category . '/' . Str::slug($business->businessName) . '-' . $business->id) }}"
                                                type="button" class="btn fw-bold btn-primary d-flex"
                                                data-mdb-ripple-color="dark">
                                                <i class="metismenu-icon bi bi-eye pe-1"></i>
                                            </a>

                                            <a href="{{ route('editPlace', ['id' => $business->id]) }}" type="button"
                                                class="btn ms-3 btn fw-bold btn-success d-flex"
                                                data-mdb-ripple-color="dark">
                                                <i class="metismenu-icon bi bi-gear-wide-connected pe-1"></i>
                                            </a>

                                            <form action="{{ route('admin.listing.destroy', $business->id) }}"
                                                method="POST" id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger ms-3 text-nowrap"
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
