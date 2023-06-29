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
                style="background-image: url('{{ asset('assets/images/default/services-banner.jpg') }}');">
                <div class="container">
                    <div class="inner-banner-content">
                        <h1 class="inner-title">Services</h1>
                    </div>
                </div>
            </div>
            <div class="inner-shape"></div>
        </section>
        {{-- {{ $services }} --}}
        <section class="about-section about-page-section">
            <div class="service-page-section">
                <div class="container">
                    <div class="row">
                        <?php $count = 1; ?>
                        @foreach ($services as $srv)
                            <div class="col-md-6">
                                <div class="service-content-wrap">
                                    <div class="service-content">
                                        <div class="service-header">
                                            <span class="service-count">
                                                {{ str_pad($count++,2,'0',STR_PAD_LEFT) }}.
                                            </span>
                                            <h3>{{ $srv->title }}</h3>
                                        </div>
                                        {!! html_entity_decode($srv->description) !!}
                                    </div>
                                    <figure class="service-img">
                                        <img src="{{ asset('images/services/' . $srv->photo) }}" alt="">
                                    </figure>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- client html end -->
            <!-- callback section html start -->
            <div class="fullwidth-callback"
                style="background-image: url({{ asset('assets/images/default/default-tour-banner2.jpg') }});">
                <div class="container">
                    <div class="section-heading section-heading-white text-center">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h5 class="dash-style">CALLBACK FOR MORE</h5>
                                <h2>GO TRAVEL.DISCOVER. REMEMBER US!!</h2>
                                <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid
                                    blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum
                                    magnis maxime curae placeat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="callback-counter-wrap">
                        <div class="counter-item">
                            <div class="counter-item-inner">
                                <div class="counter-icon">
                                    <img src="assets/images/icon1.png" alt="">
                                </div>
                                <div class="counter-content">
                                    <span class="counter-no">
                                        <span class="counter">500</span>K+
                                    </span>
                                    <span class="counter-text">
                                        Satisfied Clients
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="counter-item">
                            <div class="counter-item-inner">
                                <div class="counter-icon">
                                    <img src="assets/images/icon2.png" alt="">
                                </div>
                                <div class="counter-content">
                                    <span class="counter-no">
                                        <span class="counter">250</span>K+
                                    </span>
                                    <span class="counter-text">
                                        Awards Achieve
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="counter-item">
                            <div class="counter-item-inner">
                                <div class="counter-icon">
                                    <img src="assets/images/icon3.png" alt="">
                                </div>
                                <div class="counter-content">
                                    <span class="counter-no">
                                        <span class="counter">15</span>K+
                                    </span>
                                    <span class="counter-text">
                                        Active Members
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="counter-item">
                            <div class="counter-item-inner">
                                <div class="counter-icon">
                                    <img src="assets/images/icon4.png" alt="">
                                </div>
                                <div class="counter-content">
                                    <span class="counter-no">
                                        <span class="counter">10</span>K+
                                    </span>
                                    <span class="counter-text">
                                        Tour Destnation
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- callback html end -->
        </section>
        <!-- about html end -->
        <!-- subscribe html end -->
    </main>
@endsection
