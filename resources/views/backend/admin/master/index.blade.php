@extends('backend.layouts.master')
@section('title', 'Addtools')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="bi bi-tags icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All master</div>
                <div class="d-inline-block ml-3 pb-3">

                    <a href="{{ URL::to('admin/master/create') }}" class="btn btn-success">
                        <i class="bi bi-plus-lg"></i>
                        Add Master
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

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>

                                    <th class="text-nowrap">Master Name</th>
                                    <th class="text-nowrap">Master Value</th>

                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($master as $value)
                                    <tr>
                                        <td class="serial-number">{{ $loop->iteration }}</td>

                                        <td class="fw-bold text-nowrap ">{{ $value->title }}</td>
                                        <td class="fw-bold">{{ $value->value }}</td>
                                        <td class="d-flex">
                                            <a href="{{ Route('admin.master.edit', $value->id) }}"class="btn fw-bold btn-primary text-nowrap"
                                                data-mdb-ripple-color="dark">
                                                <i class="metismenu-icon bi bi-gear-wide-connected"></i>
                                                Edit
                                            </a>
                                            {{-- delete --}}
                                            <form action="{{ route('admin.master.destroy', $value->id) }}" method="POST"
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
