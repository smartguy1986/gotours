<footer id="colophon" class="site-footer footer-primary">
   <div class="top-footer">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6">
               <aside class="widget widget_text">
                  <h3 class="widget-title">
                     About Travel
                  </h3>
                  <div class="textwidget widget-text">
                     {{ $company_details[0]->company_bio }}
                  </div>
                  <div class="award-img">
                     <a href="#"><img src="{{asset('assets/images/logo6.png')}}" alt=""></a>
                     <a href="#"><img src="{{asset('assets/images/logo2.png')}}" alt=""></a>
                  </div>
               </aside>
            </div>
            <div class="col-lg-3 col-md-6">
               <aside class="widget widget_text">
                  <h3 class="widget-title">CONTACT INFORMATION</h3>
                  <div class="textwidget widget-text">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     <ul>
                        <li>
                           <a href="#">
                              <i class="fas fa-phone-alt"></i>
                           {{ $company_details[0]->company_phone }}
                           </a>
                        </li>
                        <li>
                           <a href="mailto:{{ $company_details[0]->company_phone }}">
                              <i class="fas fa-envelope"></i>
                              {{ $company_details[0]->company_email }}
                           </a>
                        </li>
                        <li>
                           <i class="fas fa-map-marker-alt"></i>
                           3146  Koontz, California
                        </li>
                     </ul>
                  </div>
               </aside>
            </div>
            <div class="col-lg-3 col-md-6">
               <aside class="widget widget_recent_post">
                  <h3 class="widget-title">Latest Post</h3>
                  <ul>
                     @foreach ($blogs as $article)
                     <li>
                        <h5>
                           <a href="{{URL::route('blog.details',$article->slug)}}">{{ $article->title }}</a>
                        </h5>
                        <div class="entry-meta">
                           <span class="post-on">
                              <a href="#">{{ date('dS M, Y', strtotime($article->created_at)) }}</a>
                           </span>
                           <span class="comments-link">
                              <a href="#">No Comments</a>
                           </span>
                        </div>
                     </li>
                     @endforeach  
                  </ul>
               </aside>
            </div>
            <div class="col-lg-3 col-md-6">
               <aside class="widget widget_newslatter">
                  <h3 class="widget-title">SUBSCRIBE US</h3>
                  <div class="widget-text">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </div>
                  <form id="footersubscribe" class="newslatter-form" onsubmit="subsMyForm()">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                     <input type="email" name="usermail" placeholder="Your Email.." required>
                     <input type="submit" name="submit" value="SUBSCRIBE NOW">
                  </form>
                  <div id="submit"></div>
               </aside>
            </div>
         </div>
      </div>
   </div>
   <div class="buttom-footer">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-5">
               <div class="footer-menu">
                  <ul>
                     <li>
                        <a href="#">Privacy Policy</a>
                     </li>
                     <li>
                        <a href="#">Term & Condition</a>
                     </li>
                     <li>
                        <a href="#">FAQ</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-md-2 text-center">
               <div class="footer-logo">
                  <a href="#"><img src="{{asset('assets/images/travele-logo.png')}}" alt=""></a>
               </div>
            </div>
            <div class="col-md-5">
               <div class="copy-right text-right">Copyright © 2021 Travele. All rights reserveds</div>
            </div>
         </div>
      </div>
   </div>
</footer>
<a id="backTotop" href="#" class="to-top-icon">
   <i class="fas fa-chevron-up"></i>
</a>
<!-- custom search field html -->
   <div class="header-search-form">
      <div class="container">
         <div class="header-search-container">
            <form class="search-form" role="search" method="get" >
               <input type="text" name="s" placeholder="Enter your text...">
            </form>
            <a href="#" class="search-close">
               <i class="fas fa-times"></i>
            </a>
         </div>
      </div>
   </div>
<!-- header html end -->
</div>

<!-- JavaScript -->
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendors/countdown-date-loop-counter/loopcounter.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.js')}}"></script>
<script src="{{asset('assets/vendors/modal-video/jquery-modal-video.min.js')}}"></script>
<script src="{{asset('assets/vendors/masonry/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendors/lightbox/dist/js/lightbox.min.js')}}"></script>
<script src="{{asset('assets/vendors/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script> --}}
<script>
   // function getMessage() {
   //    $.ajax({
   //       type:'POST',
   //       url:'/getmsg',
   //       data:{ "_token": "{{ csrf_token() }}" },
   //       success:function(data) {
   //          $("#msg").html(data.msg);
   //       }
   //    });
   // }
   $('#footersubscribe').submit(function (event) {
    event.preventDefault();
 });
</script>
<script>
   function subsMyForm() {         
      $('#submit').html('Please Wait...');
      $("#submit").attr("disabled", true);
      $.ajax({
         url: "subscribeuser",
         type: "POST",
         data: $('#footersubscribe').serialize(),
            success: function( response ) {
               $('#submit').html(response.msg);
               // $("#submit").attr("disabled", false);
               //alert('Ajax form has been submitted successfully');
               document.getElementById("footersubscribe").reset(); 
         }
      });
      return false;
   }
</script>
<script>
   $(document).ready(function() {
         window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
            });
         }, 4000);
   });

   $(window).scroll(function(){
      var sticky = $('.sticky'),
            scroll = $(window).scrollTop();

      if (scroll >= 100) sticky.addClass('fixed blur-back');
      else sticky.removeClass('fixed blur-back');

      var sticky2 = $('.sticky2'),
            scroll2 = $(window).scrollTop();

      if (scroll2 >= 100) sticky2.addClass('fixed2 blur-back');
      else sticky2.removeClass('fixed2 blur-back');
   });
</script>
<script>
   var paginate = 1;
   loadMoreData(paginate);

   $('#load-more').click(function() {
      var page = $(this).data('paginate');
      loadMoreData(page);
      $(this).data('paginate', page+1);
   });
   // run function when user click load more button
   function loadMoreData(paginate) {
      $.ajax({
            url: '/packages?page=' + paginate,
            type: 'get',
            datatype: 'html',
            beforeSend: function() {
               $('#load-more').text('Loading...');
            }
      })
      .done(function(data) {
            if(data.length == 0) {
               $('.invisible').removeClass('invisible');
               $('#load-more').hide();
               return;
            } else {
               $('#load-more').text('Load more...');
               $('#post').append(data);
            }
      })
      .fail(function(jqXHR, ajaxOptions, thrownError) {
         alert('Something went wrong.');
      });
   }
</script>
</body>
</html>