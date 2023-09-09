@extends('frontend.layouts.master')
@section('title', 'Wishlist')
@section('content')
    

<main id="main" class="site-main">
    <div class="site-content owner-content">
        <div class="member-menu">
            <div class="container">
                <ul>
                    <li ><a href="/ownerDashboard">Dashboard</a></li>
                    <li><a href="/ownerLeads">Leads</a></li>
                    <li><a href="/ownerListing">Listings</a></li>
                    <li><a href="/ownerWishlist">Wishlist</a></li>
                    <li class="active"><a href="/ownerProfile">Profile</a></li>
                </ul>
            </div>
        </div>
        
        <div class="container">
            <div class="member-wrap">
                <div class="member-wrap-top">
                    <h2>Profile Setting</h2>
                    <p>You are current FREE plan. <a href="#">Upgrade now</a></p>
                </div><!-- .member-wrap-top -->
                <form action="#" class="member-profile form-underline">
                    <h3>Avatar</h3>
                    <div class="member-avatar">
                        <img id="member_avatar" src="images/member-avatar.png" alt="Member Avatar">
                        <label for="upload_new">
                            <input id="upload_new" type="file" name="member_avatar" placeholder="Upload new" value="">
                            Upload new
                        </label>
                    </div>
                    <h3>Basic Info</h3>
                    <div class="field-input">
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" placeholder="Invan" id="first_name">
                    </div>
                    <div class="field-input">
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" placeholder="Robent" id="last_name">
                    </div>
                    <div class="field-input">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="invan@gmail.com" id="email">
                    </div>
                    <div class="field-input">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" placeholder="00 2323 323" id="phone">
                    </div>
                    <div class="field-input">
                        <label for="facebook">Facebook</label>
                        <input type="text" name="facebook" placeholder="invantaa" id="facebook">
                    </div>
                    <div class="field-input">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" placeholder="invantaa" id="instagram">
                    </div>
                    <div class="field-submit">
                        <input type="submit" value="Update">
                    </div>
                </form><!-- .member-profile -->
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
            </div><!-- .member-wrap -->
        </div>
    </div><!-- .site-content -->
</main><!-- .site-main -->


@endsection