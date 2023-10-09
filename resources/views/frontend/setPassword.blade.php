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
                <div class="field-inline mb-3" style="justify-content: center;">
                    <div class="form-group-user">
                        <div class="row">
                            <div class="col-6 px-1">
                                <div class="col-group">
                                    <label for="guest" class="label-field radio-field">
                                        <input type="radio" value="guest" id="guest" name="type" checked>
                                        <span><i class="las la-user"></i>User</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 px-1">
                                <div class="col-group">
                                    <label for="owner" class="label-field radio-field">
                                        <input type="radio" value="owner" id="owner" name="type">
                                        <span><i class="las la-briefcase"></i>Business Owner</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

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

            

            

        </div> 
    </div>

    </main> 

@endsection
