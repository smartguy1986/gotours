@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Packages</h4>
                <p>Here list of all the packages of <strong>GoTours</strong></p>                
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
                <div class="cart-list-inner">
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Banner</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Tagline</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Group</th>
                                    <th>Contact</th>
                                    <th>Price</th>
                                    <th>Is Sale</th>
                                    <th>Sale Price</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Programme</th>
                                    <th>Gallery</th>
                                    <th>Added On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $pck)
                                <tr>
                                    <td class=""><span class="cartImage"><img src="{{URL::asset('/images/packages/'.$pck->banner)}}" alt="image" width="200"></span></td>
                                    <td class=""><span class="cartImage"><img src="{{URL::asset('/images/packages/'.$pck->imageURL)}}" alt="image" width="200"></span></td>
                                    <td data-column="tagline">{{ $pck->title }}</td>
                                    <td data-column="tagline">{{ $pck->tagline }}</td>
                                    <td data-column="tagline">{{ $pck->description }}</td>
                                    <td data-column="tagline">{{ $pck->duration }}</td>
                                    <td data-column="tagline">{{ $pck->group }}</td>
                                    <td data-column="tagline">{{ $pck->contact_person }} <br> ({{ $pck->address }}) <br> {{ $pck->phone }}</td>
                                    <td data-column="description">{{ $pck->price }}</td>
                                    <td data-column="status" class="count-input">@if($pck->is_sale == 1) Yes @else No @endif</td>
                                    <td data-column="description">{{ $pck->sale_price }}</td>
                                    <td data-column="description">{{ $pck->discount }}</td>
                                    <td data-column="featured" class="count-input">@if($pck->status == 1) Active @else Inactive @endif</td>
                                    <td data-column="description"><a href="{{ URL:: route('destinations.edit', [$dnn->id])}}"><i class="fa-solid fa-list-check"></i> Programme</a></td>
                                    <td data-column="description"><a href="{{ URL:: route('destinations.edit', [$dnn->id])}}"><i class="fa-solid fa-gallery-thumbnails"></i> Gallery</a></td>
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