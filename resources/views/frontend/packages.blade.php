@extends('frontend.layouts.master')
@section('title', 'Packages')
@section('content')

    <style>
        .price-container {
            display: flex;
            justify-content: center;
        }

        .price {
            font-weight: lighter;
            margin-right: 8px;
            /* Adjust spacing as needed */
        }

        .strike {
            text-decoration: line-through;
            color: gray;
            /* Adjust color as needed */
        }
    </style>
    <main id="main" class="site-main">
           
        
        <div class="page-title page-title--small align-left" style="background-image:url({{ asset('assets/images/bg-checkout.png') }});">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">Our Pricing</h1>
                </div>
            </div>
        </div><!-- .page-title -->

        <div class="site-content">
            <div class="pricing-area">

                <div class="container">
                    <h2 class="title align-center">Find the plan that’s right for you</h2>
                    <div class="pricing-inner">
                        <div class="row">
                            @foreach ($packages as $package)
                                <div class="col-lg-4">
                                    <div class="pricing-item shadow">
                                        <div class="best-deal">{{ $package->title }}</div>
                                        <div class="d-grid justify-content-center">

                                            <img src="{{ asset('assets\images\packages\Feature-Listing.png') }}"
                                            class="rounded-3 shadow" alt="Featured Listing">
                                        </div>
                                        <h3>{{ $package->title }}</h3>
                                        <div class="price-container">
                                            <div class="price">
                                                <span class="currency">₹</span>{{ $package->price }}
                                            </div>
                                            <div class="strike">₹{{ $package->off }}</div>
                                        </div>
                                        @if ($businessId == 0)
                                            @if (auth()->user() != null)
                                                <a href="/ownerListing" class="btn" title="Get Started">Get Started</a>
                                            @else
                                                <a href="#" class="btn open-login" title="Get Started">Login</a>
                                            @endif
                                        @else
                                            <a href="/checkoutPage/{{ $businessId }}/{{ $userId }}/{{ $package->id }}"
                                                class="btn" title="Get Started">Get Started</a>
                                        @endif
                                        <ul>
                                            <li>{{ $package->duration }} Expiration Date </li>
                                            <li>{{ $package->noOfPlace }} Place Listing </li>
                                            <li>{{ $package->featuredListings }} Featured Listings </li>
                                            {{-- <li>{{ $package->featuredType }}</li> --}}
                                            <li>{{ ucwords(str_replace('_', ' ', $package->featuredType)) }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div><!-- .pricing-inner -->

                </div>

             


            </div>

        </div>

    </main>


@endsection
