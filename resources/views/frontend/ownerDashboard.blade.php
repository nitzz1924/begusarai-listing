@extends('frontend.layouts.master')
@section('title', 'Owner Dashboard')
@section('content')

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
    <main id="main" class="site-main">
        <div class="site-content owner-content">
            <div class="member-menu">
                <div class="container">
                    <ul>
                        <li class="active"><a href="/ownerDashboard">Dashboard</a></li>
                        <!-- <li><a href="/ownerLeads">Leads</a></li> -->
                        <li><a href="/ownerListing">My places</a></li>
                        <li><a href="/ownerWishlist">Wishlist</a></li>
                        <li><a href="/ownerProfile">Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="member-wrap">
                    <div class="member-wrap-top">
                        <h2>Welcome back!</h2>
                        {{-- <p>You are current FREE plan. <a href="pricing-plan.html">Upgrade now</a></p> --}}
                    </div><!-- .member-wrap-top -->

                    <div class="upgrade-box">
                        <span><b>Step 1.</b></span>
                        <h1>Add your business listing!</h1>
                        <span><b>Step 2.</b>
                            <h1>
                        </span>Choose a plan to submit your place!</h1>
                        <p>Pay as you go service, cancel anytime.</p>
                        <a href="/packages/0" class="btn" title="Upgrade now">Upgrade now</a>
                        <img src="{{ asset('assets/frontend-assets/images/assets/img-people.svg') }}" alt="Upgrade now">
                        <a href="#" class="close" data-close="upgrade-box"><i class="las la-times"></i></a>
                    </div><!-- .upgrade-box -->

                    <div class="member-statistical">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="item blue">
                                    <h3>Active Places</h3>
                                    <span class="number">
                                        {{ $ActivePlaces }}

                                    </span>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="item green">
                                    <h3>Total Leads</h3>
                                    <span class="number">


                                        {{ $countLead }}</span>

                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="item yellow">
                                    <h3>Total Reviews</h3>
                                    <span class="number">
                                        {{ $countReview }}
                                    </span>
                                    <span class="line"></span>
                                </div>
                            </div>



                            <div class="col-lg-3 col-6">
                                <div class="item purple">
                                    <h3>Total Views</h3>
                                    <span class="number">{{ $countView }}</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div><!-- .member-statistical -->
                    <div class="owner-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ob-item">

                                    <div class="ob-head">
                                        <h3>Recent Leads</h3>
                                        @if (count($businesses) > 0)
                                            <a href="{{ route('ownerLeads', ['id' => $businesses[0]->id]) }}"
                                                class="view-all" title="View All">View all</a>
                                        @endif
                                    </div>



                                    <div class="ob-content">
                                        <ul>
                                            @foreach ($countLeadlist as $value)
                                                <li class="pending">

                                                    <p class="date"><b>Date:</b>
                                                        {{ date('F j, Y', strtotime($value['created_at'])) }}</p>

                                                    <p class="place"><b>Name:</b>{{ $value['name'] }}</p>
                                                    <p class="status"><b>Status:</b><span
                                                            style="color:green">Approved</span></p>
                                                    <a href="#" title="More" class="more"><i
                                                            class="las la-angle-right"></i></a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ob-item">
                                    <div class="ob-head">
                                        <h3>New Reviews</h3>

                                        @if (count($businesses) > 0)
                                            <a href="{{ route('ownerListing', ['id' => $businesses[0]->id]) }}"
                                                class="view-all" title="View All">View all</a>
                                        @endif
                                    </div>
                                    <div class="ob-content">
                                        <ul class="place__comments">

                                            @foreach ($countReviewlist as $review)
                                                <li>
                                                    <div class="place__author">
                                                        <div class="place__author__avatar">
                                                            <a title="Sebastian" href="#">
                                                                @if ($review['image'])
                                                                    <img src="{{ URL::to('/uploads/' . $review['image']) }}"
                                                                        title="" alt="">
                                                                @else
                                                                    <img src="https://wp.getgolo.com/country-guide/wp-content/themes/golo/assets/images/default-user-image.png"
                                                                        title="guest" alt="guest">
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="place__author__info">
                                                            <a title="Sebastian" href="#">{{ $review['author'] }}</a>
                                                            <div class="place__author__star">
                                                                @for ($i = 0; $i < $review['rating']; $i++)
                                                                    <i class="la la-star filled-star"></i>
                                                                    <!-- Add a class for filled stars -->
                                                                @endfor
                                                                <span style="width: 72%">
                                                                    @for ($i = 0; $i < 5 - $review['rating']; $i++)
                                                                        <i class="la la-star"></i>
                                                                    @endfor
                                                                </span>
                                                            </div>
                                                            <span
                                                                class="time">{{ \Carbon\Carbon::parse($review['created_at'])->format('F j, Y') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="place__comments__content">
                                                        <p>{{ $review['content'] }}
                                                        </p>
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- .owner-box -->
                </div><!-- .member-wrap -->
            </div>
        </div><!-- .site-content -->
    </main>

@endsection
