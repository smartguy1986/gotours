<div class="dashboard-navigation">
    <!-- Responsive Navigation Trigger -->
    <div id="dashboard-Navigation" class="slick-nav"></div>
    <div id="navigation" class="navigation-container">
        <ul>
            <li class="@if (\Request::is('*dashboard')) active-menu @endif"><a
                    href="{{ URL::route('manager.dashboard') }}"><i class="far fa-chart-bar"></i> Dashboard</a></li>
            
                    <li class="@if (\Request::is('*agencies')) active-menu slicknav_open @endif"><i
                    class="fas fa-user"></i>Agency Details
                <ul>
                    <li class="@if (\Request::is('*agencies')) active-menu @endif">
                        <a href="{{ URL::route('agencies') }}">Basic Info</a>
                    </li>
                </ul>
            </li>

            <li class="@if (\Request::is('*packages*')) active-menu @endif"><i class="fas fa-umbrella-beach"></i>Manage
                Packages
                <ul>
                    <li class="@if (\Request::is('*packages*')) active-menu @endif">
                        <a href="{{ URL::route('packages.add') }}">Add Packages</a>
                    </li>
                    <li class="@if (\Request::is('*packages*')) active-menu @endif">
                        <a href="{{ URL::route('packages.list') }}">Packages List</a>
                    </li>
                </ul>
            </li>
{{-- 
            <li class="@if (\Request::is('*testimonials')) active-menu @endif"><a><i class="fas fa-globe"></i>
                    Testimonials</a>
                <ul>
                    <li class="@if (\Request::is('*testimonials*')) active-menu @endif">
                        <a href="{{ URL::route('testimonials.list') }}">Testimonials List</a>
                    </li>
                    <li class="@if (\Request::is('*testimonials*')) active-menu @endif">
                        <a href="{{ URL::route('testimonials.add') }}">Add Testimonials</a>
                    </li>
                </ul>
            </li> --}}

            <li class="@if (\Request::is('*blog')) active-menu @endif"><a><i class="fas fa-book"></i> Blog
                    Articles</a>
                <ul>
                    <li class="@if (\Request::is('*blog*')) active-menu @endif">
                        <a href="{{ URL::route('blog') }}">Blog List</a>
                    </li>
                    <li class="@if (\Request::is('*blog*')) active-menu @endif">
                        <a href="{{ URL::route('blog.add') }}">Add Blog</a>
                    </li>
                </ul>
            </li>

            <li><a href="db-booking.html"><i class="fas fa-ticket-alt"></i> Booking & Enquiry</a></li>
            <li><a href="db-comment.html"><i class="fas fa-comments"></i>Comments</a></li>
            <li><a href="{{ URL::route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
</div>
