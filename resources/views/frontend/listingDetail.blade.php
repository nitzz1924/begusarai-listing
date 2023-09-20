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


    <main id="main" class="site-main single single-02">
        <div class="place">
            <div class="slick-sliders">
                <div class="slick-slider" data-item="1" data-arrows="true" data-itemscroll="1" data-dots="true"
                    data-infinite="true" data-centermode="true" data-centerpadding="418px" data-tabletitem="1"
                    data-tabletscroll="1" data-tabletpadding="70px" data-mobileitem="1" data-mobilescroll="1"
                    data-mobilepadding="30px">

                    <div class="place-slider__item bd">
                        <a title="Place Slider Image" href="#">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-01">
                        </a>
                    </div>
                    <div class="place-slider__item bd">
                        <a title="Place Slider Image" href="#">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-01">
                        </a>
                    </div>


                </div><!-- .page-title -->
                <div class="place-share">
                    {{-- <a title="Save" href="#" class="add-wishlist">
                        <i class="la la-bookmark large"></i>
                    </a>
                    <a title="Share" href="#" class="share">
                        <i class="la la-share-square la-24"></i>
                    </a> --}}
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

                                        <a title=" " href="#">{{ $businessesDetail->placeType }}</a>
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
                                            <a title="Close" href="#" class="popup-close">
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
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/card.svg') }}"
                                                            alt="Credit cards">
                                                        <span>Credit cards</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/smk.svg') }}"
                                                            alt="Non smoking">
                                                        <span>Non smoking</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/air.svg') }}"
                                                            alt="Air conditioner">
                                                        <span>Air conditioner</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/car.svg') }}"
                                                            alt="Car parking">
                                                        <span>Car parking</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/ct.svg') }}"
                                                            alt="Cocktails">
                                                        <span>Cocktails</span>
                                                    </div>
                                                </div><!-- .hightlight-flex -->
                                            </div><!-- .popup-content -->
                                        </div><!-- .popup-middle -->
                                    </div><!-- .popup-wrap -->
                                </div>
                            </div><!-- .place__box -->
                            <div class="place__box place__box-overview">
                                <h3>Overview</h3>
                                <div class="place__desc">{{ $businessesDetail->description }}</div><!-- .place__desc -->
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
                                    {{ $businessesDetail->placeAddress }}
                                    <a href="#" title="Direction">( {{ $businessesDetail->city }})</a>
                                </div>
                            </div><!-- .place__box -->
                            <div class="place__box">
                                <h3>Contact Info</h3>
                                <ul class="place__contact">
                                    <li>
                                        <i class="la la-phone"></i>
                                        <a title=""
                                            href="">{{ $businessesDetail->phoneNumber1 }},{{ $businessesDetail->phoneNumber2 }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-whatsapp"></i>
                                        <a title="" href="">{{ $businessesDetail->whatsappNo }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-globe"></i>
                                        <a title="www.abcsite.com" href="">{{ $businessesDetail->websiteUrl }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-facebook-f"></i>
                                        <a title="fb.com/abc"
                                            href="fb.com/abc.html">{{ $businessesDetail->facebook }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-instagram"></i>
                                        <a title="instagram.com/abc"
                                            href="instagram.com/abc.html">{{ $businessesDetail->instagram }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-twitter"></i>
                                        <a title="instagram.com/abc"
                                            href="instagram.com/abc.html">{{ $businessesDetail->twitter }}</a>
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

                                            <td class="time">{{ $businessesDetail->duration }}</td>
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
                                        <button type="submit">Submit Review</button>
                                    </form>
                                    <?php 
                                            }else{
                                            ?>

                                    <div class="login-container">
                                        <span class="login-message"> 
                                            <a href="#"
                                                class=" btn-add-to-wishlist open-login test" data-place-id=""
                                                data-business-id="">
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
                                        <input type="tel" id="number" name="number"
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

                        @foreach ($similer as $value)
                            <div class="col-lg-3 col-md-6">
                                <div class="place-item layout-02 place-hover">
                                    <div class="place-inner">
                                        <div class="place-thumb">
                                            <a class="entry-thumb" href=""><img
                                                    src="{{ URL::to('uploads/' . $value->coverImage) }}"
                                                    alt=""></a>
                                            <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist "
                                                data-place-id="185">
                                                <span class="icon-heart">
                                                    <i class="la la-bookmark large"></i>
                                                </span>
                                            </a>


                                            
                                            <a class="entry-category purple" href="#">
                                                @foreach ($submaster as $subvalue)
                                                    @if ($subvalue->title === $value->category)
                                                        <i class="{{ $subvalue->value }}"></i>
                                                    @endif
                                                @endforeach

                                                </i><span>{{ $value->category }}</span>
                                            </a>
                                            <a href="#" class="author" title="Author"><img
                                                    src="{{ URL::to('uploads/' . $value->logo) }}" alt="Author"></a>
                                        </div>
                                        <div class="entry-detail">
                                            <div class="entry-head">
                                                <div class="place-type list-item">
                                                    <span>{{ $value->highlight }}</span>
                                                </div>
                                                {{-- <div class="place-city">
                                                    <a href="#">Lyon</a>
                                                </div> --}}
                                            </div>
                                            <h3 class="place-title">
                                                <a
                                                    href="{{ URL::to('listingDetail/' . $value->id) }}">{{ $value->businessName }}</a>
                                            </h3>
                                            <div class="open-now"><i class="las la-door-open"></i>Open now</div>
                                            <div class="entry-bottom">
                                                <div class="place-preview">
                                                    <div class="place-rating">
                                                        <span>5.0</span>
                                                        <i class="la la-star"></i>
                                                    </div>
                                                    <span class="count-reviews">(2 Reviews)</span>
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
