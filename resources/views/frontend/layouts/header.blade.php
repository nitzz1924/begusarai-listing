<?php
use App\Models\Master;
use App\Models\User_Login;

$Mastercity = Master::orderBy('created_at', 'asc')
    ->where('type', '=', 'City')
    ->get();

?>

<header id="header" class="site-header" style="border-bottom: 1px solid #eeeeee;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-sm-5 d-flex align-items-center ">

                <div class="site__menu me-2">
                    <a title="Menu Icon" href="#" class="site_menu_icon">
                        <i class="las la-bars la-24-black"></i>
                    </a>
                    <div class="popup-background"></div>

                    <div class="popup popup--left">
                        <a title="Close" href="#" class="popup__close">
                            <i class="las la-times la-24-black"></i>
                        </a><!-- .popup__close -->

                        <div class="popup_menu popup_box">

                            <div class="site__brand">
                                <a title="Logo" href="/" class="site_brand_logo"><img
                                        src="{{ asset('assets/images/begusarai-logo.png') }}" alt="Begusarai" /></a>
                            </div>
                        </div>

                        <div class="popup__content">

                            @auth
                                @if (Auth::user()->type == 'Owner')
                                    <div class="popup_button popup_box pb-0">
                                        <a title="Add place" href="/addPlace" class="">
                                            <span>Add place</span>
                                            <i class="la la-plus"></i>
                                        </a>
                                    </div>
                                    <!-- .popup__button -->
                                @endif
                            @endauth

                            {{-- Navigation tabs --}}
                            <div class="popup_destinations popup_box ">
                                <ul class="menu-arrow">
                                    <li>
                                        <a title="Destinations" href="#">Destinations </a>
                                        <ul class="sub-menu">
                                            @foreach ($Mastercity as $value)
                                                <li>
                                                    <a
                                                        href="{{ route('searchFilter', ['category' => 'all', 'city' => $value->title, 'highlight' => 'all']) }}">
                                                        {{ $value->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="popup_menu popup_box">
                                <ul class="menu-arrow">
                                    <h3 class="mb-3">Navigation</h3>

                                    <li>
                                        <a title="Packages" href="/packages/0">Pricing </a>
                                    </li>
                                    <li>
                                        <a title="Ranking" href="/category/0">Ranking </a>
                                    </li>
                                    <li>
                                        <a title="AboutUs" href="/aboutUs">About Us</a>
                                    </li>
                                    <li>
                                        <a title="Contact" href="/contact">Contact Us</a>
                                    </li>
                                    <li>
                                        <a title="Blogs" href="/blogs">Blog</a>
                                    </li>
                                </ul>
                            </div><!-- .popup__menu -->

                            <div class="popup_menu popup_box">
                                <ul class="menu-arrow">
                                    <h3 class="mb-3">Quick Links</h3>

                                    <li>
                                        <a title="Privacy" href="/privacyPolicy">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a title="Privacy" href="/termsAndConditions">Terms and Conditions </a>
                                    </li>
                                    <li>
                                        <a title="Privacy" href="/returnsPolicy">Refund and Returns Policy </a>
                                    </li>
                                </ul>
                            </div><!-- .popup__menu -->

                            <div class="popup_menu popup_box">
                                <ul class="menu-arrow">
                                    <h3 class="my-3">Connact With Us</h3>
                                    <ul>
                                        <li>
                                            <a title="testimonial" href="/testimonial">Testimonial</a>
                                        </li>
                                        <li>
                                            <a title="Career" href="/career">Career</a>
                                        </li>
                                        <li>
                                            <a title="Career" href="/faq">Faqs</a>
                                        </li>
                                    </ul>
                            </div><!-- .popup__menu -->
                            <div class="popup_menu popup_box">

                                <h2 class="mb-3">Contact Us</h2>
                                <p>
                                    Email:
                                    <a href="mailto:contact@inbegusarai.com" class="_cf_email_"
                                        data-cfemail="email">contact@inbegusarai.com</a>
                                </p>
                                <p>Phone: 9693667887 / 06243-316290</p>
                                <ul class="mt-2">
                                    <li class="facebook d-inline-block p-2 rounded">
                                        <a title="Facebook" class="" href="https://www.facebook.com/inbegusarai">
                                            <i class="la la-facebook-f fs-3 text-white"></i>
                                        </a>
                                    </li>

                                    <li class="instagram d-inline-block p-2 rounded">
                                        <a title="Instagram" class="" href="https://instagram.com/in.begusarai">
                                            <i class="la la-instagram fs-3 text-white "></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- .popup__menu -->

                            <div class="footer__bottom " style="margin-bottom: 20px">
                                <p class="footer_bottom_copyright">
                                    2023 &copy; <a title="Yuvmedia Team" href="https://yuvmedia.in"><span
                                            style="color: #38d6d6">Yuvmedia.in</span></a>. All
                                    rights reserved.
                                </p>
                            </div>

                        </div><!-- .popup__content -->

                    </div><!-- .popup -->
                </div><!-- .site__menu -->

                {{-- desktop navigation --}}
                <div class="site">
                    {{-- desktop navigation --}}
                    <div class="site__brand">
                        <a title="Logo" href="/" class="site_brand_logo"><img
                                src="{{ asset('assets/images/begusarai-logo.png') }}" alt="Begusarai" /></a>
                    </div>
                    <!-- .site__brand -->
                </div>
                <!-- .site -->

                {{-- login dropdown --}}
                <div class="ms-auto login-container mobile-view">
                    @guest
                        <div class="popup_user login_box open-form">
                            <a title="Login" href="#" class="open-login btn">Login</a>
                        </div><!-- .popup__user -->
                    @else
                        <div class="popup_menu popupbox login_box">
                            <ul class="sub-menu">
                                <?php $user = User_Login::find(auth()->user()->id); ?>

                                @if (Auth::user()->type == 'Guest')
                                    <li>
                                        <a class="avatar" href="">
                                            @if ($user->image)
                                                <img src="{{ URL::to('/uploads/' . $user->image) }}" title=""
                                                    alt="">
                                            @else
                                                <img src="https://wp.getgolo.com/country-guide/wp-content/themes/golo/assets/images/default-user-image.png"
                                                    title="guest" alt="guest">
                                            @endif
                                            {{-- <span>{{ $user->name }}</span> --}}
                                        </a>
                                        <ul class="sub-menu login-menu">
                                            <li class=""><a href="/ownerProfile">Profile</a></li>
                                            <li class=""><a href="/ownerWishlist">My Wishlist</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}">
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @elseif (Auth::user()->type == 'Owner')
                                    <li>
                                        <a class="avatar" href="">
                                            @if ($user->image)
                                                <img src="{{ URL::to('/uploads/' . $user->image) }}" title=""
                                                    alt="">
                                            @else
                                                <img src="{{ asset('assets/images/users/default.png') }}"
                                                    title="Default Avatar" alt="Default Avatar">
                                            @endif
                                            {{-- <span>{{ $user->name }}</span> --}}
                                        </a>
                                        <ul class="sub-menu login-menu">
                                            <li class=""><a href="/ownerDashboard">Dashboard</a></li>
                                            <li class=""><a href="/ownerListing">My Places</a></li>
                                            <li class=""><a href="/ownerWishlist">My Wishlist</a></li>
                                            {{-- <li class=""><a href="/businessOwnerPage">Author Listing</a></li> --}}

                                            <hr class="dropdown-divider">

                                            <li>
                                                <a href="/logout">
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div><!-- .popup__menu -->
                    @endguest
                </div>
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
                                <a title="Packages" href="/packages/0">Pricing </a>
                            </li>
                            <li>
                                <a title="Ranking" href="/category/0">Ranking </a>
                            </li>
                            <li>
                                <a title="Destinations" href="#">Destinations</a>
                                <ul class="sub-menu">

                                    @foreach ($Mastercity as $value)
                                        <li>
                                            <a
                                                href="{{ route('searchFilter', ['category' => 'all', 'city' => $value->title, 'highlight' => 'all']) }}">
                                                {{ $value->title }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>

                            @auth
                                <?php $user = User_Login::find(auth()->user()->id); ?>
                            @endauth

                            <?php 
                            if(Auth::user()){

                            if (Auth::user()->type=='Guest'){
                                ?>
                            <li>
                                <a class="avatar" href="">

                                    @if ($user->image)
                                        <img src="{{ URL::to('/uploads/' . $user->image) }}" title=""
                                            alt="">

                                        <span>
                                            {{ $user->name }}
                                        </span>
                                    @else
                                        <img src="https://wp.getgolo.com/country-guide/wp-content/themes/golo/assets/images/default-user-image.png"
                                            title="guest" alt="guest">
                                        <span>
                                            {{ $user->name }}
                                        </span>
                                    @endif
                                </a>
                                <ul class="sub-menu">
                                    <li class=""><a href="/ownerProfile">Profile</a></li>
                                    <li class=""><a href="/ownerWishlist">My Wishlist</a></li>
                                    <li>
                                        <a href="/logout">
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php 
                        }     }
                        ?>

                            <?php 
                            if(Auth::user()){

                            if (Auth::user()->type=='Owner'){
                            ?>
                            <li>
                                <a class="avatar" href="">
                                    @if ($user->image)
                                        <img src="{{ URL::to('/uploads/' . $user->image) }}" title=""
                                            alt="">

                                        <span>
                                            {{ $user->name }}
                                        </span>
                                    @else
                                        <img src="{{ asset('assets/images/users/default.png') }}"
                                            title="Default Avatar" alt="Default Avatar">
                                        <span>
                                            {{ $user->name }}
                                        </span>
                                    @endif
                                </a>
                                <ul class="sub-menu">
                                    <li class=""><a href="/ownerDashboard">Dashboard</a>
                                    </li>
                                    <!-- <li class=""><a href="/businessOwnerPage">My Page</a>
                                        </li> -->
                                    <li class=""><a href="/ownerListing">My Places</a>
                                    </li>
                                    <!-- <li class=""><a href="/ownerLeads">Leads</a>
                                        </li> -->
                                    <li class=""><a href="/ownerWishlist">My Wishlist</a>
                                    </li>
                                    {{-- <li class=""><a href="/businessOwnerPage">Author Listing</a>
                                    </li> --}}
                                    {{-- <li class=""><a href="/">My Bookings</a>
                                    </li> --}}
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            <span>Logout</span> </i>
                                        </a>
                                    </li>
                            </li>
                            <?php 
                                }}
                                ?>

                        </ul>
                        </ul>
                    </nav>

                    <?php 
                    if (Auth::user()==null){
                    ?>
                    <div class="right-header__login">
                        <a title="Login" class="open-login" href="#">Login</a>
                    </div>
                    <?php 
                    }
                    ?>
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

                                <div id="validation-errors"
                                    style="color: red;text-align: center;margin-top: -20px;margin-bottom: 20px;">
                                </div>
                                </span>

                                <!-- Radio buttons for account type -->
                                <div class="field-inline mb-3" style="justify-content: center;">
                                    <div class="form-group-user">
                                        <div class="row">
                                            <div class="col-6 px-1">
                                                <div class="col-group">
                                                    <label for="guest" class="label-field radio-field">
                                                        <input type="radio" value="guest" id="guest"
                                                            name="type" checked>
                                                        <span><i class="las la-user"></i>User</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 px-1">
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

                                <!-- Phone number and OTP input fields -->
                                <div class="">
                                    <div class="field-inline">
                                        <div class="field-input-number">
                                            <input type="tel" placeholder="Phone Number" value=""
                                                id="mobileNumberotp" name="mobileNumberotp" pattern="[0-9]{10}"
                                                maxlength="10" minlength="10" required />

                                        </div>

                                        <div>
                                            <button type="button" name="submit-otp" class="OTP-btn1 btn"
                                                value="Send OTP" style="width: 100px;" id="sendOTPButton">Send
                                                OTP</button>
                                        </div>
                                    </div>

                                    <div class="field-input">
                                        <input type="tel" id="verificationCode" placeholder="OTP" value=""
                                            name="verificationCode" pattern="[0-9]{6}" maxlength="6" minlength="6"
                                            required />
                                        <input type="hidden" id="generatedOTP" placeholder="OTP" value=""
                                            name="generatedOTP" />

                                    </div>

                                </div>

                                <!-- Acceptance checkbox -->
                                <div class="field-check mb-2">
                                    <label for="accept"
                                        style="flex: 0 0 100% !important; max-width: 100% !important;">
                                        <input type="checkbox" id="accept" value="1" name="accept"
                                            class="form-check-input  " required>
                                        @csrf
                                        Accept the <a title="Terms" href="#">Terms</a> and <a
                                            title="Privacy Policy" href="#">Privacy Policy</a>
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>

                                    </label>

                                </div>

                                <input type="submit" name="submit" value="Verify" />
                            </form>
                            <!-- Without Validation Error Form -->

                            <form action="{{ route('loginForm') }}" method="POST" class="form-log form-content"
                                id="login">
                                @csrf
                                <span>
                                    <div id="error-message" style="color: red; text-align: center; margin-top: 10px;">
                                    </div>
                                </span>
                                <div class="field-input">
                                    <input type="tel" placeholder="Enter Phone Number" value=""
                                        name="mobileNumber" pattern="[0-9]{10}" minlength="10" maxlength="10"
                                        id="mobileNumber" required />
                                </div>
                                <div class="field-input">
                                    <input type="password" placeholder="Password" value="" name="password"
                                        id="password" required />
                                </div>
                                <a title="Forgot password" class="forgot_pass" href="/resetPassword">Forgot
                                    password</a>
                                <input type="submit" name="submit" value="Login" id="loginSubmit" />
                            </form>

                        </div>
                    </div>

                    <?php 
                        if(Auth::user()){

                        if (Auth::user()->type=='Owner'){
                        ?>

                    <div class="right-header__button btn">
                        <a title="Add place" href="/addPlace">
                            <i class="las la-plus la-24-white"></i>
                            <span>Add Listing</span>
                        </a>
                    </div>

                    <?php 
                    }}
                    ?>

                    <!-- .right-header__button -->
                </div>
                <!-- .right-header -->
            </div>
            <!-- .col-md-6 -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container-fluid -->

    <div class="mobile-view">
        {{-- mobile navigation --}}
        <nav class="mobile-bottom-nav">

            <div class="mobile-bottom-nav_item mobile-bottom-nav_item--active">
                <a href="/">
                    <div class="mobile-bottom-nav__item-content">
                        <i class="fa-solid fa-house fs-4 pb-1" style="color: #C6E2E9"></i>
                        HOME
                    </div>
                </a>
            </div>

            <div class="mobile-bottom-nav__item">
                <a href="/comingSoon">
                    <div class="mobile-bottom-nav__item-content">
                        <i class="fa-solid fa-briefcase fs-4 pb-1" style="color: #FEC868"></i>
                        JOB
                    </div>
                </a>
            </div>

            <div class="mobile-bottom-nav__item">
                <a href="/blogs">
                    <div class="mobile-bottom-nav__item-content">
                        <i class="fa-solid fa-square-rss fs-4 pb-1" style="color: #FFCAAF"></i>
                        BLOG
                    </div>
                </a>
            </div>

            <div class="mobile-bottom-nav__item">
                <a href="/comingSoon">
                    <div class="mobile-bottom-nav__item-content">
                        <i class="fa-solid fa-newspaper fs-4 pb-1" style="color: #DAB894"></i>
                        NEWS
                    </div>
                </a>
            </div>

            <div class="mobile-bottom-nav__item">
                <a href="/comingSoon">
                    <div class="mobile-bottom-nav__item-content">
                        <i class="fa-solid fa-square-poll-horizontal fs-4 pb-1" style="color: #A7BED3"></i>
                        OPINION
                    </div>
                </a>
            </div>

        </nav>
    </div>
</header>
{{-- -----------------------------------------------reguster form ------------------------------------------ --}}
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
                                .mobileNumberotp);
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
            var bnymber = document.getElementById("mobileNumberotp").value;
            // Generate a random 6-digit OTP
            var randomOTP = Math.floor(100000 + Math.random() * 900000);
            const url = 'https://hisocial.in/api/send';

            // Data to send in the request body
            const data = {
                type: 'text',
                message: 'This OTP is valid for 5 minutes. Do not share this OTP with anyone. For assistance, call our support team at  ' +
                    randomOTP + " .",
                instance_id: '651EB1464D20F',
                access_token: '651e6533248d5',
                number: '91' + bnymber,
            };

            // Create and configure the request
            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded' // Set the content type
                },
                body: new URLSearchParams(data) // Serialize the data
            };

            // Make the POST request
            fetch(url, requestOptions)
                .then(response => response.json())
                .then(data => {

                })
                .catch(error => {
                    console.error('Error:', error);
                });
            // Set the generated OTP in the input field
            $('#verificationCode').val(randomOTP);
            $('#generatedOTP').val(randomOTP);
            // Enable the input field
            $('#verificationCode').removeAttr('readonly');

        });
    });
