@extends('frontend.layouts.master')
@section('title', 'Blog Detail')
@section('content')
    
<main id="main" class="site-main">
    <div class="blog-banner">

    
        <img src="{{ URL::to('uploads/' . $blog->image) }}">
    </div><!-- .blog-banner -->
    <div class="blog-content">
        <div class="container">
            <div class="row 
    justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-left">
                        <ul class="breadcrumbs">
                            <li> {{ $blog->type }}</li>
                        </ul><!-- .breadcrumbs -->
                        <div class="entry-content">
                            <h1>  {{ $blog->title }}</h1>
                            <ul class="entry-meta">
                                <li>
                                    by <a title="Ben Cobb" href="#">Ben Cobb</a>
                                </li>
                                <li>22 July 2019</li>
                                <li>3 comments</li>
                            </ul>
                            <div class="entry-desc">
                           <P>
                           {{ $blog->description }}
                           </P> 
                           
                            </div>
                            <div>
                            <P>
                                
                           {{ $blog->post }}
                           </P> <iframe width="560" height="315" src="{{ $blog->videourl }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <!-- .entry-desc -->
                            <div class="entry-author">
                                <img src="images/avatars/male-1.jpg" alt="Bangkok">
                                <div class="author-info">
                                    <div class="author-title">
                                        <a title="Nitithorn" href="#">Nitithorn</a>
                                        <ul class="author-social">
                                            <li>
                                                <a href="#">
                                                    <i class="la la-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="la la-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">	
                                                    <i class="la la-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">	
                                                    <i class="la la-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="author-desc"><p>I'm a beauty and travel blogger based in Paris. I have two dogs and love drinking coffee in the middle of night.</p></div>
                                </div>
                            </div><!-- .entry-author -->
                        </div><!-- .entry-content -->
                        <div class="related-post">
                            <h2>Related Articles</h2>
                            <div class="related-grid columns-3">
                                <article class="hover__box post">
                                    <div class="post__thumb hover__box__thumb">
                                        <a title="How to Get Around Rome on the Cheap in 2019" href="#"><img src="images/blog/thumb-07.jpg" alt="How to Get Around Rome on the Cheap in 2019"></a>
                                    </div>
                                    <div class="post__info">
                                        <ul class="post__category">
                                            <li><a title="Tips & Tricks" href="#">Tips & Tricks</a></li>
                                        </ul>
                                        <h3 class="post__title"><a title="How to Get Around Rome on the Cheap in 2019" href="#">How to Get Around Rome on the Cheap in 2019</a></h3>
                                    </div>
                                </article>
                                <article class="hover__box post">
                                    <div class="post__thumb hover__box__thumb">
                                        <a title="Europe Explained in Fewer than 140 Characters" href="#"><img src="images/blog/thumb-08.jpg" alt="Europe Explained in Fewer than 140 Characters"></a>
                                    </div>
                                    <div class="post__info">
                                        <ul class="post__category">
                                            <li><a title="Tips & Tricks" href="#">Tips & Tricks</a></li>
                                        </ul>
                                        <h3 class="post__title"><a title="Europe Explained in Fewer than 140 Characters" href="#">Europe Explained in Fewer than 140 Characters</a></h3>
                                    </div>
                                </article>
                                <article class="hover__box post">
                                    <div class="post__thumb hover__box__thumb">
                                        <a title="Travel: Expectations vs. Reality, Best of 2019" href="#"><img src="images/blog/thumb-09.jpg" alt="Travel: Expectations vs. Reality, Best of 2019"></a>
                                    </div>
                                    <div class="post__info">
                                        <ul class="post__category">
                                            <li><a title="Take a break" href="#">Take a break</a></li>
                                        </ul>
                                        <h3 class="post__title"><a title="Travel: Expectations vs. Reality, Best of 2019" href="#">Travel: Expectations vs. Reality, Best of 2019</a></h3>
                                    </div>
                                </article>
                            </div>
                        </div><!-- .related-post -->
                        <div class="place__box place__box--reviews entry-comment">
                            <h3 class="place__title--reviews">3 Comments</h3>
                            <ul class="place__comments">
                                <li>
                                    <div class="place__author">
                                        <div class="place__author__avatar">
                                            <a title="Sebastian" href="#"><img src="images/avatars/male-2.jpg" alt=""></a>
                                        </div>
                                        <div class="place__author__info">
                                            <h4>
                                                <a title="Sebastian" href="#">Sebastian</a>
                                            </h4>
                                            <span class="time">October 1, 2019</span>
                                        </div>
                                    </div>
                                    <div class="place__comments__content">
                                        <p>Went there last Saturday for the first time to watch my favorite djs (Kungs, Sam Feldet and Watermat) and really had a great experience. </p>
                                    </div>
                                    <a title="Reply" href="#" class="place__comments__reply">							
                                        <i class="la la-comment-dots"></i>
                                        Reply
                                    </a>
                                    <ul>
                                        <li>
                                            <div class="place__author">
                                                <div class="place__author__avatar">
                                                    <a title="Chiemeka" href="#"><img src="images/avatars/male-3.jpg" alt=""></a>
                                                </div>
                                                <div class="place__author__info">
                                                    <h4>
                                                        <a title="Chiemeka" href="#">Chiemeka</a>
                                                    </h4>
                                                    <span class="time">October 1, 2019</span>
                                                </div>
                                            </div>
                                            <div class="place__comments__content">
                                                <p>Thank you for your kind words.It was truly very nice to meet you. I am glad to read you enjoyed the area and the cottage.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="place__author">
                                        <div class="place__author__avatar">
                                            <a title="Nitithorn" href="#"><img src="images/avatars/female-2.jpg" alt=""></a>
                                        </div>
                                        <div class="place__author__info">
                                            <h4>
                                                <a title="Nitithorn" href="#">Nitithorn</a>
                                            </h4>
                                            <span class="time">October 1, 2019</span>
                                        </div>
                                    </div>
                                    <div class="place__comments__content">
                                        <p>Went there last Saturday for the first time to watch my favorite djs (Kungs, Sam Feldet and Watermat) and really had a great experience.</p>
                                    </div>
                                    <a title="Reply" href="#" class="place__comments__reply">							
                                        <i class="la la-comment-dots"></i>
                                        Reply
                                    </a>
                                </li>
                            </ul>
                            <p class="place__login"><a title="Login" href="#">Login </a>to reviews</p>
                        </div><!-- .place__box -->
                    </div><!-- .place__left -->
                </div>
               
            </div>
        </div>
    </div><!-- .blog-content -->
</main><!-- .site-main -->


@endsection