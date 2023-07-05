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
                style="background-image: url('{{ asset('assets/images/default/tour-banner.jpg') }}');">
                <div class="container">
                    <div class="inner-banner-content">
                        <h1 class="inner-title">Wishlisted Tours</h1>
                    </div>
                </div>
            </div>
            <div class="inner-shape"></div>
        </section>
        <!-- Inner Banner html end-->
        <!-- packages html start -->
        <div class="package-section">
            <div class="container">
                <div class="package-inner">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="#">
                                        <img src="assets/images/img5.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>$1,900 </span> / per person
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-meta text-center">
                                        <ul>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                7D/6N
                                            </li>
                                            <li>
                                                <i class="fas fa-user-friends"></i>
                                                People: 5
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Malaysia
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="package-content">
                                        <h3>
                                            <a href="#">Sunset view of beautiful lakeside resident</a>
                                        </h3>
                                        <div class="review-area">
                                            <span class="review-text">(25 reviews)</span>
                                            <div class="rating-start" title="Rated 5 out of 5">
                                                <span style="width: 60%"></span>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit
                                            tellus, luctus nec ullam elit tellpus.</p>
                                        <div class="btn-wrap">
                                            <a href="#" class="button-text">Book Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="#">
                                        <img src="assets/images/img6.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>$1,230 </span> / per person
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-meta text-center">
                                        <ul>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                5D/4N
                                            </li>
                                            <li>
                                                <i class="fas fa-user-friends"></i>
                                                People: 8
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Canada
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="package-content">
                                        <h3>
                                            <a href="#">Experience the natural beauty of island</a>
                                        </h3>
                                        <div class="review-area">
                                            <span class="review-text">(17 reviews)</span>
                                            <div class="rating-start" title="Rated 5 out of 5">
                                                <span style="width: 100%"></span>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit
                                            tellus, luctus nec ullam elit tellpus.</p>
                                        <div class="btn-wrap">
                                            <a href="#" class="button-text">Book Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="#">
                                        <img src="assets/images/img7.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>$2,000 </span> / per person
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-meta text-center">
                                        <ul>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                6D/5N
                                            </li>
                                            <li>
                                                <i class="fas fa-user-friends"></i>
                                                People: 6
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Portugal
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="package-content">
                                        <h3>
                                            <a href="#">Vacation to the water city of Portugal</a>
                                        </h3>
                                        <div class="review-area">
                                            <span class="review-text">(22 reviews)</span>
                                            <div class="rating-start" title="Rated 5 out of 5">
                                                <span style="width: 80%"></span>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit
                                            tellus, luctus nec ullam elit tellpus.</p>
                                        <div class="btn-wrap">
                                            <a href="#" class="button-text">Book Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="#">
                                        <img src="assets/images/img7.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>$2,000 </span> / per person
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-meta text-center">
                                        <ul>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                6D/5N
                                            </li>
                                            <li>
                                                <i class="fas fa-user-friends"></i>
                                                People: 6
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Portugal
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="package-content">
                                        <h3>
                                            <a href="#">Trekking to the base camp of mountain</a>
                                        </h3>
                                        <div class="review-area">
                                            <span class="review-text">(22 reviews)</span>
                                            <div class="rating-start" title="Rated 5 out of 5">
                                                <span style="width: 80%"></span>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit
                                            tellus, luctus nec ullam elit tellpus.</p>
                                        <div class="btn-wrap">
                                            <a href="#" class="button-text">Book Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="#">
                                        <img src="assets/images/img7.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>$2,000 </span> / per person
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-meta text-center">
                                        <ul>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                6D/5N
                                            </li>
                                            <li>
                                                <i class="fas fa-user-friends"></i>
                                                People: 6
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Portugal
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="package-content">
                                        <h3>
                                            <a href="#">Beautiful season of the rural village</a>
                                        </h3>
                                        <div class="review-area">
                                            <span class="review-text">(22 reviews)</span>
                                            <div class="rating-start" title="Rated 5 out of 5">
                                                <span style="width: 80%"></span>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit
                                            tellus, luctus nec ullam elit tellpus.</p>
                                        <div class="btn-wrap">
                                            <a href="#" class="button-text">Book Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-wrap">
                                <figure class="feature-image">
                                    <a href="#">
                                        <img src="assets/images/img7.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="package-price">
                                    <h6>
                                        <span>$2,000 </span> / per person
                                    </h6>
                                </div>
                                <div class="package-content-wrap">
                                    <div class="package-meta text-center">
                                        <ul>
                                            <li>
                                                <i class="far fa-clock"></i>
                                                6D/5N
                                            </li>
                                            <li>
                                                <i class="fas fa-user-friends"></i>
                                                People: 6
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Portugal
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="package-content">
                                        <h3>
                                            <a href="#">Summer holiday to the Oxolotan River</a>
                                        </h3>
                                        <div class="review-area">
                                            <span class="review-text">(22 reviews)</span>
                                            <div class="rating-start" title="Rated 5 out of 5">
                                                <span style="width: 80%"></span>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit
                                            tellus, luctus nec ullam elit tellpus.</p>
                                        <div class="btn-wrap">
                                            <a href="#" class="button-text">Book Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- packages html end -->
    </main>
@endsection
