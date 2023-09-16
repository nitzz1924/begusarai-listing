@extends('frontend.layouts.master')
@section('title', 'Listing Details')
@section('content')


    <main id="main" class="site-main single single-02">
        <div class="place">
            <div class="slick-sliders">
                <div class="slick-slider" data-item="1" data-arrows="true" data-itemscroll="1" data-dots="true"
                    data-infinite="true" data-centermode="true" data-centerpadding="418px" data-tabletitem="1"
                    data-tabletscroll="1" data-tabletpadding="70px" data-mobileitem="1" data-mobilescroll="1"
                    data-mobilepadding="30px">

                    <div class="place-slider__item bd">
                        <a title="Place Slider Image" href="#">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-01">
                        </a>
                    </div>
                    <div class="place-slider__item bd">
                        <a title="Place Slider Image" href="#">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-02">
                        </a>
                    </div>
                    <div class="place-slider__item bd">
                        <a title="Place Slider Image" href="#">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-03">
                        </a>
                    </div>
                    <div class="place-slider__item bd">
                        <a title="Place Slider Image" href="#">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-04">
                        </a>
                    </div>
                    <div class="place-slider__item bd">
                        <a title="Place Slider Image" href="#">
                            <img src="{{ URL::to('uploads/' . $businessesDetail->coverImage) }}" alt="slider-05">
                        </a>
                    </div>

                </div><!-- .page-title -->
                <div class="place-share">
                    {{-- <a title="Save" href="#" class="add-wishlist">
                        <i class="la la-bookmark large"></i>
                    </a>
                    <a title="Share" href="#" class="share">
                        <i class="la la-share-square la-24"></i>
                    </a> --}}
                    <div class="social-share">
                        <div class="list-social-icon">
                            <a class="facebook"
                                onclick="window.open('https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F','sharer', 'toolbar=0,status=0');"
                                href="javascript:void(0)"> <i class="fab fa-facebook-f"></i> </a>
                            <a class="twitter"
                                onclick="popUp=window.open('https://twitter.com/share?url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F','sharer','scrollbars=yes');popUp.focus();return false;"
                                href="javascript:void(0)"> <i class="fab fa-twitter"></i> </a>
                            <a class="linkedin"
                                onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F&amp;title=The+Louvre','sharer','scrollbars=yes');popUp.focus();return false;"
                                href="javascript:void(0)"> <i class="fab fa-linkedin-in"></i> </a>
                            <a class="pinterest"
                                onclick="popUp=window.open('../../pinterest.com/pin/create/button/index6b58.html?url=https%3A%2F%2Fwp.getgolo.com%2Fplace%2Fthe-louvre%2F&amp;description=The+Louvre&amp;media=https://wp.getgolo.com/wp-content/uploads/2019/10/ef3cc68f-2e02-41cc-aad6-4b301a655555.jpg','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;"
                                href="javascript:void(0)"> <i class="fab fa-pinterest-p"></i> </a>
                        </div>
                    </div>
                </div><!-- .place-share -->
                <div class="place-slider__nav slick-nav">
                    <div class="place-slider__prev slick-nav__prev">
                        <i class="las la-angle-left"></i>
                    </div><!-- .place-slider__prev -->
                    <div class="place-slider__next slick-nav__next">
                        <i class="las la-angle-right"></i>
                    </div><!-- .place-slider__next -->
                </div><!-- .place-slider__nav -->
            </div><!-- .place-slider -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="place__left">
                            <ul class="place__breadcrumbs breadcrumbs mt-1">
                                <li>{{ $businessesDetail->highlight }}

                            </ul><!-- .place__breadcrumbs -->
                            <div class="place__box place__box--npd">
                                <h1> {{ $businessesDetail->businessName }}</h1>
                                <div class="place__meta">
                                    <div class="place__reviews reviews">
                                        <span class="place__reviews__number reviews__number">
                                            4.2
                                            <i class="la la-star"></i>
                                        </span>
                                        <span class="place__places-item__count reviews_count">(3 reviews)</span>
                                    </div>
                                    <div class="place__currency"> {{ $businessesDetail->price }}</div>
                                    <div class="place__category">

                                        <a title=" " href="#">{{ $businessesDetail->placeType }}</a>
                                    </div>
                                </div><!-- .place__meta -->
                            </div><!-- .place__box -->
                            <div class="place__box place__box-hightlight">
                                <div class="hightlight-grid">
                                    <div class="place__amenities">


                                        @foreach ($submaster as $subvalue)
                                            @if ($subvalue->title === $businessesDetail->category)
                                                <i class="{{ $subvalue->value }}"></i>
                                            @endif
                                        @endforeach
                                        <span>{{ $businessesDetail->category }}</span>
                                    </div>



                                    <div class="popup-wrap" id="book-now">
                                        <div class="popup-bg popupbg-close"></div>
                                        <div class="popup-middle">
                                            <a title="Close" href="#" class="popup-close">
                                                <i class="la la-times"></i>
                                            </a><!-- .popup-close -->
                                            <h3>Amenities</h3>
                                            <div class="popup-content">
                                                <div class="hightlight-flex">
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/wf.svg') }}"
                                                            alt="Free wifi">
                                                        <span>Wifi</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/cld.svg') }}"
                                                            alt="Reservations">
                                                        <span>Reservations</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/card.svg') }}"
                                                            alt="Credit cards">
                                                        <span>Credit cards</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/smk.svg') }}"
                                                            alt="Non smoking">
                                                        <span>Non smoking</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/air.svg') }}"
                                                            alt="Air conditioner">
                                                        <span>Air conditioner</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/car.svg') }}"
                                                            alt="Car parking">
                                                        <span>Car parking</span>
                                                    </div>
                                                    <div class="place__amenities">
                                                        <img src="{{ asset('assets/frontend-assets/images/icons/amenities/ct.svg') }}"
                                                            alt="Cocktails">
                                                        <span>Cocktails</span>
                                                    </div>
                                                </div><!-- .hightlight-flex -->
                                            </div><!-- .popup-content -->
                                        </div><!-- .popup-middle -->
                                    </div><!-- .popup-wrap -->
                                </div>
                            </div><!-- .place__box -->
                            <div class="place__box place__box-overview">
                                <h3>Overview</h3>
                                <div class="place__desc">{{ $businessesDetail->description }}</div><!-- .place__desc -->
                                <a href="#" class="show-more" title="Show More">Show more</a>
                            </div>
                            <div class="place__box place__box-map">
                                <h3 class="place__title--additional">
                                    Location & Maps
                                </h3>
                                <div class="maps">
                                    <div id="map"></div>
                                </div>
                                <div class="address">
                                    <i class="la la-map-marker"></i>
                                    {{ $businessesDetail->placeAddress }}
                                    <a href="#" title="Direction">( {{ $businessesDetail->city }})</a>
                                </div>
                            </div><!-- .place__box -->
                            <div class="place__box">
                                <h3>Contact Info</h3>
                                <ul class="place__contact">
                                    <li>
                                        <i class="la la-phone"></i>
                                        <a title=""
                                            href="">{{ $businessesDetail->phoneNumber1 }},{{ $businessesDetail->phoneNumber2 }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-whatsapp"></i>
                                        <a title="" href="">{{ $businessesDetail->whatsappNo }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-globe"></i>
                                        <a title="www.abcsite.com" href="">{{ $businessesDetail->websiteUrl }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-facebook-f"></i>
                                        <a title="fb.com/abc"
                                            href="fb.com/abc.html">{{ $businessesDetail->facebook }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-instagram"></i>
                                        <a title="instagram.com/abc"
                                            href="instagram.com/abc.html">{{ $businessesDetail->instagram }}</a>
                                    </li>
                                    <li>
                                        <i class="la la-twitter"></i>
                                        <a title="instagram.com/abc"
                                            href="instagram.com/abc.html">{{ $businessesDetail->twitter }}</a>
                                    </li>
                                </ul>
                            </div><!-- .place__box -->
                            <div class="place__box place__box-open">
                                <h3 class="place__title--additional">
                                    Opening Hours
                                </h3>
                                <table class="open-table">
                                    <tbody>
                                        <tr>

                                            <td class="time">{{ $businessesDetail->duration }}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div><!-- .place__box -->
                            <!-- <div class="place__box">
                                     <h3>FAQ's</h3>
                                     <ul class="faqs-accordion">
                                         <li>
                                             <h4>What are the ingredients or taste profile for the signature sauce?</h4>
                                             <div class="desc">
                                                 <p>We are currently offering free shipping throughout Northern California on all
                                                     orders over $80. Peninsula to San Francisco can receive next day delivery.
                                                 </p>
                                             </div>
                                         </li>

                                     </ul>
                                      </div> -->
                            <!-- .place__box -->
                            <div class="place__box place__box--reviews">
                                <h3 class="place__title--reviews">
                                    Review
                                    <span class="place__reviews__number">
                                        4.2
                                        <i class="la la-star"></i>
                                    </span>
                                </h3>
                                <ul class="place__comments">
                                    <li>
                                        <div class="place__author">
                                            <div class="place__author__avatar">
                                                <a title="Sebastian" href="#"><img
                                                        src="{{ asset('assets/frontend-assets/images/avatars/male-4.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="place__author__info">
                                                <a title="Sebastian" href="#">Sebastian</a>
                                                <div class="place__author__star">
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <i class="la la-star"></i>
                                                    <span style="width: 72%">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                    </span>
                                                </div>
                                                <span class="time">October 1, 2019</span>
                                            </div>
                                        </div>
                                        <div class="place__comments__content">
                                            <p>Went there last Saturday for the first time to watch my favorite djs (Kungs,
                                                Sam Feldet and Watermat) and really had a great experience. The atmosphere
                                                is amazing and I am going next week.</p>
                                        </div>
                                        <a title="Reply" href="#" class="place__comments__reply">


                                        </a>

                                    </li>

                                </ul>
                                <div class="review-form">
                                    <h3>Write a review</h3>
                                    <form action="#">
                                        <div class="rate">
                                            <span>Rate This Place</span>
                                            <div class="stars">
                                                <a href="#" title="star-1">
                                                    <i class="la la-star"></i>
                                                </a>
                                                <a href="#" title="star-2">
                                                    <i class="la la-star"></i>
                                                </a>
                                                <a href="#" title="star-3">
                                                    <i class="la la-star"></i>
                                                </a>
                                                <a href="#" title="star-4">
                                                    <i class="la la-star"></i>
                                                </a>
                                                <a href="#" title="star-5">
                                                    <i class="la la-star"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="field-textarea">
                                            <img class="author-avatar"
                                                src="{{ asset('assets/frontend-assets/images/avatars/male-1.jpg') }}"
                                                alt="">
                                            <textarea name="review_text" placeholder="Write a review"></textarea>
                                        </div>
                                        <div class="field-submit">
                                            <input type="submit" class="btn" value="Submit" name="submit">
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .place__box -->
                        </div><!-- .place__left -->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar sidebar--shop sidebar--border">
                            <div class="widget-reservation-mini">
                                <h3>Send me a message</h3>
                                <a href="#" class="open-wg btn">Send</a>
                            </div>
                            <aside class="widget widget-shadow widget-reservation">
                                <h3>Send me a message</h3>

                                <form action="#" method="POST" class="form-underline">
                                    <div class="field-input">
                                        <input type="text" placeholder="Your name" value="" name="your_name">
                                    </div>
                                    <div class="field-input">
                                        <input type="email" placeholder="Your email" value="" name="your_email">
                                    </div>
                                    <div class="field-input">
                                        <input type="tel" placeholder="Your phone number" value=""
                                            name="your_phone">
                                    </div>
                                    <div class="field-input">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <input type="submit" value="Send a message">
                                </form>

                            </aside><!-- .widget-message -->
                        </div><!-- .sidebar -->
                    </div>
                </div>
            </div>
        </div><!-- .place -->
        <div class="similar-places">
            <div class="container">
                <h2 class="similar-places__title title">Similar places</h2>
                <div class="similar-places__content">
                    <div class="row">

                        @foreach ($similer as $value)
                            <div class="col-lg-3 col-md-6">
                                <div class="place-item layout-02 place-hover">
                                    <div class="place-inner">
                                        <div class="place-thumb">
                                            <a class="entry-thumb" href=""><img
                                                    src="{{ URL::to('uploads/' . $value->coverImage) }}"
                                                    alt=""></a>
                                            <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist "
                                                data-place-id="185">
                                                <span class="icon-heart">
                                                    <i class="la la-bookmark large"></i>
                                                </span>
                                            </a>
                                            <a class="entry-category purple" href="#">
                                                @foreach ($submaster as $subvalue)
                                                    @if ($subvalue->title === $value->category)
                                                        <i class="{{ $subvalue->value }}"></i>
                                                    @endif
                                                @endforeach

                                                </i><span>{{ $value->category }}</span>
                                            </a>
                                            <a href="#" class="author" title="Author"><img
                                                    src="{{ URL::to('uploads/' . $value->logo) }}" alt="Author"></a>
                                        </div>
                                        <div class="entry-detail">
                                            <div class="entry-head">
                                                <div class="place-type list-item">
                                                    <span>{{ $value->highlight }}</span>
                                                </div>
                                                {{-- <div class="place-city">
                                                    <a href="#">Lyon</a>
                                                </div> --}}
                                            </div>
                                            <h3 class="place-title">
                                                <a
                                                    href="{{ URL::to('listingDetail/' . $value->id) }}">{{ $value->businessName }}</a>
                                            </h3>
                                            <div class="open-now"><i class="las la-door-open"></i>Open now</div>
                                            <div class="entry-bottom">
                                                <div class="place-preview">
                                                    <div class="place-rating">
                                                        <span>5.0</span>
                                                        <i class="la la-star"></i>
                                                    </div>
                                                    <span class="count-reviews">(2 Reviews)</span>
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
    </main><!-- .site-main -->


@endsection
