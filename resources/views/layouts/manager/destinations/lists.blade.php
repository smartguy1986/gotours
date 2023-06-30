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

                {{-- <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
  
                <p></p>
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
                                    <th>Featured</th>
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
                                    <td data-column="featured" class="count-input">@if($dnn->featured == 1) Yes @else No @endif</td>
                                    <td data-column="added_on">{{ date('dS M, Y', strtotime($dnn->created_at)) }}</td>
                                    <td data-column="action">
                                        <a href="{{ URL:: route('destinations.edit', [$dnn->id])}}"><i class="fas fa-edit"></i></a> | 
                                        <a href="{{ URL:: route('destinations.disable', [$dnn->id])}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                  
                
                
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection