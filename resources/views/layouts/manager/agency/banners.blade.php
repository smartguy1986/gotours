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

                {{-- <p></p>
                {{ $banners }}
                <p></p> --}}

                <div class="cart-list-inner">
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Tagline</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Added On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $bnn)
                                <tr>
                                    <td class=""><span class="cartImage"><img src="{{URL::asset('/images/banners/'.$bnn->imageURL)}}" alt="image" width="200"></span></td>
                                    <td data-column="tagline">{{ $bnn->tagline }}</td>
                                    <td data-column="description">{{ $bnn->description }}</td>
                                    <td data-column="status" class="count-input">@if($bnn->status == 1) Active @else Inactive @endif</td>
                                    <td data-column="added_on">{{ date('dS M, Y', strtotime($bnn->created_at)) }}</td>
                                    <td data-column="action">
                                        {{-- <a href="#"><i class="fas fa-edit"></i></a> |  --}}
                                        <a href="{{ URL:: route('company.banners.delete', [$bnn->id, $bnn->imageURL])}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                  
                <p></p>
                <h4>Add New Banners</h4>
                <form class="form-horizontal" method="POST" action="{{ route('company.banners.store') }}" enctype="multipart/form-data">
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
                                <input type="file" name="banner_image" class="form-control">
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