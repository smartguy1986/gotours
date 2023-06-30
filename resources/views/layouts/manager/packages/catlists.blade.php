@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <div class="cart-list-inner">
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
                </div>
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection