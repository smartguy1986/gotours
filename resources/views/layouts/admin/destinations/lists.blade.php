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

                <div class="cart-list-inner">
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Destination</th>
                                    <th>Tagline</th>
                                    <th>Description</th>
                                    <th>H/O Address</th>
                                    <th>H/O Phone</th>
                                    <th>Status</th>
                                    <th>Added On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($destinations as $dnn)
                                <tr>
                                    <td class=""><span class="cartImage"><img src="{{URL::asset('/images/destinations/'.$dnn->imageURL)}}" alt="image" width="200"></span></td>
                                    <td data-column="tagline">{{ $dnn->name }}</td>
                                    <td data-column="tagline">{{ $dnn->tagline }}</td>
                                    <td data-column="tagline">{{ $dnn->description }}</td>
                                    <td data-column="tagline">{{ $dnn->head_office_address }}</td>
                                    <td data-column="description">{{ $dnn->head_office_phone }}</td>
                                    <td data-column="status" class="count-input">@if($dnn->status == 1) Active @else Inactive @endif</td>
                                    <td data-column="added_on">{{ date('dS M, Y', strtotime($dnn->created_at)) }}</td>
                                    <td data-column="action">
                                        {{-- <a href="#"><i class="fas fa-edit"></i></a> |  --}}
                                        <a href="{{ URL:: route('company.banners.delete', [$dnn->id, $dnn->imageURL])}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                  
                <p></p>
                <h4>Add New Banners</h4>
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>H/O Address</label>
                                <input name="head_office_address" class="form-control" type="text">
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