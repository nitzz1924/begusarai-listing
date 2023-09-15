@extends('frontend.layouts.master')
@section('title', 'Blogs')
@section('content')

    <main id="main" class="site-main">
        <div class="page-title page-title--small page-title--blog align-left"
            style="background-image: url({{ asset('/frontend-assets/images/bg/bg-blog.png') }});">
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name">All Blogs</h1>
                    <p class="page-title__slogan">Let our experts inspire you</p>
                </div>
            </div>
        </div><!-- .page-title -->
        <div class="page-content isotope">
            <div class="container">
                <div class="isotope__nav">
                    {{-- <ul>
                        <li><a title="All" href="#" class="active" data-filter="*">All (59)</a></li>
                        <li><a title="Beaches" href="#" data-filter=".beaches">Beaches (8)</a></li>
                        <li><a title="Tips & Tricks" href="#" data-filter=".tip">Tips & Tricks (12)</a></li>
                        <li><a title="Take a break" href="#" data-filter=".take">Take a break (23)</a></li>
                        <li><a title="Unique Stay" href="#" data-filter=".unique">Unique Stay (44)</a></li>
                        <li><a title="Road Trips" href="#" data-filter=".road">Road Trips (17)</a></li>
                    </ul> --}}
                </div><!-- .isotope__nav -->
                <div class="isotope__grid post-grid columns-3">


                    @foreach ($blog as $value)
                        <article class="hover__box isotope__grid__item post beaches">
                            <div class="post__thumb hover__box__thumb">
                                <a title="Scuba diving for beginners: tips for your first diving trip"
                                    href="{{ URL::to('blogDetails/' . $value->id) }}"><img
                                        src="{{ URL::to('uploads/' . $value->image) }}"
                                        alt="Scuba diving for beginners: tips for your first diving trip"></a>
                            </div>
                            <div class="post__info">
                                <ul class="post__category">
                                    <li> {{ $value->type }}</li>
                                </ul>
                                <h3 class="post__title"><a
                                        title="Scuba diving for beginners: tips for your first diving trip"
                                        href="{{ URL::to('blogDetails/' . $value->id) }}"> {{ $value->title }}</a>
                                </h3>
                            </div>
                        </article>
                    @endforeach
                </div><!-- .isotope__grid -->

                <div class="container">

                    <div class="row justify-content-center " style="display: grid;">
                        <div class="">
                            <div class="col-xl-6 col-sm-3  d-flex mt-5 pagination">
                                {{ $blog->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="pagination">
                    <div class="pagination__numbers">
                        <div class="pagination">
                            {{ $blog->links() }}
                        </div>
                    </div>
                </div><!-- .pagination --> --}}

            </div>
        </div>
    </main><!-- .site-main -->


@endsection
