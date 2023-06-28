@foreach ($results as $tst)
    <div class="col-lg-4 col-md-6">
        <div class="testimonial-item text-center">
            <figure class="testimonial-img">
                <img src="{{ asset('images/testimonials/' . $tst->photo) }}" alt="">
            </figure>
            <div class="testimonial-content">
                {{ $tst->description }}
                <div class="start-wrap">
                    <div class="rating-start" title="Rated {{ $tst->rating }} out of 5">
                        <span style="width: {{ $tst->rating * 20 }}%"></span>
                    </div>
                </div>
                <h3>{{ $tst->name }}</h3>
                <span>{{ $tst->occupation }}</span>
            </div>
        </div>
    </div>
@endforeach
