@extends('frontend.layouts.master')
@section('title', 'About Us')
@section('content')

    <main id="main" class="site-main">
        <div class="page-title page-title--small align-left" style="background-image: url(images/bg/bg-about.png);">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">About Us</h1>
                    <p class="page-title__slogan">Tell you about us</p>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="site-content">
            <div class="container">
                <div class="company-info flex-inline">
                    {{-- <img src="images/about-2.jpg" alt="Our Company"> --}}
                    <div class="ci-content">
                        <span>Our Company</span>
                        <h2>In Begusarai</h2>
                        <p>“In Begusarai” is a business listing website that helps you find businesses in Begusarai, Bihar.
                            We’re always committed to providing you with the most comprehensive and up-to-date information
                            about businesses in Begusarai, so you can easily find whatever you’re looking for.

                            Our website features a wide variety of businesses, including shops, restaurants, service
                            providers, and more. We also have a variety of filters you can use to narrow down your search so
                            you can narrow down exactly what you’re looking for.

                            In addition to our business listings, we also offer a variety of other features, such as:
                        </p>
                    </div>
                </div><!-- .company-info -->

                <div class="company-info flex-inline my-5">
                    {{-- <img src="images/about-2.jpg" alt="Our Company"> --}}
                    <div class="ci-content">
                        <span>Testimonials</span>
                        <h2>Reviews of businesses by other users</h2>
                        <p></p>
                    </div>
                </div><!-- .company-info -->

                <div class="company-info flex-inline my-5">
                    {{-- <img src="images/about-2.jpg" alt="Our Company"> --}}
                    <div class="ci-content">
                        <span></span>
                        <h2>Local news and information</h2>
                        <p>We are constantly working to improve our website and add new features. We want to make sure that
                            “In Begusarai” is the best resource for finding businesses in the area.</p>
                        <p>If you have any questions or suggestions, please do not hesitate to contact us. We appreciate
                            your feedback and help us make “In Begusarai” the best it can be We hope you find In Begusarai
                            to be a valuable resource. Thank you for visiting!</p>
                    </div>
                </div><!-- .company-info -->

                <div class="company-info flex-inline my-5 border rounded-3 p-5 shadow ">
                    {{-- <img src="images/about-2.jpg" alt="Our Company"> --}}
                    <div class="ci-content  ">
                        <span></span>
                        <h2>Mission:</h2>
                        <p>To be the most thorough and current tool for locating companies in Begusarai, Bihar.</p>
                    </div>
                    <div class="ci-content ">
                        <span></span>
                        <h2>Goals:</h2>
                        <ul>
                            <li>To offer users the most precise and current information possible about local businesses.
                            </li>
                            <li>To assist users in swiftly and simply finding the companies they are looking for.</li>
                            <li>To support and assist neighborhood businesses in expanding their clientele.</li>
                            <li>To establish ourselves as Begusarai’s premier source of information.</li>

                        </ul>
                    </div>
                </div><!-- .company-info -->

                <div class="company-info flex-inline my-5">
                    {{-- <img src="images/about-2.jpg" alt="Our Company"> --}}
                    <div class="ci-content">
                        <span>Our Objectives</span>

                        <h2>We think that In Begusarai can be a useful tool for the local community’s consumers and
                            businesses.</h2>
                        <p>Our mission and goals, which we hold dear, will, in our opinion, enable us to deliver the finest experience to our users.</p>
                        <p>These concrete examples illustrate how we intend to accomplish our objectives:</p>

                        <ul>
                            <li> Our team will never stop trying to provide the most recent information in our company listings. </li>
                            <li>We’ll update our website with additional features to make it simpler for visitors to discover the businesses they’re searching for.</li>
                            <li>A number of marketing strategies, including online and physical ones, will be used to promote our website.</li>
                            <li>To help local companies expand their clientele, we will collaborate with them.</li>
                        </ul>

                        <p class="mt-3">
                            In Begusarai may become the finest resource for local companies and customers if we all work together to make it so, in our opinion. Gratitude for your assistance
                        </p>
                        <p>
                            We think that by cooperating, we can make “In Begusarai” the finest resource for local customers and companies.
                        </p>

                        <p>I appreciate your help.</p>
                    </div>
                </div><!-- .company-info -->

                {{-- <div class="our-team">
                <div class="container">
                    <h2 class="title align-center">Meet Our Team</h2>
                </div>
                <div class="ot-content grid grid-4">
                    <div class="grid-item ot-item hover__box">
                        <div class="hover__box__thumb"><img src="images/people/people-1.jpg" alt=""></div>
                        <div class="ot-info">
                            <h3>Jaspreet Bhamrai</h3>
                            <span class="job">Co - founder</span>
                        </div>
                    </div>
                    <div class="grid-item ot-item hover__box">
                        <div class="hover__box__thumb"><img src="images/people/people-2.jpg" alt=""></div>
                        <div class="ot-info">
                            <h3>Justine Robinson</h3>
                            <span class="job">Marketing Guru</span>
                        </div>
                    </div>
                    <div class="grid-item ot-item hover__box">
                        <div class="hover__box__thumb"><img src="images/people/people-3.jpg" alt=""></div>
                        <div class="ot-info">
                            <h3>Jeremías Romero</h3>
                            <span class="job">Designer</span>
                        </div>
                    </div>
                    <div class="grid-item ot-item hover__box">
                        <div class="hover__box__thumb"><img src="images/people/people-4.jpg" alt=""></div>
                        <div class="ot-info">
                            <h3>Rutherford Brannan</h3>
                            <span class="job">Mobile developer</span>
                        </div>
                    </div>
                </div><!-- .ot-content -->
            </div><!-- .our-team --> --}}


                <div class="join-team align-center mt-5">
                    <div class="container">
                        <h2 class="title">Join our team</h2>
                        <div class="jt-content">
                            <p>We’re always looking for talented individuals and <br> people who are hungry to do great
                                work.</p>
                            <a href="/career" class="btn" title="View openings">View openings</a>
                        </div>
                    </div>
                </div><!-- .join-team -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->


@endsection
