@foreach ($results2 as $post)
    <div class="col-lg-4 col-md-6">
        <div class="package-wrap">
            <figure class="feature-image">
                <a href="/packages/details/{{ $post->slug }}">
                    <img src="{{ url('/images/packages/' . $post->imageURL) }}" alt="{{ $post->title }}"
                        class="package-image">
                </a>
            </figure>
            <div class="package-price">
                <h6>
                    <span>&#8377; {{ number_format($post->price) }}</span> / per person
                </h6>
            </div>
            <div class="package-content-wrap">
                <div class="package-meta text-center">
                    <ul>
                        <li>
                            <i class="far fa-clock"></i>
                            {{ $post->days }} D/ {{ $post->nights }} N
                        </li>
                        <li>
                            <i class="fas fa-user-friends"></i>
                            {{ $post->mingroup }}
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $post->title }}
                        </li>
                    </ul>
                </div>
                <div class="package-content">
                    <h3>
                        <a href="/packages/details/{{ $post->slug }}">{{ $post->title }}</a>
                    </h3>
                    <div class="review-area">
                        <span class="review-text">(25 reviews)</span>
                        <div class="rating-start" title="Rated 5 out of 5">
                            <span style="width: 60%"></span>
                        </div>
                    </div>
                    <p>{{ substr($post->descriptions, 0, 200) }}</p>
                    <div class="btn-wrap">
                        <a href="/packages/details/{{ $post->slug }}" class="button-text width-6">Book Now<i
                                class="fas fa-arrow-right"></i></a>
                        @if ($post->wishlisted == '1' && Auth::check())
                            <a href="{{ URL::route('user.whishlistremove', $post->id) }}"
                                class="button-text width-6">Remove from List</a>
                        @else
                            @if (Auth::check())
                                <a href="{{ URL::route('packages.whishlist', $post->id) }}"
                                    class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                            @else
                                <a href="#" onclick="alert('Please log in to add to your wishlist')"
                                    class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
