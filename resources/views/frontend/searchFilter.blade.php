@extends('frontend.layouts.master')
@section('title', 'Search Filter')
@section('content')


    <main id="main" class="site-main">
        <div class="archive-city">
            <div class="col-left">

                <div class="archive-filter">
                    <form action="{{ route('showFilterData') }}" method="POST" class="filterForm" id="filterForm">
                        @csrf
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
                            <button type="submit" class="btn">Apply</button>
                        </div>
                    </form>
                </div>

                <div class="main-primary">
                    <div class="filter-mobile justify-content-center    ">
                        <ul class="position-relative">

                            <li class=" filter-btn"><a class=" filter-btn-a " href="#filterForm" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i
                                        class="fa-solid fa-filter"></i></a>
                            </li>

                        </ul>

                    </div>

                    {{-- offcanvas filter mobile filter --}}
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel" style="max-width: 90%">
                        <div class="offcanvas-header pb-0">
                            <h2 class="offcanvas-title fs-2" id="offcanvasExampleLabel">Filter</h2>
                            <button type="button" class="btn-closee" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="">
                                <form action="{{ route('showFilterData') }}" method="POST" class="filterForm" id="filterForm">
                                    @csrf
                                    
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
                                        <button type="submit" class="btn">Apply</button>
                                    </div>
                                </form>

                            </div><!-- .archive-fillter -->

                        </div>
                    </div>
                    {{-- offcanvas filter mobile filter end --}}

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
                                                                $highlights = array_slice($highlights, 0, 4); // Get the first two elements of the array
                                                            @endphp
                                                            @foreach ($highlights as $highlight)
                                                                <span style="font-size:13px;">{{ $highlight }},</span>
                                                            @endforeach
                                                            ...
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

            </div>
        </div>

    </main>

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
