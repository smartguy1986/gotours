<!-- Home packages section html start -->
<section class="package-section">
    <div class="container">
        <div class="section-heading text-center">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h5 class="dash-style">EXPLORE GREAT PLACES</h5>
                    <h2>POPULAR PACKAGES</h2>
                    <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit,
                        blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae
                        placeat.</p>
                </div>
            </div>
        </div>
        {{-- {{ $packages }} --}}
        <div class="package-inner">
            <div class="row">
                @foreach ($packages as $pckg)
                    <div class="col-lg-4 col-md-6">
                        <div class="package-wrap">
                            <figure class="feature-image">
                                <a href="{{ URL::route('packages.details', $pckg->slug) }}">
                                    <img src="{{ asset('images/packages/' . $pckg->imageURL) }}"
                                        alt="{{ $pckg->title }}" class="package-image">
                                </a>
                            </figure>
                            <div class="package-price">
                                <h6>
                                    @if ($pckg->is_sale == 1)
                                        <span>&#8377; {{ number_format($pckg->sale_price, 2) }}</span> / per person
                                    @else
                                        <span>&#8377; {{ number_format($pckg->price, 2) }}</span> / per person
                                    @endif
                                </h6>
                            </div>
                            <div class="package-content-wrap">
                                <div class="package-meta text-center">
                                    <ul>
                                        <li>
                                            <i class="far fa-clock"></i>
                                            {{ $pckg->days }}D/{{ $pckg->nights }}N
                                        </li>
                                        <li>
                                            <i class="fas fa-user-friends"></i>
                                            {{ $pckg->mingroup }}
                                        </li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $pckg->name }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="package-content">
                                    <h3>
                                        <a
                                            href="{{ URL::route('packages.details', $pckg->slug) }}">{{ Str::limit($pckg->title, 50) }}</a>
                                    </h3>
                                    <div class="review-area">
                                        <span class="review-text">(25 reviews)</span>
                                        <div class="rating-start" title="Rated 5 out of 5">
                                            <span style="width: 60%"></span>
                                        </div>
                                    </div>
                                    <p>{!! html_entity_decode(Str::limit($pckg->descriptions, 200)) !!}</p>
                                    <div class="btn-wrap">
                                        <a href="{{ URL::route('packages.details', $pckg->slug) }}"
                                            class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                                        @if ($pckg->wishlisted == '1' && Auth::check())
                                            <a href="{{ URL::route('user.whishlistremove', $pckg->id) }}"
                                                class="button-text width-6">Remove from List</a>
                                        @else
                                            @if (Auth::check())
                                                <a href="{{ URL::route('packages.whishlist', $pckg->id) }}"
                                                    class="button-text width-6">Wish List<i
                                                        class="far fa-heart"></i></a>
                                            @else
                                                <a href="#"
                                                    onclick="alert('Please log in to add to your wishlist')"
                                                    class="button-text width-6">Wish List<i
                                                        class="far fa-heart"></i></a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn-wrap text-center">
                <a href="{{ URL::route('packages') }}" class="button-primary">VIEW ALL PACKAGES</a>
            </div>
        </div>
    </div>
</section>
<!-- packages html end -->
