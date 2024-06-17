<?php
use App\Models\Master;

$Mastercity = Master::orderBy('created_at', 'asc')
    ->where('type', '=', 'City')
    ->get();

?>
@extends('frontend.layouts.master')
@section('title', 'My Listings')
@section('content')
    <style>
        /* Custom styles for the delete modal */
        .modal-content {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 0.3s ease;
        }

        .modal-header {
            background-color: #dc3545;
            color: #fff;
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.5rem;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Animation keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <main id="main" class="site-main">

        <div class="site-content owner-content">
            <div class="member-menu">
                <div class="container">
                    <ul>
                        @if (Auth::user()->type == 'Owner')
                            <li><a href="/ownerDashboard">Dashboard</a></li>
                            <li class="active"><a href="/ownerListing">My business</a></li>
                        @endif

                        <li><a href="/ownerWishlist">Wishlist</a></li>
                        <li><a href="/ownerProfile">Profile</a></li>

                    </ul>
                </div>
            </div>
            <div>

                @if (session('success'))
                    <div class="form-card">
                        <h2 class="text-success text-center">
                            <i class="fas fa-check-circle fa-4x" style="font-size: 50px;">
                            </i>
                        </h2>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-10 text-center">
                                <h3 class="text-success">{{ session('success') }}</h3>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <div class="container">
                <div class="member-place-wrap">
                    <div class="member-wrap-top">
                        <h2>My Listings</h2>
                        {{-- <p>You are current FREE plan. <a href="pricing-plan.html">Upgrade now</a></p> --}}
                    </div><!-- .member-wrap-top -->
                    <div class="member-filter">
                        <div class="mf-left">
                            <form action="#" method="GET">
                                <div class="field-select">
                                    <select id="cityFilter" name="place_cities">
                                        <option selected> All Cities</option>
                                        @foreach ($Mastercity as $business)
                                            <option>
                                                {{ $business->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="la la-angle-down"></i>
                                </div>

                                <div class="field-select">
                                    <select id="categoryFilter" name="place_category">
                                        <option selected>All categories</option>
                                        @foreach ($MasterCategory as $category)
                                            <option>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="la la-angle-down"></i>
                                </div>

                            </form>
                        </div>

                        <div class="mf-right">
                            <form action="#" class="site__search__form" method="GET">
                                <div class="site__search__field">
                                    <span class="site__search__icon">
                                        <i class="la la-search"></i>
                                    </span>
                                    <input id="searchInput" class="site__search__input" type="text" name="s"
                                        placeholder="Search">
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="table-responsive">
                        @if (Auth::user()->type == 'Owner')

                            <table class="member-place-list table-responsive">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>City</th>
                                        <th>Category</th>
                                        {{-- <th>Leads</th> --}}
                                        <th>Status</th>
                                        <th>Profile</th>
                                        {{-- <th> Payment</th> --}}
                                        {{-- <th style="display:table-footer-group">Ranking Plans</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if (count($businesses) > 0)

                                        @foreach ($businesses as $business)
                                            <tr>

                                                <td data-title="ID">{{ $loop->iteration }}</td>
                                                <td data-title="Name">{{ $business->businessName }}</td>
                                                <td data-title="City">{{ $business->city }}</td>
                                                <td data-title="Category">{{ $business->category }}</td>
                                                {{-- <td data-title="Leads">
                                                    <a href="{{ route('ownerLeads', ['id' => $business->id]) }}"
                                                        class="list"
                                                        style="display: {{ $business->status == 0 ? 'none' : 'block' }}"
                                                        title="Leads    ">
                                                        <button class="btn">Check</button>
                                                    </a>
                                                </td> --}}
                                                <td data-title="Status"
                                                    style="color: {{ $business->status == 0 ? '#ffad2d' : 'green' }}">
                                                    {{ $business->status == 0 ? 'Pending' : 'Approved' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('completeProfile', ['id' => $business->id]) }}">
                                                        <button type="button" class="btn-primary rounded btn-sm"><i class="fas fa-user fs-6 text-white"></i>Complete your Profile</button>
                                                    </a>
                                                </td>
                                                {{-- <td data-title="Payment">
                                                    @if ($business->status == 0)
                                                        <a href="/packages/{{ $business->id }}" class="btn-sm btn-warning">
                                                            Activate Plan
                                                        </a>
                                                    @else
                                                        <span class="status-label" style="color: green;">
                                                            <i class="fas fa-check-circle " style="font-size: 20px;"></i>
                                                            Paid
                                                        </span>
                                                    @endif
                                                </td> --}}

                                                {{-- <td data-title="category">
                                                    @if ($business->status != 0)
                                                        <a href="/category/{{ $business->id }}" class="btn-sm btn-warning">
                                                            Activate Plan
                                                        </a>
                                                    @else
                                                        <span class="status-label" style="color: red;">
                                                   <i class="fas fa-exclamation-triangle" style="color: red;"></i>



                                                            Not verified
                                                        </span>
                                                    @endif
                                                </td> --}}

                                                <td data-title="Action" class="place-action d-flex action-btn">
                                                    <a href="{{ route('editPlace', ['id' => $business->id]) }}"
                                                        class="edit" title="Edit">
                                                        <i class="las la-edit"></i>
                                                    </a>

                                                    <a href="{{ URL::to('listingDetail/' . $business->category . '/' . Str::slug($business->businessName) . '-' . $business->id) }}"
                                                        class="view" title="View"><i class="la la-eye"></i></a>

                                                    {{-- <a href="{{ route('ownerLeads', ['id' => $business->id]) }}" class="list"
                                                style="display: {{ $business->status == 0 ? 'none' : 'block' }}"
                                                title="list"><i class="la la-list"></i></a> --}}

                                                    <!-- <a href='#' class="delete" title="Delete"><i
                                                                                                class="la la-trash-alt"></i></a> -->

                                                    <!-- <form method="POST" action="{{ route('delete', ['id' => $business->id]) }}"
                                                                        method="POST"id="deleteForm">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <a type="button" onclick="confirmDelete(this)" data-toggle="modal">
                                                                            <i class="la la-trash-alt"></i>
                                                                        </a>
                                                                    </form> -->
                                                    <form method="POST"
                                                        action="{{ route('delete', ['id' => $business->id]) }}"
                                                        id="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a type="button" class=" " data-toggle="modal"
                                                            data-target="#deleteModal">
                                                            <i class="la la-trash-alt"></i>
                                                        </a>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <br>
                                        <div style="color:#ff7070">
                                            <p>1. Please add listings first.</p>
                                            <p>2. Choose your plan</p>
                                        </div>
                                        <br><br>
                                    @endif

                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel" style="color:white">
                                                        Confirm
                                                        Deletion</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this item?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" form="deleteForm"
                                                        class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tbody>
                            </table>
                        @else
                            Your account type is guest, Please reguster/login with owner Account.
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </main>
    {{--  ---------------------------------------Filter By City And Category  -------------------------------------- --}}

    <!-- <script>
        function confirmDelete(button) {
            if (confirm("Are you sure you want to delete this item?")) {
                var form = button.parentElement; // Get the parent element of the button, which is the form
                form.submit();
            } else {
                alert("Delete operation cancelled.");
            }
        }
    </script> -->
    <script>
        $(document).ready(function() {
            $('#deleteModal').on('show.bs.modal', function() {
                $(this).css('transition', 'none'); // Disable transition on modal show
            });

            $('#deleteModal').on('shown.bs.modal', function() {
                $(this).css('transition', '0.3s'); // Enable transition on modal shown
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get references to the select elements, search input, and table rows
            var cityFilter = document.getElementById("cityFilter");
            var categoryFilter = document.getElementById("categoryFilter");
            var searchInput = document.getElementById("searchInput");
            var tableRows = document.querySelectorAll(".member-place-list tbody tr");

            // Add event listeners to select elements and search input
            cityFilter.addEventListener("change", filterTable);
            categoryFilter.addEventListener("change", filterTable);
            searchInput.addEventListener("input", filterTable);

            function filterTable() {
                var selectedCity = cityFilter.value;
                var selectedCategory = categoryFilter.value;
                var searchText = searchInput.value.toLowerCase();

                // Loop through table rows and hide/show based on selected city, category, and search text
                tableRows.forEach(function(row) {
                    var cityColumn = row.querySelector(
                        "td:nth-child(3)"); // Assuming city is the 3rd column
                    var categoryColumn = row.querySelector(
                        "td:nth-child(4)"); // Assuming category is the 4th column
                    var nameColumn = row.querySelector(
                        "td:nth-child(2)"); // Assuming name is the 2nd column

                    var cityMatch = selectedCity === "All Cities" || cityColumn.textContent.trim() ===
                        selectedCity;
                    var categoryMatch = selectedCategory === "All categories" || categoryColumn.textContent
                        .trim() === selectedCategory;
                    var nameMatch = nameColumn.textContent.toLowerCase().includes(searchText);

                    if (cityMatch && categoryMatch && nameMatch) {
                        row.style.display = "table-row";
                    } else {
                        row.style.display = "none";
                    }
                });
            }
        });
    </script>

@endsection
