@extends('layouts.admin.adminLayout')

@section('content')

    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <h4>Testimonials</h4>
                    <p>Here change the Testimonials of <strong>GoTours</strong></p>
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
                                        <th>Category</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Added On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $dnn)
                                        <tr>
                                            <td data-column="category">{{ $dnn->category }}</td>
                                            <td data-column="question">{!! html_entity_decode($dnn->question) !!}</td>
                                            <td data-column="answer">{!! html_entity_decode($dnn->answer) !!}</td>
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
                                                <a href="{{ URL::route('faqs.edit', [$dnn->id]) }}"><i
                                                        class="fas fa-edit"></i></a> |
                                                <a href="{{ URL::route('faqs.disable', [$dnn->id]) }}"><i
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
