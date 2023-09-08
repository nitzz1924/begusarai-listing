@extends('frontend.layouts.master')
@section('title', 'Set Password')
@section('content')

    <div class="container">
        <div class="member-wrap d-grid justify-content-center">
            <div class="member-wrap-top mt-5">
                <h2>Setup Your Password</h2>
            </div>
            <!-- .member-wrap-top -->

            <form action="#" class="member-profile form-underline">
                
                <h3>New User</h3>
                
                <div class="field-inline">

                    <div class="field-input">
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" placeholder="Invan" id="first_name">
                    </div>
                    <div class="field-input">
                        <label for="last_name">Business name</label>
                        <input type="text" name="Business_name" placeholder="Company name" id="business_name">
                    </div>
                </div>

                <div class="field-input">
                    <label for="new_password">New password</label>
                    <input type="password" name="new_password" placeholder="Enter new password" id="new_password">
                </div>
                <div class="field-input">
                    <label for="re_new">Re-new password</label>
                    <input type="password" name="re_new" placeholder="Enter new password" id="re_new">
                </div>

                <div class="field-submit">
                    <input type="submit" value="Set password">
                </div>
            </form><!-- .member-profile -->
            
        </div><!-- .member-wrap -->
    </div>

    </main><!-- .site-main -->


@endsection
