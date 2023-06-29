@extends('layouts.app')

@section('content')
    <style>
        .inner-shape {
            background-image: url('{{ asset('assets/images/slider-pattern.png') }}');
        }
    </style>
    <main id="content" class="site-main">
        <!-- Inner Banner html start-->
        <section class="inner-banner-wrap">
            <div class="inner-baner-container"
                style="background-image: url('{{ asset('assets/images/default/faq-banner.jpg') }}');">
                <div class="container">
                    <div class="inner-banner-content">
                        <h1 class="inner-title">FAQ</h1>
                    </div>
                </div>
            </div>
            <div class="inner-shape"></div>
        </section>
        {{-- {{ $testimonials }} --}}
        <section class="about-section about-page-section">
            <!-- faq html start -->
            <div class="faq-page-section">
                <div class="container">
                    <div class="faq-page-container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="faq-content-wrap">
                                    <div class="section-heading">
                                        <h5 class="dash-style">ANY QUESTIONS</h5>
                                        <h2>FREQUENTLY ASKED QUESTIONS</h2>
                                        <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea
                                            ipsum ad arcu. Nostrud. Esse? Aut nostrum, ornare quas provident laoreet
                                            nesciunt odio voluptates etiam, omnis.</p>
                                    </div>
                                    <div class="accordion" id="accordionOne">
                                        @foreach ($faqs1 as $fq)
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $fq->id }}">
                                                    <h4 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#collapse{{ $fq->id }}" aria-expanded="true"
                                                            aria-controls="collapse{{ $fq->id }}">
                                                            {!! html_entity_decode($fq->question) !!}
                                                        </button>
                                                    </h4>
                                                </div>
                                                <div id="collapse{{ $fq->id }}" class="collapse"
                                                    aria-labelledby="heading{{ $fq->id }}"
                                                    data-parent="#accordionOne">
                                                    <div class="card-body">
                                                        {!! html_entity_decode($fq->answer) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="qsn-form-container">
                                    <h3>STILL HAVE A QUESTION?</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                        ullam corper</p>
                                    <form>
                                        <p>
                                            <input type="text" name="name" placeholder="Your Name*">
                                        </p>
                                        <p>
                                            <input type="email" name="email" placeholder="Your Email*">
                                        </p>
                                        <p>
                                            <input type="number" name="number" placeholder="Your Number*">
                                        </p>
                                        <p>
                                            <textarea rows="8" placeholder="Enter your message"></textarea>
                                        </p>
                                        <p>
                                            <input type="submit" name="submit" value="SUBMIT QUESTIONS">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faq-page-container">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="faq-testimonial">
                                    <figure class="faq-image">
                                        <img src="{{ asset('assets/images/default/faq-page.jpg') }}" alt="">
                                    </figure>
                                    <div class="testimonial-content">
                                        <span class="quote-icon">
                                            <i class="fas fa-quote-left"></i>
                                        </span>
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus
                                            nec ullamcorper mattis, pulvinar dapibus leo."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="faq-content-wrap pl-20">
                                    <div class="section-heading">
                                        <h5 class="dash-style">QUESTIONS/ANSWERS</h5>
                                        <h2>BENEFITS & WHAT WE DO?</h2>
                                    </div>
                                    <div class="accordion" id="accordionTwo">
                                        @foreach ($faqs2 as $fqq)
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $fqq->id }}">
                                                    <h4 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#collapse{{ $fqq->id }}" aria-expanded="true"
                                                            aria-controls="collapse{{ $fqq->id }}">
                                                            {!! html_entity_decode($fqq->question) !!}
                                                        </button>
                                                    </h4>
                                                </div>
                                                <div id="collapse{{ $fqq->id }}" class="collapse"
                                                    aria-labelledby="heading{{ $fqq->id }}"
                                                    data-parent="#accordionOne">
                                                    <div class="card-body">
                                                        {!! html_entity_decode($fqq->answer) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- faq html end -->
        </section>
    </main>
@endsection
