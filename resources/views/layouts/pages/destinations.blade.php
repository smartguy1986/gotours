@extends('layouts.app')

@section('content')

<main id="content" class="site-main">
    <!-- Inner Banner html start-->
    <section class="inner-banner-wrap">
       <div class="inner-baner-container" style="background-image: url('{{ asset('assets/images/default/destination-banner.jpg') }}');">
          <div class="container">
             <div class="inner-banner-content">
                <h1 class="inner-title">Destination</h1>
             </div>
          </div>
       </div>
       <div class="inner-shape"></div>
    </section>
    <!-- Inner Banner html end-->
    <!-- destination field html end -->
    {{-- {{ $destinations }} --}}
    
    <section class="destination-section destination-page">
        <div class="container">
            <div class="destination-inner destination-three-column">
                <div class="container py-2">
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        @foreach ($destinations as $dst)
                        <div class="col-sm-4 col-md-4 py-3">
                            <div class="col-sm-12">
                                <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                        <img src="{{ asset('images/destinations/'.$dst->imageURL) }}" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                        <a href="#">{{ $dst->name }}</a>
                                    </div>
                                    <div class="desti-content">
                                        <h3>
                                            <a href="#">{{ $dst->tagline }}</a>
                                        </h3>
                                        <div class="rating-start" title="Rated 5 out of 4">
                                            <span style="width: 53%"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- destination section html start -->
    <!-- subscribe section html start -->
    <section class="subscribe-section" style="background-image: url(assets/images/img16.jpg);">
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