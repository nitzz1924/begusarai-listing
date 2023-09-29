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
            <form action="{{ route('submitResetPassword') }}" method="POST" class="member-profile form-underline">
                @csrf

                <div class="field-inline align-items-center">
                    <div class="field-input-number">
                        <label for="phone_number">Enter Your Phone Number</label>
                        <input type="tel" name="phone_number" placeholder="Please enter a 10-digit phone number"
                            id="phone_number" pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                    </div>

                    <div>
                        <button type="button" name="submit-otp" value="Send OTP" class="OTP-btn send-otp-button"
                            style="width: 100px;" id="sendOTPButton">Send OTP</button>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.send-otp-button').addEventListener('click', function(event) {
                event.preventDefault();
                var randomOTP = Math.floor(100000 + Math.random() * 900000);
                document.getElementById('RverificationCode').value =
                    randomOTP; // Set the OTP in the RverificationCode input
                document.getElementById('RgeneratedOTP').value =
                    randomOTP; // Set the same OTP in the hidden generatedOTP input
                document.getElementById('RverificationCode').removeAttribute(
                    'readonly'); // Enable the input field
                console.log('Generated OTP:', randomOTP);
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function() {
            $('.send-otp-button').on('click', function(event) {
                event.preventDefault();
                var randomOTP = Math.floor(100000 + Math.random() * 900000);
                $('#verificationCode').removeAttr('readonly');
                document.getElementById('verificationCode').value = randomOTP;
                $('#generatedOTP').val(randomOTP); // Set the same OTP in the hidden generatedOTP input
                $('#verificationCode').val(randomOTP); // Set the OTP in the verificationCode input
                // Enable the input field
                console.log('Generated OTP:', randomOTP);
            });
        });
    </script> -->

@endsection
