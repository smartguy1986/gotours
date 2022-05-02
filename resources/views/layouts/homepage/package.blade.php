<!-- Home packages section html start -->
<section class="package-section">
   <div class="container">
      <div class="section-heading text-center">
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <h5 class="dash-style">EXPLORE GREAT PLACES</h5>
               <h2>POPULAR PACKAGES</h2>
               <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
            </div>
         </div>
      </div>
      {{ $packages }}
      <div class="package-inner">
         <div class="row">
            @foreach ( $packages as $pckg)
               <div class="col-lg-4 col-md-6">
                  <div class="package-wrap">
                     <figure class="feature-image">
                        <a href="{{ URL::route('packages.details',$pckg->id) }}">
                           <img src="{{asset('images/packages/'.$pckg->imageURL)}}" alt="">
                        </a>
                     </figure>
                     <div class="package-price">
                        <h6>
                           <span>$ {{ number_format($pckg->price) }}</span> / per person
                        </h6>
                     </div>
                     <div class="package-content-wrap">
                        <div class="package-meta text-center">
                           <ul>
                              <li>
                                 <i class="far fa-clock"></i>
                                 {{$pckg->days}}D/{{$pckg->days}}N
                              </li>
                              <li>
                                 <i class="fas fa-user-friends"></i>
                                 {{$pckg->mingroup}}
                              </li>
                              <li>
                                 <i class="fas fa-map-marker-alt"></i>
                                 {{$pckg->name}}
                              </li>
                           </ul>
                        </div>
                        <div class="package-content">
                           <h3>
                              <a href="{{ URL::route('packages.details',$pckg->id) }}">{{$pckg->title}}</a>
                           </h3>
                           <div class="review-area">
                              <span class="review-text">(25 reviews)</span>
                              <div class="rating-start" title="Rated 5 out of 5">
                                 <span style="width: 60%"></span>
                              </div>
                           </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit tellus, luctus nec ullam elit tellpus.</p>
                           <div class="btn-wrap">
                              <a href="{{ URL::route('packages.details',$pckg->id) }}" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                              <a href="{{ URL::route('packages.details',$pckg->id) }}" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
         <div class="btn-wrap text-center">
            <a href="#" class="button-primary">VIEW ALL PACKAGES</a>
         </div>
      </div>
   </div>
</section>
 <!-- packages html end -->