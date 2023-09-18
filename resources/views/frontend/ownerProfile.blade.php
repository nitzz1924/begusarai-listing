@extends('frontend.layouts.master')
@section('title', 'Owner profile')
@section('content')


    <main id="main" class="site-main">
        <div class="site-content owner-content">
            <div class="member-menu">
                <div class="container">
                    <ul>
                        <li><a href="/ownerDashboard">Dashboard</a></li>
                        <!-- <li><a href="/ownerLeads">Leads</a></li> -->
                        <li><a href="/ownerListing">My places</a></li>
                        <li><a href="/ownerWishlist">Wishlist</a></li>
                        <li class="active"><a href="/ownerProfile">Profile</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="member-wrap">
                    <div class="member-wrap-top">
                        <h2>Profile Setting</h2>
                        {{-- <p>You are current FREE plan. <a href="#">Upgrade now</a></p> --}}
                    </div><!-- .member-wrap-top -->

                    <div class="row justify-content-around">

                    
                    <div class="col-md-5">
                        <form action="#" class="member-profile form-underline">

                            <h3>Avatar</h3>
                            <div class="member-avatar">
                                <img id="member_avatar" src="{{ asset('assets/frontend-assets/images/member-avatar.png') }}"
                                    alt="Member Avatar">
                                <label for="upload_new">
                                    <input id="upload_new" type="file" name="member_avatar" placeholder="Upload new"
                                        value="">
                                    Upload new
                                </label>
                            </div>
    
                            <h3>Basic Info</h3>
                            <div class="field-input">
                                <label for="first_name"> Name</label>
                                <input type="text" name="name" id="name" placeholder="Invan" id="first_name">
                            </div>
                           
                            <div class="field-input">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="invan@gmail.com" id="email">
                            </div>
                           
                            
                            <div class="field-submit">
                                <input type="submit" value="Update">
                            </div>
                        </form><!-- .member-profile -->
                    </div>
                    <div class="col-md-5">
                        <form action="#" class="member-password form-underline">
                            <h3>Change Password</h3>
                            <div class="field-input">
                                <label for="old_password">Old password</label>
                                <input type="password" name="old_password" placeholder="Enter old password" id="old_password">
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
                                <input type="submit" value="Save">
                            </div>
                        </form><!-- .member-password -->
                    </div>
                    
                </div>
                    

                </div><!-- .member-wrap -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->


@endsection
