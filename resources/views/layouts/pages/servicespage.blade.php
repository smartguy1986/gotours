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
                        <h1 class="inner-title">Services</h1>
                    </div>
                </div>
            </div>
            <div class="inner-shape"></div>
        </section>
        {{ $services }}
        <section class="about-section about-page-section">
            <div class="service-page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="service-content-wrap">
                                <div class="service-content">
                                    <div class="service-header">
                                        <span class="service-count">
                                            01.
                                        </span>
                                        <h3>Travel Insurance</h3>
                                    </div>
                                    <p>Porro ipsum amet eiusmod, quae voluptate, architecto posuere risus imperdiet gravida
                                        porttitor, penatibus nemo dictumst quasi habitant ut mollit.</p>
                                </div>
                                <figure class="service-img">
                                    <img src="assets/images/img30.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-content-wrap">
                                <div class="service-content">
                                    <div class="service-header">
                                        <span class="service-count">
                                            02.
                                        </span>
                                        <h3>Handpicked Hotels</h3>
                                    </div>
                                    <p>Porro ipsum amet eiusmod, quae voluptate, architecto posuere risus imperdiet gravida
                                        porttitor, penatibus nemo dictumst quasi habitant ut mollit.</p>
                                </div>
                                <figure class="service-img">
                                    <img src="assets/images/img31.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-content-wrap">
                                <div class="service-content">
                                    <div class="service-header">
                                        <span class="service-count">
                                            03.
                                        </span>
                                        <h3>Accessibility</h3>
                                    </div>
                                    <p>Porro ipsum amet eiusmod, quae voluptate, architecto posuere risus imperdiet gravida
                                        porttitor, penatibus nemo dictumst quasi habitant ut mollit.</p>
                                </div>
                                <figure class="service-img">
                                    <img src="assets/images/img32.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-content-wrap">
                                <div class="service-content">
                                    <div class="service-header">
                                        <span class="service-count">
                                            04.
                                        </span>
                                        <h3>24/7 Support</h3>
                                    </div>
                                    <p>Porro ipsum amet eiusmod, quae voluptate, architecto posuere risus imperdiet gravida
                                        porttitor, penatibus nemo dictumst quasi habitant ut mollit.</p>
                                </div>
                                <figure class="service-img">
                                    <img src="assets/images/img33.jpg" alt="">
                                </figure>
                            </div>
                        </div>
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
