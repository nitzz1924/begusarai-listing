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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success" style="color:green">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <form action="{{ route('updateprofile') }}?id={{ $user->id }}" method="POST"
                                class="member-profile form-underline" enctype="multipart/form-data">
                                @csrf
                                @method('POST') <!-- Add this line to specify the HTTP method -->
                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <h3>Avatar</h3>

                                <div class="member-avatar">
                                    @if ($user->image)
                                        <img id="member_avatar" src="{{ URL::to('/uploads/' . $user->image) }}"
                                            alt="Member Avatar">
                                    @endif
                                    <label for="image_upload" style="cursor: pointer;">Upload new image</label>
                                    <input id="image_upload" type="file" name="image" style="display: none;">
                                    <div id="imagePreview" class="mt-2"></div>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <h3>Basic Info</h3>
                                <div class="field-input">
                                    <label for="first_name"> Name</label>
                                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                                        placeholder="Invan">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field-input">
                                    <label for="mobileNumber">Number</label>
                                    <input type="mobileNumber" name="mobileNumber" value="{{ $user->mobileNumber }}"
                                        placeholder="invan@gmail.com" id="mobileNumber">
                                    @error('mobileNumber')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="field-submit">
                                    <input type="submit" value="Update">
                                </div>
                            </form><!-- .member-profile -->
                        </div>

                        <div class="col-md-5">
                            <form action="{{ route('savepassword') }}" method="POST"
                                class="member-profile form-underline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <h3>Change Password</h3>
                                <div class="field-input">
                                    <label for="old_password">Old password</label>
                                    <input type="password" name="password" placeholder="Enter old password" id="password">
                                    @error('password')
                                        <div class="text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field-input">
                                    <label for="new_password">New password</label>
                                    <input type="password" name="new_password" placeholder="Enter new password"
                                        id="new_password">
                                    @error('new_password')
                                        <div class="text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field-input">
                                    <label for="new_password_confirmation">Re-enter new password</label>
                                    <input type="password" name="new_password_confirmation"
                                        placeholder="Re-enter new password" id="new_password_confirmation">
                                    @error('new_password_confirmation')
                                        <div class="text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field-submit">
                                    <input type="submit" value="Save">
                                </div>
                            </form>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </main>
    <script>
        function previewImage(input) {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = ''; // Clear previous preview

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Preview';
                    img.style.maxWidth = '100%';
                    imagePreview.appendChild(img);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Trigger file input click when the label is clicked
        document.querySelector("label[for='image_upload']").addEventListener("click", function() {
            document.getElementById("image_upload").click();
        });
    </script>
@endsection
