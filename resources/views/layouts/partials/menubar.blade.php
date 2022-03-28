<nav id="navigation" class="navigation">
    <ul>
       <li class="menu-item">
          <a href="index.html">Home</a>
          {{-- <ul>
             <li>
                <a href="index-v2.html">Home 2</a>
             </li>
          </ul> --}}
       </li>
       <li class="menu-item-has-children">
          <a href="#">Tour</a>
          <ul>
             <li>
                <a href="destination.html">Destination</a>
             </li>
             <li>
                <a href="tour-packages.html">Tour Packages</a>
             </li>
             <li>
                <a href="package-offer.html">Package Offer</a>
             </li>
             {{-- <li>
                <a href="package-detail.html">Package Detail</a>
             </li>
             <li>
                <a href="tour-cart.html">Tour Cart</a>
             </li>
             <li>
                <a href="booking.html">Package Booking</a>
             </li>
             <li>
                <a href="confirmation.html">Confirmation</a>
             </li> --}}
          </ul>
       </li>
       <li class="menu-item-has-children">
          <a href="#">GoTours</a>
          <ul>
             <li>
                <a href="about.html">About Us</a>
             </li>
             <li>
                <a href="service.html">Service</a>
             </li>
             <li>
                <a href="career.html">Career</a>
             </li>
             {{-- <li>
                <a href="career-detail.html">Career Detail</a>
             </li>
             <li>
                <a href="tour-guide.html">Tour Guide</a>
             </li> --}}
             <li>
                <a href="gallery.html">Gallery</a>
             </li>
             {{-- <li>
                <a href="single-page.html">Single Page</a>
             </li> --}}
             <li>
                <a href="faq.html">FAQ</a>
             </li>
             <li>
                <a href="testimonial-page.html">Testimonials</a>
             </li>
             {{-- <li>
                <a href="search-page.html">Search Page</a>
             </li>
             <li>
                <a href="404.html">404 Page</a>
             </li>
             <li>
                <a href="comming-soon.html">Comming Soon</a>
             </li> --}}
             {{-- <li>
                <a href="contact.html">Contact</a>
             </li> --}}
             {{-- <li>
                <a href="wishlist-page.html">Wishlist</a>
             </li> --}}
          </ul>
       </li>
       <li class="menu-item">
          <a href="single-page.html">Shop</a>
          {{-- <ul>
             <li>
                <a href="product-right.html">Shop Archive</a>
             </li>
             <li>
                <a href="product-detail.html">Shop Single</a>
             </li>
             <li>
                <a href="product-cart.html">Shop Cart</a>
             </li>
             <li>
                <a href="product-checkout.html">Shop Checkout</a>
             </li>
          </ul> --}}
       </li>
       <li class="menu-item">
          <a href="#">Articles</a>
          {{-- <ul>
             <li><a href="blog-archive.html">Blog List</a></li>
             <li><a href="blog-archive-left.html">Blog Left Sidebar</a></li>
             <li><a href="blog-archive-both.html">Blog Both Sidebar</a></li>
             <li><a href="blog-single.html">Blog Single</a></li>
          </ul> --}}
       </li>
        @auth
            <li class="menu-item-has-children">
                <a href="#">Dashboard</a>
                <ul>
                <li>
                  @if (\Auth::user()->type == "admin")
                    <a href="admin/dashboard.html">Admin Dashboard</a>
                  @elseif (\Auth::user()->type == "manager")
                     <a href="admin/dashboard.html">Manager Dashboard</a>
                  @else 
                  <a href="admin/dashboard.html">User Dashboard</a>
                  @endif
                </li>
                <li class="menu-item-has-children">
                    <a href="#">User</a>
                    <ul>
                        <li>
                            <a href="admin/user.html">User List</a>
                        </li>
                        <li>
                            <a href="admin/user-edit.html">User Edit</a>
                        </li>
                        <li>
                            <a href="admin/new-user.html">New User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin/db-booking.html">Booking</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="admin/db-package.html">Package</a>
                    <ul>
                        <li>
                            <a href="admin/db-package-active.html">Package Active</a>
                        </li>
                        <li>
                            <a href="admin/db-package-pending.html">Package Pending</a>
                        </li>
                        <li>
                            <a href="admin/db-package-expired.html">Package Expired</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin/db-comment.html">Comments</a>
                </li>
                <li>
                    <a href="admin/db-wishlist.html">Wishlist</a>
                </li>
                <li>
                  <a href="{{ URL::route('logout') }}">Logout</a>
                </li>
                {{-- <li>
                    <a href="admin/forgot.html">Forget Password</a>
                </li> --}}
                </ul>
            </li>
        @else
            <li class="menu-item">
                <a href="{{ URL::route('login') }}">Login</a>
            </li>
        @endauth
       
    </ul>
 </nav>