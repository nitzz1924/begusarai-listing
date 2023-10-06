@extends('frontend.layouts.master')
@section('title', 'Comming Soon')
@section('content')

    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <div class="cs-info">
                        <h1 class="text-center">Nice to <span class="text-info">meet</span> you!</h1>
                        <p class="py-3 text-center">We are preparing something amazing and exciting for you.</p>
                        <p class="text-center"><b>For more inquiry: </b><a href="mailto:contact@inbegusarai.com"><span class="__cf_email__" data-cfemail="email">contact@inbegusarai.com</span></a></p>
                    </div><!-- .cs-info -->
                </div>
                <div class="col-md-6">
                    <div class="cs-thumb">
                        <img src="https://img.freepik.com/free-vector/modern-coming-soon-poster-with-stay-tuned-message_1017-39310.jpg?w=740&t=st=1696587246~exp=1696587846~hmac=8130d4ab2fa90251d80ad9227f786b4a28546bd1aed5ada761d77301a320f3fc"
                            alt="Coming Soon">
                        {{-- <div class="cs-day">
                        <span>120</span>
                        <p>Days to Launch</p>
                    </div> --}}
                    </div><!-- .cs-thumb -->
                    
                </div>
            </div>
        </div>
    </main><!-- .site-main -->


@endsection
