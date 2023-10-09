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
                     value="{{ old('first_name') }}">
             </div>

             <div class="form-field">
                 <label for="new_password">New Password</label>
                 <input type="password" name="new_password" placeholder="Enter new password" id="new_password">
             </div>

             <div class="form-field">
                 <label for="re_new">Re-enter New Password</label>
                 <input type="password" name="new_password_confirmation" placeholder="Re-enter new password"
                     id="re_new">
             </div>

             <div class="form-actions">
                 <button type="submit" class="btn-primary" style='background-color:#23d3d3'>Submit</button>
             </div>
         </form>
     </div>
 </div>
@endsection
