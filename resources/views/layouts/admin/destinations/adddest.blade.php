@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Destinations</h4>
                <p>Here change the destinations of <strong>GoTours</strong></p>                
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
                <h4>Add New Destinations</h4>
                <form class="form-horizontal" method="POST" action="{{ route('destinations.create') }}" enctype="multipart/form-data">
                    @csrf               
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Destination Name</label>
                                <input name="name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Destination Image</label>
                                <input type="file" name="dst_image" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tagline</label>
                                <input name="tagline" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>H/O Phone</label>
                                <input name="head_office_phone" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>H/O Address</label>
                                <input name="head_office_address" class="form-control" type="text">
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Featured ?</label>
                                Yes <input class="form-input-control" type="radio" name="featured" value="1" style="width: auto !important;"> | 
                                No <input class="form-input-control" type="radio" name="featured" value="0" style="width: auto !important;">
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
                    <input type="submit" name="Submit" value="Create Destination">
                </form>
                
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection