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
                        <form action="#" method="POST" class="form-underline">
                            <div class="field-inline">
                                <div class="field-input">
                                    <input type="text" name="first_name" value="" placeholder="First Name">
                                </div>
                                <div class="field-input">
                                    <input type="text" name="last_name" value="" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="field-input">
                                <input type="email" name="email" value="" placeholder="Email">
                            </div>
                            <div class="field-input">
                                <input type="tel" name="tel" value="" placeholder="Phone Number">
                            </div>
                            <div class="field-textarea">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="field-submit">
                                <input type="submit" value="Send Message" class="btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .site-content -->
</main><!-- .site-main -->


@endsection