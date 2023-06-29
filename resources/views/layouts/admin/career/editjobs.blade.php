@extends('layouts.admin.adminLayout')

@section('content')
    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>{{ $careers[0]->post }}</h4>
                            <p>Here change the details of <strong>{{ $careers[0]->post }}</strong></p>
                        </div>
                        <div class="col-sm-6 text-end">
                            <span class="pull-righ"><img src="{{ URL::asset('/images/careers/' . $careers[0]->photo) }}"
                                    alt="image" width="200"></span>
                        </div>
                    </div>
                    <p></p>
                    <h4>Edit Job</h4>
                    <form class="form-horizontal" method="POST" action="{{ route('career.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="jobid" value="{{ $careers[0]->id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Post Name</label>
                                    <input name="post" class="form-control" type="text" value="{{ $careers[0]->post }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Job Type</label>
                                    <select name="type" class="form-control">
                                        <option value="1" @if($careers[0]->type=='1') selected @endif>Part Time</option>
                                        <option value="2" @if($careers[0]->type=='2') selected @endif>Full Time</option>
                                        <option value="3" @if($careers[0]->type=='3') selected @endif>Contractual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input name="salary" class="form-control" type="text" value="{{ $careers[0]->salary }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>No. of Vacancy</label>
                                    <input name="vacancy" class="form-control" type="number" value="{{ $careers[0]->vacancy }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Job Image</label>
                                    <input type="hidden" name="old_image" value="{{ $careers[0]->photo }}">
                                    <input type="file" name="job_image" class="form-control">
                                    <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control ckeditor">{!! html_entity_decode($careers[0]->description) !!}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Experience</label>
                                    <textarea name="experience" class="form-control ckeditor">{!! html_entity_decode($careers[0]->experience) !!}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Requirement</label>
                                    <textarea name="requirement" class="form-control ckeditor">{!! html_entity_decode($careers[0]->requirement) !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="Submit" value="Update Job">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->
@endsection
