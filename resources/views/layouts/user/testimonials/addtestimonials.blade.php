@extends('layouts.admin.adminLayout')

@section('content')

    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <h4>Testimonials</h4>
                    <p>Here change the testimonials of <strong>GoTours</strong></p>
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

                    <p></p>
                    <h4>Add New Testimonial</h4>
                    <form class="form-horizontal" method="POST" action="{{ route('testimonials.create') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Person Name</label>
                                    <input name="name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Occupation</label>
                                    <input name="occupation" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Person Image</label>
                                    <input type="file" name="tst_image" class="form-control">
                                    <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <select name="rating" class="form-control">
                                        <option value="1">*----</option>
                                        <option value="2">**---</option>
                                        <option value="3">***--</option>
                                        <option value="4">****-</option>
                                        <option value="5">*****</option>
                                    </select>
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
                        <input type="submit" name="Submit" value="Add Testimonial">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->

@endsection
