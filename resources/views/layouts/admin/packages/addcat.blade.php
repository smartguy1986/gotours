@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Package Categories</h4>
                <p>Here change the package category of <strong>GoTours</strong></p>                
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
                <h4>Add Packages Categories</h4>
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
                    <input type="submit" name="Submit" value="Add Category">
                </form>
                <p></p>
                {{-- <div class="cart-list-inner">
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Tagline</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Added On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                <tr>
                                    <td class=""><span class="cartImage"><img src="{{URL::asset('/images/categories/'.$cat->cat_image)}}" alt="image" width="200"></span></td>
                                    <td data-column="tagline">{{ $cat->cat_name }}</td>
                                    <td data-column="tagline">{{ $cat->cat_tagline }}</td>
                                    <td data-column="tagline">{{ $cat->cat_description }}</td>
                                    <td data-column="featured" class="count-input">@if($cat->status == 1) Active @else Inactive @endif</td>
                                    <td data-column="added_on">{{ date('dS M, Y', strtotime($cat->created_at)) }}</td>
                                    <td data-column="action">
                                        <a href="{{ URL:: route('categories.edit', [$cat->id])}}"><i class="fas fa-edit"></i></a> | 
                                        <a href="{{ URL:: route('categories.disable', [$cat->id])}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                 --}}
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection