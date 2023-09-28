@extends('frontend.layouts.master')
@section('title', 'Packages')
@section('content')


    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center mb-5">Frequently Asked Questions</h1>
                
                <div class="accordion" id="faqAccordion">

                    @foreach ($faqs as $index => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeading{{ $index }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faqCollapse{{ $index }}" aria-expanded="false" aria-controls="faqCollapse{{ $index }}">
                                {{ $faq->title }}
                            </button>
                        </h2>
                        <div id="faqCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="faqHeading{{ $index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq->value }}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
