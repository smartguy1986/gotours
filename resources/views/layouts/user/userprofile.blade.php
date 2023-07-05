@extends('layouts.user.userLayout')

@section('content')
    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box user-form-wrap">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>{{ Auth::user()->name }}</h4>
                            <p>Here change your profile details</p>
                        </div>
                        <div class="col-sm-6 text-end">
                            <span class="pull-righ"><img src="{{ URL::asset('/images/users/' . $user->profileimage) }}"
                                    alt="image" width="200"></span>
                        </div>
                    </div>
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
                    <h4>Edit Info</h4>
                    <form class="form-horizontal" method="POST" action="{{ URL::to('/user/update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uid" value="{{ $user->id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input name="name" class="form-control" type="text" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" type="email" value="{{ $user->email }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" class="form-control"
                                        value="{{ date('Y-m-d', strtotime($user->dob)) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <h4>Contact Details</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input name="phonenum" id="input-phone" class="form-control"
                                        value="{{ $user->phonenum }}" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" id="input-address" class="form-control"
                                        value="{{ $user->address }}" type="text">
                                </div>
                            </div>

                            <div class="col-12">
                                <h4>Upload Profile Photo</h4>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="old_img" value="{{ $user->profileimage }}">
                                    <input type="file" name="new_img" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>Describe Yourself</h4>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Please Tell Us About You</label>
                                    <textarea class="form-control ckeditor" id="bio" name="bio" required>{{ $user->bio }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button-primary">Upload Profile</button>
                    </form>
                    <!-- Content / End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->
@endsection
