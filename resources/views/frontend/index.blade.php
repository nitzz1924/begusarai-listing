@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')

    <body>
        <div>

            <main id="main" class="site-main home-main business-main overflow">

                <div class="site-banner bg_hero_02" style=" background-image: url('assets/images/home/hero-bg.webp'); ">
                    {{-- <video class="overlay-video" autoplay="" muted="" playsinline="" loop=""
                            src="{{ asset('https://getgolo.com/images/video3.mp4') }}"></video> --}}
                    <div class="overlay overlay_2">
                    </div>
                    <div class="container">
                        <div class="site-banner__content">
                            <h1 class="site-banner__title">Business Listing</h1>
                            <p>
                                <i>20</i> cities, <i>10</i> categories, <i>5662</i> listings.
                            </p>
                            <form action="#" class="site-banner__search layout-02">
                                <div class="field-input">
                                    <label for="s">Find</label>
                                    <input class="site-banner__search__input open-suggestion" id="s" type="text"
                                        name="s" placeholder="Ex: fastfood, beer" autocomplete="off" />
                                    <div class="search-suggestions name-suggestions">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="las la-utensils"></i><span>Restaurant</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="las la-spa"></i><span>Beauty</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="las la-dumbbell"></i><span>Fitness</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="las la-cocktail"></i><span>Nightlight</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i
                                                        class="las la-shopping-bag"></i><span>Shopping</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="las la-film"></i><span>Cinema</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- .site-banner__search__input -->
                                <div class="field-input">
                                    <label for="loca">Where</label>
                                    <input class="site-banner__search__input open-suggestion" id="loca" type="text"
                                        name="where" placeholder="Your city" autocomplete="off" />
                                    <div class="search-suggestions location-suggestions">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="las la-location-arrow"></i><span>Current
                                                        location</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span>San Francisco, CA</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- .site-banner__search__input -->
                                <div class="field-submit">
                                    <button><i class="las la-search la-24-black"></i></button>
                                </div>
                            </form>
                            <!-- .site-banner__search -->
                        </div>
                        <!-- .site-banner__content -->
                    </div>

                </div>

                <!-- .site-banner -->
                <div class="business-category">
                    <div class="container">
                        <h2 class="title title-border-bottom align-center offset-item">
                            Browse Businesses by Category
                        </h2>


                        <div class="slick-sliders offset-item">

                            <div class="slick-slider business-cat-slider slider-pd30" data-item="6" data-arrows="true"
                                data-itemScroll="6" data-dots="true" data-centerPadding="50" data-tabletitem="3"
                                data-tabletscroll="3" data-smallpcitem="4" data-smallpcscroll="4" data-mobileitem="2"
                                data-mobilescroll="2" data-mobilearrows="false">

                                @foreach ($submaster as $value)
                                    <div class="bsn-cat-item rosy-pink">
                                        <a href="ex-half-map-1.html">
                                            {{-- <img class="img-thumbnail img-fluid tool-img-edit"
                                                src="{{ URL::to('/uploads/' . $value->logo) }}"
                                                style="height: 50px;
                                                width: 50px;
                                                margin: 0px auto;" /> --}}
                                            <i class="{{ $value->value }}"></i>
                                            <span class="title">{{ $value->title }}</span>
                                            <span class="place">12 Places</span>
                                        </a>
                                    </div>
                                @endforeach


                            </div>
                            <div class="place-slider__nav slick-nav">
                                <div class="place-slider__prev slick-nav__prev">
                                    <i class="las la-angle-left"></i>
                                </div>
                                <!-- .place-slider__prev -->
                                <div class="place-slider__next slick-nav__next">
                                    <i class="las la-angle-right"></i>
                                </div>
                                <!-- .place-slider__next -->
                            </div>
                            <!-- .place-slider__nav -->
                        </div>
                    </div>
                </div>
                <!-- .business-category -->
                <div class="trending trending-business">
                    <div class="container">
                        <h2 class="title title-border-bottom align-center offset-item">
                            Trending Business Places
                        </h2>
                        <div class="slick-sliders offset-item">
                            <div class="slick-slider trending-slider slider-pd30" data-item="4" data-arrows="true"
                                data-itemScroll="4" data-dots="true" data-centerPadding="30" data-tabletitem="2"
                                data-tabletscroll="2" data-smallpcscroll="3" data-smallpcitem="3" data-mobileitem="1"
                                data-mobilescroll="1" data-mobilearrows="false">

                                @foreach ($businesses as $value)
                                    <div class="place-item layout-02 place-hover">
                                        <div class="place-inner">
                                            <div class="place-thumb hover-img">
                                                <a class="entry-thumb" href="{{ URL::to('listingDetail/' . $value->id) }}">

                                                    <img src="{{ URL::to('uploads/' . $value->coverImage) }}" />


                                                </a>
                                                <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist"
                                                    data-place-id="185">
                                                    <span class="icon-heart">
                                                        <i class="la la-bookmark large"></i>
                                                    </span>
                                                </a>
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
                                                <div class="feature">Featured</div>
                                            </div>
                                            <div class="entry-detail">
                                                <div class="entry-head">
                                                    <div class="place-type list-item">
                                                        <span>Restaurant</span>
                                                    </div>
                                                    <div class="place-city">
                                                        <a href="#">Paris</a>
                                                    </div>
                                                </div>
                                                <h3 class="place-title">
                                                    <a href="{{ URL::to('listingDetail/' . $value->id) }}">{{ $value->businessName }}</a>
                                                </h3>
                                                <div class="open-now">
                                                    <i class="las la-door-open"></i>Open now
                                                </div>
                                                <div class="entry-bottom">
                                                    <div class="place-preview">
                                                        <div class="place-rating">
                                                            <span>5.0</span>
                                                            <i class="la la-star"></i>
                                                        </div>
                                                        <span class="count-reviews">(2 Reviews)</span>
                                                    </div>
                                                    <div class="place-price">
                                                        <span>$$</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="place-slider__nav slick-nav">
                                <div class="place-slider__prev slick-nav__prev">
                                    <i class="las la-angle-left"></i>
                                </div>
                                <!-- .place-slider__prev -->
                                <div class="place-slider__next slick-nav__next">
                                    <i class="las la-angle-right"></i>
                                </div>
                                <!-- .place-slider__next -->
                            </div>
                            <!-- .place-slider__nav -->
                        </div>
                    </div>
                </div>
                <!-- .trending -->
                <div class="featured-cities">
                    <div class="container">
                        <h2 class="title title-border-bottom align-center offset-item">
                            Featured Cities<span>Choose the city you’ll be living in next</span>
                        </h2>
                        <div class="slick-sliders offset-item">
                            <div class="slick-slider featured-slider slider-pd30" data-item="4" data-arrows="true"
                                data-itemScroll="4" data-dots="true" data-centerPadding="30" data-tabletitem="2"
                                data-tabletscroll="2" data-mobileitem="1" data-mobilescroll="1"
                                data-mobilearrows="false">



                                @foreach ($Mastercity as $value)
                                    <div class="slick-item">
                                        <div class="cities__item hover__box">
                                            <div class="cities__thumb hover__box__thumb">
                                                <a title="London" href="city-details-1.html">
                                                    <img src="{{ URL::to('uploads/' . $value->logo) }}" alt="London" />

                                                </a>
                                            </div>
                                            <h4 class="cities__name"></h4>
                                            <div class="cities__info">
                                                <h3 class="cities__capital">{{ $value->title }}</h3>
                                                <p class="cities__number">80 places</p>
                                            </div>
                                        </div>
                                        <!-- .cities__item -->
                                    </div>
                                @endforeach



                            </div>
                            <div class="place-slider__nav slick-nav">
                                <div class="place-slider__prev slick-nav__prev">
                                    <i class="las la-angle-left"></i>
                                </div>
                                <!-- .place-slider__prev -->
                                <div class="place-slider__next slick-nav__next">
                                    <i class="las la-angle-right"></i>
                                </div>
                                <!-- .place-slider__next -->
                            </div>
                            <!-- .place-slider__nav -->
                        </div>
                    </div>
                </div>
                <!-- .featured-cities -->
                <div class="business-about" style="background-image: url(assets/images/home/hero-bg.webp)">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="business-about-info">
                                    <h2 class="offset-item">Who we are</h2>
                                    <p class="offset-item">
                                        We are a specialised platform created to assist regional companies in Begusarai
                                        increase internet presence and connect with more customers. Our website provides a
                                        practical and efficient approach to highlight your products to potential clients in
                                        the neighbourhood, regardless of your business’s industry—restaurant, boutique,
                                        service provider, etc.
                                        <br>
                                        You may include important facts like your company name, address, contact
                                        information, and a succinct description by listing your business on our site. This
                                        makes it much easier for people to find and interact with your company. Our website
                                        also gives you the option of enhancing your listing by using attractive images and
                                        videos that showcase the unique features of your goods or services
                                    </p>
                                    <a href="#" class="btn offset-item">Read more</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- .business-about -->
                <div class="testimonial">
                    <div class="container">
                        <h2 class="title title-border-bottom align-center offset-item">
                            People Talking About Us
                        </h2>
                        <div class="slick-sliders offset-item">
                            <div class="slick-slider testimonial-slider layout-02 slider-pd30" data-item="2"
                                data-arrows="true" data-itemScroll="2" data-dots="true" data-centerPadding="30"
                                data-tabletitem="1" data-tabletscroll="1" data-mobileitem="1" data-mobilescroll="1"
                                data-mobilearrows="false">

                                @foreach ($TestimonialData as $value)
                                    <div class="testimonial-item">
                                        <div class="">
                                            <p>
                                                {{ $value->message }}
                                            </p>
                                            <br>
                                            <div class="testimonial-meta">
                                                <b> {{ $value->name }}</b>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Add more testimonial items as needed -->

                            </div>

                            <div class="place-slider__nav slick-nav">
                                <div class="place-slider__prev slick-nav__prev">
                                    <i class="las la-angle-left"></i>
                                </div>
                                <!-- .place-slider__prev -->
                                <div class="place-slider__next slick-nav__next">
                                    <i class="las la-angle-right"></i>
                                </div>
                                <!-- .place-slider__next -->
                            </div>
                            <!-- .place-slider__nav -->
                        </div>
                    </div>
                </div>
                <!-- .testimonial -->
                <div class="blogs">
                    <div class="container">
                        <h2 class="title title-border-bottom align-center offset-item">
                            From Our Blog
                        </h2>
                        <div class="news__content offset-item">
                            <div class="row">

                            @foreach ($blog as $value)
                                <div class="col-md-4">
                                    <article class="post hover__box">
                                        <div class="post__thumb hover__box__thumb">
                                            <a title="The 8 Most Affordable Michelin Restaurants in Paris"
                                                href="blog-detail.html"><img
                                                    src="{{ URL::to('/uploads/' . $value->image) }}"
                                                    alt="The 8 Most Affordable Michelin Restaurants in Paris" /></a>

                                                    


                                        </div>
                                        <div class="post__info">
                                            <ul class="post__category">
                                                <li><a title="Food" href="#">{{ $value->type }}</a></li>
                                            </ul>
                                            <h3 class="post__title">
                                                <a title="The 8 Most Affordable Michelin Restaurants in Paris"
                                                    href="blog-detail.html">{{ $value->title }}</a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                            <div class="align-center button-wrap">
                                <a href="blog-fullwidth.html" class="btn btn-border">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .blogs -->
            </main>
            <!-- .site-main -->

    </body>

@endsection
