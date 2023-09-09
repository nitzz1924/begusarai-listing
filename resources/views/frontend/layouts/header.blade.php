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
                            <!-- <li>
                                <a href="/setpassword" title="Home">SetPasswod</a>

                            </li> -->
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



                        <div class="popup-content">



                            <form action="{{ route('signup') }}" method="POST"
                                class="form-sign form-content form-account" id="signup">

                                @csrf


                                <!-- Radio buttons for account type -->
                                <div class="field-inline mb-3" style="justify-content: center;">
                                    <div class="form-group-user">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col-group">
                                                    <label for="guest" class="label-field radio-field">
                                                        <input type="radio" value="guest" id="guest"
                                                            name="type" checked>
                                                        <span><i class="las la-user"></i>User</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="col-group">
                                                    <label for="owner" class="label-field radio-field">
                                                        <input type="radio" value="owner" id="owner"
                                                            name="type">
                                                        <span><i class="las la-briefcase"></i>Business Owner</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('type')
                                    <span id="error_description_type" class="has-error">{{ $message }}</span>
                                @enderror

                                <!-- Phone number and OTP input fields -->
                                <div class="">
                                    <div class="field-inline">
                                        <div class="field-input-number">
                                            <input type="number" placeholder="Phone Number"
                                                value=""id="mobileNumber" name="mobileNumber"
                                                pattern="[0-9]{10}" required />
                                            @error('mobileNumber')
                                                <span id="error_description_mobileNumber"
                                                    class="has-error">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div>
                                            <input type="button" name="submit-otp" value="Send OTP"
                                                style="width: 100px;" id="sendOTPButton" />
                                        </div>
                                    </div>



                                    <div class="field-input">
                                        <input type="number" id="verificationCode" placeholder="OTP" value=""
                                            name="verificationCode" pattern="[0-9]{6}" required readonly />
                                        <input type="hidden" id="generatedOTP" placeholder="OTP" value=""
                                            name="generatedOTP" />
                                        @error('verificationCode')
                                            <span id="error_description_verificationCode"
                                                class="has-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <!-- Acceptance checkbox -->
                                <div class="field-check">
                                    <label for="accept">
                                        <input type="checkbox" id="accept" value="1" name="accept"
                                            class="form-check-input @error('accept') is-invalid @enderror" required>
                                        Accept the <a title="Terms" href="#">Terms</a> and <a
                                            title="Privacy Policy" href="#">Privacy Policy</a>
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                        @error('accept')
                                            <div id="error_description_accept" class="invalid-feedback">
                                                {{ $message }}</div>
                                        @enderror
                                    </label>


                                </div>


                                <input type="submit" name="submit" value="Verify" />
                            </form>




                            <form action="#" class="form-log form-content" id="login">
                                <div class="field-input">
                                    <input type="number" placeholder="Phone Number" value="" name="number"
                                        pattern="[0-9]{10}" />
                                </div>
                                <div class="field-input">
                                    <input type="password" placeholder="Password" value="" name="password" />
                                </div>
                                <a title="Forgot password" class="forgot_pass" href="#">Forgot password</a>
                                <input type="submit" name="submit" value="Login" />
                            </form>
                        </div>
                    </div>

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

<script>
    $(document).ready(function() {
        // Add the CSRF token to all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#signup').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Serialize the form data
            var formData = $(this).serialize();

            // Submit the form data via AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    if (response.success) {
                        // Form submitted successfully
                        alert('Form submitted successfully');

                        // Check if a redirect URL is provided
                        if (response.redirect) {
                            // Redirect the user to the specified URL
                            window.location.href = response.redirect;
                        } else {
                            // Optionally, reset the form
                            $('#signup')[0].reset();
                            $('#popup-message').text(
                                'Please correct the following errors:');
                            $('#error_description_type').text(response.errors.type);
                            $('#error_description_mobileNumber').text(response.errors
                                .mobileNumber);
                            $('#error_description_verificationCode').text(response.errors
                                .verificationCode);
                            $('#error_description_accept').text(response.errors.accept);
                        }
                    } else {
                        // Display validation errors
                        $('#popup-message').text('Please correct the following errors:');
                        $('#error_description').html(response.errors.join('<br>'));
                    }
                },
                error: function(xhr) {
                    // Handle AJAX errors
                    console.log(xhr.responseText);
                    // Display the error message to the user
                    alert('An error occurred while processing your request.');
                }
            });
        });

        $('#sendOTPButton').on('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Generate a random 6-digit OTP
            var randomOTP = Math.floor(100000 + Math.random() * 900000);

            // Set the generated OTP in the input field
            $('#verificationCode').val(randomOTP);
            $('#generatedOTP').val(randomOTP);
            // Enable the input field
            $('#verificationCode').removeAttr('readonly');
        });
    });
</script>
