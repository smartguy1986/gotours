@extends('layouts.admin.adminLayout')

@section('content')

    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <h4>Career/Jobs</h4>
                    <p>Here add the jobs of <strong>GoTours</strong></p>
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
                    <h4>Add New Job Requiremeent</h4>
                    <form class="form-horizontal" method="POST" action="{{ route('career.create') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Post Name</label>
                                    <input name="post" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Job Type</label>
                                    <select name="type" class="form-control">
                                        <option value="1">Part Time</option>
                                        <option value="2">Full Time</option>
                                        <option value="3">Contractual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input name="salary" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>No. of Vacancy</label>
                                    <input name="vacancy" class="form-control" type="number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Job Image</label>
                                    <input type="file" name="job_image" class="form-control">
                                    <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Experience</label>
                                    <textarea name="experience" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Requirement</label>
                                    <textarea name="requirement" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="Submit" value="Add Job">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->

@endsection
