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

            <form action="{{ route('SubmitPassword') }}" method="POST" class="member-profile form-underline">
                @csrf
                <h3>Set Your New Password</h3>
                <input type="hidden" name="mobileNumber" placeholder="" value="{{ $User_id }}" id="mobileNumber">

                <div class="field-inline align-items-center">
                    <div class="field-input-number">
                        <label for="phone_number">Enter Your Phone Number</label>
                        <input type="tel" name="phone_number" placeholder="Please enter a 10-digit phone number"
                            id="phone_number" pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                    </div>

                    <div>
                        <button type="button" name="submit-otp" value="Send OTP" class="OTP-btn" style="width: 100px;" id="sendOTPButton" >Send OTP</button>
                    </div>
                </div>


                <div class="field-input">
                    <label for="new_password">New password</label>
                    <input type="password" name="new_password" placeholder="Enter new password" id="new_password" required>
                </div>

                <div class="field-input">
                    <label for="re_new">Re-enter new password</label>
                    <input type="password" name="new_password_confirmation" placeholder="Re-enter new password" required
                        id="re_new">
                </div>

                <div class="field-submit">
                    <input type="submit" value="Reset password">
                </div>
            </form>


        </div><!-- .member-wrap -->
    </div>

    </main><!-- .site-main -->


@endsection
