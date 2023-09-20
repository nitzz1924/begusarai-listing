@extends('frontend.layouts.master')
@section('title', 'Set Password')
@section('content')

    <div class="container">
        <div class="member-wrap d-grid justify-content-center">
            <div class="member-wrap-top mt-5 h-100">

                <h2>Setup Your Password</h2>
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
                <h3>New User</h3>
                <input type="hidden" name="mobileNumber" placeholder="" value="{{ $User_id }}" id="mobileNumber">

                <div class="field-input">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" placeholder="Invan" id="first_name"
                        value="{{ old('first_name') }}">


                </div>


                <div class="field-input">
                    <label for="new_password">New password</label>
                    <input type="password" name="new_password" placeholder="Enter new password" id="new_password">
                </div>

                <div class="field-input">
                    <label for="re_new">Re-enter new password</label>
                    <input type="password" name="new_password_confirmation" placeholder="Re-enter new password"
                        id="re_new">
                </div>

                <div class="field-submit">
                    <input type="submit" value="Set password">
                </div>
            </form>
            
            <div class="login-container my-5">
                <span class="login-message"> 
                    <a href="#"
                        class=" btn-add-to-wishlist open-login test" data-place-id=""
                        data-business-id="">
                        <span>Please Login First </span>
                    </a>
                </span>

            </div>

            

            <!-- .member-profile -->

        </div><!-- .member-wrap -->
    </div>

    </main><!-- .site-main -->


@endsection
