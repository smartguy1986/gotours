@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">   
                <div class="row">
                    <div class="col-sm-6">            
                        <h4>{{ $services[0]->title}}</h4>
                        <p>Here change the details of <strong>{{ $services[0]->title }}</strong></p>
                    </div> 
                    <div class="col-sm-6 text-end">
                        <span class="pull-righ"><img src="{{URL::asset('/images/services/'.$services[0]->photo)}}" alt="image" width="200"></span>
                    </div>
                </div>
                <p></p>
                <h4>Edit services</h4>
                <form class="form-horizontal" method="POST" action="{{ route('services.update') }}" enctype="multipart/form-data">
                    @csrf      
                    <input type="hidden" name="srvid" value="{{ $services[0]->id }}">   
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Service Name</label>
                                <input name="title" class="form-control" type="text" value="{{ $services[0]->title}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Service Image</label>
                                <input type="hidden" name="old_image" value="{{ $services[0]->photo}}">
                                <input type="file" name="srv_image" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                            </div>
                        </div>              
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control ckeditor">{{ $services[0]->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Update Services">
                </form>
                
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection