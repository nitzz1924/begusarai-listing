@extends('frontend.layouts.master')
@section('title', 'Contact Us')
@section('content')

    <main id="main" class="site-main contact-main">
        <div class="page-title page-title--small align-left" style="background-image: url(images/bg/bg-about.png);">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">Contact Us</h1>
                    <p class="page-title__slogan">We want to hear from you.</p>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="site-content site-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-text">
                            <h2>Our Head Quater</h2>
                            <div class="contact-box">
                                <h3>Begusarai</h3>
                                <div class="d-flex ">
                                    <i class="fa-regular fa-envelope me-1"></i>
                                    <h4>Email: contact@inbegusarai.com</h4>
                                </div>
                                <h4 class="my-3">Phone: 9693667887 / 06243-316290</h4>
                                {{-- <a href="#" title="Get Direction">Get Direction</a> --}}
                            </div>
                            {{-- <div class="contact-box">
                            <h3>Paris</h3>
                            <p>Station F, 2 Parvis Alan Turing, 8742, Paris France</p>
                            <p>+44 (0)34 5312 3505</p>
                            <a href="#" title="Get Direction">Get Direction</a>
                        </div> --}}
                            <div class="d-flex ">
                                <div class="facebook social-icon me-2">
                                    <a title="Facebook" href="https://www.facebook.com/inbegusarai">
                                        <i class="text-white la la-facebook-f fs-3"></i>
                                    </a>
                                </div>
                                {{-- <div class="twitter social-icon me-2">
                                <a title="Twitter" href="#">
                                    <i class="text-white la la-twitter fs-3"></i>
                                </a>
                            </div>
                            <div class="youtube social-icon me-2">
                                <a title="Youtube" href="#">
                                    <i class="text-white la la-youtube fs-3"></i>
                                </a>
                            </div> --}}
                                <div class="instagram social-icon me-2">
                                    <a title="Instagram" href="https://instagram.com/in.begusarai">
                                        <i class="text-white la la-instagram fs-3"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <h2>Get in touch with us</h2>



                            <form action="{{ route('savecontact') }}" method="POST" class="form-underline">
                                @csrf
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <span style="color:green"> {{ session('success') }}</span>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                {{-- <label for="first_name">First Name</label> --}}
                                                <input type="text" name="first_name" id="first_name"
                                                    value="{{ old('first_name') }}" placeholder="First Name" required>
                                                @error('first_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-input">
                                                {{-- <label for="last_name">Last Name</label> --}}
                                                <input type="text" name="last_name" id="last_name"
                                                    value="{{ old('last_name') }}" placeholder="Last Name" required>
                                                @error('last_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-input">
                                        {{-- <label for="email">Email</label> --}}
                                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                            placeholder="Email" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-input">
                                        {{-- <label for="cnumber">Phone Number</label> --}}
                                        <input type="text" name="cnumber" id="cnumber" value="{{ old('cnumber') }}"
                                            placeholder="Phone Number" required>
                                        @error('cnumber')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-textarea">
                                        {{-- <label for="message">Message</label> --}}
                                        <textarea name="message" id="message" placeholder="Message" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-submit">
                                        <button type="submit" class="btn">Send Message</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->


@endsection
