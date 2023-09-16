@extends('frontend.layouts.master')
@section('title', 'Packages')
@section('content')

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

                            <div class="col-lg-4 ">
                                <div class="pricing-item ">
                                    <img src="{{ asset('assets\images\packages\Business-Listing.png') }}"
                                        class="rounded-3 shadow" alt="Business Listing">
                                    <h3>Business Listing</h3>
                                    <div class="price"><span class="currency">₹</span>100.00<span class="time"></span></div>
                                    <a href="/checkoutPage" class="btn" title="Get Started">Get Started</a>
                                    <ul>
                                        <li>1 month Expiration Date </li>
                                        <li>1 Place Listing</li>
                                        
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="pricing-item shadow">
                                    {{-- <div class="best-deal">Best Deal</div> --}}
                                    <img src="{{ asset('assets\images\packages\Feature-Listing.png') }}"
                                        class="rounded-3 shadow" alt="Featured Listing">
                                    <h3>Featured Listing</h3>
                                    <div class="price"><span class="currency">₹</span>2,000<span class="time"></span></div>
                                    <a href="/checkoutPage" class="btn" title="Get Started">Get Started</a>
                                    <ul>
                                        <li>1 month Expiration Date </li>
                                        <li>1 Place Listing </li>
                                        <li>1 Featured Listings </li>
                                        <li>Featured in Search Results </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="pricing-item">
                                    <img src="{{ asset('assets\images\packages\Category-Listing.png') }}"
                                        class="rounded-3 shadow" alt="category ranking">
                                    <h3>Rank wise category</h3>
                                    <div class="price"><span class="currency">₹</span>1,000<span class="time"></span></div>
                                    <a href="/checkoutPage" class="btn" title="Get Started">Get Started</a>
                                    <ul>
                                        <li>1 month Expiration Date</li>
                                        <li>0 Place Listing </li>
                                        
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div><!-- .pricing-inner -->
                    
                </div>

                <div class="container">
                    <h2 class="title align-center">Rank on Selected Category</h2>
                    <div class="pricing-inner">
                        <div class="row">

                            <div class="col-lg-4 ">
                                <div class="pricing-item ">
                                    {{-- <img src="{{ asset('assets\images\packages\Business-Listing.png') }}"
                                        class="rounded-3 shadow" alt="Business Listing"> --}}
                                    <h3>Category</h3>
                                    <p>For Rank 1 </p>
                                    <div class="price"><span class="currency">₹</span>1,000<span class="time">Monthly</span></div>
                                    <a href="/checkoutPage" class="btn" title="Get Started">Get Started</a>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="pricing-item shadow">
                                    {{-- <div class="best-deal">Best Deal</div> --}}
                                    {{-- <img src="{{ asset('assets\images\packages\Feature-Listing.png') }}"
                                        class="rounded-3 shadow" alt="Featured Listing"> --}}
                                    <h3>Category</h3>
                                    <p>For Rank 2 </p>

                                    <div class="price"><span class="currency">₹</span>500<span class="time">Monthly</span></div>
                                    <a href="/checkoutPage" class="btn" title="Get Started">Get Started</a>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="pricing-item">
                                    {{-- <img src="{{ asset('assets\images\packages\Category-Listing.png') }}"
                                        class="rounded-3 shadow" alt="category ranking"> --}}
                                    <h3>Category</h3>
                                    <p>For Rank 3 </p>

                                    <div class="price"><span class="currency">₹</span>250<span class="time">Monthly</span></div>
                                    <a href="/checkoutPage" class="btn" title="Get Started">Get Started</a>
                                    
                                </div>
                            </div>

                        </div>
                    </div><!-- .pricing-inner -->
                    <div class="payment-method">
                        
                        <p>Our business listing packages help small and medium businesses get seen online and attract more customers. With customizable profiles, linking to social media accounts, customer reviews and online bookings, you can choose the package that best fits your budget and needs. Our support team is available to help with any issues. Get the boost your business needs with our packages today. </p>
                    </div><!-- .payment-method -->
                </div>


            </div><!-- .pricing-area -->

        </div><!-- .site-content -->

    </main><!-- .site-main -->


@endsection
