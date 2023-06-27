@foreach ($results3 as $pckg)
    <div class="col-md-6 col-lg-4">
        <div class="special-item">
            <figure class="special-img">
                <img src="/images/packages/{{ $pckg->imageURL }}" alt="{{ $pckg->title }}">
            </figure>
            <div class="badge-dis">
                <span>
                    <strong>{{ number_format(((($pckg->price - $pckg->sale_price) / $pckg->price) * 100), 0) }} %</strong>
                    Off
                </span>
            </div>
            <div class="special-content">
                <div class="meta-cat">
                    <a href="/packages-by-destination/{{ $pckg->dname }}">{{ $pckg->name }}</a>
                </div>
                <h3>
                    <a href="/packages/details/{{ $pckg->slug }}">{{ $pckg->title }}</a>
                </h3>
                <div class="package-price">
                    Price:
                    <del>&#8377; {{ number_format($pckg->price) }}</del>
                    <ins>&#8377; {{ number_format($pckg->sale_price) }}</ins>
                </div>
            </div>
        </div>
    </div>
@endforeach
