@extends('frontend.layouts.master')
@section('content')

    <meta property="og:title" content="{{ $businessesDetail->businessName }}" />
    <meta property="og:image" content="{{ asset('uploads/' . $businessesDetail->coverImage) }}" />
    <meta property="og:description" content="{{ $businessesDetail->description }}" />

    <!-- Set the page title and additional metadata -->
@section('title', $businessesDetail->businessName)
@section('meta_description', $businessesDetail->description)
@section('og_image', asset('uploads/' . $businessesDetail->coverImage))

<?php

use App\Models\User_Login;

?>
<style>
    .bookmark-added {
        color: #ffb429;
        /* Set the desired color for the bookmark icon */
    }
</style>

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

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
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

<main id="main" class="site-main single single-02">
    <div class="place">
        <div class="slick-sliders">
            <div class="slick-slider" data-item="1" data-arrows="true" data-itemscroll="1" data-dots="true"
                data-infinite="true" data-centermode="true" data-centerpadding="418px" data-tabletitem="1"
                data-tabletscroll="1" data-tabletpadding="70px" data-mobileitem="1" data-mobilescroll="1"
                data-mobilepadding="30px">

                @if ($businessesDetail->galleryImage)
                    @foreach (json_decode($businessesDetail->galleryImage) as $image)
                        <div class="place-slider__item bd">
                            <a title="Place Slider Image" href="#">
                                <img src="{{ URL::to('uploads/' . $image) }}" alt="slider-01">
                            </a>
                        </div>
                    @endforeach
                @endif

            </div><!-- .page-title -->
            <div class="place-share">

                <div class="social-share">
                    <div class="list-social-icon">
                        <a class="facebook"
                            onclick="window.open('https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F','sharer', 'toolbar=0,status=0');"
                            href="javascript:void(0)"> <i class="fab fa-facebook-f"></i> </a>
                        <a class="twitter"
                            onclick="popUp=window.open('https://twitter.com/share?url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F','sharer','scrollbars=yes');popUp.focus();return false;"
                            href="javascript:void(0)"> <i class="fab fa-twitter"></i> </a>
                        <a class="linkedin"
                            onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F&amp;title=The+Louvre','sharer','scrollbars=yes');popUp.focus();return false;"
                            href="javascript:void(0)"> <i class="fab fa-linkedin-in"></i> </a>
                        <a class="pinterest"
                            onclick="popUp=window.open('../../pinterest.com/pin/create/button/index6b58.html?url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F&amp;description=The+Louvre&amp;media=https://wp.getgolo.com/wp-content/uploads/2019/10/ef3cc68f-2e02-41cc-aad6-4b301a655555.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;"
                            href="javascript:void(0)"> <i class="fab fa-pinterest-p"></i> </a>
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

                                    <a title=" " href="#">{{ $businessesDetail->category }}</a>
                                </div>
                            </div><!-- .place__meta -->
                        </div>
                        <!-- .place__box -->
                        <div>
                            Total Visits: {{ $VisitCount }}
                        </div>
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

                            </div>
                        </div><!-- .place__box -->
                        <div class="place__box   place__box-overview">
                            <h3>Overview</h3>
                            <div class="place__desc">{!! $businessesDetail->description !!} <br><br>
                            @if($businessesDetail->dType && $businessesDetail->dNumber)
                            <b>{{ $businessesDetail->dType }}</b> -  {{ $businessesDetail->dNumber }} 
                            @endif
                        
                             </div>
                        
                            <a href="#" class="show-more" title="Show More">Show more</a>
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
                                <span> {{ $businessesDetail->placeAddress }} </span><br>
                                <br>
                                <span><a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($businessesDetail->placeAddress . ' ' . $businessesDetail->city) }}"
                                        target="_blank" title="Directions">({{ $businessesDetail->city }})</a></span>
                            </div>

                        </div>

                        <div class="place__box place__box-map">
                            <h3 class="place__title--additional">
                                Video
                            </h3>
                            <?php $urlfile = explode('=', $businessesDetail->video);
                            $urlvideo = end($urlfile); ?>

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item " id="iframe-content"
                                    src="https://www.youtube.com/embed/{{ $urlvideo }}?autoplay=0&mute=1&controls=0"
                                    frameborder="0">
                                </iframe>

                            </div>

                        </div>
                        <div style="display:none">
                            {{ $businessesDetail->coverImage }}
                        </div>

                        <div class="place__box">
                            <h3>Contact Info</h3>
                            <ul class="place__contact">
                                <li>
                                    <i class="la la-phone"></i>
                                    <a title=""
                                        href="tel:{{ $businessesDetail->phoneNumber1 }}">{{ $businessesDetail->phoneNumber1 }}</a>

                                    <br />
                                    <a title=""
                                        href="tel:{{ $businessesDetail->phoneNumber2 }}">{{ $businessesDetail->phoneNumber2 }}</a>

                                </li>
                                <ul>
                                    @if ($businessesDetail->whatsappNo)
                                        <li>
                                            <i class="la la-whatsapp"></i>
                                            <a title=""
                                                href="https://wa.me/{{ $businessesDetail->whatsappNo }}">{{ $businessesDetail->whatsappNo }}</a>
                                        </li>
                                    @endif

                                    @if ($businessesDetail->websiteUrl)
                                        <li>
                                            <i class="la la-globe"></i>
                                            <a title="Website" href="{{ $businessesDetail->websiteUrl }}"
                                                target="_blank">{{ $businessesDetail->websiteUrl }}</a>
                                        </li>
                                    @endif

                                    @if ($businessesDetail->facebook)
                                        <li>
                                            <i class="la la-facebook-f"></i>
                                            <a title="Facebook" href="{{ $businessesDetail->facebook }}"
                                                target="_blank">{{ $businessesDetail->facebook }}</a>

                                        </li>
                                    @endif

                                    @if ($businessesDetail->instagram)
                                        <li>
                                            <i class="la la-instagram"></i>
                                            <a title="Instagram" href="{{ $businessesDetail->instagram }}"
                                                target="_blank">{{ $businessesDetail->instagram }}</a>

                                        </li>
                                    @endif

                                    @if ($businessesDetail->twitter)
                                        <li>
                                            <i class="la la-twitter"></i>
                                            <a title="Twitter" href="{{ $businessesDetail->twitter }}"
                                                target="_blank">{{ $businessesDetail->twitter }}</a>

                                        </li>
                                    @endif
                                </ul>

                            </ul>
                        </div><!-- .place__box -->

                        <div class="place__box place__box-open">
                            <h3 class="place__title--additional">
                                Opening Hours
                            </h3>
                            <table class="open-table">
                                <tbody>
                                    @foreach ($duration as $value)
                                        <tr>
                                            <td class="day">{{ $value->day }}</td>
                                            <td class="time">
                                                {{ \Carbon\Carbon::parse($value->opening_time)->format('h:i A') }}
                                                -
                                                {{ \Carbon\Carbon::parse($value->end_time)->format('h:i A') }}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                                                <a title="{{ $review->author }}" href="#">
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
                                                <a title="{{ $review->author }}"
                                                    href="#">{{ $review->author }}</a>
                                                <div class="place__author__star">
                                                    @for ($i = 0; $i < $review->rating; $i++)
                                                        <i class="la la-star filled-star"></i>
                                                        <!-- Add a class for filled stars -->
                                                    @endfor
                                                    <span style="width: {{ $review->rating * 20 }}%;">
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
                                        <a title="Reply" href="#" class="place__comments__reply"></a>
                                    </li>
                                @endforeach
                                <?php 
                                                if(Auth::user()){
                                                ?>
                                <form method="POST"
                                    action="{{ route('reviewStore', ['id' => $businessesDetail->id]) }}">

                                    @csrf
                                    <div class="form-group">

                                        <div class="star-rating"
                                            style="
                                            display: flex;
                                        ">
                                            <input type="radio" name="rating" id="star1" value="1" />
                                            <label for="star1"></label>

                                            <input type="radio" name="rating" id="star2" value="2" />
                                            <label for="star2"></label>

                                            <input type="radio" name="rating" id="star3" value="3" />
                                            <label for="star3"></label>

                                            <input type="radio" name="rating" id="star4" value="4" />
                                            <label for="star4"></label>

                                            <input type="radio" name="rating" id="star5" value="5" />
                                            <label for="star5"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Review:</label>
                                        <textarea name="content" id="content" rows="4" required></textarea>
                                    </div>
                                    <button class="btn" type="submit">Submit Review</button>
                                </form>
                                <?php 
                                            }else{
                                            ?>

                                <div class="login-container">
                                    <span class="login-message">
                                        <a href="#" class=" btn-add-to-wishlist open-login test"
                                            data-place-id="" data-business-id="">
                                            <span>Please Login First </span>
                                        </a>
                                    </span>

                                </div>

                                <?php }?>
                            </ul>
                        </div>

                        <div class="place__box   place__box-overview">

                            <h3>Authorized Person</h3>
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 ">
                                        {{-- <div class="d-grid justify-items-center"> --}}
                                            <img src="{{ URL::to('uploads/' . $businessesDetail->logo) }}"
                                            class="img-fluid author-img rounded p-3" alt="author-img"
                                            style="object-fit: cover; height: 100%; object-position: center;" >
                                        {{-- </div> --}}
                                    </div>
                                    <div class="col-md-8 d-grid align-items-center">
                                        <div class="card-body">
                                            <h5 class="card-title fs-5">{{ $businessesDetail->ownerName }}</h5>
                                            <p class="card-text">
                                            <ul class="place__contact">
                                                <li>
                                                    <i class="la la-phone text-info"></i>
                                                    <a title=""
                                                        href="tel:{{ $businessesDetail->phoneNumber1 }}">{{ $businessesDetail->phoneNumber1 }}</a>
                                                </li>
                                                <li>
                                                    <i class="fa-regular fa-envelope text-info"></i>
                                                    <a
                                                        href="mailto:{{ $businessesDetail->email }}">{{ $businessesDetail->email }}</a>
                                                </li>
                                            </ul>
                                            </p>
                                            <div class="mt-2">
                                                
                                                <a title="call-now"  href="tel:{{ $businessesDetail->phoneNumber1 }}">
                                                    
                                                    <button class="btn"><i class="la la-phone me-1"></i>Call Now</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar sidebar--shop sidebar--border">

                        <aside class="widget widget-shadow widget-reservation ">
                            <div class="text-center">

                                <h3>Send me a message</h3>
                            </div>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show custom-alert"
                                    role="alert">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span
                                                style="color:green;text-agline:center; ">{{ session('success') }}</span>
                                        </div>
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('LeadStore') }}">
                                @csrf

                                <input type="hidden" name="business_id" value="{{ $businessesDetail->id }}">
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" id="name" name="name"
                                        placeholder="Enter your name" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="number">Your Phone Number</label>
                                    <input type="number" id="number" name="number"
                                        placeholder="Enter your phone number" required>
                                    @error('number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                                </div>

                                <div class="text-center">

                                    <button class="btn" type="submit">Send a Message</button>
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
                        @if ($value->status == 1)
                            <div class="col-md-3  mb-3">
                                <div class="place-item layout-02 place-hover">
                                    <div class="place-inner">
                                        <div class="place-thumb hover-img">
                                            <a class="entry-thumb"
                                                href="{{ URL::to('listingDetail/' . $value->category . '/' . Str::slug($value->businessName) . '-' . $value->id) }}">

                                                <img src="{{ URL::to('uploads/' . $value->coverImage) }}" />

                                            </a>
                                            <?php 
                                                if(Auth::user()){
                                                ?>
                                            <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist"
                                                data-place-id="{{ $value->id }}"
                                                data-business-id="{{ $value->id }}">
                                                <span class="icon-heart">

                                                    @if ($value->bookmark_status != null)
                                                        <i class="la la-bookmark large" style="color: #ffb429;"></i>
                                                    @else
                                                        <i class="la la-bookmark large" style="color:black"></i>
                                                    @endif
                                                </span>
                                            </a>
                                            <?php 
                                            }else{
                                            ?>

                                            <div class="login-container">
                                                <span class="login-message"> <a href="#"
                                                        class=" btn-add-to-wishlist open-login test" data-place-id=""
                                                        data-business-id="">
                                                        <span class="icon-heart">

                                                            <i class="la la-bookmark large" style="color:black"></i>

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

                                                </i><span>{{ $value->category }}</span>
                                            </a>
                                            <a href="#" class="author" title="Author">
                                                <img src="{{ URL::to('uploads/' . $value->logo) }}"alt="Author" />

                                            </a>
                                            <!-- <div class="feature">Featured</div> -->
                                        </div>
                                        <div class="entry-detail">
                                            <div class="entry-head">
                                                <div class="place-type">
                                                    <span>{{ $value->highlight }}</span>
                                                </div>

                                            </div>
                                            <h3 class="place-title">

                                                <a
                                                    href="{{ URL::to('listingDetail/' . $value->category . '/' . Str::slug($value->businessName) . '-' . $value->id) }}">{{ $value->businessName }}</a>
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
                                                    <span class="count-reviews">({{ $value->count }} Reviews)</span>
                                                </div>
                                                <div class="place-price">
                                                    <span>{{ $value->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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

@endsection
