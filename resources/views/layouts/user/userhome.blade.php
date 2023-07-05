@extends('layouts.user.userLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
            <div class="db-info-list">
                <div class="dashboard-stat-icon bg-blue">
                    <i class="far fa-chart-bar"></i>
                </div>
                <div class="dashboard-stat-content">
                    <h4>Today Views</h4>
                    <h5>22,520</h5> 
                </div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
            <div class="db-info-list">
                <div class="dashboard-stat-icon bg-green">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="dashboard-stat-content">
                    <h4>Earnings</h4>
                    <h5>16,520</h5> 
                </div>
            </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
            <div class="db-info-list">
                <div class="dashboard-stat-icon bg-purple">
                    <i class="fas fa-users"></i>
                </div>
                <div class="dashboard-stat-content">
                    <h4>Users</h4>
                    <h5>18,520</h5> 
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="db-info-list">
                <div class="dashboard-stat-icon bg-red">
                    <i class="far fa-envelope-open"></i>
                </div>
                <div class="dashboard-stat-content">
                    <h4>Enquiry</h4>
                    <h5>19,520</h5> 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="dashboard-box table-opp-color-box">
                <h4>Recent Booking</h4>
                <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>User</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>City</th>
                                <th>Enquiry</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox" checked="checked">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox" checked="checked">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment2.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox" checked="checked">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment3.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox" checked="checked">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment4.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox" checked="checked">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment5.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <div class="col-lg-6">
            <div class="dashboard-box table-opp-color-box">
                <h4>Package Enquiry</h4>
                <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>User</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>City</th>
                                <th>Enquiry</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment2.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment3.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment4.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-input"><input type="checkbox">
                                    <span class="custom-input-field"></span></label>
                                </td>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment5.jpg')}}" alt=""></span>
                                </td>
                                <td><span class="list-enq-name">John Doe</span>
                                </td>
                                <td>12 may</td>
                                <td>Japan</td>
                                <td>
                                    <span class="badge badge-success">15</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>User Details</h4>
                <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Listings</th>
                                <th>Enquiry</th>
                                <th>Bookings</th>
                                <th>Reviews</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment.jpg')}}" alt=""></span>
                                </td>
                                <td><a href="#"><span class="list-name">Kathy Brown</span><span class="list-enq-city">United States</span></a>
                                </td>
                                <td>+01 3214 6522</td>
                                <td>chadengle@dummy.com</td>
                                <td>Australia</td>
                                <td>
                                    <span class="badge badge-primary">02</span>
                                </td>
                                <td>
                                    <span class="badge badge-danger">12</span>
                                </td>
                                <td>
                                    <span class="badge badge-success">24</span>
                                </td>
                                <td>
                                    <span class="badge badge-dark">36</span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment2.jpg')}}" alt=""></span>
                                </td>
                                <td><a href="#"><span class="list-name">Kathy Brown</span><span class="list-enq-city">United States</span></a>
                                </td>
                                <td>+01 3214 6522</td>
                                <td>chadengle@dummy.com</td>
                                <td>Australia</td>
                                <td>
                                    <span class="badge badge-primary">02</span>
                                </td>
                                <td>
                                    <span class="badge badge-danger">12</span>
                                </td>
                                <td>
                                    <span class="badge badge-success">24</span>
                                </td>
                                <td>
                                    <span class="badge badge-dark">36</span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment3.jpg')}}" alt=""></span>
                                </td>
                                <td><a href="#"><span class="list-name">Kathy Brown</span><span class="list-enq-city">United States</span></a>
                                </td>
                                <td>+01 3214 6522</td>
                                <td>chadengle@dummy.com</td>
                                <td>Australia</td>
                                <td>
                                    <span class="badge badge-primary">02</span>
                                </td>
                                <td>
                                    <span class="badge badge-danger">12</span>
                                </td>
                                <td>
                                    <span class="badge badge-success">24</span>
                                </td>
                                <td>
                                    <span class="badge badge-dark">36</span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="list-img"><img src="{{asset('admin_assets/images/comment4.jpg')}}" alt=""></span>
                                </td>
                                <td><a href="#"><span class="list-name">Kathy Brown</span><span class="list-enq-city">United States</span></a>
                                </td>
                                <td>+01 3214 6522</td>
                                <td>chadengle@dummy.com</td>
                                <td>Australia</td>
                                <td>
                                    <span class="badge badge-primary">02</span>
                                </td>
                                <td>
                                    <span class="badge badge-danger">12</span>
                                </td>
                                <td>
                                    <span class="badge badge-success">24</span>
                                </td>
                                <td>
                                    <span class="badge badge-dark">36</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
    <div class="row">      
        <!-- Recent Activity -->
        <div class="col-lg-7 col-12">
            <div class="dashboard-box activities-box">
                <h4>Recent Activities</h4>
                <ul>
                    <li>
                        <i class="far fa-calendar-alt"></i> 
                        <small>5 mins ago</small>
                        <h5>Jane has sent a request for access</h5>
                        <a href="#" class="close-icon"><i class="fas fa-times"></i></a>
                    </li>
                    <li>
                        <i class="far fa-calendar-alt"></i>
                        <small>5 mins ago</small>
                        <h5>Williams has just joined Project X</h5>
                        <a href="#" class="close-icon"><i class="fas fa-times"></i></a>
                    </li>
                    <li>
                        <i class="far fa-calendar-alt"></i>
                        <small>5 mins ago</small>
                        <h5>Williams has just joined Project X</h5>
                        <a href="#" class="close-icon"><i class="fas fa-times"></i></a>
                    </li>
                    <li>
                        <i class="far fa-calendar-alt"></i> 
                        <small>25 mins ago</small>
                        <h5>Kathy Brown left a review on Hotel</h5>
                        <a href="#" class="close-icon"><i class="fas fa-times"></i></a>
                    </li>
                    <li>
                       <i class="far fa-calendar-alt"></i> 
                        <small>25 mins ago</small>
                        <h5>Kathy Brown left a review on Hotel</h5>
                        <a href="#" class="close-icon"><i class="fas fa-times"></i></a>
                    </li>
                    <li>
                        <i class="far fa-calendar-alt"></i>
                        <small>5 mins ago</small>
                        <h5>Williams has just joined Project X</h5>
                        <a href="#" class="close-icon"><i class="fas fa-times"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="dashboard-box report-list">
                <h4>Reports</h4>
                <div class="report-list-content">
                    <div class="date">
                       <h5>Auguest 12</h5>
                    </div>
                    <div class="total-amt">
                        <strong>$1250000</strong>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2356</td>
                                <td>dummy text </td>
                                <td>6,200.00</td>
                            </tr>
                            <tr>
                                <td>4589</td>
                                <td>Lorem Ipsum</td>
                                <td>6,500.00</td>
                            </tr>
                            
                            <tr>
                                <td>3269</td>
                                <td>specimen book</td>
                                <td>6,800.00</td>
                            </tr>                                                    
                            <tr>
                                <td>5126</td>
                                <td>Letraset sheets</td>
                                <td>7,200.00</td>
                            </tr>
                            <tr>
                                <td>7425</td>
                                <td>PageMaker</td>
                                <td>5,900.00</td>
                            </tr>
                            <tr>
                                <td>7425</td>
                                <td>PageMaker</td>
                                <td>5,900.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- site traffic -->
        <div class="col-lg-4">
            <div class="dashboard-box chart-box">
               <h4>Site Traffic</h4>
               <div id="chartContainer" style="height: 250px; width: 100%;"></div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="dashboard-box chart-box">
               <h4>Bar Chart</h4>
               <div id="barchart" style="height: 250px; width: 100%;"></div>
            </div>
        </div>

        <div class="col-lg-4 chart-box">
            <div class="dashboard-box">
               <h4>Search Engine</h4>
               <div id="piechart" style="height: 250px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
<!-- Content / End -->

@endsection