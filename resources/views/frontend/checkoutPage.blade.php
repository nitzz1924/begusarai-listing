@extends('frontend.layouts.master')
@section('title', 'Check Out')
@section('content')

    <main id="main" class="site-main">

        <div class="page-title page-title--small align-left"
            style="background-image: url({{ asset('assets/images/bg-checkout.png') }});">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">Payment</h1>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="site-content">
            <div class="checkout-area">
                <div class="container">
                    <p class="success-message"></p>
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> {{ $message }}
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-info alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> {{ $message }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="billing-form">
                                <h2>Billing Detail</h2>
                                <div class="field-group">
                                    <h3>Your info</h3>
                                    <input type="hidden" value="{{ $orderId }}" name="orderId" id="orderId" />

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="first_name">Full name <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter your first name"
                                                    value="{{ $userData->name }}" name="first_name" id="first_name">
                                                <input type="hidden" value="{{ $userData->id }}" required name="userId"
                                                    id="userId">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="phone">Phone <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter your phone number"
                                                    value="{{ $userData->mobileNumber }}" required name="phone"
                                                    id="phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="businessName">Business name<span
                                                        class="required">*</span></label>
                                                <input type="text" placeholder="Enter your first name"
                                                    value="{{ $businessData->businessName }}" required name="businessName"
                                                    id="businessName">
                                                <input type="hidden" value="{{ $businessData->id }}" name="businessId"
                                                    id="businessId">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="phone">Business Phone <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter your phone number"
                                                    value="{{ $businessData->phoneNumber1 }}" required name="bussinessphone"
                                                    id="bussinessphone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="first_name">Plan Name<span class="required">*</span></label>
                                                <input type="text" value="{{ $planData->title }}" required
                                                    name="planName" id="planName">
                                                <input type="hidden" value="{{ $planData->id }}" name="planId"
                                                    id="planId">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="phone">Pay Amount<span class="required">*</span></label>
                                                <input type="text" value="{{ $planData->price }}" required
                                                    name="amount" id="amount">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="field-input">
                                                <label for="gst">GST (18%)</label>
                                                <span id="gstAmount"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" value="{{ $planidv }}" name="planId" id="planId">
                                </div>
                                <div class="field-group">
                                    <div class="field-check">
                                        <label for="pp">
                                            <input type="checkbox" id="pp" value="" required>
                                            I have read and accept the <a title="Privacy Policy"
                                                href="/privacyPolicy">Privacy Policy</a>
                                            <span class="checkmark">
                                                <i class="la la-check"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                            </div><!-- .checkout-form -->
                            <button id="rzp-button1" class="btn btn-success btn-lg">Pay</button>

                        </div>
                        <div class="col-lg-4">
                            <div class="pricing-item shadow">
                                <div class="best-deal">{{ $planData->title }}</div>
                                <div class="d-grid justify-content-center">
                                    <img src="{{ asset('assets\images\packages\Feature-Listing.png') }}"
                                        class="rounded-3 shadow" alt="Featured Listing">
                                </div>
                                <h3>{{ $planData->type }}</h3>
                                <div class="price-container">
                                    <div class="price">
                                        <span class="currency">₹</span>{{ $planData->price }}
                                    </div>
                                    <div class="strike">₹{{ $planData->off }}</div>
                                </div>
                                <ul>
                                    <li>{{ $planData->duration }} Expiration Date </li>
                                    <li>{{ $planData->noOfPlace }} Place Listing </li>
                                    <li>{{ $planData->featuredListings }} Featured Listings </li>
                                    <li>{{ ucwords(str_replace('_', ' ', $planData->featuredType)) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .checkout-area -->
        </div><!-- .site-content -->
    </main><!-- .site-main -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        // Wait for the document to be ready before attaching the click event
        $(document).ready(function() {
            $("#rzp-button1").click(function() {
                var userId = document.getElementById('userId').value;
                var businessId = document.getElementById('businessId').value;
                var planId = document.getElementById('planId').value;
                var amount = document.getElementById('amount').value;
                var orderId = document.getElementById('orderId').value;
                var phone = document.getElementById('phone').value;
                var fullname = document.getElementById('first_name').value;
                var total_amount = amount * 100;
                var options = {
                    "key": "{{ env('RAZOR_KEY') }}",
                    "amount": total_amount,
                    "currency": "INR",
                    "name": "Inbegusarai",
                    "description": "Business Listing",
                    "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                    "order_id": orderId,
                    "handler": function(response) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('handlePayment') }}",
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id,
                                amount: amount,
                                bId: businessId,
                                uId: userId,
                                pId: planId
                            },
                            success: function(data) {
                                var paymentStatus = 'success';
                                window.location.href =
                                    "{{ route('paymentresult') }}" + "?uId=" + userId +
                                    "&pId=" + planId + "&bId=" + businessId +
                                    "&status=" +
                                    paymentStatus;
                            }
                        });
                    },
                    "prefill": {
                        "name": fullname,
                        "contact": phone
                    },
                    "notes": {
                        "address": "test test"
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };

                var rzp1 = new Razorpay(options);
                rzp1.open();

            });
        });
    </script>
    <!-- ---------------------------------- Add 18% GST code -------------------------------- -->
    <script>
        // JavaScript to calculate and display GST amount
        $(document).ready(function() {
            // Get the initial price from the input
            var initialPrice = parseFloat($("#amount").val());

            // Calculate GST amount
            var gstAmount = initialPrice * 0.18;
            gstAmount = gstAmount.toFixed(2); // Round to two decimal places

            // Calculate total price including GST
            var totalPriceIncludingGST = initialPrice + parseFloat(gstAmount);

            // Display GST amount and total price including GST
            $("#gstAmount").text("GST: ₹" + gstAmount);
            $("#amount").val("₹" + totalPriceIncludingGST.toFixed(2));
        });
    </script>
@endsection
