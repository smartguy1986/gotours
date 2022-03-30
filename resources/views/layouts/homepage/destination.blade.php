<section class="destination-section">
   <div class="container">
      <div class="section-heading">
         <div class="row align-items-end">
            <div class="col-lg-7">
               <h5 class="dash-style">POPULAR DESTINATION</h5>
               <h2>TOP NOTCH DESTINATION</h2>
            </div>
            <div class="col-lg-5">
               <div class="section-disc">
                  Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.
               </div>
            </div>
         </div>
      </div>
      <div class="destination-inner destination-three-column">
         <div class="row">
            {{-- {{ $destinations }} --}}
            <div class="col-lg-7">
               <div class="row">
                  @foreach($destinations as $dst)
                  <div class="col-sm-6 prtr">
                     <div class="desti-item overlay-desti-item">
                        <figure class="desti-image">
                           <img src="{{asset('images/destinations/'.$dst->imageURL)}}" alt="">
                        </figure>
                        <div class="meta-cat bg-meta-cat">
                           <a href="#">{{ $dst->name }}</a>
                        </div>
                        <div class="desti-content">
                           <h3>
                              <a href="#">{{ $dst->tagline }}</a>
                           </h3>
                           <div class="rating-start" title="Rated 5 out of 4">
                              <span style="width: 53%"></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
            {{-- ===================================== --}}
            {{-- {{ $destinations2 }} --}}
            <div class="col-lg-5">
               <div class="row">
                  @foreach($destinations2 as $dst2)
                  <div class="col-md-6 col-xl-12 lnds">
                     <div class="desti-item overlay-desti-item">
                        <figure class="desti-image">
                           <img src="{{asset('images/destinations/'.$dst2->imageURL)}}" alt="">
                        </figure>
                        <div class="meta-cat bg-meta-cat">
                           <a href="#">{{ $dst2->name }}</a>
                        </div>
                        <div class="desti-content">
                           <h3>
                              <a href="#">{{ $dst2->tagline }}</a>
                           </h3>
                           <div class="rating-start" title="Rated 5 out of 5">
                              <span style="width: 100%"></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="btn-wrap text-center">
            <a href="{{ URL::route('destinations') }}" class="button-primary">MORE DESTINATION</a>
         </div>
      </div>
   </div>
</section>