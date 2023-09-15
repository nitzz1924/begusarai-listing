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
                                                <label for="first_name">First name <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter your first name" value="" name="first_name" id="first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="last_name">Last name <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter your last name" value="" name="last_name" id="last_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input type="email" placeholder="Enter your email" value="" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="phone">Phone <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter your phone number" value="" name="phone" id="phone">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .field-group -->
                                <div class="field-group">
                                    <h3>Pay with</h3>
                                    <div class="field-select">
                                        <div id="select-box">
                                            <input type="checkbox" id="options-view-button" value="">
                                            <div id="select-button" class="brd">
                                                    <div id="selected-value">
                                                        <img src="#" alt=""><span>Select method</span>
                                                    </div>
                                                    <div id="chevrons">
                                                        <i class="las la-angle-down"></i>
                                                    </div>
                                            </div>
                                            <div id="options">
                                                <div class="option o-paypal">
                                                    <input class="s-c" type="radio" name="method" value="paypal">
                                                    <img src="images/assets/paypal.png" alt="">
                                                    <span class="label"><span>Paypal</span></span>
                                                    <span class="opt-val"><img src="images/assets/paypal.png" alt=""><span>Paypal</span></span>
                                                </div>
                                                <div class="option o-stripe">
                                                    <input class="s-c" type="radio" name="method" value="stripe">
                                                    <img src="images/assets/stripe.png" alt="">
                                                    <span class="label"><span>Stripe</span></span>
                                                    <span class="opt-val"><img src="images/assets/stripe.png" alt=""><span>Stripe</span></span>
                                                </div>
                                                <div class="option o-skrill">
                                                    <input class="s-c" type="radio" name="method" value="skrill">
                                                    <img src="images/assets/skrill.png" alt="">
                                                    <span class="label"><span>Skrill</span></span>
                                                    <span class="opt-val"><img src="images/assets/skrill.png" alt=""><span>Skrill</span></span>
                                                </div>
                                                <div class="option o-master">
                                                    <input class="s-c" type="radio" name="method" value="master-card">
                                                    <img src="images/assets/master-card.png" alt="">
                                                    <span class="label"><span>Master Card</span></span>
                                                    <span class="opt-val"><img src="images/assets/master-card.png" alt=""><span>Master Card</span></span>
                                                </div>
                                                <div id="option-bg"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .field-group -->
                                <div class="field-group">
                                    <h3>Paypal detail</h3>
                                    <div class="field-input">
                                        <label for="paypal_email">PayPal Email <span class="required">*</span></label>
                                        <input type="text" placeholder="Enter your PayPal Email" value="" name="paypal_email" id="paypal_email">
                                    </div>
                                </div><!-- .field-group -->
                                <div class="field-group">
                                    <div class="field-check">
                                        <label for="pp">
                                            <input type="checkbox" id="pp" value="">
                                            I have read and accept the <a title="Privacy Policy" href="#">Privacy Policy</a>
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