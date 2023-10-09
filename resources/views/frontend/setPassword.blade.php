@extends('frontend.layouts.master')
@section('title', 'Set Password')
@section('content')

    <div class="container my-5">
        <div class="member-wrap d-grid justify-content-center">
            <div class="member-wrap-top">
                <h2>Setup Your Password</h2>
            </div>
            <form action="{{ route('SubmitPassword') }}" method="POST"
                class="form-underline form-sign form-content form-account">
                @csrf
                <p>Select Account Type</p>
                <div class="field-inline mb-3">
                    <div class="form-group-user">
                        <div class="row">
                            <div class="col-6 px-1">
                                <div class="col-group">
                                    <label class="label-field radio-field">
                                        <input type="radio" value="guest" id="guest" name="account_type" checked>
                                        <span><i class="las la-user"></i>User</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 px-1">
                                <div class="col-group">
                                    <label class="label-field radio-field">
                                        <input type="radio" value="owner" id="owner" name="account_type">
                                        <span><i class="las la-briefcase"></i>Business Owner</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="mobileNumber" value="{{ $User_id }}" id="mobileNumber">

                <div class="field-input">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" placeholder="Enter your first name" id="first_name"
                        value="{{ old('first_name') }}">
                </div>

                <div class="field-input">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" placeholder="Enter new password" id="new_password">
                </div>

                <div class="field-input">
                    <label for="re_new">Re-enter New Password</label>
                    <input type="password" name="new_password_confirmation" placeholder="Re-enter new password"
                        id="re_new">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection
