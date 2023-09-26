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
        <div class="page-title page-title--small align-left" style="background-image: url(images/bg/bg-checkout.png);">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">Our Packages</h1>
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
                                        <img src="{{ asset('assets\images\packages\Feature-Listing.png') }}"
                                            class="rounded-3 shadow" alt="Featured Listing">
                                        <h3>{{ $package->type }}</h3>
                                        <div class="price-container">
                                            <div class="price">
                                                <span class="currency">₹</span>{{ $package->price }}
                                            </div>
                                            <div class="strike">₹{{ $package->off }}</div>
                                        </div>
                                        @if ($businessId == 0)
                                            <a href="/ownerListing" class="btn" title="Get Started"
                                               >Get Started</a>
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

                <!-- <div class="container">
                    <h2 class="title align-center">Rank on Selected Category</h2>
                    <div class="pricing-inner">
                        <div class="row">

                            @foreach ($ranking as $value)
                                <div class="col-lg-4">
                                    <div class="pricing-item">
                                        {{-- <img src="{{ asset('assets\images\packages\Category-Listing.png') }}"
                                        class="rounded-3 shadow" alt="category ranking"> --}}
                                        <h3>{{ $value->title }}</h3>
                                        <p>{{ $value->featuredListings }} For Rank </p>

                                        <div class="price"><span class="currency">₹</span>{{ $value->price }}<span
                                                class="time">{{ $package->durationMY == 0 ? 'Monthly' : 'Yearly' }}</span>
                                        </div>
                                        <a href="/checkoutPage" class="btn" title="Get Started">Get Started</a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="payment-method">

                        <p>Our business listing packages help small and medium businesses get seen online and attract more
                            customers. With customizable profiles, linking to social media accounts, customer reviews and
                            online bookings, you can choose the package that best fits your budget and needs. Our support
                            team is available to help with any issues. Get the boost your business needs with our packages
                            today. </p>
                    </div>
                </div> -->


            </div>

        </div>

    </main>


@endsection
