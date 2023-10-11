@extends('frontend.layouts.master')
@section('title', 'Reset Password')
@section('content')

    <style>
        #error-message {
            color: red;
        }

        #success-message {
            color: green;
        }
    </style>
    <div class="container">
        <div class="member-wrap d-grid justify-content-center">
            <div class="card mt-4  open-login" id='message'style='display:none'>
                <div class="card-header" style='color:green'>
                    Login
                </div>
                <div class="card-body">
                    <h5 class="card-title" >Reset password successfully!</h5>
                    <p class="card-text">Make sure you've entered the right username and password.</p>
                    <a href="#" class="btn btn-primary" style="width: -webkit-fill-available;">Login</a>
                </div>
            </div>
            <div id="form-result">

                <div class="member-wrap-top mt-5">
                    <h2>Reset Your Password</h2>
                </div>
                <!-- .member-wrap-top -->

                @if ($errors->any())
                    <div class="alert alert-danger ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('resetPassword') }}" method="POST" class="member-profile form-underline"
                    id='submitResetPassword'>
                    @csrf

                    <div class="field-inline align-items-center">
                        <div class="field-input-number">
                            <label for="phone_number">Enter Your Phone Number</label>
                            <input type="tel" name="phone_number" placeholder="Please enter a 10-digit phone number"
                                id="phone_number" pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" name="submit-otp" value="Send OTP" class="OTP-btn1 btn"
                                style="width: 100px;" id="sendOTPButton2">Send OTP</button>

                        </div>
                    </div>

                    <div class="field-input">
                        <input type="tel" id="RverificationCode" placeholder="OTP" value=""
                            name="RverificationCode" pattern="[0-9]{6}" maxlength="6" minlength="6" required />
                        <input type="hidden" id="RgeneratedOTP" placeholder="OTP" value="" name="RgeneratedOTP" />
                        @error('RverificationCode')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field-input">
                        <label for="new_password">New password</label>
                        <input type="password" name="new_password" placeholder="Enter new password" id="new_password"
                            required autocomplete="new-password">
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field-input">
                        <label for="new_password_confirmation">Re-enter new password</label>
                        <input type="password" name="new_password_confirmation" placeholder="Re-enter new password" required
                            id="new_password_confirmation" autocomplete="new-password">
                        @error('new_password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field-submit">
                        <input type="submit" value="Reset password">
                    </div>
                </form>
            </div>
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
                                var successMessage = 'Reset password successfully';
                                alert(successMessage);
                                $('#message').css('display', 'block');
                                $('#form-result').css('display', 'none');

                                // $('#success-message').css('color', 'green').text(successMessage);
                                // window.location.href = "/";
                                // You can add the success message to a JavaScript variable to use it in the view file
                                window.successMessage = successMessage;
                            } else {
                                if (response.message) {
                                    alert(response.message);
                                }
                                $('#error-message').css('color', 'red').text(response.message);


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
