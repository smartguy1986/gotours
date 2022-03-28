@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Company Info</h4>
                <p>Here change the basic details of <strong>GoTours</strong></p>

                {{ $company }}

                <p></p>
                <form class="form-horizontal" method="PUT" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input name="company_name" class="form-control" type="text" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company Address</label>
                                <input name="company_address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="company_phone" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="company_email" class="form-control" type="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea name="company_bio" class="form-control"></textarea>
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