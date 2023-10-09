  @extends('frontend.layouts.master')
  @section('title', 'Set Password')
  @section('content')

      <style>
          /* Basic styling for the page */
          .container {
              max-width: 600px;
              margin: 0 auto;
              padding: 20px;
          }

          .password-setup {
              background-color: #fff;
              padding: 20px;
              box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
          }

          .password-setup-header {
              text-align: center;
              margin-bottom: 20px;
          }

          .password-setup-header h2 {
              font-size: 24px;
              color: #333;
          }

          /* Styling for account type radio buttons */
          .account-type {
              display: flex;
              justify-content: center;
              margin-bottom: 20px;
          }

          .radio-label {
              margin-right: 20px;
              display: flex;
              align-items: center;
              color: #333;
          }

          .radio-label input {
              margin-right: 5px;
          }

          /* Styling for form fields and actions */
          .form-field {
              margin-bottom: 20px;
          }

          .form-field label {
              display: block;
              font-weight: bold;
              color: #333;
          }

          .form-field input[type="text"],
          .form-field input[type="password"] {
              width: 100%;
              padding: 10px;
              border: 1px solid #ccc;
              border-radius: 5px;
              font-size: 16px;
          }

          .form-actions {
              text-align: center;
          }

          .btn-primary {
              background-color: #007bff;
              color: #fff;
              border: none;
              padding: 10px 20px;
              border-radius: 5px;
              font-size: 16px;
              cursor: pointer;
          }

          .btn-primary:hover {
              background-color: #0056b3;
          }
      </style>

      <div class="container">
          <div class="password-setup">
              <div class="password-setup-header">
                  <h2>Setup Your Password</h2>
              </div>
              <form action="{{ route('SubmitPassword') }}" method="POST" class="password-setup-form">
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

                  <input type="hidden" name="mobileNumber" value="{{ $User_id }}" id="mobileNumber">

                  <div class="form-field">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name" placeholder="Enter your first name" id="first_name"
                          value="{{ old('first_name') }}" autocomplete="off">
                      @error('first_name')
                          <div class="has-error mt-2">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-field">
                      <label for="new_password">New Password</label>
                      <input type="password" name="new_password" placeholder="Enter new password" id="new_password">
                      @error('new_password')
                          <div class="has-error mt-2">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-field">
                      <label for="new_password_confirmation">Re-enter New Password</label>
                      <input type="password" name="new_password_confirmation" placeholder="Re-enter new password"
                          id="new_password_confirmation">
                      @error('new_password_confirmation')
                          <div class="has-error mt-2">{{ $message }}</div>
                      @enderror
                  </div>

                  <!-- Address Filing -->
                  <div class="form-field">
                      <label for="address_filing">Address Filing</label>
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
                      <div class="form-field">
                          <label for="block_number">Block Number</label>
                          <input type="text" name="block_number" placeholder="Enter Block Number" id="block_number">
                          @error('block_number')
                              <div class="has-error mt-2">The block number field is required</div>
                          @enderror
                      </div>
                      <div class="form-field">
                          <label for="village_ward">Village/Ward</label>
                          <input type="text" name="village_ward" placeholder="Enter Village/Ward" id="village_ward">
                      </div>
                      @error('village_ward')
                          <div class="has-error mt-2">The village ward field is required </div>
                      @enderror
                  </div>

                  <!-- Additional field for Outside Begusarai -->
                  <div id="outside_begusarai_fields">
                      <div class="form-field">
                          <label for="city_name">City Name</label>
                          <input type="text" name="city_name" placeholder="Enter City Name" id="city_name">
                      </div>
                      @error('city_name')
                          <div class="has-error mt-2" style="margin-bottom: 29px;">The city name field is required</div>
                      @enderror
                  </div>

                  <div class="form-actions">
                      <button type="submit" class="btn-primary" style='background-color:#23d3d3'>Submit</button>
                  </div>
              </form>

          </div>
      </div>
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
