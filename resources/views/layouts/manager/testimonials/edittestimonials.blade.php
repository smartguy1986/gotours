@extends('layouts.admin.adminLayout')

@section('content')
    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>{{ $testimonials[0]->name }}</h4>
                            <p>Here change the details of <strong>{{ $testimonials[0]->name }}</strong></p>
                        </div>
                        <div class="col-sm-6 text-end">
                            <span class="pull-righ"><img
                                    src="{{ URL::asset('/images/testimonials/' . $testimonials[0]->photo) }}" alt="image"
                                    width="200"></span>
                        </div>
                    </div>
                    <p></p>
                    <h4>Edit testimonials</h4>
                    <form class="form-horizontal" method="POST" action="{{ route('testimonials.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tstid" value="{{ $testimonials[0]->id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Person Name</label>
                                    <input name="name" class="form-control" type="text"
                                        value="{{ $testimonials[0]->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Person Image</label>
                                    <input type="hidden" name="old_image" value="{{ $testimonials[0]->photo }}">
                                    <input type="file" name="tst_image" class="form-control">
                                    <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Person Occupation</label>
                                    <input name="occupation" class="form-control" type="text"
                                        value="{{ $testimonials[0]->occupation }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <select name="rating" class="form-control">
                                        <option value="1" @if($testimonials[0]->rating=='1') selected @endif>*----</option>
                                        <option value="2" @if($testimonials[0]->rating=='2') selected @endif>**---</option>
                                        <option value="3" @if($testimonials[0]->rating=='3') selected @endif>***--</option>
                                        <option value="4" @if($testimonials[0]->rating=='4') selected @endif>****-</option>
                                        <option value="5" @if($testimonials[0]->rating=='5') selected @endif>*****</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control ckeditor">{{ $testimonials[0]->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="Submit" value="Update testimonials">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->
@endsection
