<nav id="navigation" class="navigation">
    <ul>
        <li class="menu-item">
            <a href="{{ URL::to('/') }}">Home</a>
        </li>
        <li class="menu-item-has-children">
            <a href="#">Tour</a>
            <ul>
                <li>
                    <a href="{{ URL::route('destinations') }}">Destination</a>
                </li>
                <li>
                    <a href="{{ URL::route('packages') }}">Tour Packages</a>
                </li>
                <li>
                    <a href="{{ URL::route('package-offers') }}">Package Offer</a>
                </li>
                <li>
                    <a href="{{ URL::route('touroperator') }}">Tour Operators</a>
                </li>
            </ul>
        </li>
        <li class="menu-item-has-children">
            <a href="#">GoTours</a>
            <ul>
                <li>
                    <a href="{{ URL::route('about-us') }}">About Us</a>
                </li>
                <li>
                    <a href="{{ URL::route('servicesfrontpage') }}">Service</a>
                </li>
                <li>
                    <a href="{{ URL::route('careerhome') }}">Career</a>
                </li>
                <li>
                    <a href="gallery.html">Gallery</a>
                </li>
                <li>
                    <a href="{{ URL::route('faqpage') }}">FAQ</a>
                </li>
                <li>
                    <a href="{{ URL::route('testimonialpage') }}">Testimonials</a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="single-page.html">Shop</a>
        </li>
        <li class="menu-item">
            <a href="#">Articles</a>
        </li>
        @auth
            <li class="menu-item-has-children">
                <a href="#">Dashboard</a>
                <ul>
                    <li>
                        @if (\Auth::user()->type == 'admin')
                            <a href="{{ URL::route('admin.dashboard') }}">Admin Dashboard</a>
                        @elseif (\Auth::user()->type == 'manager')
                            <a href="{{ URL::route('manager.dashboard') }}">Manager Dashboard</a>
                        @else
                            <a href="{{ URL::route('user.home') }}">User Dashboard</a>
                        @endif
                    </li>
                    @if (\Auth::user()->type == 'user')
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
                    @endif
                    <li>
                        <a href="admin/db-booking.html">Booking</a>
                    </li>
                    @if (\Auth::user()->type == 'admin')
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
                    @endif
                    <li>
                        <a href="admin/db-comment.html">Comments</a>
                    </li>
                    @if (\Auth::user()->type == 'user')
                        <li>
                            <a href="{{ URL::route('user.wishlist') }}">Wishlist</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ URL::route('logout') }}">Logout</a>
                    </li>
                </ul>
            </li>
        @else
            <li class="menu-item">
                <a href="{{ URL::route('login') }}">Login</a>
            </li>
        @endauth
        <li>
            <a href="{{ URL::route('contactpage') }}">Contact</a>
        </li>
    </ul>
</nav>
