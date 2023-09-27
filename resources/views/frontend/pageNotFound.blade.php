@extends('frontend.layouts.master')
@section('title', 'Page Not Found')
@section('content')

<main id="main" class="site-main">
    <div class="page-title page-title--small align-left" style="background-image: url(assets/images/home/hero-bg.webp); background-size: auto; background-position: bottom right;">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name">404 Error</h1>
                <p class="page-title__slogan">Sorry, we couldn't find that page.</p>
            </div>
        </div>	
    </div><!-- .page-title -->
    <div class="site-content">
        <div class="container">
            <div class="error-wrap">
                <h2>OOPS!</h2>
                <b>Sorry, we couldn't find that page.</b>
                <p>We can't find the page you're looking for. <br> Make sure you've typed in the URL correctly or try go <a href="/" title="Homepage">Homepage</a></p>
            </div>
        </div>
    </div><!-- .site-content -->
</main><!-- .site-main -->


@endsection
