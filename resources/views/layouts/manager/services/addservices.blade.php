@extends('layouts.admin.adminLayout')

@section('content')

    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <h4>Services</h4>
                    <p>Here change the services of <strong>GoTours</strong></p>
                    <p></p>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        <p></p>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
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

                    <p></p>
                    <h4>Add New Service</h4>
                    <form class="form-horizontal" method="POST" action="{{ route('services.create') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Service Name</label>
                                    <input name="title" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Service Image</label>
                                    <input type="file" name="srv_image" class="form-control">
                                    <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="Submit" value="Create Service">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->

@endsection
