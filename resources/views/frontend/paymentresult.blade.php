@extends('frontend.layouts.master')
@section('title', 'Check Out')
@section('content')

<main id="main" class="site-main">
    <div class="page-title page-title--small align-left"
        style="background-image: url(images/bg/bg-checkout.png);">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name">Payment Successfully</h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-6 mb-5">
            @if ($data['status'] == 'success')
            <div class="card text-center custom-success-card">
                <div class="card-header">
                    Payment Success
                </div>
                <div class="card-body">
                    <h5 class="card-title">Great</h5>
                    <p class="card-text">Congratulations! Your plan is now active. If you have any further questions or need
                        assistance with anything else, feel free to ask.</p>
                    <a href="/ownerListing" class="btn btn-primary">Continue</a>
                </div>
            </div>
            @else
            <div class="card text-center custom-failure-card">
                <div class="card-header">
                    Payment Failed
                </div>
                <div class="card-body">
                    <h5 class="card-title">Oops...</h5>
                    <p class="card-text">Your payment transfer was unsuccessful. Please retry this.</p>
                    <a href="/ownerListing" class="btn btn-primary">Continue</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</main><!-- .site-main -->

@endsection

@section('styles')
<style>
    .custom-success-card {
        background-color: #4CAF50;
        color: white;
    }

    .custom-failure-card {
        background-color: #F44336;
        color: white;
    }

    .custom-success-card .btn-primary,
    .custom-failure-card .btn-primary {
        background-color: #007BFF;
        border-color: #007BFF;
    }

    .custom-success-card .btn-primary:hover,
    .custom-failure-card .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
@endsection
