@extends('frontend.layouts.master')
@section('title', 'Set Password')
@section('content')

    <script>
        @if (isset($successMessage))
            alert('{{ $successMessage }}');
        @endif

        @if (isset($errorMessage))
            alert('{{ $errorMessage }}');
        @endif
    </script>

    <script>
        @if (isset($successMessage))
            alert('{{ $successMessage }}');
        @endif
    </script>

    @if (session('success'))
        <div class="form-card" style="margin-top: 30px;margin-bottom: 30px;">
            <h2 class="text-success text-center">
                <i class="fas fa-check-circle fa-4x" style="font-size: 50px;">
                </i>
            </h2>
            <br>
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <h3 class="text-success">{{ session('success') }}</h3>
                </div>
            </div>
        </div>
    @endif
    <div class="container my-5">
        <div class="card mt-4  open-login" id='message'style='display:none; margin-left: 500px;margin-right: 500px;margin-bottom: 60px;'>
            <div class="card-header" style='color:green'>
             
                Login
            </div>
            <div class="card-body">
                
                <a href="#" class="btn btn-primary" style="width: -webkit-fill-available;">Login</a>
            </div>
        </div>
        <div class="member-wrap d-grid justify-content-center" id="form-result" style='display:block'>  
            <form action="{{ route('SubmitPassword') }}" method="POST"
            class="form-underline form-sign form-content form-account" id='submitResetPassword'>
            @csrf
            <p>Select Account Type</p>
            <div class="member-wrap-top">
                <h2>Setup Your Password</h2>
            </div>
                <div class="field-inline mt-2 mb-3">
                    <div class="form-group-user">
                        <div class="row">
                            <div class="col-6 px-1">
                                <div class="col-group">
                                    <label class="label-field radio-field">
                                        <input type="radio" value="guest" id="guest" name="type" checked>
                                        <span><i class="las la-user"></i>User</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 px-1">
                                <div class="col-group">
                                    <label class="label-field radio-field">
                                        <input type="radio" value="owner" id="owner" name="type">
                                        <span><i class="las la-briefcase"></i>Business Owner</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="mobileNumber" value="{{ $User_id }}" id="mobileNumber">

                <div class="form-input">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" placeholder="Enter your first name" id="first_name"
                        value="{{ old('first_name') }}" autocomplete="off">
                    @error('first_name')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <p>Setup your password</p>

                <div class="form-input">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" placeholder="Enter new password" id="new_password">
                    @error('new_password')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-input">
                    <label for="new_password_confirmation">Re-enter New Password</label>
                    <input type="password" name="new_password_confirmation" placeholder="Re-enter new password"
                        id="new_password_confirmation">
                    @error('new_password_confirmation')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address Filing -->
                <div class="form-input">
                    <label for="address_filing">Select Your Location</label>
                    <select name="address_filing" id="address_filing" class='form-control'>
                        <option value="" selected disabled>Select</option>
                        <option value="from_begusarai">From Begusarai</option>
                        <option value="outside_begusarai">Outside Begusarai</option>
                    </select>
                    @error('address_filing')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Additional fields for From Begusarai -->
                <div id="from_begusarai_fields">
                    <div class="form-input mt-3">
                        <label for="block_number">Block Number</label>
                        <input type="text" name="block_number" placeholder="Enter Block Number" id="block_number">
                        @error('block_number')
                            <div class="has-error mt-2">The block number field is required</div>
                        @enderror
                    </div>
                    <div class="form-input">
                        <label for="village_ward">Village/Ward</label>
                        <input type="text" name="village_ward" placeholder="Enter Village/Ward" id="village_ward">
                    </div>
                    @error('village_ward')
                        <div class="has-error mt-2">The village ward field is required </div>
                    @enderror
                </div>

                <!-- Additional field for Outside Begusarai -->
                <div id="outside_begusarai_fields">
                    <div class="form-input mt-3">
                        <label for="city_name">City Name</label>
                        <input type="text" name="city_name" placeholder="Enter City Name" id="city_name">
                    </div>
                    @error('city_name')
                        <div class="has-error mt-2" style="margin-bottom: 29px;">The city name field is required</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn mt-3">Submit</button>
                </div>
            </form>

        </div>
    </div>
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

                            var successMessage = response.message;
                            alert(successMessage);
                            $('#message').css('display', 'block');
                            $('#form-result').css('display', 'none');

                            window.successMessage = successMessage;
                        } else {
                            // Registration failed
                            if (response.message) {
                                alert(response.message);
                            } else {
                                alert(
                                'Registration failed. Please try again.'); // Display a default error message
                            }
                            $('#error-message').css('color', 'red').text(response.message);

                            // You can also perform other actions, such as clearing form fields or showing additional error information.
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
            $('#address_filing').change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === 'from_begusarai') {
                    $('#from_begusarai_fields').show();
                    $('#outside_begusarai_fields').hide();
                } else if (selectedOption === 'outside_begusarai') {
                    $('#from_begusarai_fields').hide();
                    $('#outside_begusarai_fields').show();
                } else {
                    // If the "Select" option is chosen, hide both additional fields
                    $('#from_begusarai_fields').hide();
                    $('#outside_begusarai_fields').hide();
                }
            });

            // Initially hide the additional fields when the page loads
            $('#from_begusarai_fields').hide();
            $('#outside_begusarai_fields').hide();
        });
    </script>

@endsection
