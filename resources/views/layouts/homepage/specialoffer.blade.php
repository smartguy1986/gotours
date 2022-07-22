<!-- Home special section html start -->
<section class="special-section">
   <div class="container">
      <div class="section-heading text-center">
         <div class="row">
            <div class="col-lg-8 offset-lg-2">
               <h5 class="dash-style">TRAVEL OFFER & DISCOUNT</h5>
               <h2>SPECIAL TRAVEL OFFER</h2>
               <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
            </div>
         </div>
      </div>
      {{-- {{ $packagesoffers }} --}}
      <div class="special-inner">
         <div class="row">
            @foreach ( $packagesoffers as $pckg)
            <div class="col-md-6 col-lg-4">
               <div class="special-item">
                  <figure class="special-img">
                     <img src="{{asset('images/packages/'.$pckg->imageURL)}}" alt="{{ $pckg->title }}">
                  </figure>
                  <div class="badge-dis">
                     <span>
                        <strong>{{ number_format(((($pckg->price-$pckg->sale_price)/$pckg->price)*100),2) }}%</strong>
                        off
                     </span>
                  </div>
                  <div class="special-content">
                     <div class="meta-cat">
                        <a href="#">{{ $pckg->name }}</a>
                     </div>
                     <h3>
                        <a href="{{ URL::route('packages.details', $pckg->slug) }}">{{ $pckg->title }}</a>
                     </h3>
                     <div class="package-price">
                        Price:
                        <del>&#8377;{{ number_format($pckg->price) }}</del>
                        <ins>&#8377;{{ number_format($pckg->sale_price) }}</ins>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach            
         </div>
      </div>
   </div>
</section>
<!-- special html end -->