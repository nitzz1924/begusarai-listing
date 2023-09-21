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
                    <div class="container pt-5 d-grid align-content-center">
                        <div class="site-banner__content">
                            <h1 class="site-banner__title">Business Listing</h1>
                            <p>
                                <i>20</i> cities, <i>10</i> categories, <i>5662</i> listings.
                            </p>
                            <form action="#" class="site-banner__search layout-02">
                                @csrf
                                <div class="field-input">
                                    <label for="s">Find</label>
                                    <input class="site-banner__search__input open-suggestion" id="s" type="text"
                                        name="s" placeholder="Ex: fastfood, beer" autocomplete="off" />
                                    <div class="search-suggestions name-suggestions">
                                        <ul>
                                            @foreach ($submaster as $value)
                                                <li>
                                                    <a href="{{ route('searchFilter', ['category' => $value->title, 'city' => 'all', 'highlight' => 'all']) }}"
                                                        data-category="{{ $value->title }}">
                                                        <i class="{{ $value->value }}"></i>
                                                        <span>{{ $value->title }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
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
                                            @foreach ($Mastercity as $value)
                                                <li>
                                                    <a href="{{ route('searchFilter', ['category' => 'all', 'city' => $value->title, 'highlight' => 'all']) }}"
                                                        data-city="{{ $value->title }}">
                                                        <span>{{ $value->title }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
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

                                        <a href="{{ route('searchFilter', ['category' => $value->title, 'city' => 'all', 'highlight' => 'all']) }}">

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

                                @foreach ($Result as $value)
                                    <div class="place-item layout-02 place-hover">
                                        <div class="place-inner">
                                            <div class="place-thumb hover-img">
                                                <a class="entry-thumb"
                                                    href="{{ URL::to('listingDetail/' . $value->id . '/' . $value->category) }}">
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

                                                
                                                <a class="entry-category rosy-pink" href="{{ route('searchFilter', ['category' => $value->category, 'city' => 'all', 'highlight' => 'all']) }}">

                                                    @foreach ($submaster as $subvalue)
                                                        @if ($subvalue->title === $value->category)
                                                            <i class="{{ $subvalue->value }}"></i>
                                                        @endif
                                                    @endforeach 

                                                    <span>{{ $value->category }}</span>
                                                </a>
                                                
                                                <a href="#" class="author" title="Author">
                                                        <img src="{{ URL::to('uploads/' . $value->logo) }}"alt="Author" />
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
                                                        <span class="count-reviews">({{ $value->count }} Reviews)</span>
                                                    </div>
                                                    <div class="place-price">
                                                        <span>{{ $value->price }}</span>
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
                                                <a
                                                    href="{{ route('searchFilter', ['category' => 'all', 'city' => $value->title, 'highlight' => 'all']) }}">
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
                                                    href="{{ URL::to('blogDetails/' . $value->id) }}"><img
                                                        src="{{ URL::to('/uploads/' . $value->image) }}"
                                                        alt="The 8 Most Affordable Michelin Restaurants in Paris" /></a>




                                            </div>
                                            <div class="post__info">
                                                <ul class="post__category">
                                                    <li>{{ $value->type }}</li>
                                                </ul>
                                                <h3 class="post__title">
                                                    <a title="The 8 Most Affordable Michelin Restaurants in Paris"
                                                        href="{{ URL::to('blogDetails/' . $value->id) }}">{{ $value->title }}</a>
                                                </h3>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                            <div class="align-center button-wrap">
                                <a href="/blogs" class="btn btn-border">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .blogs -->
            </main>
            <!-- .site-main -->

    </body>

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
    {{-- -------------------------------------------------1 Search Filter --}}
    <script>
        // JavaScript to handle dynamic filtering based on user input and click events
        const input = document.getElementById('s');
        const listItems = document.querySelectorAll('.search-suggestions.name-suggestions li');

        input.addEventListener('input', () => {
            const searchTerm = input.value.toLowerCase();

            listItems.forEach((li) => {
                const category = li.querySelector('a').getAttribute('data-category').toLowerCase();
                if (category.includes(searchTerm)) {
                    li.style.display = 'block';
                } else {
                    li.style.display = 'none';
                }
            });
        });

        listItems.forEach((li) => {
            li.addEventListener('click', () => {
                const link = li.querySelector('a');
                if (link) {
                    window.location.href = link.getAttribute('href');
                }
            });
        });
    </script>
    {{-- -------------------------------------------------2 Search Filter --}}

    <script>
        // JavaScript to handle dynamic filtering based on user input and click events for the "Where" input field
        const locaInput = document.getElementById('loca');
        const locationItems = document.querySelectorAll('.search-suggestions.location-suggestions li');

        locaInput.addEventListener('input', () => {
            const searchLocation = locaInput.value.toLowerCase();

            locationItems.forEach((li) => {
                const city = li.querySelector('a').getAttribute('data-city').toLowerCase();
                if (city.includes(searchLocation)) {
                    li.style.display = 'block';
                } else {
                    li.style.display = 'none';
                }
            });
        });

        locationItems.forEach((li) => {
            li.addEventListener('click', () => {
                const locationLink = li.querySelector('a');
                if (locationLink) {
                    window.location.href = locationLink.getAttribute('href');
                }
            });
        });
    </script>
@endsection
