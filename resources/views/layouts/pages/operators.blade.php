@foreach ($resultso as $post)
    <div class="col-lg-4 col-md-6">
        <div class="guide-content-wrap text-center">
            <figure class="guide-image">
                <img src="{{ asset('images/agencies/' . $post->agency_banner) }}" alt="">
            </figure>
            <div class="guide-content">
                <img src="{{ asset('images/agencies/' . $post->agency_logo) }}" alt="">
                <p></p>
                <h3>{{ $post->agency_name }}</h3>
                <h5>Travel Operator</h5>
                <p></p>
                <p>{!! html_entity_decode($post->agency_bio) !!}</p>
                <div class="guide-social social-links">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
