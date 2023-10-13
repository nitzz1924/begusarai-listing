@extends('backend.layouts.master')
@section('title', 'Package List')
@section('content')




    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="bi bi-tags icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All Packages</div>
                <div class="d-inline-block ml-3 pb-3">

                    <a href="{{ URL::to('admin/package/create') }}" class="btn btn-success">
                        <i class="bi bi-plus-lg"></i>
                        Add Package
                    </a>

                </div>
            </div>
        </div>
    </div>


    @if (session('error'))
        <section class="container">
            <div class="row py-3 justify-content-center">
                <div class="col-12 col-md-6 alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            </div>
        </section>
    @endif


    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Duration</th>
                                    <th>Duration Type</th>
                                    <th>Price</th>
                                    <!-- <th>High Price</th> -->
                                    <th>Number of Places</th>
                                    <th>Featured Listings</th>
                                    <th>Featured Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $package->type }}</td>
                                        <td>{{ $package->title }}</td>
                                        <td>{{ $package->duration }}</td>
                                        <td>{{ $package->durationMY == 0 ? 'Months' : 'Years' }}</td>
                                        <td>{{ $package->price }}</td>
                                        <!-- <td>{{ $package->off }}</td> -->
                                        <td>{{ $package->noOfPlace }}</td>
                                        <td>{{ $package->featuredListings }}</td>
                                        <td>{{ $package->featuredType }}</td>
                                        <td class="d-flex">

                                            <a href="{{ route('admin.package.edit', ['package' => $package->id]) }}"
                                                type="button" class="btn fw-bold btn-primary d-flex"
                                                data-mdb-ripple-color="dark">

                                                <i class="metismenu-icon bi bi-gear-wide-connected pe-1"></i>
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.package.destroy', $package->id) }}"
                                                method="POST" id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger ms-3 d-flex"
                                                    onclick="confirmDelete(this)">
                                                    <i class="metismenu-icon bi bi-trash3 pe-1"></i>
                                                </button>
                                            </form>
                                        </td>



                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
