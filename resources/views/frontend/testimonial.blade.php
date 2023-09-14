@extends('frontend.layouts.master')
@section('title', 'Testimonial')
@section('content')

    <style>
        .login-container {
            text-align: center;
            /* Center the content horizontally */
        }

        .login-message {
            display: block;
            margin-bottom: 10px;
            /* Add some space below the message */
            font-weight: bold;
            /* Make the message bold, adjust as needed */
        }

        .test {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .test:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="container mt-5" style="margin-bottom: 93px;">
        <div class="row ">
            <div class="col-md-6">

                <img src="{{ asset('assets/images/Testimonial.webp') }}" alt="Image Alt Text">

            </div>
            <div class="col-md-6 " style="justify-content: center; text-align: center; ">
                <?php 
                if(Auth::user()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Submit a Testimonial</h1>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span style="color:green;text-agline:center; ">{{ session('success') }}</span>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('testimonialStore') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit message</button>
                        </form>
                    </div>
                </div>
                <?php 
                }else{
                ?>
                <div class="login-container">
                    <span class="login-message">Please Login First</span>
                    <a title="Login" class="open-login test" href="#">Login</a>
                </div>

                <?php }?>
            </div>
        </div>
    </div>

@endsection
