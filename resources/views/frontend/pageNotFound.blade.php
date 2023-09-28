@extends('frontend.layouts.master')
@section('title', 'Page Not Found')
@section('content')

<main id="main" class="site-main">
    <div class="page-title page-title--small align-left" style="background-image: url(assets/images/home/hero-bg.webp); background-size: auto; background-position: bottom right;">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name"><span style="color: #ffa3a3;">404</span> Error</h1>
                <p class="page-title__slogan">Sorry, we couldn't find that page.</p>
            </div>
        </div>	
    </div><!-- .page-title -->
    <div class="site-content">
        <div class="container">
            <div class="error-wrap">
            <h1 class="error-title">Oops!</h1>
                <b>Sorry, we couldn't find that page.</b>
                <p>We can't find the page you're looking for. <br> Make sure you've typed in the URL correctly or try go <a href="/" title="Homepage">Homepage</a></p>
            </div>
        </div>
    </div><!-- .site-content -->
</main><!-- .site-main -->
<style>
    /* Update fonts */
    .error-title, .error-subtitle, .error-message, .error-description {
        font-family: 'Your Font Family', sans-serif;
    }

    /* Update background and text colors */
    .error-section {
        background-color: #f0f0f0; /* Softer background color */
        padding: 60px 0;
    }

    .error-title {
        font-size: 6rem;
        color: #f44336; /* Keep error title color */
        margin-bottom: 10px;
    }

    .error-subtitle {
        font-size: 3rem;
        color: #333; /* Darken subtitle color */
        margin-bottom: 20px;
    }

    .error-message {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 20px;
    }

    .error-description {
        font-size: 1rem;
        color: #666; /* Slightly darken description text */
        margin-bottom: 30px;
    }

    /* Update button design */
    .btn-back-home {
        font-size: 1.2rem;
        padding: 15px 40px; /* Increase padding for a larger button */
        background-color: #007bff;
        color: #fff;
        border: 2px solid #007bff; /* Add a border */
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s, border-color 0.3s; /* Add transition for smoother hover effect */
    }

    .btn-back-home:hover {
        background-color: #0056b3;
        border-color: #0056b3; /* Change border color on hover */
    }
</style>

@endsection
