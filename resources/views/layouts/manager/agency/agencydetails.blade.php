@extends('layouts.manager.managerLayout')

@section('content')
    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <h4>Agency Info</h4>
                    <p>Here change the basic details of your agency</p>
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
                    <div class="row">
                        @if ($agencies)
                            <div class="col-sm-6">
                                <span class="pull-righ"><img
                                        src="{{ URL::asset('/images/agencies/' . $agencies->agency_logo) }}"
                                        alt="image" width="200"></span>
                            </div>
                            <div class="col-sm-6">
                                <span class="pull-righ"><img
                                        src="{{ URL::asset('/images/agencies/' . $agencies->agency_banner) }}"
                                        alt="image" width="200"></span>
                            </div>
                        @endif
                    </div>
                    <p>Your Agency details are empty, please add them below</p>
                    <p></p>
                    <form class="form-horizontal" method="POST"
                        action="@if ($agencies) {{ route('agencies.update') }} @else {{ route('agencies.save') }} @endif"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if ($agencies)
                                <input type="hidden" name="agn_id" value="{{ $agencies->id }}">
                            @endif
                            <input type="hidden" name="manager_id" value="{{ Auth::user()->id }}">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Agency Name</label>
                                    <input name="agency_name" class="form-control" type="text"
                                        @if ($agencies) value="{{ $agencies->agency_name }}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Agency Logo</label>
                                    @if ($agencies)
                                        <input type="hidden" name="old_agn" value="{{ $agencies->agency_logo }}">
                                    @endif
                                    <input type="file" name="agn_image" class="form-control">
                                    <label>*Image must be less than 2MB in size, and upload only jpg, png, gif
                                        only</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Agency Banner</label>
                                    @if ($agencies)
                                        <input type="hidden" name="old_agnb" value="{{ $agencies->agency_banner }}">
                                    @endif
                                    <input type="file" name="agnb_image" class="form-control">
                                    <label>*Image must be less than 2MB in size, and upload only jpg, png, gif
                                        only</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea name="agency_bio" class="form-control ckeditor">
@if ($agencies)
{{ $agencies->agency_bio }}
@endif
</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="agency_description" class="form-control ckeditor">
@if ($agencies)
{{ $agencies->agency_description }}
@endif
</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="agency_email" class="form-control" type="email"
                                        @if ($agencies) value="{{ $agencies->agency_email }}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="agency_phone" class="form-control" type="text"
                                        @if ($agencies) value="{{ $agencies->agency_phone }}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Agency Address</label>
                                    <input name="agency_address" class="form-control" type="text"
                                        @if ($agencies) value="{{ $agencies->agency_address }}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <input name="agency_contact" class="form-control" type="text"
                                        @if ($agencies) value="{{ $agencies->agency_contact }}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Agency GST No.</label>
                                    <input name="agency_gstnumber" class="form-control" type="text"
                                        @if ($agencies) value="{{ $agencies->agency_gstnumber }}" @endif>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="Submit" value="Update Details">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->
@endsection
