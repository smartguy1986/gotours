@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Package </h4>
                <p>Here add the package of <strong>GoTours</strong></p>                
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
                
                <h4>Add Packages</h4>
                <form class="form-horizontal" method="POST" action="{{ route('packages.save.category') }}" enctype="multipart/form-data">
                    @csrf               
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input name="cat_name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category Image</label>
                                <input type="file" name="cat_image" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Tagline</label>
                                <input name="cat_tagline" class="form-control" type="text">
                            </div>
                        </div>   
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Status</label>
                                Active <input class="form-input-control" type="radio" name="status" value="1" style="width: auto !important;"> | 
                                Inactive <input class="form-input-control" type="radio" name="status" value="0" style="width: auto !important;">
                            </div>
                        </div>                
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="cat_description" class="form-control"></textarea>
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