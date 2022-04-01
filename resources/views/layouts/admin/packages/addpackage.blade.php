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
                <form class="form-horizontal" method="POST" action="{{ route('packages.save') }}" enctype="multipart/form-data">
                    @csrf               
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control dropdown" name="category">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Tagline</label>
                                <input name="tagline" class="form-control" type="text">
                            </div>
                        </div>   
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Banner Image</label>
                                <input type="file" name="banner" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Package Image</label>
                                <input type="file" name="imgURL" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Duration Days</label>
                                <select class="form-control dropdown" name="days">
                                    @for ($i = 1; $i <= 15; $i++)
                                    <option value="{{ $i }}">{{ $i }} Days</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control dropdown" name="nights">
                                    @for ($j = 1; $j <= 15; $j++)
                                    <option value="{{ $j }}">{{ $j }} Nights</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Minimum Group</label>
                                <select class="form-control dropdown" name="mingroup">
                                    <option value="Solo">Solo</option>
                                    <option value="Couple">Couple</option>
                                    <option value="Family">Family</option>
                                    <option value="People : 4">People : 4</option>
                                    <option value="People : 6">People : 6</option>
                                    <option value="People : 10">People : 10</option>
                                    <option value="Customizable Group">Customizable Group</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Destination</label>
                                <select class="form-control dropdown" name="destinations">
                                    @foreach ($destinations as $dst)
                                        <option value="{{ $dst->id }}">{{ $dst->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input name="contact_person" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" class="form-control" type="text">
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" class="form-control" type="text">
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" class="form-control" type="number">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Is Sale</label>
                                No <input class="form-input-control" type="radio" name="is_sale" value="0" style="width: auto !important;"> | 
                                Yes <input class="form-input-control" type="radio" name="is_sale" value="1" style="width: auto !important;">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Sale Price</label>
                                <input name="sale_price" class="form-control" type="number">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Status</label>
                                Active <input class="form-input-control" type="radio" name="status" value="1" style="width: auto !important;"> | 
                                Inactive <input class="form-input-control" type="radio" name="status" value="0" style="width: auto !important;">
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