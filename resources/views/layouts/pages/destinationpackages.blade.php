@extends('layouts.app')

@section('content')
<style>
    .inner-shape {
        background-image: url('{{ asset('assets/images/slider-pattern.png')}}');
    }
</style>
<main id="content" class="site-main">
<!-- Inner Banner html start-->
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url('{{ asset('assets/images/default/default-tour-banner2.jpg')}}');">
            <div class="container">
                <div class="inner-banner-content">
                <h1 class="inner-title">Tour Packages</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <!-- Inner Banner html end-->
    <!-- destination field html end -->
    {{-- {{ $packages }} --}}
    <div class="package-section">
        <div class="container">
            <div class="package-inner">
                <div class="row" id="post2">
                    {{-- Ajax responses will be displayed here --}}
                </div>
            </div>
        </div>
        <div class="text-center m-3">
            <button class="btn btn-primary" id="load-more2" data-paginate2="2">Load more...</button>
            <p class="invisible">No more posts...</p>
        </div>
    </div>
    <!-- destination section html start -->
    <!-- subscribe section html start -->
    <section class="subscribe-section" style="background-image: url(/assets/images/announcement.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                <div class="section-heading section-heading-white">
                    <h5 class="dash-style">HOLIDAY PACKAGE OFFER</h5>
                    <h2>HOLIDAY SPECIAL 25% OFF !</h2>
                    <h4>Sign up now to recieve hot special offers and information about the best tour packages, updates and discounts !!</h4>
                    <div class="newsletter-form">
                        <form>
                            <input type="email" name="s" placeholder="Your Email Address">
                            <input type="submit" name="signup" value="SIGN UP NOW!">
                        </form>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Eaque adipiscing, luctus eleifend temporibus occaecat luctus eleifend tempo ribus.</p>
                </div>
                </div>
            </div>
        </div>
    </section>
<!-- subscribe html end -->
</main>

@endsection
