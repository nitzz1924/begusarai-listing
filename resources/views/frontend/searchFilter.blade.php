@extends('frontend.layouts.master')
@section('title', 'Search Filter')
@section('content')



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
                        <ul class="">
                            <li><a class="mb-filter mb-open" href="#filterForm">Filter</a></li>
                            {{-- <li><a class="mb-sort mb-open" href="#sortForm">Sort</a></li> --}}
                        </ul>
                        {{-- <div class="mb-maps"><a class="mb-maps" href="#"><i class="las la-map-marked-alt"></i></a>
                        </div> --}}
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
                        </div>
                        <div class="filter-right">
                            <div class="select-box">
                                <!-- Content for select-box goes here -->
                            </div>
                        </div>
                    </div>



                    <div class="similar-places">
                        <div class="container-fluid">
                            <div class="similar-places__content p-5">
                                <div class="row">

                                    @foreach ($Result as $value)
                                    @if ($value->status == 1)
                                        <div class="col-md-3 mb-3">
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
                                                                    <i class="la la-bookmark large"
                                                                        style="color: #ffb429;"></i>
                                                                @else
                                                                    <i class="la la-bookmark large"
                                                                        style="color:black"></i>
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

                                                        <!-- @foreach ($submaster as $subvalue)
                                                        <a class="entry-category rosy-pink" href="{{ route('searchFilter', ['category' => $value->category, 'city' => 'all', 'highlight' => 'all']) }}">

                                                           
                                                            @if ($subvalue->title === $value->category)
                                                            <i class="{{ $subvalue->value ?? 'fa fa-question' }}"></i>
                                                                @endif
                                                         
                                                            
                                                            <span>{{ $value->category }}</span>
                                                        </a>
                                                        @endforeach -->
                                                        <a href="#" class="author" title="Author">
                                                            <img
                                                                src="{{ URL::to('uploads/' . $value->logo) }}"alt="Author" />
                                                        </a>
                                                        <!-- <div class="feature">Featured</div> -->
                                                    </div>
                                                    <div class="entry-detail">
                                                        <div class="">
                                                            <h3 class="place-title">
                                                                <a href="{{ URL::to('listingDetail/' . $value->id . '/' . $value->category) }}">{{ $value->businessName }}</a>
                                                               
                                                            </h3>
                                                            
                                                            <div class="place-type list-item">
                                                                <span>{{ $value->highlight }}</span>
                                                            </div>
                                                            
                                                            <div class="place-city">
                                                                <a  href="{{ route('searchFilter', ['category' => 'all', 'city' => $value->city, 'highlight' => 'all']) }}" >{{ $value->city }}</a>  
                                                                </div>
                                                              
                                                        </div>
                                                        
                                                        <div class="open-now">
                                                            <i class="las la-door-open"></i>Open now
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
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- .similar-places -->
 

                    <div class="container">
                        <div class="row justify-content-center " style="display: grid;">
                                <div class="col-md-12 d-flex mt-5 pagination">
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
@endsection
