@extends('layouts.admin.adminLayout')

@section('content')

    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <h4>Jobs List</h4>
                    {{-- <p>Here change the Testimonials of <strong>GoTours</strong></p> --}}
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
                    <div class="cart-list-inner">
                        <div class="table-responsive table-striped">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Post</th>
                                        <th>Type</th>
                                        <th>Salary</th>
                                        <th># Vacancy</th>
                                        <th>Description</th>
                                        <th>Experience</th>
                                        <th>Requirement</th>
                                        <th>Status</th>
                                        <th>Added On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($careers as $dnn)
                                        <tr>
                                            <td class=""><span class="cartImage"><img
                                                        src="{{ URL::asset('/images/careers/' . $dnn->photo) }}"
                                                        alt="image" width="200"></span></td>
                                            <td data-column="post">{{ $dnn->post }}</td>
                                            <td data-column="type">@if($dnn->type=='1') Part Time @elseif($dnn->type='2') Full Time @else Contractual @endif</td>.
                                            <td data-column="salarty">{{ $dnn->salary }}</td>
                                            <td data-column="vacancy">{{ $dnn->vacancy }}</td>
                                            <td data-column="description">{!! html_entity_decode(Str::limit($dnn->description, 100)) !!}</td>
                                            <td data-column="experience">{!! html_entity_decode(Str::limit($dnn->experience, 100)) !!}</td>
                                            <td data-column="requirement">{!! html_entity_decode(Str::limit($dnn->requirement, 100)) !!}</td>
                                            <td data-column="status" class="count-input">
                                                @if ($dnn->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td data-column="added_on">{{ date('dS M, Y', strtotime($dnn->created_at)) }}
                                            </td>
                                            <td data-column="action">
                                                <a href="{{ URL::route('career.edit', [$dnn->id]) }}"><i
                                                        class="fas fa-edit"></i></a> |
                                                <a href="{{ URL::route('career.disable', [$dnn->id]) }}"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->

@endsection
