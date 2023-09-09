@extends('frontend.layouts.master')
@section('title', 'Listings')
@section('content')
    

<main id="main" class="site-main">
    <div class="site-content owner-content">
        <div class="member-menu">
            <div class="container">
                <ul>
                    <li><a href="/ownerDashboard">Dashboard</a></li>
                    <li><a href="/ownerLeads">Leads</a></li>
                    <li class="active"><a href="/ownerListing">Listings</a></li>
                    <li><a href="/ownerWishlist">Wishlist</a></li>
                    <li><a href="/ownerProfile">Profile</a></li>

                </ul>
            </div>
        </div>
        <div class="container">
            <div class="member-place-wrap">
                <div class="member-wrap-top">
                    <h2>My Listings</h2>
                    <p>You are current FREE plan. <a href="pricing-plan.html">Upgrade now</a></p>
                </div><!-- .member-wrap-top -->
                <div class="member-filter">
                    <div class="mf-left">
                        <form action="#" method="GET">
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
                        </form>
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
                            <th>
                                <div class="field-check">
                                    <label for="all">
                                        <input id="all" type="checkbox" value="all">
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                    </label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Thumb</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-title="">
                                <div class="field-check">
                                    <label for="place01">
                                        <input id="place01" type="checkbox" value="all">
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td data-title="ID">01</td>
                            <td data-title="Thumb"><img src="images/listing/01.jpg" alt="Place Thumb"></td>
                            <td data-title="Place name"><b>Vago Restaurant</b></td>
                            <td data-title="City">Paris</td>
                            <td data-title="Category">Restaurant</td>
                            <td data-title="Status" class="approved">Approved</td>
                            <td data-title="" class="place-action">
                                <a href="#" class="edit" title="Edit"><i class="las la-edit"></i></a>
                                <a href="#" class="view" title="View"><i class="la la-eye"></i></a>
                                <a href="#" class="delete" title="Delete"><i class="la la-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td data-title="">
                                <div class="field-check">
                                    <label for="place01">
                                        <input id="place01" type="checkbox" value="all">
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td data-title="ID">02</td>
                            <td data-title="Thumb"><img src="images/listing/02.jpg" alt="Place Thumb"></td>
                            <td data-title="Place name"><b>Retro Fitness</b></td>
                            <td data-title="City">Paris</td>
                            <td data-title="Category">Gym</td>
                            <td data-title="Status" class="approved">Approved</td>
                            <td data-title="" class="place-action">
                                <a href="#" class="edit" title="Edit"><i class="las la-edit"></i></a>
                                <a href="#" class="view" title="View"><i class="la la-eye"></i></a>
                                <a href="#" class="delete" title="Delete"><i class="la la-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td data-title="">
                                <div class="field-check">
                                    <label for="place01">
                                        <input id="place01" type="checkbox" value="all">
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td data-title="ID">03</td>
                            <td data-title="Thumb"><img src="images/listing/03.jpg" alt="Place Thumb"></td>
                            <td data-title="Place name"><b>Renew Body Spa</b></td>
                            <td data-title="City">Paris</td>
                            <td data-title="Category">Beaty & Spa</td>
                            <td data-title="Status" class="cancel">Cancel</td>
                            <td data-title="" class="place-action">
                                <a href="#" class="edit" title="Edit"><i class="las la-edit"></i></a>
                                <a href="#" class="view" title="View"><i class="la la-eye"></i></a>
                                <a href="#" class="delete" title="Delete"><i class="la la-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td data-title="">
                                <div class="field-check">
                                    <label for="place01">
                                        <input id="place01" type="checkbox" value="all">
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td data-title="ID">04</td>
                            <td data-title="Thumb"><img src="images/listing/04.jpg" alt="Place Thumb"></td>
                            <td data-title="Place name"><b>Jardin Club</b></td>
                            <td data-title="City">New York</td>
                            <td data-title="Category">Nightlife</td>
                            <td data-title="Status" class="approved">Approved</td>
                            <td data-title="" class="place-action">
                                <a href="#" class="edit" title="Edit"><i class="las la-edit"></i></a>
                                <a href="#" class="view" title="View"><i class="la la-eye"></i></a>
                                <a href="#" class="delete" title="Delete"><i class="la la-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td data-title="">
                                <div class="field-check">
                                    <label for="place01">
                                        <input id="place01" type="checkbox" value="all">
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td data-title="ID">05</td>
                            <td data-title="Thumb"><img src="images/listing/05.jpg" alt="Place Thumb"></td>
                            <td data-title="Place name"><b>Antoinette</b></td>
                            <td data-title="City">Chicago</td>
                            <td data-title="Category">Shopping</td>
                            <td data-title="Status" class="pending">Pending</td>
                            <td data-title="" class="place-action">
                                <a href="#" class="edit" title="Edit"><i class="las la-edit"></i></a>
                                <a href="#" class="view" title="View"><i class="la la-eye"></i></a>
                                <a href="#" class="delete" title="Delete"><i class="la la-trash-alt"></i></a>
                            </td>
                        </tr>
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