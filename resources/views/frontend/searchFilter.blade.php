@extends('frontend.layouts.master')
@section('title', 'Search Filter')
@section('content')


<style>
        .bookmark-added {
            color: #ffb429;
            /* Set the desired color for the bookmark icon */
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
                                                <input type="checkbox" id="city" name=" city[]"
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
                                                <input type="checkbox" id="category" name="category[]"
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
                                            <li>
                                                <input type="checkbox" id="highlight" name="highlight[]"
                                                    value="{{ $value->title }}">

                                                {{ $value->title }}
                                        @endforeach
                                        </li>
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
                    <div class="filter-mobile">
                        <ul>
                            <li><a class="mb-filter mb-open" href="#filterForm">Filter</a></li>
                            <li><a class="mb-sort mb-open" href="#sortForm">Sort</a></li>
                        </ul>
                        <div class="mb-maps"><a class="mb-maps" href="#"><i class="las la-map-marked-alt"></i></a>
                        </div>
                    </div>
                    <div class="top-area top-area-filter">
                        <div class="filter-left">
                            <span class="result-count"><span class="count">24</span> results</span>
                            <a href="#" class="clear">Clear filter</a>
                        </div>
                        <div class="filter-center">

                        </div>
                        <div class="filter-right">
                            <div class="select-box">

                            </div>


                        </div>
                    </div>


                    <div class="similar-places">
                        <div class="container-fluid">
                            <div class="similar-places__content p-5">
                                <div class="row">

                                @foreach ($Result as $value)
                            <div class="col-md-3">
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

                                                            <i class="la la-bookmark large"></i>

                                                        </span>
                                                    </a></span>

                                            </div>

                                            <?php }?>


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
                            </div>
                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- .similar-places -->
                    <div class="pagination">
                        <div class="pagination__numbers">
                            <span>1</span>
                            <a title="2" href="#">2</a>
                            <a title="3" href="#">3</a>
                            <a title="Next" href="#">
                                <i class="la la-angle-right"></i>
                            </a>
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
@endsection
