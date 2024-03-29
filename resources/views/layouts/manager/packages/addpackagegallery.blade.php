@extends('layouts.manager.managerLayout')

@section('content')
    <style>
        input[type="checkbox"] {
            z-index: 1;
            opacity: 1;
        }
    </style>
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
                        {{ Session::forget('success') }}
                        <p></p>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                        {{ Session::forget('error') }}
                        <p></p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4>Add Images</h4>
                    <div class="row">
                        <div class="container-fluid">
                            @if (Auth::user()->type == 'manager')
                                <form class="form-horizontal" method="POST"
                                    action="{{ route('packages.gallery.save.manager') }}" enctype="multipart/form-data">
                                @else
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('packages.gallery.save') }}" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gallery Image</label>
                                        <input type="hidden" name="packageid" value="{{ $packages[0]->id }}">
                                        <input type="file" name="gallery[]" class="form-control" multiple>
                                        <label>*Image must be less than 2MB in size, and upload only jpg, png, gif
                                            only</label>
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
                            <form class="form-horizontal" method="POST" action="{{ route('packages.gallery.delete') }}"
                                enctype="multipart/form-data" style="width:100%; display:contents;">
                                @csrf
                                <input type="hidden" name="pid" value="{{ $packages[0]->id }}">
                                <div class="row">
                                    <div class="container-fluid">
                                        @foreach ($gallery as $galimg)
                                            <div class="card-container">
                                                <div class="img-container">
                                                    <img src="{{ URL::asset('/images/packages/gallery/' . $galimg->imageURL) }}"
                                                        alt="image" class="backend-gallery-image">
                                                </div>
                                                <div class="action-container">
                                                    Delete ? <input type="checkbox" name="galid[]"
                                                        value="{{ $galimg->id }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="gallery-delete-container text-end">
                                            @if (COUNT($gallery) > 0)
                                                <input class="float-right" type="submit" name="Submit"
                                                    value="Delete Selected">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->
@endsection
