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
                style="background-image: url('{{ asset('assets/images/default/default-tour-banner3.jpg') }}');">
                <div class="container">
                    <div class="inner-banner-content">
                        <h1 class="inner-title">Testimonials</h1>
                    </div>
                </div>
            </div>
            <div class="inner-shape"></div>
        </section>
        {{-- {{ $testimonials }} --}}
        <section class="about-section about-page-section">
            <div class="testimonial-page-section">
                <div class="container">
                    <div class="row" id="testimonials-post">

                    </div>
                    <div class="text-center m-3">
                        <button class="btn btn-primary" id="load-more-testimonials" data-paginate5="2">Load more...</button>
                        <p class="invisible">No more testimonials...</p>
                    </div>
                </div>
                <!-- client html end -->
        </section>
    </main>
@endsection
