@extends('frontend.layouts.master')
@section('title', 'Check Out')
@section('content')

    <main id="main" class="site-main">
        <div class="page-title page-title--small align-left" style="background-image: url(images/bg/bg-checkout.png);">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">Payment</h1>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="site-content">
            <div class="checkout-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="billing-form">
                                <h2>Billing Detail</h2>
                                <form action="#" class="billingForm">
                                    <div class="field-group">
                                        <h3>Your info</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="field-input">
                                                    <label for="first_name">First name <span
                                                            class="required">*</span></label>
                                                    <input type="text" placeholder="Enter your first name" value=""
                                                        name="first_name" id="first_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="field-input">
                                                    <label for="last_name">Last name <span class="required">*</span></label>
                                                    <input type="text" placeholder="Enter your last name" value=""
                                                        name="last_name" id="last_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="field-input">
                                                    <label for="email">Email <span class="required">*</span></label>
                                                    <input type="email" placeholder="Enter your email" value=""
                                                        name="email" id="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="field-input">
                                                    <label for="phone">Phone <span class="required">*</span></label>
                                                    <input type="text" placeholder="Enter your phone number"
                                                        value="" name="phone" id="phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-group">
                                        <div class="field-check">
                                            <label for="pp">
                                                <input type="checkbox" id="pp" value="">
                                                I have read and accept the <a title="Privacy Policy" href="#">Privacy
                                                    Policy</a>
                                                <span class="checkmark">
                                                    <i class="la la-check"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="field-submit">
                                        <input type="submit" name="submit" value="Pay Now" class="btn">
                                    </div>
                                </form><!-- .billingForm -->
                            </div><!-- .checkout-form -->
                        </div>
                        <div class="col-lg-4">
                            <div class="package-review">
                                <h2>Selected Package</h2>
                                <div class="pricing-item">
                                    <img src="images/illustrations/plan-2.png" alt="Basic">
                                    <h3>Standard</h3>
                                    <ul>
                                        <li>100 Places Post</li>
                                        <li>Featured Places</li>
                                        <li>Edit Your Place</li>
                                        <li>Add Booking</li>
                                    </ul>
                                    <div class="total">
                                        <h4>Total</h4>
                                        <span>$5.99</span>
                                    </div>
                                    <a href="#" class="btn btn-change" title="Change Package">Change Package</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .checkout-area -->
        </div><!-- .site-content -->
    </main><!-- .site-main -->


@endsection
