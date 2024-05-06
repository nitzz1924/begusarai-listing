@extends('frontend.layouts.master')
@section('title', 'Blog Detail')
@section('content')

    <main id="main" class="site-main">
        <div class="blog-banner">
            <img src="{{ URL::to('uploads/' . $blog->image) }}">
        </div><!-- .blog-banner -->
        <div class="blog-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="blog-left">
                            <ul class="breadcrumbs">
                                <li><a title="Blog" href="/blogs">Blog</a></li>/
                                <li><a title={{ $blog->type }} href="#"> {{ $blog->type }}</a></li>
                            </ul><!-- .breadcrumbs -->
                            <div class="entry-content">
                                <h1> {{ $blog->title }}</h1>
                                {{-- 
                                    <ul class="entry-meta"> 
                                        <li>
                                            by <a title="Ben Cobb" href="#">Ben Cobb</a>
                                        </li>
                                        <li>22 July 2019</li>
                                        <li>3 comments</li> 
                                    
                                    </ul> 
                                 --}}
                                <div class="entry-meta">
                                    <p>
                                        {{ $blog->description }}
                                    </p>

                                </div>
                                <div class="entry-desc">
                                    <p>
                                        {{ $blog->post }}
                                    </p>
                                    <br>
                                    <?php $urlfile = explode('=', $blog->videourl);
                                    $urlvideo = end($urlfile); ?>
                                    <div class="my-3">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item "
                                                src="https://www.youtube.com/embed/{{ $urlvideo }}?autoplay=0&mute=1&controls=0"
                                                frameborder="0">
                                            </iframe>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <!-- .entry-desc -->

                                {{-- <div class="entry-author">
                                    <img src="https://wp.getgolo.com/country-guide/wp-content/themes/golo/assets/images/default-user-image.png"
                                        alt="Bangkok">
                                    <div class="author-info">
                                        <div class="author-title">
                                            <a title="Ben Cobb" href="#">Ben Cobb</a>
                                            <ul class="author-social">
                                                <li>
                                                    <a href="#">
                                                        <i class="la la-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="la la-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="la la-youtube"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="la la-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="author-desc">
                                            <p>I'm a beauty and travel blogger based in Paris. I have two dogs and love
                                                drinking coffee in the middle of night.</p>
                                        </div>
                                    </div>
                                </div> --}}

                            </div><!-- .entry-content -->


                        </div><!-- .place__left -->
                    </div>

                </div>
            </div>
        </div><!-- .blog-content -->
    </main><!-- .site-main -->


@endsection
