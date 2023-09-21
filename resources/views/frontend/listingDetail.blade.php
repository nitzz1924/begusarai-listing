@extends('frontend.layouts.master')
@section('title', 'Listing Details')
@section('content')
    <?php
    
    use App\Models\User_Login;
    
    ?>

    <style>
        /* Define the filled-star class to set the yellow color */
        .filled-star {
            color: #23d3d3;
        }

        .star-rating {
            display: inline-block;
            font-size: 0;
            /* Remove the default radio button text */
        }

        .star-rating input[type="radio"] {
            display: none;
            /* Hide the radio buttons */
        }

        .star-rating label {
            font-size: 24px;
            /* Adjust the size of the stars */
            cursor: pointer;
        }

        .star-rating label:before {
            content: '\2605';
            /* Unicode character for a star */
            color: #e1e1e1;
            /* Default star color (empty) */
        }

        /* Style for filled stars */
        .star-rating label.filled:before {
            color: #f7d417;
            /* Color of the selected stars */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #23d3d3;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #2790ff;
        }
    </style>

    <main class="site-main single single-02" id="main">
        <div class="place">
            <div class="slick-sliders">
                <div class="slick-slider" data-arrows="true" data-centermode="true" data-centerpadding="418px" data-dots="true"
                    data-infinite="true" data-item="1" data-itemscroll="1" data-mobileitem="1" data-mobilepadding="30px"
                    data-mobilescroll="1" data-tabletitem="1" data-tabletpadding="70px" data-tabletscroll="1">

                    <div class="place-slider__item bd">
                        <a href="#" title="Place Slider Image">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-01">
                        </a>
                    </div>
                    <div class="place-slider__item bd">
                        <a href="#" title="Place Slider Image">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-01">
                        </a>
                    </div>

                </div><!-- .page-title -->
                <div class="place-share">

                    <div class="social-share">
                        <div class="list-social-icon">
                            <a class="facebook" href="javascript:void(0)"
                                onclick="window.open('https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F','sharer', 'toolbar=0,status=0');">
                                <i class="fab fa-facebook-f"></i> </a>
                            <a class="twitter" href="javascript:void(0)"
                                onclick="popUp=window.open('https://twitter.com/share?url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F','sharer','scrollbars=yes');popUp.focus();return false;">
                                <i class="fab fa-twitter"></i> </a>
                            <a class="linkedin" href="javascript:void(0)"
                                onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F&amp;title=The+Louvre','sharer','scrollbars=yes');popUp.focus();return false;">
                                <i class="fab fa-linkedin-in"></i> </a>
                            <a class="pinterest" href="javascript:void(0)"
                                onclick="popUp=window.open('../../pinterest.com/pin/create/button/index6b58.html?url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F&amp;description=The+Louvre&amp;media=https://wp.getgolo.com/wp-content/uploads/2019/10/ef3cc68f-2e02-41cc-aad6-4b301a655555.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;">
                                <i class="fab fa-pinterest-p"></i> </a>
                        </div>
                    </div>
                </div><!-- .place-share -->
                <div class="place-slider__nav slick-nav">
                    <div class="place-slider__prev slick-nav__prev">
                        <i class="las la-angle-left"></i>
                    </div><!-- .place-slider__prev -->
                    <div class="place-slider__next slick-nav__next">
                        <i class="las la-angle-right"></i>
                    </div><!-- .place-slider__next -->
                </div><!-- .place-slider__nav -->
            </div><!-- .place-slider -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success" style="color:green">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="place__left">
                            <ul class="place__breadcrumbs breadcrumbs mt-1">
                                <li>{{ $businessesDetail->highlight }}

                            </ul><!-- .place__breadcrumbs -->
                            <div class="place__box place__box--npd">
                                <h1> {{ $businessesDetail->businessName }}</h1>
                                <div class="place__meta">
                                    <div class="place__reviews reviews">
                                        <span class="place__reviews__number reviews__number">
                                            <span>

                                                @php
                                                    $totalRating = 0;
                                                    $totalReviews = count($reviews);
                                                    foreach ($reviews as $review) {
                                                        $totalRating += $review->rating;
                                                    }
                                                    if ($totalReviews > 0) {
                                                        $averageRating = $totalRating / $totalReviews;
                                                        echo number_format($averageRating, 1); // Display average rating with 1 decimal place
                                                    } else {
                                                        echo '0'; // No reviews available
                                                    }
                                                @endphp
                                            </span>
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="place__places-item__count reviews_count">({{ count($reviews) }}
                                            Reviews)</span>
                                    </div>
                                    <div class="place__currency"> {{ $businessesDetail->price }}</div>
                                    <div class="place__category">

                                        <a href="#" title=" ">{{ $businessesDetail->placeType }}</a>
                                    </div>
                                </div><!-- .place__meta -->
                            </div><!-- .place__box -->
                            <div class="place__box place__box-hightlight">
                                <div class="hightlight-grid">
                                    <div class="place__amenities">

                                        @foreach ($submaster as $subvalue)
                                            @if ($subvalue->title === $businessesDetail->category)
                                                <i class="{{ $subvalue->value }}"></i>
                                            @endif
                                        @endforeach
                                        <span>{{ $businessesDetail->category }}</span>
                                    </div>

                                    <div class="popup-wrap" id="book-now">
                                        <div class="popup-bg popupbg-close"></div>
                                        <div class="popup-middle">
                                            <a class="popup-close" href="#" title="Close">
                                                <i class="la la-times"></i>
                                            </a><!-- .popup-close -->
                                            <h3>Amenities</h3>
                                            <div class="popup-content">
                                                <div class="hightlight-flex">
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/wf.svg') }}"
                                                            alt="Free wifi">
                                                        <span>Wifi</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/cld.svg') }}"
                                                            alt="Reservations">
                                                        <span>Reservations</span>
                                                        </img>
                                                        <div class="place__amenities">
                                                            <img src="{{ asset('assets/frontend-assets/images/icons/amenities/card.svg') }}"
                                                                alt="Credit cards">
                                                            <span>Credit cards</span>
                                                            </img>
                                                            <div class="place__amenities">
                                                                <img src="{{ asset('assets/frontend-assets/images/icons/amenities/smk.svg') }}"
                                                                    alt="Non smoking">
                                                                <span>Non smoking</span>
                                                                </img>
                                                                <div class="place__amenities">
                                                                    <img src="{{ asset('assets/frontend-assets/images/icons/amenities/air.svg') }}"
                                                                        alt="Air conditioner">
                                                                    <span>Air conditioner</span>
                                                                    </img>
                                                                    <div class="place__amenities">
                                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/car.svg') }}"
                                                                            alt="Car parking">
                                                                        <span>Car parking</span>
                                                                        </img>
                                                                        <div class="place__amenities">
                                                                            <img src="{{ asset('assets/frontend-assets/images/icons/amenities/ct.svg') }}"
                                                                                alt="Cocktails">
                                                                            <span>Cocktails</span>
                                                                            </img>
                                                                        </div><!-- .hightlight-flex -->
                                                                    </div><!-- .popup-content -->
                                                                </div><!-- .popup-middle -->
                                                            </div><!-- .popup-wrap -->
                                                        </div>
                                                    </div><!-- .place__box -->
                                                    <div class="place__box place__box-overview">
                                                        <h3>Overview</h3>
                                                        <div class="place__desc">{{ $businessesDetail->description }}
                                                        </div><!-- .place__desc -->
                                                        <a class="show-more" href="#" title="Show More">Show
                                                            more</a>
                                                    </div>
                                                    <div class="place__box place__box-map">
                                                        <h3 class="place__title--additional">
                                                            Location
                                                        </h3>
                                                        {{-- <div class="maps">
                                    <div id="map"></div>
                                </div> --}}
                                                        <div class="address">
                                                            <i class="la la-map-marker"></i>
                                                            {{ $businessesDetail->placeAddress }}
                                                            <a href="#" title="Direction">(
                                                                {{ $businessesDetail->city }})</a>
                                                        </div>
                                                    </div><!-- .place__box -->
                                                    <div class="place__box">
                                                        <h3>Contact Info</h3>
                                                        <ul class="place__contact">
                                                            <li>
                                                                <i class="la la-phone"></i>
                                                                <a href=""
                                                                    title="">{{ $businessesDetail->phoneNumber1 }},{{ $businessesDetail->phoneNumber2 }}</a>
                                                            </li>
                                                            <li>
                                                                <i class="la la-whatsapp"></i>
                                                                <a href=""
                                                                    title="">{{ $businessesDetail->whatsappNo }}</a>
                                                            </li>
                                                            <li>
                                                                <i class="la la-globe"></i>
                                                                <a href=""
                                                                    title="www.abcsite.com">{{ $businessesDetail->websiteUrl }}</a>
                                                            </li>
                                                            <li>
                                                                <i class="la la-facebook-f"></i>
                                                                <a href="fb.com/abc.html"
                                                                    title="fb.com/abc">{{ $businessesDetail->facebook }}</a>
                                                            </li>
                                                            <li>
                                                                <i class="la la-instagram"></i>
                                                                <a href="instagram.com/abc.html"
                                                                    title="instagram.com/abc">{{ $businessesDetail->instagram }}</a>
                                                            </li>
                                                            <li>
                                                                <i class="la la-twitter"></i>
                                                                <a href="instagram.com/abc.html"
                                                                    title="instagram.com/abc">{{ $businessesDetail->twitter }}</a>
                                                            </li>
                                                        </ul>
                                                    </div><!-- .place__box -->
                                                    <div class="place__box place__box-open">
                                                        <h3 class="place__title--additional">
                                                            Opening Hours
                                                        </h3>
                                                        <table class="open-table">
                                                            <tbody>
                                                                <tr>

                                                                    <td class="time">{{ $businessesDetail->duration }}
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div><!-- .place__box -->

                                                    <div class="place__box place__box--reviews">
                                                        <h3 class="place__title--reviews">Reviews</h3>
                                                        <h2>Total Rating:
                                                            <span style="color: #23d3d3ff; ">

                                                                @php
                                                                    $totalRating = 0;
                                                                    $totalReviews = count($reviews);
                                                                    foreach ($reviews as $review) {
                                                                        $totalRating += $review->rating;
                                                                    }
                                                                    if ($totalReviews > 0) {
                                                                        $averageRating = $totalRating / $totalReviews;
                                                                        echo number_format($averageRating, 1); // Display average rating with 1 decimal place
                                                                    } else {
                                                                        echo '0'; // No reviews available
                                                                    }
                                                                @endphp
                                                            </span>
                                                            Starts
                                                        </h2>
                                                        <br />

                                                        <ul class="place__comments">

                                                            @auth
                                                                <?php $user = User_Login::find(auth()->user()->id); ?>
                                                            @endauth
                                                            @foreach ($reviews as $review)
                                                                <li>
                                                                    <div class="place__author">
                                                                        <div class="place__author__avatar">
                                                                            <a href="#"
                                                                                title="{{ $review->author }}">
                                                                                @if ($review->image)
                                                                                    <img src="{{ URL::to('/uploads/' . $review->image) }}"
                                                                                        title="" alt="">
                                                                                @else
                                                                                    <img src="https://wp.getgolo.com/country-guide/wp-content/themes/golo/assets/images/default-user-image.png"
                                                                                        title="guest" alt="guest">
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                        <div class="place__author__info">
                                                                            <a href="#"
                                                                                title="{{ $review->author }}">{{ $review->author }}</a>
                                                                            <div class="place__author__star">
                                                                                @for ($i = 0; $i < $review->rating; $i++)
                                                                                    <i class="la la-star filled-star"></i>
                                                                                    <!-- Add a class for filled stars -->
                                                                                @endfor
                                                                                <span
                                                                                    style="width: {{ $review->rating * 20 }}%;">
                                                                                    @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                                                        <i class="la la-star"></i>
                                                                                    @endfor
                                                                                </span>
                                                                            </div>
                                                                            <span
                                                                                class="time">{{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y') }}</span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="place__comments__content">
                                                                        <p>{{ $review->content }}</p>
                                                                    </div>
                                                                    <a class="place__comments__reply" href="#"
                                                                        title="Reply"></a>
                                                                </li>
                                                            @endforeach
                                                            <?php
                                                                                                                        if(Auth::user()){
                                                                                                                        ?>
                                                            <form
                                                                action="{{ route('reviewStore', ['id' => $businessesDetail->id]) }}"
                                                                method="POST">

                                                                @csrf
                                                                <div class="form-group">

                                                                    <div class="star-rating"
                                                                        style="
                                            display: flex;
                                        ">
                                                                        <input id="star1" name="rating"
                                                                            type="radio" value="1" />
                                                                        <label for="star1"></label>

                                                                        <input id="star2" name="rating"
                                                                            type="radio" value="2" />
                                                                        <label for="star2"></label>

                                                                        <input id="star3" name="rating"
                                                                            type="radio" value="3" />
                                                                        <label for="star3"></label>

                                                                        <input id="star4" name="rating"
                                                                            type="radio" value="4" />
                                                                        <label for="star4"></label>

                                                                        <input id="star5" name="rating"
                                                                            type="radio" value="5" />
                                                                        <label for="star5"></label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="content">Review:</label>
                                                                    <textarea id="content" name="content" required rows="4"></textarea>
                                                                </div>
                                                                <button type="submit">Submit Review</button>
                                                            </form>
                                                            <?php
                                                                                                                    }else{
                                                                                                                    ?>

                                                            <div class="login-container">
                                                                <span class="login-message">
                                                                    <a class="btn-add-to-wishlist open-login test"
                                                                        data-business-id="" data-place-id=""
                                                                        href="#">
                                                                        <span>Please Login First </span>
                                                                    </a>
                                                                </span>

                                                            </div>

                                                            <?php }?>
                                                        </ul>
                                                    </div>
                                                    <div class="review-form">
                                                        <!-- Review form goes here -->
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="sidebar sidebar--shop sidebar--border">

                                                    <aside class="widget widget-shadow widget-reservation">
                                                        <div class="text-center">

                                                            <h3>Send me a message</h3>
                                                        </div>

                                                        @if (session('success'))
                                                            <div class="alert alert-success alert-dismissible fade show custom-alert"
                                                                role="alert">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <span
                                                                            style="color:green;text-agline:center; ">{{ session('success') }}</span>
                                                                    </div>
                                                                    <button class="close" data-dismiss="alert"
                                                                        type="button" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <form action="{{ route('LeadStore') }}" method="POST">
                                                            @csrf

                                                            <input name="business_id" type="hidden"
                                                                value="{{ $businessesDetail->id }}">
                                                            <div class="form-group">
                                                                <label for="name">Your Name</label>
                                                                <input id="name" name="name" type="text"
                                                                    placeholder="Enter your name" required>
                                                                @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="number">Your Phone Number</label>
                                                                <input id="number" name="number" type="tel"
                                                                    placeholder="Enter your phone number" required>
                                                                @error('number')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="message">Message</label>
                                                                <textarea class="form-control" id="message" name="message" required rows="4">{{ old('message') }}</textarea>
                                                            </div>

                                                            <div class="text-center">

                                                                <button type="submit">Send a Message</button>
                                                            </div>
                                                        </form>

                                                    </aside>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="similar-places">
                                    <div class="container">
                                        <h2 class="similar-places__title title">Similar places</h2>
                                        <div class="similar-places__content">
                                            <div class="row">
                                                @foreach ($Result as $value)
                                                    <div class="col-md-3">
                                                        <div class="place-item layout-02 place-hover">
                                                            <div class="place-inner">
                                                                <div class="place-thumb hover-img">
                                                                    <a class="entry-thumb"
                                                                        href="{{ URL::to('listingDetail/' . $value->id . '/' . $value->category) }}">

                                                                        <img
                                                                            src="{{ URL::to('uploads/' . $value->coverImage) }}" />

                                                                    </a>
                                                                    <?php
                                                                                                                                        if(Auth::user()){
                                                                                                                                        ?>
                                                                    <a class="golo-add-to-wishlist btn-add-to-wishlist"
                                                                        data-business-id="{{ $value->id }}"
                                                                        data-place-id="{{ $value->id }}"
                                                                        href="#">
                                                                        <span class="icon-heart">

                                                                            @if ($value->bookmark_status != null)
                                                                                <i class="la la-bookmark large"
                                                                                    style="color: #ffb429;"></i>
                                                                            @else
                                                                                <i class="la la-bookmark large"
                                                                                    style="color:black"></i>
                                                                            @endif
                                                                        </span>
                                                                    </a>
                                                                    <?php
                                                                                                                                    }else{
                                                                                                                                    ?>

                                                                    <div class="login-container">
                                                                        <span class="login-message"> <a
                                                                                class="btn-add-to-wishlist open-login test"
                                                                                data-business-id="" data-place-id=""
                                                                                href="#">
                                                                                <span class="icon-heart">

                                                                                    <i class="la la-bookmark large"
                                                                                        style="color:black"></i>

                                                                                </span>
                                                                            </a></span>

                                                                    </div>

                                                                    <?php }?>

                                                                    <a class="entry-category rosy-pink" href="#">

                                                                        @foreach ($submaster as $subvalue)
                                                                            @if ($subvalue->title === $value->category)
                                                                                <i class="{{ $subvalue->value }}"></i>
                                                                            @endif
                                                                        @endforeach

                                                                        <span>{{ $value->category }}</span>
                                                                    </a>
                                                                    <a class="author" href="#" title="Author">
                                                                        <img
                                                                            src="{{ URL::to('uploads/' . $value->logo) }}"alt="Author" />

                                                                    </a>
                                                                    <!-- <div class="feature">Featured</div> -->
                                                                </div>
                                                                <div class="entry-detail">
                                                                    <div class="entry-head">
                                                                        <div class="place-type list-item">
                                                                            <span>{{ $value->highlight }}</span>
                                                                        </div>
                                                                        <!-- <div class="place-city">
                                                                                                            <a href="#">Paris</a>
                                                                                                        </div> -->
                                                                    </div>
                                                                    <h3 class="place-title">

                                                                        <a
                                                                            href="{{ URL::to('listingDetail/' . $value->id . '/' . $value->category) }}">{{ $value->businessName }}</a>
                                                                    </h3>
                                                                    <div class="open-now">
                                                                        <i class="las la-door-open"></i>Open now
                                                                    </div>
                                                                    <div class="entry-bottom">
                                                                        <div class="place-preview">
                                                                            <div class="place-rating">

                                                                                <span>{{ $value->rating }}</span>
                                                                                <i class="la la-star"></i>
                                                                            </div>
                                                                            <span
                                                                                class="count-reviews">({{ $value->count }}
                                                                                Reviews)</span>
                                                                        </div>
                                                                        <div class="place-price">
                                                                            <span>{{ $value->price }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .similar-places -->
    </main><!-- .site-main -->
    <script>
        $(document).ready(function() {
            $('.golo-add-to-wishlist').each(function() {
                var $element = $(this);
                var businessId = $element.data('business-id');
                var isBookmarked = localStorage.getItem('bookmark_' + businessId) == 'true';

                if (!isBookmarked) {
                    $element.addClass('bookmark-added');
                }

                $element.on('click', function(e) {
                    e.preventDefault();
                    isBookmarked = !isBookmarked; // Toggle bookmark state

                    $.ajax({
                        url: '/bookmark/' + businessId,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            businessId: businessId,
                            isBookmarked: isBookmarked,
                        },
                        success: function(data) {
                            if (isBookmarked) {
                                $element.addClass('bookmark-added');
                            } else {
                                $element.removeClass('bookmark-added');
                            }

                            // Store the bookmark state in localStorage
                            localStorage.setItem('bookmark_' + businessId,
                                isBookmarked);

                            // Reload the page after the bookmark state is updated
                            window.location.reload();
                        }
                    });
                });
            });
        });
    </script>
    <script>
        // Get all star rating inputs and labels
        const starInputs = document.querySelectorAll('.star-rating input[type="radio"]');
        const starLabels = document.querySelectorAll('.star-rating label');

        // Add a click event listener to each star input
        starInputs.forEach((input, index) => {
            input.addEventListener('click', () => {
                // Remove the "filled" class from all labels
                starLabels.forEach(label => {
                    label.classList.remove('filled');
                });

                // Add the "filled" class to labels up to the selected star
                for (let i = 0; i <= index; i++) {
                    starLabels[i].classList.add('filled');
                }
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/40bf30a2ca.js" crossorigin="anonymous"></script>

@endsection
