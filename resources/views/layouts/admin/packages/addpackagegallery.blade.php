@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Gallery </h4>
                <p>Here add the images of a Package <strong>GoTours</strong></p>                
                <p></p>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                <p></p>
                @endif
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
                <h4>Add Images</h4>
                <div class="row">
                    <div class="container-fluid">
                        <form class="form-horizontal" method="POST" action="{{ route('packages.gallery.save') }}" enctype="multipart/form-data">
                            @csrf               
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gallery Image</label>
                                        <input type="hidden" name="packageid" value="{{ $packages[0]->id }}">
                                        <input type="file" name="gallery[]" class="form-control" multiple>
                                        <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                        @error('gallery')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>             
                            </div>
                            <input type="submit" name="Submit" value="Upload Gallery">
                        </form>
                    </div>
                </div>
                <br><br>
                {{-- {{ $gallery }} --}}
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach ($gallery as $galimg)
                                <div class="col-sm-3">
                                    <img src="{{URL::asset('/images/packages/gallery/'.$galimg->imageURL)}}" alt="image" class="backend-gallery-image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>                
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection