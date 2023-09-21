<?php
use App\Models\Master;

$Mastercity = Master::orderBy('created_at', 'asc')
    ->where('type', '=', 'City')
    ->get();

?>
@extends('frontend.layouts.master')
@section('title', 'My Listings')
@section('content')

    <main id="main" class="site-main">

        <div class="site-content owner-content">
            <div class="member-menu">
                <div class="container">
                    <ul>
                        <li><a href="/ownerDashboard">Dashboard</a></li>
                        <!-- <li><a href="/ownerLeads">Leads</a></li> -->
                        <li class="active"><a href="/ownerListing">My places</a></li>

                        <li><a href="/ownerWishlist">Wishlist</a></li>
                        <li><a href="/ownerProfile">Profile</a></li>

                    </ul>
                </div>
            </div>
            <div>
                @if (session('success'))
                    <div class="alert alert-success-custom">
                        {{ session('success') }}
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

                        <table class="member-place-list table-responsive">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($businesses as $business)
                                    <tr>

                                        <td data-title="ID">{{ $loop->iteration }}</td>
                                        <td data-title="Name">{{ $business->businessName }}</td>
                                        <td data-title="City">{{ $business->city }}</td>
                                        <td data-title="Category">{{ $business->category }}</td>
                                        <td data-title="Status"
                                            style="color: {{ $business->status == 0 ? '#ffad2d' : 'green' }}">
                                            {{ $business->status == 0 ? 'Pending' : 'Approved' }}
                                        </td>
                                        <td data-title="Payment">
                                            @if ($business->status == 0)
                                                <button href="#" class="btn-sm btn-warning">
                                                    Pay
                                                    Now
                                                </button>
                                            @else
                                                <span class="status-label" style="color: green;">
                                                    <i class="fas fa-check-circle " style="font-size: 20px;"></i>
                                                    Done
                                                </span>
                                            @endif
                                        </td>




                                        <td data-title="Action" class="place-action d-flex action-btn">
                                            <a href="{{ route('editPlace', ['id' => $business->id]) }}" class="edit"
                                                title="Edit">
                                                <i class="las la-edit"></i>
                                            </a>


                                            <a href="{{ route('listingDetail', ['id' => $business->id, 'category' => $business->category]) }}"
                                                class="view" title="View"><i class="la la-eye"></i></a>
                                            <a href="{{ route('ownerLeads', ['id' => $business->id]) }}" class="list"
                                                style="display: {{ $business->status == 0 ? 'none' : 'block' }}"
                                                title="list"><i class="la la-list"></i></a>

                                            <a href='#' class="delete" title="Delete"><i
                                                    class="la la-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </main>
    {{--  ---------------------------------------Filter By City And Category  -------------------------------------- --}}






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
