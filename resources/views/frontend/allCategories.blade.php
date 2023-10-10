@extends('frontend.layouts.master')
@section('title', 'All Categories')
@section('content')

    <main id="main" class="site-main">
        <div class="page-title page-title--small align-left" >
            <div class="container">
                <div class="page-title__content">
                    <h1 class="page-title__name text-center">All Categories</h1>
                    <p class="page-title__slogan"></p>
                </div>
            </div>
        </div><!-- .page-title -->


        <div class="site-content">
            {{-- Mobile categories --}}

            <div class="business-category">
                <div class="container">
                    {{-- <h2 class="title title-border-bottom align-center offset-item">
                        Browse Businesses by Category
                    </h2> --}}

                    <div class="grid-container">
                        @foreach ($submaster as $index => $value)
                            {{-- @if ($index < 11) --}}
                                <!-- Display the first 11 category items -->
                                <div class="bsn-cat-item cyan">
                                    <a
                                        href="{{ route('searchFilter', ['category' => $value->title, 'city' => 'all', 'highlight' => 'all']) }}">
                                        <i class="{{ $value->value }}"></i>
                                        <span class="title">{{ $value->title }}</span>
                                        <span class="place">{{ $categoryCount[$value->title] }}</span>
                                    </a>
                                </div>
                            {{-- @endif --}}
                        @endforeach

                    </div>

                </div>
            </div>
        </div><!-- .site-content -->


    </main><!-- .site-main -->


@endsection
