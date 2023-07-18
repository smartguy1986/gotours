@foreach ($resultsa as $blogs)
    <div class="grid-item col-md-6">
        <article class="post">
            <figure class="feature-image article-list-image">
                <a href="{{ URL::route('blog.details', $blogs->slug) }}">
                    <img src="{{ asset('images/blogs/' . $blogs->blog_image) }}" alt="{{ $blogs->slug }}">
                </a>
            </figure>
            <div class="entry-content">
                <h3>
                    <a href="{{ URL::route('blog.details', $blogs->slug) }}">{{ $blogs->title }}</a>
                </h3>
                <div class="entry-meta">
                    {{-- <span class="byline">
                        <a href="#">Demoteam</a>
                    </span> --}}
                    <span class="posted-on">
                        <a href="#">{{ date("dS F, Y", strtotime($blogs->created_at)) }}</a>
                    </span>
                    <span class="comments-link">
                        <a href="javascript:void(0)">
                            @if ($blogs->totcm > 0)
                                {{ $blogs->totcm }} Comment(s)
                            @else
                                No Comments
                            @endif
                        </a>
                    </span>
                </div>
                <p>{!! html_entity_decode($blogs->short_desc) !!}...</p>
                <a href="{{ URL::route('blog.details', $blogs->slug) }}" class="button-text">CONTINUE READING..</a>
            </div>
        </article>
    </div>
@endforeach
