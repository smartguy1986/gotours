@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Home Page Banners</h4>
                <p>Here change the banners and content of <strong>GoTours</strong> Home Page</p>                
                <p></p>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                <p></p>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                <p></p>
                @endif

                <p></p>
                {{ $banners }}
                <p></p>

                {{-- @foreach ($banners as $bnn) --}}
                <div class="cart-list-inner">
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tagline</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Added On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class=""><span class="cartImage"><img src="assets/images/img5.jpg" alt="image"></span></td>
                                    <td data-column="tagline">Sunset view of beautiful lakeside resident</td>
                                    <td data-column="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                    <td data-column="status" class="count-input">Active</td>
                                    <td data-column="added_on">20th Mar, 2022</td>
                                    <td data-column="action"><a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <tr>
                                    <td class=""><span class="cartImage"><img src="assets/images/img5.jpg" alt="image"></span></td>
                                    <td data-column="tagline">Sunset view of beautiful lakeside resident</td>
                                    <td data-column="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                    <td data-column="status" class="count-input">Active</td>
                                    <td data-column="added_on">20th Mar, 2022</td>
                                    <td data-column="action"><a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <tr>
                                    <td class=""><span class="cartImage"><img src="assets/images/img5.jpg" alt="image"></span></td>
                                    <td data-column="tagline">Sunset view of beautiful lakeside resident</td>
                                    <td data-column="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                    <td data-column="status" class="count-input">Active</td>
                                    <td data-column="added_on">20th Mar, 2022</td>
                                    <td data-column="action"><a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                  {{-- @endforeach --}}
                <p></p>
                <h4>Add New Banners</h4>
                <form class="form-horizontal" method="POST" action="{{ route('company.banners.store') }}">
                    @csrf               
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tagline</label>
                                <input name="tagline" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Banner Image</label>
                                <input name="banner_image" class="form-control" type="file">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Upload Banner">
                </form>
                
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection