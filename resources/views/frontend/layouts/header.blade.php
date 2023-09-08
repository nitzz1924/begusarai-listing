<header id="header" class="site-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-5">
                <div class="site">

                    <div class="site__brand">
                        <a title="Logo" href="/" class="site__brand__logo"><img
                                src="{{ asset('assets/images/begusarai-logo.png') }}" alt="Begusarai" /></a>
                    </div>
                    <!-- .site__brand -->
                </div>
                <!-- .site -->
            </div>
            <!-- .col-md-6 -->

            {{-- this is currently working main menu --}}
            <div class="col-xl-6 col-7">
                <div class="right-header align-right">
                    <nav class="main-menu">
                        <ul>
                            <li>
                                <a href="/" title="Home">Home</a>

                            </li>
                            <li>
                                <a href="#" title="Listings">Listings</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#" title="Search Layout">Search Layout</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="ex-half-map-1.html" title="Half Map – Left Filter">Half
                                                    Map – Left Filter</a>
                                            </li>
                                            <li>
                                                <a href="ex-half-map-2.html" title="Half Map – Top Filter">Half
                                                    Map – Top Filter</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" title="City Layout">City Layout</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="city-details-1.html" title="Half Map – Left Filter">Half Map –
                                                    Left Filter</a>
                                            </li>
                                            <li>
                                                <a href="city-details-2.html" title="Half Map – Top Filter">Half
                                                    Map – Top Filter</a>
                                            </li>
                                            <li>
                                                <a href="city-details-3.html" title="Without Map">Without
                                                    Map</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" title="Listing Detail">Single Layout</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="single-1.html" title="Carousel">Default - Carousel</a>
                                            </li>
                                            <li>
                                                <a href="single-2.html" title="Image">Default - Image</a>
                                            </li>
                                            <li>
                                                <a href="single-3.html" title="Restaurant">Restaurant Type</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" title="Booking Type">Booking Type</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="bk-booking-form.html" title="Appointment Booking">Appointment
                                                    Booking</a>
                                            </li>
                                            <li>
                                                <a href="bk-enquiry-form.html" title="Enquiry Form">Enquiry
                                                    Form</a>
                                            </li>
                                            <li>
                                                <a href="bk-affiliate-link.html" title="Affiliate Link">Affiliate
                                                    Link</a>
                                            </li>
                                            <li>
                                                <a href="bk-banner-ads.html" title="Affiliate Banner">Affiliate
                                                    Banner</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a title="Page" href="#">Page</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a title="About" href="/aboutUs">About Us</a>
                                    </li>

                                    <li>
                                        <a title="Contacts" href="/contactUs">Contacts Us</a>
                                    </li>

                                    <li>
                                        <a title="Packages" href="#">Packages</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a title="Packages" href="/packages">Packages</a>
                                            </li>
                                            <li>
                                                <a title="Pricing Plan Checkout" href="pricing-checkout.html">Pricing
                                                    Checkout</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a title="Page" href="#">Blog</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a title="Fullwidth" href="blog-fullwidth.html">Fullwidth</a>
                                            </li>
                                            <li>
                                                <a title="Right Sidebar" href="blog-right-sidebar.html">Right
                                                    Sidebar</a>
                                            </li>
                                            <li>
                                                <a title="Blog Detail" href="blog-detail.html">Blog Detail</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a title="Owner Dashboard" href="/ownerDashboard">Owner
                                            Dashboard</a>
                                    </li>
                                    <li>
                                        <a title="Owner Single" href="/businessOwnerPage">Owner page</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a class="avatar" href="">
                                    <img src="https://wp.getgolo.com/country-guide/wp-content/themes/golo/assets/images/default-user-image.png"
                                        title="guest" alt="guest">
                                    <span>Guest</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class=""><a href="">Profile</a>
                                    </li>
                                    <li class="/ownerWishlist"><a href="">My
                                            Wishlist</a></li>

                                    <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a href="">
                                    <span>Logout</span>
                                </a>
                            </li>

                        </ul>
                        </li>

                        <li>
                            <a class="avatar" href="">
                                <img src="https://wp.getgolo.com/wp-content/uploads/sites/3/2022/06/customersupport-30x30.png"
                                    title="Tho Minh" alt="Tho Minh">
                                <span>Business Owner</span>
                            </a>
                            <ul class="sub-menu">
                                <li class=""><a href="/ownerDashboard">Dashboard</a>
                                </li>
                                <li class=""><a href="/businessOwnerPage">My Page</a>
                                </li>
                                <li class=""><a href="/ownerListing">Listings</a>
                                </li>
                                <li class=""><a href="/ownerLeads">Leads</a>
                                </li>
                                <li class=""><a href="/ownerWishlist">My Wishlist</a>
                                </li>
                                {{-- <li class=""><a href="/">My Bookings</a>
                                    </li> --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="">
                                        <span>Logout</span> </i>
                                    </a>
                                </li>
                            </ul>
                    </nav>
                    <div class="right-header__login">
                        <a title="Login" class="open-login" href="#">Login</a>
                    </div>

                    {{-- logged in Business owner --}}

                    </nav>


                    <!-- .right-header__login -->


                    {{-- sign pop form starts here --}}
                    <div class="popup popup-form">
                        <a title="Close" href="#" class="popup__close">
                            <i class="las la-times la-24-black"></i> </a><!-- .popup__close -->
                        <ul class="choose-form">
                            <li class="nav-signup">
                                <a title="Sign Up" href="#signup">Sign Up</a>
                            </li>
                            <li class="nav-login">
                                <a title="Log In" href="#login">Log In</a>
                            </li>
                        </ul>

                        {{-- login with facebook --}}
                        {{-- <p class="choose-more">
							Continue with
							<a title="Facebook" class="fb" href="#">Facebook</a> or
							<a title="Google" class="gg" href="#">Google</a>
						</p> --}}
                        {{-- <p class="choose-or"><span>Or</span></p> --}}


                        <div class="popup-content">
                            <form action="#" class="form-sign form-content form-account" id="signup">

                                <div class="field-inline mb-3" style="justify-content: center;">
                                    <div class="form-group-user">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col-group">
                                                    <label for="guest" class="label-field radio-field">
                                                        <input type="radio" value="guest" id="guest"
                                                            name="account_type">
                                                        <span><i class="las la-user"></i>User</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="col-group">
                                                    <label for="owner" class="label-field radio-field">
                                                        <input type="radio" value="owner" id="owner"
                                                            name="account_type" checked="">
                                                        <span><i class="las la-briefcase"></i>Buiness Owner <span
                                                                style="color: gray">(Optional)</span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="field-inline">
                                        <div class="field-input-number">
                                            <input type="number" placeholder="Phone Number" value=""
                                                name="phone" pattern="[0-9]{10}" required />
                                        </div>
                                        <div>
                                            <input type="submit" name="submit" value="Send OTP"
                                                style="width: 100px;" />
                                        </div>
                                    </div>


                                    <div class="field-input">
                                        <input type="number" placeholder="OTP" value="" name="otp"
                                            pattern="[0-9]{6}" required />
                                    </div>
                                </div>
                                {{-- <div class="field-input">
									<input type="email" placeholder="Email" value="" name="email" />
								</div> --}}
                                {{-- <div class="field-input">
									<input type="password" placeholder="Password" value="" name="password" />
								</div> --}}
                                <div class="field-check">
                                    <label for="accept">
                                        <input type="checkbox" id="accept" value="" />
                                        Accept the <a title="Terms" href="#">Terms</a> and
                                        <a title="Privacy Policy" href="#">Privacy Policy</a>
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                    </label>
                                </div>
                                <input type="submit" name="submit" value="Verify" />
                            </form>
                            <form action="#" class="form-log form-content" id="login">
                                <div class="field-input">
                                    <input type="number" placeholder="Phone Number" value="" name="number"
                                        pattern="[0-9]{10}" required />
                                </div>
                                <div class="field-input">
                                    <input type="password" placeholder="Password" value="" name="password"
                                        required />
                                </div>
                                <a title="Forgot password" class="forgot_pass" href="#">Forgot password</a>
                                <input type="submit" name="submit" value="Login" />
                            </form>
                        </div>
                    </div>

                    {{-- Search pop form --}}
                    <!-- .popup-form -->
                    {{-- <div class="right-header__search">
						<a title="Search" href="#" class="search-open">
							<i class="las la-search la-24-black"></i>
						</a>
						<div class="site__search">
							<a title="Close" href="#" class="search__close">
								<i class="la la-times"></i> </a><!-- .search__close -->
							<form action="#" class="site__search__form" method="GET">
								<div class="site__search__field">
									<span class="site__search__icon">
										<i class="las la-search la-24-black"></i>
									</span><!-- .site__search__icon -->
									<input class="site__search__input" type="text" name="s"
										placeholder="Search places, cities" />
								</div>
								<!-- .search__input -->
							</form>
							<!-- .search__form -->
						</div>
						<!-- .site__search -->
					</div> --}}


                    <div class="right-header__button btn">
                        <a title="Add place" href="/addPlace">
                            <i class="las la-plus la-24-white"></i>
                            <span>Add Listing</span>
                        </a>
                    </div>
                    <!-- .right-header__button -->
                </div>
                <!-- .right-header -->
            </div>
            <!-- .col-md-6 -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container-fluid -->
</header>
