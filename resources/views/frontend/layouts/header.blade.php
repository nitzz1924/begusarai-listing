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
            <div class="col-xl-6 col-sm-5 d-flex align-items-center justify-content-between">
                <div class="site">

                    {{-- desktop navigation --}}
                    <div class="site__brand">
                        <a title="Logo" href="/" class="site__brand__logo"><img
                                src="{{ asset('assets/images/begusarai-logo.png') }}" alt="Begusarai" /></a>
                    </div>
                    <!-- .site__brand -->
                </div>
                <div class="site__menu">
                    <a title="Menu Icon" href="#" class="site__menu__icon">
                        <i class="las la-bars la-24-black"></i>
                    </a>
                    <div class="popup-background"></div>

                    <div class="popup popup--left">
                        <a title="Close" href="#" class="popup__close">
                            <i class="las la-times la-24-black"></i>
                        </a><!-- .popup__close -->

                        <div class="popup__menu popup__box">

                            <div class="site__brand">
                                <a title="Logo" href="/" class="site__brand__logo"><img
                                        src="{{ asset('assets/images/begusarai-logo.png') }}" alt="Begusarai" /></a>
                            </div>
                        </div>

                        <div class="popup__content">
                            @guest
                                <div class="popup__user popup__box open-form">
                                    <a title="Login" href="#" class="open-login">Login</a>
                                </div><!-- .popup__user -->
                            @else
                                <div class="popup__menu popup__box">
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
                                                    <span>{{ $user->name }}</span>
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
                                                    <span>{{ $user->name }}</span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class=""><a href="/ownerDashboard">Dashboard</a></li>
                                                    <li class=""><a href="/ownerListing">My Places</a></li>
                                                    <li class=""><a href="/ownerWishlist">My Wishlist</a></li>
                                                    {{-- <li class=""><a href="/businessOwnerPage">Author Listing</a></li> --}}
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
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
                            {{-- Navigation tabs --}}
                            <div class="popup__menu popup__box">
                                <ul class="menu-arrow">
                                    <li>
                                        <a title="Packages" href="/packages/0">Pricing </a>
                                    </li>
                                    <li>
                                        <a title="Packages" href="/category/0">Ranking </a>
                                    </li>
                                    <li>
                                        <a title="AboutUs" href="/aboutUs">About Us</a>
                                    </li>
                                    <li>
                                        <a title="Contact" href="/contact">Contact Us</a>
                                    </li>
                                </ul>
                            </div><!-- .popup__menu -->

                            <div class="popup__destinations popup__box">
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
                            @auth
                                @if (Auth::user()->type == 'Owner')
                                    <div class="popup__button popup__box">
                                        <a title="Add place" href="/addPlace" class="btn">
                                            <i class="la la-plus"></i>
                                            <span>Add place</span>
                                        </a>
                                    </div><!-- .popup__button -->
                                @endif
                            @endauth
                        </div><!-- .popup__content -->

                    </div><!-- .popup -->
                </div><!-- .site__menu -->

                {{-- desktop navigation --}}

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

                                <!-- Phone number and OTP input fields -->
                                <div class="">
                                    <div class="field-inline">
                                        <div class="field-input-number">
                                            <input type="tel" placeholder="Phone Number" value=""
                                                id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}"
                                                maxlength="10" minlength="10" required />

                                        </div>

                                        <div>
                                            <button type="button" name="submit-otp" class="OTP-btn1"
                                                value="Send OTP" style="width: 100px;" id="sendOTPButton">Send
                                                OTP</button>
                                        </div>
                                    </div>

                                    <div class="field-input">
                                        <input type="tel" id="verificationCode" placeholder="OTP" value=""
                                            name="verificationCode" pattern="[0-9]{6}" maxlength="6" minlength="6"
                                            required readonly />
                                        <input type="hidden" id="generatedOTP" placeholder="OTP" value=""
                                            name="generatedOTP" />

                                    </div>

                                </div>

                                <!-- Acceptance checkbox -->
                                <div class="field-check">
                                    <label for="accept">
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
                            <!-- <form action="{{ route('loginForm') }}" method="POST" class="form-log form-content"
                                id="login">
                                @csrf
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
                            </form> -->
                            <!-- display error message in login Form  -->



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

            <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
                <a href="/">
                    <div class="mobile-bottom-nav__item-content">
                        <i class="fa-solid fa-house fs-4 pb-1" style="color: #C6E2E9"></i>
                        HOME
                    </div>
                </a>
            </div>

            <div class="mobile-bottom-nav__item">
                <a href="">
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
                <a href="">
                    <div class="mobile-bottom-nav__item-content">
                        <i class="fa-solid fa-newspaper fs-4 pb-1" style="color: #DAB894"></i>
                        NEWS
                    </div>
                </a>
            </div>

            <div class="mobile-bottom-nav__item">
                <a href="">
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
