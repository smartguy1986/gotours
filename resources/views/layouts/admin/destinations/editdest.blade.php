@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">   
                <div class="row">
                    <div class="col-sm-6">            
                        <h4>{{ $destinations[0]->name}}</h4>
                        <p>Here change the details of <strong>{{ $destinations[0]->name }}</strong></p>
                    </div> 
                    <div class="col-sm-6 text-end">
                        <span class="pull-righ"><img src="{{URL::asset('/images/destinations/'.$destinations[0]->imageURL)}}" alt="image" width="200"></span>
                    </div>
                </div>
                <p></p>
                <h4>Edit Destinations</h4>
                <form class="form-horizontal" method="POST" action="{{ route('destinations.update') }}" enctype="multipart/form-data">
                    @csrf      
                    <input type="hidden" name="dstid" value="{{ $destinations[0]->id }}">   
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Destination Name</label>
                                <input name="name" class="form-control" type="text" value="{{ $destinations[0]->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Destination Image</label>
                                <input type="hidden" name="old_image" value="{{ $destinations[0]->imageURL}}">
                                <input type="file" name="dst_image" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tagline</label>
                                <input name="tagline" class="form-control" type="text" value="{{ $destinations[0]->tagline}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>H/O Phone</label>
                                <input name="head_office_phone" class="form-control" type="text" value="{{ $destinations[0]->head_office_phone}}">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>H/O Address</label>
                                <input name="head_office_address" class="form-control" type="text" value="{{ $destinations[0]->head_office_address}}">
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Featured ?</label>
                                Yes <input class="form-input-control" type="radio" name="featured" value="1" style="width: auto !important;" @if($destinations[0]->featured == 1) checked @endif> | 
                                No <input class="form-input-control" type="radio" name="featured" value="0" style="width: auto !important;" @if($destinations[0]->featured == 0) checked @endif>
                            </div>
                        </div>                   
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $destinations[0]->description}}</textarea>
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