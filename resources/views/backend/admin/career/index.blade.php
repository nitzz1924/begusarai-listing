@extends('backend.layouts.master')
@section('title', 'Addtools')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="bi bi-tags icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All Career</div>
                <div class="d-inline-block ml-3 pb-3">

                    <!-- <a href="{{ URL::to('admin/master/create') }}" class="btn btn-success">
                      <i class="bi bi-plus-lg"></i>
                      Add career
                  </a> -->

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

                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">Number</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">Message</th>

                                    <th>Action </th>
                                    <!-- <th>Status </th> -->

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($career as $value)
                                    <tr>
                                        <td class="serial-number">{{ $loop->iteration }}</td>

                                        <td class="fw-bold text-nowrap ">{{ $value->name }}</td>
                                        <td class="fw-bold">{{ $value->number }}</td>
                                        <td class="fw-bold">{{ $value->email }}</td>
                                        <td class="fw-bold">{{ $value->message }}</td>
                                        <td class="d-flex">

                                            <form action="{{ route('admin.career.destroy', $value->id) }}"
                                                method="POST" id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger ms-3 text-nowrap"
                                                    onclick="confirmDelete(this)">

                                                    <i class="metismenu-icon bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <!-- <td class="fw-bold">
                                            @if ($value->status == 1)
                                                <a class="fw-bold  btn btn-success"
                                                    href="{{ URL::to('admin/career/active', $value->id) }}">Active</a>
                                            @elseif ($value->status == 0)
                                                <a class="fw-bold btn btn-danger"
                                                    href="{{ URL::to('admin/career/inactive', $value->id) }}">Inactive</a>
                                            @else
                                                Unknown
                                            @endif
                                            <br />



                                        </td> -->
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
