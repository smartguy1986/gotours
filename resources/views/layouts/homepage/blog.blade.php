<!-- Home blog section html start -->
<section class="blog-section">
   <div class="container">
      <div class="section-heading text-center">
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <h5 class="dash-style">FROM OUR BLOG</h5>
               <h2>OUR RECENT POSTS</h2>
               <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
            </div>
         </div>
      </div>
      {{-- {{ $blogs }} --}}
      <div class="row">
         @foreach ($blogs as $article)
            <div class="col-md-6 col-lg-4">
               <article class="post">
                  <figure class="feature-image">
                     <a href="{{URL::route('blog.details',$article->slug)}}">
                        <img src="{{URL::asset('/images/blogs/'.$article->blog_image)}}" alt="" class="home-blog-img">
                     </a>
                  </figure>
                  <div class="entry-content">
                     <h3>
                        <a href="{{URL::route('blog.details',$article->slug)}}">{{ $article->title }}</a>
                     </h3>
                     <p>
                        {{ $article->short_desc }}
                     </p>
                     <div class="entry-meta">
                        <span class="byline">
                           <a href="#">{{ $article->name }}</a>
                        </span>
                        <span class="posted-on">
                           <a href="#">{{ date('dS M, Y', strtotime($article->created_at)) }}</a>
                        </span>
                        <span class="comments-link">
                           <a href="#">@if ($article->totcm>0)
                              {{ $article->totcm }} Comment(s)                             
                           @else
                              No Comments
                           @endif</a>
                        </span>
                     </div>
                  </div>
               </article>
            </div>
         @endforeach         
      </div>
   </div>
</section>
 <!-- blog html end -->