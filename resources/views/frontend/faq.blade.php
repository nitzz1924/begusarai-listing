@extends('frontend.layouts.master')
@section('title', 'Packages')
@section('content')


<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Frequently Asked Questions</h1>
            <div class="accordion" id="faqAccordion">

                @foreach ($faqs as $index => $faq)
                <div class="card">
                    <div class="card-header" id="faqHeading{{$index}}">
                        <h5 class="mb-0">
                            <a   href="#" data-toggle="collapse" data-target="#faqCollapse{{$index}}" aria-expanded="false" aria-controls="faqCollapse{{$index}}">
                                {{$faq->title}}
                            </a>
                        </h5>
                    </div>
                    <div id="faqCollapse{{$index}}" class="collapse" aria-labelledby="faqHeading{{$index}}" data-parent="#faqAccordion">
                        <div class="card-body">
                            {{$faq->value}}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


<!-- Custom CSS for improved design -->
<style>
    /* Custom styles for FAQ page */
    .accordion {
        margin-top: 20px;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .card-header {
        background-color: #f5f5f5;
    }

    .card-header h5 {
        margin: 0;
    }

    .card-body {
        padding: 15px;
    }
</style>
@endsection
