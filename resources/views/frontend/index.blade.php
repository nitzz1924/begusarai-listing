@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')

<body>

    <script>
    @if(isset($successMessage))
    alert('{{ $successMessage }}');
    @endif

    @if(isset($errorMessage))
    alert('{{ $errorMessage }}');
    @endif
    </script>

    <script>
    @if(isset($successMessage))
    alert('{{ $successMessage }}');
    @endif
    </script>

    @if (session('success'))
    <div class="form-card" style="margin-top: 30px;margin-bottom: 30px;">
        <h2 class="text-success text-center">
            <i class="fas fa-check-circle fa-4x" style="font-size: 50px;">
            </i>
        </h2>
        <br>
        <div class="row justify-content-center">
            <div class="col-10 text-center">
                <h3 class="text-success">{{ session('success') }}</h3>
            </div>
        </div>
    </div>
    @endif
    <div>

        <main id="main" class="site-main home-main business-main overflow">

            <div class="site-banner bg_hero_02" style="background-image: url('assets/images/home/hero-bg.webp'); ">

                <div class="overlay overlay_2">
                </div>
                <div class="container pt-0 pb-0 d-grid align-content-center">
                    <div class="site-banner__content">
                        <h1 class="site-banner__title">Find</h1>
                        <h1 class="site-banner__subtitle mb-2" style='color:white'>Everything in Begusarai</h1>

                        <p class="desktop-view">
                            <i>{{ count($Mastercity) }}</i> cities, <i>{{ count($submaster) }}</i> categories,
                            <i>{{ $businessesCount }}</i> listings.
                        </p>
                        <form action="#" class="site-banner__search layout-02" style="border: 1.5px solid #23d3d3;">
                            @csrf
                            <div class="field-input">
                                <label for="s">Find</label>
                                <input class="site-banner__search__input open-suggestion" id="s" type="text" name="s"
                                    placeholder="Ex: Hostel, Gym, etc" autocomplete="off" />
                                <div class="search-suggestions name-suggestions">
                                    <ul>
                                        @foreach ($submaster as $value)
                                        <li>
                                            <a data-category="{{ $value->title }}">
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
                                            <a data-city="{{ $value->title }}">
                                                <span>{{ $value->title }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- .site-banner__search__input -->
                            <div class="field-submit">
                                <button disable><i class="las la-search la-24-black"></i></button>
                            </div>
                        </form>
                        <!-- .site-banner__search -->
                    </div>
                    <!-- .site-banner__content -->
                </div>

            </div>

            <!-- .site-banner -->
            {{-- popup modal box --}}
            {{-- @if (!Auth::check()) --}}

            <div class="modal fade" id="exampleModalFullscreen" tabindex="-1"
                aria-labelledby="exampleModalFullscreenLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-grid align-items-center">
                            @if ($popup && $popup->logo)
                            <div class="position-relative bg-image overlay p-0">

                                <a href="{{ $popup->value }}">
                                    <img src="{{ URL::to('uploads/' . $popup->logo) }}" alt="Promo banner"
                                        class="img-fluid rounded-3">
                                </a>

                            </div>
                            @else
                            <div class="position-relative modal-body bg-image overlay p-0">

                                @if ($popup && $popup->value)
                                <a href="{{ $popup->value }}">
                                    <iframe class="embed-responsive-item" id="iframe-content"
                                        src="https://www.youtube.com/embed/{{ $popup->value }}?autoplay=1&mute=1&controls=0"
                                        frameborder="0">
                                    </iframe>
                                </a>
                                @endif

                            </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
            {{-- @endif --}}

            {{-- Featured Slider container --}}
            <div class="slider-container">
                <div class="container">
                    {{-- <h2 class="title title-border-bottom align-center offset-item">
                                Featured
                            </h2> --}}

                    <div id="sliderAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($IndexPageVideo as $key => $video)
                            <button type="button" data-bs-target="#sliderAutoplaying" data-bs-slide-to="{{ $key }}"
                                class="{{ $key === 0 ? 'active' : '' }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($IndexPageVideo as $key => $video)
                            <div class="carousel-item carousel-item-slider{{ $key === 0 ? ' active' : '' }}"
                                data-bs-interval="4000" data-pause="hover">

                                @if ($video->content_type == 'video')
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                        src="https://www.youtube.com/embed/{{ $video->value }}?autoplay=1&mute=1&controls=0"
                                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                    </iframe>
                                </div>
                                @endif

                                @if ($video->content_type == 'image')
                                <div class="embed-responsive ">

                                    <a href="{{ $video->value }}">
                                        <img src="{{ URL::to('uploads/' . $video->logo) }}" alt="Promo banner"
                                            class="promo-img">
                                    </a>

                                </div>
                                @endif
                            </div>
                            @endforeach

                        </div>
                        <div class="carousel-indicators">
                            @foreach ($IndexPageVideo as $key => $video)
                            <button type="button" data-bs-target="#sliderAutoplaying" data-bs-slide-to="{{ $key }}"
                                class="{{ $key === 0 ? 'active' : '' }}"></button>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            {{-- Desktop categories --}}
            <div class="business-category desktop-view">
                <div class="container">
                    <h2 class="title title-border-bottom align-center offset-item">
                        Browse Businesses by Category
                    </h2>

                    <div class="slick-sliders offset-item">

                        <div class="slick-slider business-cat-slider slider-pd30" data-item="8" data-arrows="true"
                            data-itemScroll="1" data-dots="true" data-centerPadding="50" data-tabletitem="4"
                            data-tabletscroll="1" data-smallpcitem="1" data-smallpcscroll="1" data-mobileitem="4"
                            data-mobilescroll="1" data-mobilearrows="false">

                            @foreach ($submaster as $value)
                            <div class="bsn-cat-item cyan">
                                <a
                                    href="{{ route('searchFilter', ['category' => $value->title, 'city' => 'all', 'highlight' => 'all']) }}">
                                    <i class="{{ $value->value }}"></i>
                                    <span class="title"> {{ str_replace('-', ' ', $value->title) }}</span>
                                    <span class="place">{{ $categoryCount[$value->title] }}</span>
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

            {{-- Mobile categories --}}

            <div class="business-category mobile-view">
                <div class="container">
                    {{-- <h2 class="title title-border-bottom align-center offset-item">
                            Browse Businesses by Category
                        </h2> --}}

                    <div class="grid-container" id="categoryContainer">
                        @foreach ($submaster as $index => $value)
                            <div class="bsn-cat-item cyan @if ($index >= 11) hidden initially-hidden @endif">
                                <a href="{{ route('searchFilter', ['category' => $value->title, 'city' => 'all', 'highlight' => 'all']) }}">
                                    <i class="{{ $value->value }}"></i>
                                    <span class="title text-lowercase">{{ str_replace('-', ' ', $value->title) }}</span>
                                </a>
                            </div>
                        @endforeach

                        <!-- Display the "See More" button after the first 11 categories -->
                        <div class="bsn-cat-item green p-0">
                            <a href="#" class="see-more" onclick="toggleCategories()">
                                <span class="title">See More</span>
                            </a>
                        </div>
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
                        <div id="businesslisting" class="slick-slider trending-slider slider-pd30" data-item="5"
                            data-arrows="true" data-itemScroll="1" data-dots="true" data-centerPadding="30"
                            data-tabletitem="2" data-tabletscroll="1" data-smallpcscroll="1" data-smallpcitem="1"
                            data-mobileitem="1" data-mobilescroll="1" data-mobilearrows="false">

                            @foreach ($Result as $value)
                            @if ($value->status == 1)
                            <div class="place-item layout-02 place-hover">
                                <div class="place-inner">
                                    <div class="place-thumb hover-img">
                                        <?php
                                                if(Auth::user()){
                                                ?>
                                        <a class="entry-thumb"
                                            href="{{ URL::to('listingDetail/' . $value->category . '/' . Str::slug($value->businessName) . '-' . $value->id) }}">
                                            <img src="{{ URL::to('uploads/' . $value->coverImage) }}" />
                                        </a>

                                        <?php
                                                        }else{
                                                        ?>
                                        <a class="entry-thumb  open-login" href="">
                                            <img src="{{ URL::to('uploads/' . $value->coverImage) }}" />
                                        </a>
                                        <?php }?>

                                        <?php
                                                if(Auth::user()){
                                                ?>
                                        <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist"
                                            data-place-id="{{ $value->id }}" data-business-id="{{ $value->id }}">
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

                                        <a class="entry-category rosy-pink"
                                            href="{{ route('searchFilter', ['category' => $value->category, 'city' => 'all', 'highlight' => 'all']) }}">

                                            @foreach ($submaster as $subvalue)
                                            @if ($subvalue->title === $value->category)
                                            <i class="{{ $subvalue->value }}"></i>
                                            @endif
                                            @endforeach

                                            <span> {{ str_replace('-', ' ', $value->category) }}</span>

                                        </a>
                                        <!-- Add debugging statements -->

                                        <a href="#" class="author" title="Author">
                                            <img src="{{ URL::to('uploads/' . $value->logo) }}" alt="Author" />
                                        </a>
                                        <!-- <div class="feature">Featured</div> -->
                                    </div>
                                    <div class="entry-detail">
                                        <h3 class="place-title">
                                            <?php
                                                        if(Auth::user()){
                                                        ?>

                                            <a
                                                href="{{ URL::to('listingDetail/' . $value->category . '/' . Str::slug($value->businessName) . '-' . $value->id) }}">{{ $value->businessName }}</a>

                                            <?php
                                                        }else{
                                                        ?>
                                            <a href="" class="open-login ">{{ $value->businessName }}</a>
                                            <?php }?>

                                        </h3>

                                        <div class="entry-head">

                                            <div class="place-type">
                                                <span>{{ $value->additionalFields }}</span>
                                            </div>

                                            <div class="place-city">
                                                <a
                                                    href="{{ route('searchFilter', ['category' => 'all', 'city' => $value->city, 'highlight' => 'all']) }}">{{ $value->city }}</a>
                                            </div>
                                        </div>

                                        <div class='{{ $value->timestatus == 'Close Now' ? 'close-now' : 'open-now' }}'>
                                            <i class="las la-door-open"></i>{{ $value->timestatus }}
                                        </div>
                                        <div class="entry-bottom">
                                            <div class="place-preview">
                                                <div class="place-rating">

                                                    <span>{{ $value->rating }}</span>
                                                    <i class="la la-star"></i>
                                                </div>
                                                <span class="count-reviews">({{ $value->count }}
                                                    Reviews)</span>
                                            </div>
                                            <div class="place-price">
                                                <span>{{ $value->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                            data-tabletscroll="2" data-mobileitem="1" data-mobilescroll="1" data-mobilearrows="false">

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
                                        <p class="cities__number">{{ $cityCount[$value->title] }} places</p>

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
                <div class="container" style="z-index: 9;position: relative;">
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

                                <a href="/aboutUs" class="btn offset-item">Read more</a>
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
                            data-arrows="true" data-itemScroll="1" data-dots="true" data-centerPadding="30"
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
            </div><!-- .blogs -->
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
</script>

<script>
// Use JavaScript to trigger the modal on page load
window.addEventListener('DOMContentLoaded', function() {
    var myModal = new bootstrap.Modal(document.getElementById('exampleModalFullscreen'));
    myModal.show();
});
</script>

<script>
// Get the search button element
var searchButton = document.querySelector('.field-submit button');

// Add a click event listener to the search button
searchButton.addEventListener('click', function() {
    // Get the values of the "s" and "where" inputs
    var searchInputValue = document.querySelector('#s').value || "all";
    var whereInputValue = document.querySelector('#loca').value || "all";
    // Redirect to the desired URL with the values
    var redirectURL = "/searchFilter/" + searchInputValue + "/" + whereInputValue + "/all";
    window.location.href = redirectURL;
    // Prevent the default form submission
    event.preventDefault();
});
</script>
<script>
// Get the <a> element with the data-city attribute
var aElement = document.querySelector('a[data-city]');
var aElement = document.querySelector('a[data-category]');
// Add a click event listener to the <a> element
aElement.addEventListener('click', function(event) {
    // Prevent the default behavior of the <a> element
    event.preventDefault();

    // Get the data-city value
    var dataCityValue = aElement.getAttribute('data-city');

    // Set the data-city value in the "s" name text box
    var sInput = document.querySelector('#where');
    sInput.value = dataCityValue;
});
aElement.addEventListener('click', function(event) {
    // Prevent the default behavior of the <a> element
    event.preventDefault();

    // Get the data-city value
    var dataCityValue = aElement.getAttribute('data-category');

    // Set the data-city value in the "s" name text box
    var sInput = document.querySelector('#s');
    sInput.value = dataCityValue;
});
</script>


<script>
    var categoriesVisible = false; // Initialize the state variable

    function toggleCategories() {
        // Toggle visibility of initially hidden category items beyond the first 11
        var initiallyHiddenCategories = document.querySelectorAll('.bsn-cat-item.cyan.initially-hidden');
        initiallyHiddenCategories.forEach(function(category) {
            category.classList.toggle('hidden');
        });

        // Update the state variable
        categoriesVisible = !categoriesVisible;

        // Update the text of the "See More" button based on the current state
        var seeMoreButton = document.querySelector('.see-more');
        seeMoreButton.querySelector('.title').textContent = categoriesVisible ? 'See Less' : 'See More';
    }
</script>




@endsection
