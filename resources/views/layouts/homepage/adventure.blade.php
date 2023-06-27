<!-- Home activity section html start -->
<section class="activity-section">
   <div class="container">
      <div class="section-heading text-center">
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <h5 class="dash-style">TRAVEL BY ACTIVITY</h5>
               <h2>ADVENTURE & ACTIVITY</h2>
               <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
            </div>
         </div>
      </div>
      {{-- {{ $categories }} --}}
      <div class="activity-inner row">
         @foreach ($categories as $cat)
            <div class="col-lg-2 col-md-4 col-sm-6">
               <div class="activity-item">
                  <div class="activity-icon">
                     <a href="{{URL::route('packages-by-theme',$cat->slug)}}">
                        <img src="{{URL::asset('/images/categories/'.$cat->cat_image)}}" alt="">
                     </a>
                  </div>
                  <div class="activity-content">
                     <h5>
                        <a href="{{URL::route('packages-by-theme',$cat->slug)}}">{{ $cat->cat_name }}</a>
                     </h5>
                     <p>{{ $cat->dest }} Packages</p>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</section>
<!-- activity html end -->