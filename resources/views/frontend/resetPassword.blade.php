@extends('frontend.layouts.master')
@section('title', 'Reset Password')
@section('content')

    <div class="container">
        <div class="member-wrap d-grid justify-content-center">
            <div class="member-wrap-top mt-5">
                <h2>Reset Your Password</h2>
            </div>
            <!-- .member-wrap-top -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="alert alert-success">
                @if (session('success'))
                    <div style="color:green">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <form action="{{ route('resetPassword') }}" method="POST" class="member-profile form-underline"
                id='submitResetPassword'>
                @csrf

                <div class="field-inline align-items-center">
                    <div class="field-input-number">
                        <label for="phone_number">Enter Your Phone Number</label>
                        <input type="tel" name="phone_number" placeholder="Please enter a 10-digit phone number"
                            id="phone_number" pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                    </div>

                    <div>
                        <button type="submit" name="submit-otp" value="Send OTP" class="OTP-btn1 btn" style="width: 100px;"
                            id="sendOTPButton2">Send OTP</button>
                    </div>
                </div>

                <div class="field-input">
                    <input type="tel" id="RverificationCode" placeholder="OTP" value="" name="RverificationCode"
                        pattern="[0-9]{6}" maxlength="6" minlength="6" required />
                    <input type="hidden" id="RgeneratedOTP" placeholder="OTP" value="" name="RgeneratedOTP" />
                </div>

                <div class="field-input">
                    <label for="new_password">New password</label>
                    <input type="password" name="new_password" placeholder="Enter new password" id="new_password" required
                        autocomplete="new-password">
                </div>

                <div class="field-input">
                    <label for="new_password_confirmation">Re-enter new password</label>
                    <input type="password" name="new_password_confirmation" placeholder="Re-enter new password" required
                        id="new_password_confirmation" autocomplete="new-password">
                </div>

                <div class="field-submit">
                    <input type="submit" value="Reset password">
                </div>
            </form>

        </div><!-- .member-wrap -->

        <script>
            $(document).ready(function() {
                $('#submitResetPassword').on('submit', function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.success) {
                                window.location.href = response.redirect;
                            } else {
                                $('#error-message').text(response.message);
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#sendOTPButton2').on('click', function(event) {
                    event.preventDefault();
                    var bnymber = document.getElementById("phone_number").value;

                    // Generate a random 6-digit OTP
                    var randomOTP = Math.floor(100000 + Math.random() * 900000);
                    const url = 'https://hisocial.in/api/send';

                    // Data to send in the request body
                    const data = {
                        type: 'text',
                        message: 'Dear customer, use this One Time Password ' +
                            randomOTP +
                            ' to reset your password. This OTP will be valid for the next 5 mins.',
                        instance_id: '651EB1464D20F',
                        access_token: '651e6533248d5',
                        number: '91' + bnymber,

                    };

                    // Create and configure the request
                    const requestOptions = {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams(data)
                    };

                    // Make the POST request
                    fetch(url, requestOptions)
                        .then(response => response.json())
                        .then(data => {
                            // Handle the response if needed
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });

                    // Set the generated OTP in the input field
                    $('#RgeneratedOTP').val(randomOTP);
                    // Enable the input field

                    $('#RverificationCode').removeAttr('readonly');
                });
            });
        </script>

    @endsection
