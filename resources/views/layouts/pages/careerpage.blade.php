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
                style="background-image: url('{{ asset('assets/images/default/career-banner.jpg') }}');">
                <div class="container">
                    <div class="inner-banner-content">
                        <h1 class="inner-title">Career</h1>
                    </div>
                </div>
            </div>
            <div class="inner-shape"></div>
        </section>
        {{-- {{ $testimonials }} --}}
        <section class="about-section about-page-section">
            <!-- faq html start -->
            <div class="carrer-page-section">
                <div class="container">
                    <div class="vacancy-section">
                        <div class="section-heading text-center">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <h5 class="dash-style">VACANCY / CAREERS</h5>
                                    <h2>LET'S JOIN WITH US!</h2>
                                    <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid
                                        blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum
                                        magnis maxime curae placeat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="vacancy-container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="vacancy-content-wrap">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="vacancy-content">
                                                    <h5>Full Time / Part Time</h5>
                                                    <h3>Travel Agent</h3>
                                                    <p>Magna voluptatum dolorem! Dolores! Sociosqu commodo nobis imperdiet
                                                        lacinia? Magni! Felis, elementum nobis.</p>
                                                    <a href="#" class="button-primary">APPLY NOW</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="vacancy-content">
                                                    <h5>Full Time</h5>
                                                    <h3>Front Desk</h3>
                                                    <p>Magna voluptatum dolorem! Dolores! Sociosqu commodo nobis imperdiet
                                                        lacinia? Magni! Felis, elementum nobis.</p>
                                                    <a href="#" class="button-primary">APPLY NOW</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="vacancy-content">
                                                    <h5>Part Time</h5>
                                                    <h3>Travel Guide</h3>
                                                    <p>Magna voluptatum dolorem! Dolores! Sociosqu commodo nobis imperdiet
                                                        lacinia? Magni! Felis, elementum nobis.</p>
                                                    <a href="#" class="button-primary">APPLY NOW</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="vacancy-content">
                                                    <h5>Full Time / Part Time</h5>
                                                    <h3>Tour Supervisor</h3>
                                                    <p>Magna voluptatum dolorem! Dolores! Sociosqu commodo nobis imperdiet
                                                        lacinia? Magni! Felis, elementum nobis.</p>
                                                    <a href="#" class="button-primary">APPLY NOW</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="vacancy-form">
                                        <h3>JOIN OUR TEAM</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus
                                        </p>
                                        <form>
                                            <p>
                                                <input type="text" name="name" placeholder="Your Name">
                                            </p>
                                            <p>
                                                <input type="text" name="name" placeholder="Your Name">
                                            </p>
                                            <p>
                                                <input type="text" name="name" placeholder="Your Name">
                                            </p>
                                            <p>
                                                <textarea rows="7" placeholder="Enter your messafe"></textarea>
                                            </p>
                                            <p>
                                                <input type="submit" name="submit" value="SEND APPLICATION">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-service-wrap">
                        <div class="section-heading">
                            <div class="row no-gutters align-items-end">
                                <div class="col-lg-6">
                                    <h5 class="dash-style">OUR BENEFITS</h5>
                                    <h2>OUR TRAVEL AGENCY HAS BEEN BEST AMONG OTHERS SINCE 1982</h2>
                                </div>
                                <div class="col-lg-6">
                                    <div class="section-disc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus
                                            nec
                                            ullamcorper mattis, pulvinar dapibus leo.Placeat nostrud natus tempora justo.
                                            Laboriosam, eget mus nostrud natus tempora.</p>
                                        <p>Lorem ipsum dolor sit amet, consec tetur adipiscing eliting dolor sit amet.
                                            Placeat
                                            nostrud natus tempora justo nostrud natus tempora.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about-service-container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="about-service">
                                        <div class="about-service-icon">
                                            <img src="assets/images/icon19.png" alt="">
                                        </div>
                                        <div class="about-service-content">
                                            <h4>Award winning</h4>
                                            <p>Lorem ipsum dolor sit amet, consec teturing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="about-service">
                                        <div class="about-service-icon">
                                            <img src="assets/images/icon20.png" alt="">
                                        </div>
                                        <div class="about-service-content">
                                            <h4>Well allowance</h4>
                                            <p>Lorem ipsum dolor sit amet, consec teturing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="about-service">
                                        <div class="about-service-icon">
                                            <img src="assets/images/icon21.png" alt="">
                                        </div>
                                        <div class="about-service-content">
                                            <h4>Full Insurance</h4>
                                            <p>Lorem ipsum dolor sit amet, consec teturing.</p>
                                        </div>
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
