   @extends('layouts.app')

   @section('content')

   <style>
   .inner-shape {
         background-image: url('{{ asset('assets/images/slider-pattern.png')}}');
   }
   </style>

   <main id="content" class="site-main">
      <!-- Inner Banner html start-->
      <section class="inner-banner-wrap">
         @if (!empty($packages[0]->banner))
            <div class="inner-baner-container" style="background-image: url('{{ asset('images/packages/'.$packages[0]->banner)}}');">
         @else
            <div class="inner-baner-container" style="background-image: url('{{ asset('images/packages/'.$packages[0]->imageURL)}}');">
         @endif       
            <div class="container">
                  <div class="inner-banner-content">
                     <h1 class="inner-title">{{ $packages[0]->title}}</h1>
                  </div>
            </div>
         </div>
         <div class="inner-shape"></div>
      </section>
      <!-- Inner Banner html end-->
      <!-- destination field html end -->
      {{-- {{ $packages }}
      {{ $programme }}
      {{ $gallery }} --}}
      
      <div class="single-tour-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="single-tour-inner">
                     <div class="titlesec"><h2>{{ $packages[0]->title}}</h2><h4>{{ $packages[0]->tagline}}</h4></div>
                     <figure class="feature-image">
                        <img src="{{ asset('images/packages/'.$packages[0]->imageURL)}}" alt="">
                        <div class="package-meta text-center">
                           <ul>
                              <li>
                                 <i class="far fa-clock"></i>
                                 {{ $packages[0]->days}} days / {{ $packages[0]->nights}} night
                              </li>
                              <li>
                                 <i class="fas fa-user-friends"></i>
                                 {{ $packages[0]->mingroup}}
                              </li>
                              <li>
                                 <i class="fas fa-map-marked-alt"></i>
                                 {{ $packages[0]->name}}
                              </li>
                           </ul>
                        </div>
                     </figure>
                     <div class="tab-container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">DESCRIPTION</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">PROGRAM</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">REVIEW</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
                           </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                              <div class="overview-content">
                                 {{ $packages[0]->descriptions }}
                              </div>
                           </div>
                           <div class="tab-pane" id="program" role="tabpanel" aria-labelledby="program-tab">
                              <div class="itinerary-content">
                                 <h3>Program <span>( {{ $packages[0]->days}} days )</span></h3>
                                 <p>Dolores maiores dicta dolore. Natoque placeat libero sunt sagittis debitis? Egestas non non qui quos, semper aperiam lacinia eum nam! Pede beatae. Soluta, convallis irure accusamus voluptatum ornare saepe cupidatat.</p>
                              </div>
                              <div class="itinerary-timeline-wrap">
                                 <ul>
                                    @foreach ($programme as $prg)
                                       <li>
                                          <div class="timeline-content">
                                             <div class="day-count">Day <span>{{ $prg->day }}</span></div>
                                             <h4>{{ $prg->title }}</h4>
                                             <p>{{ $prg->description }}</p>
                                          </div>
                                       </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                           <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="review-tab">
                              <div class="summary-review">
                                 <div class="review-score">
                                    <span>4.9</span>
                                 </div>
                                 <div class="review-score-content">
                                    <h3>
                                       Excellent
                                       <span>( Based on 24 reviews )</span>
                                    </h3>
                                    <p>Tincidunt iaculis pede mus lobortis hendrerit eveniet impedit aenean mauris qui, pharetra rem doloremque laboris euismod deserunt non, cupiditate, vestibulum.</p>
                                 </div>
                              </div>
                              <!-- review comment html -->
                              <div class="comment-area">
                                 <h3 class="comment-title">3 Reviews</h3>
                                 <div class="comment-area-inner">
                                    <ol>
                                       <li>
                                          <figure class="comment-thumb">
                                             <img src="assets/images/img20.jpg" alt="">
                                          </figure>
                                          <div class="comment-content">
                                             <div class="comment-header">
                                                <h5 class="author-name">Tom Sawyer</h5>
                                                <span class="post-on">Jana 10 2020</span>
                                                <div class="rating-wrap">
                                                   <div class="rating-start" title="Rated 5 out of 5">
                                                      <span style="width: 90%;"></span>
                                                   </div>
                                                </div>
                                             </div>
                                             <p>Officia amet posuere voluptates, mollit montes eaque accusamus laboriosam quisque cupidatat dolor pariatur, pariatur auctor.</p>
                                             <a href="#" class="reply"><i class="fas fa-reply"></i>Reply</a>
                                          </div>
                                       </li>
                                       <li>
                                          <ol>
                                             <li>
                                                <figure class="comment-thumb">
                                                   <img src="assets/images/img21.jpg" alt="">
                                                </figure>
                                                <div class="comment-content">
                                                   <div class="comment-header">
                                                      <h5 class="author-name">John Doe</h5>
                                                      <span class="post-on">Jana 10 2020</span>
                                                      <div class="rating-wrap">
                                                         <div class="rating-start" title="Rated 5 out of 5">
                                                            <span style="width: 90%"></span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <p>Officia amet posuere voluptates, mollit montes eaque accusamus laboriosam quisque cupidatat dolor pariatur, pariatur auctor.</p>
                                                   <a href="#" class="reply"><i class="fas fa-reply"></i>Reply</a>
                                                </div>
                                             </li>
                                          </ol>
                                       </li>
                                    </ol>
                                 </div>
                                 <div class="comment-form-wrap">
                                    <h3 class="comment-title">Leave a Review</h3>
                                    <form class="comment-form">
                                       <div class="full-width rate-wrap">
                                          <label>Your rating</label>
                                          <div class="procduct-rate">
                                             <span></span>
                                          </div>
                                       </div>
                                       <p>
                                          <input type="text" name="name" placeholder="Name">
                                       </p>
                                       <p>
                                          <input type="text" name="name" placeholder="Last name">
                                       </p>
                                       <p>
                                          <input type="email" name="email" placeholder="Email">
                                       </p>
                                       <p>
                                          <input type="text" name="subject" placeholder="Subject">
                                       </p>
                                       <p>
                                          <textarea rows="6" placeholder="Your review"></textarea>
                                       </p>
                                       <p>
                                          <input type="submit" name="submit" value="Submit">
                                       </p>
                                    </form> 
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="map" role="tabpanel" aria-labelledby="map-tab">
                              <div class="map-area">
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3302.2016371565414!2d74.83857170000002!3d34.1411831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e1857918ef5609%3A0x47316f7ceaf923da!2sHazratbal%20Rd%2C%20Srinagar!5e0!3m2!1sen!2sin!4v1654077526239!5m2!1sen!2sin" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="single-tour-gallery">
                        @if (count($gallery)>0)
                        <h3>GALLERY / PHOTOS</h3>
                        <div class="single-tour-slider">
                           @foreach ($gallery as $tphoto)
                              <div class="single-tour-item">
                                 <figure class="feature-image">
                                    <a href="{{ asset('images/packages/gallery/'.$tphoto->imageURL) }}" data-lightbox="photos">
                                       <img class="img-fluid" src="{{ asset('images/packages/gallery/'.$tphoto->imageURL) }}" alt="{{ $packages[0]->title }}">
                                    </a>
                                 </figure>
                              </div>
                           @endforeach                           
                        </div>
                        @endif                        
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="sidebar">
                     <div class="package-price">
                        <h5 class="price">
                           <span>
                              @if ($packages[0]->is_sale==1)
                                 {{ number_format($packages[0]->sale_price, 2) }}
                              @else
                                 {{ number_format($packages[0]->price, 2) }}
                              @endif
                           </span> / per person
                        </h5>
                        <div class="start-wrap">
                           <div class="rating-start" title="Rated 5 out of 5">
                              <span style="width: 60%"></span>
                           </div>
                        </div>
                     </div>
                     <div class="widget-bg booking-form-wrap">
                        <h4 class="bg-title">Booking</h4>
                        <form class="booking-form">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <input name="name_booking" type="text" placeholder="Full Name">
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <input name="email_booking" type="text" placeholder="Email">
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <input name="phone_booking" type="text" placeholder="Number">
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group">
                                    <input class="input-date-picker" type="text" name="s" autocomplete="off" readonly="readonly" placeholder="Date">
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <h4 class="">Add Options</h4>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label class="checkbox-list">
                                       <input type="checkbox" name="s">
                                       <span class="custom-checkbox"></span>
                                       Tour guide
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label class="checkbox-list">
                                       <input type="checkbox" name="s">
                                       <span class="custom-checkbox"></span>
                                       Insurance 
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label class="checkbox-list">
                                       <input type="checkbox" name="s">
                                       <span class="custom-checkbox"></span>
                                       Dinner
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label class="checkbox-list">
                                       <input type="checkbox" name="s">
                                       <span class="custom-checkbox"></span>
                                       Bike rent
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group submit-btn">
                                    <input type="submit" name="submit" value="Boook Now">
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="widget-bg information-content text-center">
                        <h5>TRAVEL TIPS</h5>
                        <h3>NEED TRAVEL RELATED TIPS & INFORMATION</h3>
                        <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. </p>
                        <a href="#" class="button-primary">GET A QUOTE</a>
                     </div>
                     <div class="travel-package-content text-center" style="background-image: url(assets/images/img11.jpg);">
                        <h5>MORE PACKAGES</h5>
                        <h3>OTHER TRAVEL PACKAGES</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus.</p>
                        <ul>
                           <li>
                              <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Vacation packages</a>
                           </li>
                           <li>
                              <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Honeymoon packages</a>
                           </li>
                           <li>
                              <a href="#"><i class="far fa-arrow-alt-circle-right"></i>New year packages</a>
                           </li>
                           <li>
                              <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Weekend packages</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- destination section html start -->
      <!-- subscribe section html start -->
      <section class="subscribe-section" style="background-image: url({{ asset('assets/images/default/announcement-back.jpg') }});">
         <div class="container">
            <div class="row">
               <div class="col-lg-7">
                  <div class="section-heading section-heading-white">
                     <h5 class="dash-style">HOLIDAY PACKAGE OFFER</h5>
                     <h2>HOLIDAY SPECIAL 25% OFF !</h2>
                     <h4>Sign up now to recieve hot special offers and information about the best tour packages, updates and discounts !!</h4>
                     <div class="newsletter-form">
                        <form>
                           <input type="email" name="s" placeholder="Your Email Address">
                           <input type="submit" name="signup" value="SIGN UP NOW!">
                        </form>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Eaque adipiscing, luctus eleifend temporibus occaecat luctus eleifend tempo ribus.</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- subscribe html end -->
   </main>

   @endsection