</script>
<!-- --------------------------------------Login Validation-----------------------------------  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#login').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    } else {
                        $('#error-message').text(response.message);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<!-- --------------------------------------Login Validation-----------------------------------  -->

<script>
    $(document).ready(function() {
        $('#signup').on('submit', function(e) {
            e.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Send an Ajax POST request to the signup route
            $.ajax({
                type: 'POST',
                url: '{{ route('signup') }}',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Redirect to the password setup page
                        window.location.href = response.redirect;
                    } else {
                        // Display validation errors
                        var errors = response.errors.join('<br>');
                        $('#validation-errors').html(errors).show();
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Add an event listener to the "Send OTP" button to generate and send OTP
        $('#sendOTPButton').on('click', function() {
            // Implement OTP sending logic here
            // You can send an Ajax request to send OTP and update the "readonly" input field.
        });
    });
</script>

<script>
    var navItems = document.querySelectorAll(".mobile-bottom-nav__item");
    navItems.forEach(function(e, i) {
        e.addEventListener("click", function(e) {
            navItems.forEach(function(e2, i2) {
                e2.classList.remove("mobile-bottom-nav__item--active");
            })
            this.classList.add("mobile-bottom-nav__item--active");
        });
    });
</script>
{{-- -----------------------------------------------Login form ------------------------------------------ --}}
