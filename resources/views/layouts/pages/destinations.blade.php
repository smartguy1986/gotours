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
        <div class="inner-baner-container" style="background-image: url('{{ asset('assets/images/default/default-banner.jpg')}}');">
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
                @php
                $i = 1
                @endphp
                @foreach ( $destinations->chunk(4) as $dst)
                    @if ($i % 2 == 0)
                        @php $j=0; @endphp
                        <div class="row fixed-row-600">
                            @foreach ( $dst->chunk(2) as $destination_data)
                                @if ($j<1)
                                    <div class="col-lg-5">
                                        <div class="row">
                                            @foreach ($destination_data as $dest)
                                                <div class="col-md-6 col-xl-12">
                                                    <div class="desti-item overlay-desti-item">
                                                        <figure class="desti-image">
                                                            <img src="{{ asset('images/destinations/'.$dest->imageURL)}}" alt="gotours">
                                                        </figure>
                                                        <div class="meta-cat bg-meta-cat">
                                                            <a href="#">{{ $dest->name }}</a>
                                                        </div>
                                                        <div class="desti-content">
                                                            <h3>
                                                                <a href="#">{{ $dest->tagline }}</a>
                                                            </h3>
                                                            <div class="rating-start" title="Rated 5 out of 5">
                                                                <span style="width: 100%"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-7">
                                        <div class="row">
                                            @foreach ($destination_data as $dest)
                                                <div class="col-sm-6">
                                                    <div class="desti-item overlay-desti-item item-455">
                                                        <figure class="desti-image">
                                                            <img src="{{ asset('images/destinations/'.$dest->imageURL)}}" alt="gotours">
                                                        </figure>
                                                        <div class="meta-cat bg-meta-cat">
                                                            <a href="#">{{ $dest->name }}</a>
                                                        </div>
                                                        <div class="desti-content">
                                                            <h3>
                                                                <a href="#">{{ $dest->tagline }}</a>
                                                            </h3>
                                                            <div class="rating-start" title="Rated 5 out of 4">
                                                                <span style="width: 53%"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @php $j++; @endphp                                
                            @endforeach
                        </div>
                    @else
                        @php $j=0; @endphp
                        <div class="row fixed-row-600">
                            @foreach ( $dst->chunk(2) as $destination_data)
                                @if ($j<1)
                                    <div class="col-lg-7">
                                        <div class="row">
                                            @foreach ($destination_data as $dest)
                                                <div class="col-sm-6">
                                                    <div class="desti-item overlay-desti-item item-455">
                                                        <figure class="desti-image">
                                                            <img src="{{ asset('images/destinations/'.$dest->imageURL)}}" alt="gotours">
                                                        </figure>
                                                        <div class="meta-cat bg-meta-cat">
                                                            <a href="#">{{ $dest->name }}</a>
                                                        </div>
                                                        <div class="desti-content">
                                                            <h3>
                                                                <a href="#">{{ $dest->tagline }}</a>
                                                            </h3>
                                                            <div class="rating-start" title="Rated 5 out of 4">
                                                                <span style="width: 53%"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-5">
                                        <div class="row">
                                            @foreach ($destination_data as $dest)
                                                <div class="col-md-6 col-xl-12">
                                                    <div class="desti-item overlay-desti-item">
                                                        <figure class="desti-image">
                                                            <img src="{{ asset('images/destinations/'.$dest->imageURL)}}" alt="gotours">
                                                        </figure>
                                                        <div class="meta-cat bg-meta-cat">
                                                            <a href="#">{{ $dest->name }}</a>
                                                        </div>
                                                        <div class="desti-content">
                                                            <h3>
                                                                <a href="#">{{ $dest->tagline }}</a>
                                                            </h3>
                                                            <div class="rating-start" title="Rated 5 out of 5">
                                                                <span style="width: 100%"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @php $j++; @endphp                                
                            @endforeach
                        </div> 
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
    </section>
    <!-- destination section html start -->
    <!-- subscribe section html start -->
    <section class="subscribe-section" style="background-image: url(assets/images/announcement.jpg);">
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