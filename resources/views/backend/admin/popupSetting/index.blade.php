@extends('backend.layouts.master')
@section('title', 'Addtools')
@section('content')
<!-- 
    <style>
        /* Red color */
        .icon-red {
            color: red;
        }

        /* Blue color */
        .icon-blue {
            color: blue;
        }
        /* Green color */
        .icon-green {
            color: green;
        }
    </style> -->

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="bi bi-tags icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All Ads</div>
                <div class="d-inline-block ml-3 pb-3">
                    <a href="{{ URL::to('admin/popupSetting/create') }}" class="btn btn-success">
                        <i class="bi bi-plus-lg"></i>
                        Add More Ads
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
                                    <th class="text-nowrap">Type</th>
                                    <th class="text-nowrap">Title</th>
                                    <th class="text-nowrap">Content Type</th>
                                    <th class="text-nowrap">Content Value</th>
                                    <th class="">Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model as $value)
                                    <tr>
                                        <td class="serial-number">{{ $loop->iteration }}</td>
                                        <td class="fw-bold text-nowrap ">{{ $value->type }}</td>

                                        <td class="fw-bold text-nowrap ">{{ $value->title }}</td>
                                        <td class="fw-bold">{{ $value->content_type }}</td>
                                        <td class="fw-bold">{{ $value->value }}</td>
                                        <td style="  width: 58px;">
                                            @if ($value->logo)
                                                <img class="img-thumbnail img-fluid tool-img-edit"
                                                    src="{{ URL::to('/uploads/' . $value->logo) }}" />
                                            @else
                                                <i id="color-changing-icon" class="fa fa-video-camera" aria-hidden="true"
                                                    style='font-size: 30px; margin-left:15px;'></i>
                                            @endif
                                        </td>
                                        <td class="d-flex">

                                            {{-- delete --}}
                                            <form action="{{ route('admin.popupSetting.destroy', $value->id) }}"
                                                method="POST" id="deleteForm">
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
    <!-- <script>
        function changeColor() {
            const icon = document.getElementById('color-changing-icon');
            const colors = ['icon-red', 'icon-blue', 'icon-green']; // Define your color classes
            let currentIndex = 0;

            setInterval(() => {
                icon.classList.remove(colors[currentIndex]); // Remove current color class
                currentIndex = (currentIndex + 1) % colors.length; // Cycle through colors
                icon.classList.add(colors[currentIndex]); // Add new color class
            }, 2000); // Change color every 2 seconds (adjust as needed)
        }

        // Call the function to start the color-changing effect
        changeColor();
    </script> -->

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
