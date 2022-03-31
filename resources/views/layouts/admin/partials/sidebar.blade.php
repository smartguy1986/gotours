<div class="dashboard-navigation">
    <!-- Responsive Navigation Trigger -->
    <div id="dashboard-Navigation" class="slick-nav"></div>
    <div id="navigation" class="navigation-container">
        <ul>
            <li class="@if (\Request::is('*dashboard')) active-menu  @endif"><a href="{{ URL::route('admin.dashboard') }}"><i class="far fa-chart-bar"></i> Dashboard</a></li>
            <li><a><i class="fas fa-user"></i>Users</a>
                <ul>
                    <li>
                        <a href="user.html">User</a>
                    </li>
                    <li>
                        <a href="user-edit.html">User edit</a>
                    </li>
                    <li>
                        <a href="new-user.html">New user</a>
                    </li>
                </ul>
            </li>
            <li class="@if (\Request::is('*company')) active-menu slicknav_open @endif"><a><i class="fas fa-user"></i>Company Details</a>
                <ul>
                    <li class="@if (\Request::is('company')) active-menu  @endif">
                        <a href="{{ URL::route('company.basic') }}">Basic Info</a>
                    </li>
                    {{-- <li class="@if (\Request::is('social')) active-menu  @endif">
                        <a href="#">Social Network</a>
                    </li> --}}
                    <li class="@if (\Request::is('banners')) active-menu  @endif">
                        <a href="{{ URL::route('company.banners') }}">Home Page Banners</a>
                    </li>
                </ul>
            </li>
            <li class="@if (\Request::is('*packages*')) active-menu  @endif"><i class="fas fa-umbrella-beach"></i>Manage Packages</a>
                <ul>
                    <li class="@if (\Request::is('*packages*')) active-menu  @endif">
                        <a href="">Add Category</a>
                    </li>
                    <li class="@if (\Request::is('*packages*')) active-menu  @endif">
                        <a href="{{ URL::route('destinations.add') }}">Add Packages</a>
                    </li>
                    <li class="@if (\Request::is('*packages*')) active-menu  @endif">
                        <a href="{{ URL::route('destinations.add') }}">Packages List</a>
                    </li>
                </ul>
            </li>
            {{-- <li><a href="db-add-package.html"><i class="fas fa-umbrella-beach"></i>Add Package</a></li> --}}
            {{-- <li>
                <a><i class="fas fa-hotel"></i></i>Package Lists</a>
                <ul>
                    <li><a href="db-package-active.html">Active</a></li>
                    <li><a href="db-package-pending.html">Pending</a></li>
                    <li><a href="db-package-expired.html">Expired</a></li>
                </ul>   
            </li> --}}

            <li class="@if (\Request::is('*destinations')) active-menu  @endif"><a><i class="fas fa-globe"></i> Destinations</a>
                <ul>
                    <li class="@if (\Request::is('*destination*')) active-menu  @endif">
                        <a href="{{ URL::route('destinations.list') }}">Destination List</a>
                    </li>
                    <li class="@if (\Request::is('*destination*')) active-menu  @endif">
                        <a href="{{ URL::route('destinations.add') }}">Add Destination</a>
                    </li>
                </ul>
            </li>
            <li><a href="db-booking.html"><i class="fas fa-ticket-alt"></i> Booking & Enquiry</a></li>
            <li><a href="db-wishlist.html"><i class="far fa-heart"></i>Wishlist</a></li>
            <li><a href="db-comment.html"><i class="fas fa-comments"></i>Comments</a></li>
            <li><a href="{{ URL::route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
</div>