<!-- Home slider html start -->
<section class="home-slider-section">
    <div class="home-slider">
        @foreach ($company_banners as $bnn)
            <div class="home-banner-items">
                <div class="banner-inner-wrap"
                    style="background-image: url({{ asset('images/banners/' . $bnn->imageURL) }});"></div>
                <div class="banner-content-wrap">
                    <div class="container">
                        <div class="banner-content text-center">
                            <h2 class="banner-title">{{ $bnn->tagline }}</h2>
                            <p>{{ $bnn->description }}</p>
                            <a href="{{ URL::route('packages') }}" class="button-primary">EXPLORING PACKAGES</a>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        @endforeach
    </div>
    <div class="inner-shape"></div>
</section>
<!-- slider html start -->
<!-- Home search field html start -->
<div class="trip-search-section shape-search-section">
    <div class="slider-shape"></div>
    <div class="container">
        <form method="POST" action="{{ route('searchpackage') }}">
            <div class="trip-search-inner white-bg d-flex">

                <div class="input-group">
                    <label> Search Destination* </label>
                    <input type="text" id="searchdesti" name="s" placeholder="Enter Destination">
                    <div class="search-result" id="search-result"></div>
                </div>
                <div class="input-group">
                    <label> Pax Number* </label>
                    <input type="text" name="s" placeholder="No.of People">
                </div>
                <div class="input-group width-col-3">
                    <label> Checkin Date* </label>
                    <i class="far fa-calendar"></i>
                    <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY"
                        autocomplete="off" readonly="readonly">
                </div>
                <div class="input-group width-col-3">
                    <label> Checkout Date* </label>
                    <i class="far fa-calendar"></i>
                    <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY"
                        autocomplete="off" readonly="readonly">
                </div>
                <div class="input-group width-col-3">
                    <label class="screen-reader-text"> Search </label>
                    <input type="submit" name="travel-search" value="INQUIRE NOW">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- search search field html end -->
