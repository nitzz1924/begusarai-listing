@extends('frontend.layouts.master')
@section('title', 'Search Filter')
@section('content')

    <style>
        .card {
            max-width: 30em;
            flex-direction: row;
            background-color: #696969;
            border: 0;
            box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18);
            margin: 3em auto;
        }

        .card.dark {
            color: #fff;
        }

        .card.card.bg-light-subtle .card-title {
            color: dimgrey;
        }

        .card img {
            /* max-width: 25%; */
            margin: auto;
            /* padding: 0.5em; */
            border-radius: 0.7em;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
        }

        .text-section {
            max-width: 60%;
        }

        .cta-section {
            max-width: 40%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
        }

        .cta-section .btn {
            padding: 0.3em 0.5em;
            /* color: #696969; */
        }

        .card.bg-light-subtle .cta-section .btn {
            background-color: #898989;
            border-color: #898989;
        }

        @media screen and (max-width: 475px) {
            .card {
                font-size: 0.9em;
            }
        }
    </style>

    <main id="main" class="site-main">
        <div class="archive-city">
            <div class="col-left">

                <div class="archive-filter">
                    <form action="#" class="filterForm" id="filterForm">
                        <div class="filter-head">
                            <h2>Filter</h2>
                            <a href="#" class="clear-filter"><i class="fal fa-sync"></i>Clear all</a>
                            <a href="#" class="close-filter"><i class="las la-times"></i></a>
                        </div>
                        <div class="filter-box">
                            <h3>Cities</h3>
                            <div class="filter-list">
                                <div class="filter-group">
                                    <ul>
                                        @foreach ($submaster as $value)
                                            <li>
                                                <input type="checkbox" class="mx-1 mb-2" id="city" name=" city[]"
                                                    value="{{ $value->title }}">
                                                {{ $value->title }}
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <a href="#" class="more open-more" data-close="Close" data-more="More">More</a>
                            </div>
                        </div>
                        <div class="filter-box">
                            <h3>Categories</h3>
                            <div class="filter-list">
                                <div class="filter-group">
                                    <ul>
                                        @foreach ($submasterCategory as $value)
                                            <li>
                                                <input type="checkbox" class="mx-1 mb-2" id="category" name="category[]"
                                                    value=" {{ $value->title }}">
                                                {{ $value->title }}

                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <a href="#" class="more open-more" data-close="Close" data-more="More">More</a>
                            </div>
                        </div>
                        <div class="filter-box">
                            <h3>HighLights</h3>
                            <div class="filter-list">
                                <div class="filter-group">

                                    <ul>
                                        @foreach ($submasterHighlight as $value)
                                            <li class="">
                                                <input type="checkbox" class="mx-1 mb-2" id="highlight" name="highlight[]"
                                                    value="{{ $value->title }}">

                                                {{ $value->title }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <a href="#" class="more open-more" data-close="Close" data-more="More">More</a>
                            </div>
                        </div>

                        <div class="form-button align-center">
                            <a href="#" class="btn">Apply</a>
                        </div>
                    </form>
                    <form action="#" class="sortForm" id="sortForm">
                        <div class="filter-head">
                            <h2>Sort</h2>
                            <a href="#" class="clear-filter">Clear filter</a>
                            <a href="#" class="close-filter"><i class="las la-times"></i></a>
                        </div>

                        <div class="form-button align-center">
                            <a href="#" class="btn">Apply</a>
                        </div>
                    </form>
                </div><!-- .archive-fillter -->

                <div class="main-primary">
                    <div class="filter-mobile justify-content-center    ">
                        <ul class="position-relative">
                            {{-- <li><a class="mb-filter mb-open" href="#filterForm">Filter</a></li> --}}
                            {{-- <li><a class="mb-sort mb-open" href="#sortForm">Sort</a></li> --}}

                            <li class=" filter-btn"><a class=" filter-btn-a " href="#filterForm" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i
                                        class="fa-solid fa-filter"></i></a>
                            </li>

                        </ul>
                        {{-- <div class="mb-maps"><a class="mb-maps" href="#"><i class="las la-map-marked-alt"></i></a>
                        </div> --}}
                    </div>

                    {{-- offcanvas filter --}}
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel" style="max-width: 90%">
                        <div class="offcanvas-header pb-0">
                            <h2 class="offcanvas-title fs-2" id="offcanvasExampleLabel">Filter</h2>
                            <button type="button" class="btn-closee" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="">
                                <form action="#" class="filterForm" id="filterForm">
                                    {{-- <div class="filter-head">
                                        <h2>Filter</h2>
                                        <a href="#" class="clear-filter"><i class="fal fa-sync"></i>Clear all</a>
                                        <a href="#" class="close-filter"><i class="las la-times"></i></a>
                                    </div> --}}
                                    <div class="filter-box mt-0">
                                        <h3>Cities</h3>
                                        <div class="filter-list">
                                            <div class="filter-group">
                                                <ul>
                                                    @foreach ($submaster as $value)
                                                        <li>
                                                            <input type="checkbox" class="mx-1 mb-2" id="city"
                                                                name=" city[]" value="{{ $value->title }}">
                                                            {{ $value->title }}
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            <a href="#" class="more open-more" data-close="Close"
                                                data-more="More">More</a>
                                        </div>
                                    </div>
                                    <div class="filter-box">
                                        <h3>Categories</h3>
                                        <div class="filter-list">
                                            <div class="filter-group">
                                                <ul>
                                                    @foreach ($submasterCategory as $value)
                                                        <li>
                                                            <input type="checkbox" class="mx-1 mb-2" id="category"
                                                                name="category[]" value=" {{ $value->title }}">
                                                            {{ $value->title }}

                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <a href="#" class="more open-more" data-close="Close"
                                                data-more="More">More</a>
                                        </div>
                                    </div>
                                    <div class="filter-box">
                                        <h3>HighLights</h3>
                                        <div class="filter-list">
                                            <div class="filter-group">

                                                <ul>
                                                    @foreach ($submasterHighlight as $value)
                                                        <li class="">
                                                            <input type="checkbox" class="mx-1 mb-2" id="highlight"
                                                                name="highlight[]" value="{{ $value->title }}">

                                                            {{ $value->title }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <a href="#" class="more open-more" data-close="Close"
                                                data-more="More">More</a>
                                        </div>
                                    </div>

                                    <div class="form-button align-center">
                                        <a href="#" class="btn">Apply</a>
                                    </div>
                                </form>
                                {{-- <form action="#" class="sortForm" id="sortForm">
                                    <div class="filter-head">
                                        <h2>Sort</h2>
                                        <a href="#" class="clear-filter">Clear filter</a>
                                        <a href="#" class="close-filter"><i class="las la-times"></i></a>
                                    </div>

                                    <div class="form-button align-center">
                                        <a href="#" class="btn">Apply</a>
                                    </div>
                                </form> --}}
                            </div><!-- .archive-fillter -->

                        </div>
                    </div>


                    <div class="top-area top-area-filter">
                        <div class="filter-left">
                            <span class="result-count">
                                @if (count($Result) == 0)
                                    Result not found
                                @else
                                    <span class="count">{{ count($Result) }}</span> Results found
                                @endif
                            </span>

                            @foreach ($Result as $value)
                                <!-- Loop content goes here -->
                                <div class="result-item">
                                    <!-- Content for each result item goes here -->
                                </div>
                            @endforeach
                            <a href="#" class="clear">Clear filter</a>
                        </div>
                        <div class="filter-center">
                            <!-- Content for filter-center goes here -->
                            <div class="place-layout">
                                <a class="active" href="#" data-layout="layout-grid">
                                    <i class="las la-border-all icon-large"></i>
                                </a>
                                <a class="" href="#" data-layout="layout-list">
                                    <i class="las la-list icon-large"></i>
                                </a>
                            </div>
                        </div>
                        <div class="filter-right">
                            <div class="select-box">
                                <!-- Content for select-box goes here -->
                            </div>
                            {{-- <div class="show-map">
                                <span>Maps</span>
                                <a href="#" class="icon-toggle"></a>
                            </div> --}}
                            <!-- .show-map -->
                        </div>
                    </div>

                    <div class="area-places">
                        <div class="container">

                            <div class="row">

                                @foreach ($Result as $value)
                                    @if ($value->status == 1)
                                        {{-- <div class="card bg-light">
                                            <a class="card-img-top" href="{{ URL::to('listingDetail/' . $value->id . '/' . $value->category) }}">
                                                <img src="{{ URL::to('uploads/' . $value->coverImage) }}"
                                                alt="place_img">
                                            </a>
                                            <div class="card-body">
                                                <div class="text-section">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card's
                                                        content.</p>
                                                </div>
                                                <div class="cta-section">
                                                    <div>$129.00</div>
                                                    <a href="#" class="btn btn-light">Buy Now</a>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <div class="place-item layout-02 place-hover" data-maps_name="mattone_restaurant">
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
                                                                <i class="la la-bookmark large"
                                                                    style="color: #ffb429;"></i>
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
                                                                class=" btn-add-to-wishlist open-login test"
                                                                data-place-id="" data-business-id="">
                                                                <span class="icon-heart">
                                                                    <i class="la la-bookmark large"
                                                                        style="color:black"></i>
                                                                </span>
                                                            </a></span>
                                                    </div>
                                                    <?php }?>

                                                    {{-- @foreach ($submaster as $subvalue)
                                                                <a class="entry-category rosy-pink"
                                                                    href="{{ route('searchFilter', ['category' => $value->category, 'city' => 'all', 'highlight' => 'all']) }}">
                                                                    @if ($subvalue->title === $value->category)
                                                                        <i
                                                                            class="{{ $subvalue->value ?? 'fa fa-question' }}"></i>
                                                                    @endif

                                                                    <span>{{ $value->category }}</span>
                                                                </a>
                                                            @endforeach --}}

                                                    <a href="#" class="author" title="Author">
                                                        <img
                                                            src="{{ URL::to('uploads/' . $value->logo) }}"alt="Author" />
                                                    </a>
                                                    <!-- <div class="feature">Featured</div> -->
                                                </div>
                                                <div class="entry-detail">
                                                    <div class="entry-head">

                                                        <h3 class="place-title">
                                                            <a
                                                                href="{{ URL::to('listingDetail/' . $value->id . '/' . $value->category) }}">{{ $value->businessName }}</a>
                                                        </h3>


                                                        {{-- <div class="place-type  ">
                                                            <span>{{ $value->highlight }}</span>
                                                        </div> --}}
                                                        <div class="place-type  ">
                                                            @php
                                                                $highlights = explode(',', $value->highlight); // Split the string into an array using a delimiter
                                                                $highlights = array_slice($highlights, 0, 2); // Get the first two elements of the array
                                                            @endphp
                                                            @foreach ($highlights as $highlight)
                                                                <span>{{ $highlight }}</span>
                                                            @endforeach
                                                        </div>



                                                        <div class="place-city">
                                                            <a
                                                                href="{{ route('searchFilter', ['category' => 'all', 'city' => $value->city, 'highlight' => 'all']) }}">{{ $value->city }}</a>
                                                        </div>

                                                    </div>

                                                    {{-- <div class="open-now">
                                                        <i class="las la-door-open"></i>Open now
                                                    </div> --}}
                                                    <div class="place-price">
                                                        <span>{{ $value->price }}</span>
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

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- </div> --}}
                                    @endif
                                @endforeach
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div><!-- .area-places -->


                    <div class="container">
                        <div class="row">
                            <div class="pagination">
                                {{ $similer->links() }}
                            </div>
                        </div>
                    </div>
                </div>


            </div><!-- .main-primary -->
        </div><!-- .col-left -->

        </div><!-- .archive-city -->
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
        function switchLayout(layoutType) {
            $('.place-layout a').removeClass('active');
            $('.place-layout a[data-layout="' + layoutType + '"]').addClass('active');
            $('.site-main').removeClass('layout-grid layout-list').addClass(layoutType);
        }

        function updateLayoutBasedOnWindowSize() {
            if (window.innerWidth < 768) {
                // For mobile devices, set "layout-list" as active
                switchLayout('layout-list');
            } else {
                // For desktop screens, set "layout-grid" as active
                switchLayout('layout-grid');
            }
        }

        // Initial layout update
        updateLayoutBasedOnWindowSize();

        // Listen for window resize events
        $(window).on('resize', function() {
            updateLayoutBasedOnWindowSize();
        });

        // Click event handler for layout switcher
        $('.place-layout a').on('click', function(e) {
            e.preventDefault();
            var layoutType = $(this).data('layout');
            switchLayout(layoutType);
        });
    </script>

@endsection
