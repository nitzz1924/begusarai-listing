@extends('frontend.layouts.master')
@section('title', 'Career')
@section('content')

    
    <div class="container mt-5" style="margin-bottom: 93px;">
        <div class="row align-items-center">
            <div class="col-md-6 ">

                <img class="rounded shadow" src="{{ asset('assets/images/career.webp') }}" alt="Image Alt Text">

            </div>
            <div class="col-md-6 " style="justify-content: center;  ">
                <?php 
                if(Auth::user()){
                ?>
                <div class="card">
                    <div class="card-header bg-info">
                        <h1 class="text-white">Career</h1>
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

                        <form method="POST" action="{{ route('careerStore') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" rows="4" required>{{ old('email') }}</input>
                                @error('email')
                                    <div class="text-danger">{{ $email }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="number">Your Number</label>
                                <input type="number" class="form-control" id="number" name="number" rows="4" required>{{ old('number') }}</input>
                                @error('number')
                                    <div class="text-danger">{{ $number }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Submit message</button>
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
