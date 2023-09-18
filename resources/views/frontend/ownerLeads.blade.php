@extends('frontend.layouts.master')
@section('title', 'My Leads')
@section('content')


    <main id="main" class="site-main">
        <div class="site-content owner-content">
            <div class="member-menu">
                <div class="container">
                    <ul>
                        <li><a href="/ownerDashboard">Dashboard</a></li>
                        <!-- <li class="active"><a href="/ownerLeads">Leads</a></li> -->
                        <li><a href="/ownerListing">My places</a></li>
                        <li><a href="/ownerWishlist">Wishlist</a></li>
                        <li><a href="/ownerProfile">Profile</a></li>

                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="member-place-wrap">
                    <div class="member-wrap-top">
                        <h2>My Leads</h2>
                        {{-- <p>You are current FREE plan. <a href="pricing-plan.html">Upgrade now</a></p> --}}
                    </div><!-- .member-wrap-top -->
                    <div class="member-filter">
                        <div class="mf-left">
                            <!-- <form action="#" method="GET">
                                                                                    <div class="field-select">
                                                                                        <select name="place_cities">
                                                                                            <option value="0">All cities</option>
                                                                                            <option value="newyork">Paris</option>
                                                                                            <option value="newyork">New York</option>
                                                                                            <option value="chicago">Chicago</option>
                                                                                        </select>
                                                                                        <i class="la la-angle-down"></i>
                                                                                    </div>
                                                                                    <div class="field-select">
                                                                                        <select name="place_cities">
                                                                                            <option value="0">All categories</option>
                                                                                            <option value="Restaurant">Restaurant</option>
                                                                                            <option value="Gym">Gym</option>
                                                                                            <option value="Beaty">Beaty & Spa</option>
                                                                                            <option value="Shopping">Shopping</option>
                                                                                        </select>
                                                                                        <i class="la la-angle-down"></i>
                                                                                    </div>
                                                                                </form> -->
                        </div><!-- .mf-left -->
                        <div class="mf-right">
                            <form action="#" class="site__search__form" method="GET">
                                <div class="site__search__field">
                                    <span class="site__search__icon">
                                        <i class="la la-search"></i>
                                    </span><!-- .site__search__icon -->
                                    <input class="site__search__input" type="text" name="s" placeholder="Search">
                                </div><!-- .search__input -->
                            </form><!-- .search__form -->
                        </div><!-- .mf-right -->
                    </div><!-- .member-filter -->
                    <table class="member-place-list table-responsive">
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lead as $value)
                                <tr>

                                    <td data-title="ID">{{ $loop->iteration }}</td>
                                    <td data-title="Name">{{ $value->name }}</td>
                                    <td data-title="Number">{{ $value->number }}</td>
                                    <td data-title="Message">{{ $value->message }}</td>
                                </tr>
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>

                    <div class="pagination align-left">
                        <div class="pagination__numbers">
                            <span>1</span>
                            <a title="2" href="#">2</a>
                            <a title="3" href="#">3</a>
                            <a title="Next" href="#">
                                <i class="la la-angle-right"></i>
                            </a>
                        </div>
                    </div><!-- .pagination -->
                </div><!-- .member-place-wrap -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->


@endsection
