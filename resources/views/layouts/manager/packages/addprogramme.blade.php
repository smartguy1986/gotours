@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                {{-- {{ $packages }} --}}
                <h4><a href="{{ URL:: route('packages.list') }}" class="orange-link">Packages</a> <i class="fas fa-angle-double-left"></i>  Add Programme</h4>
                <p>Here add the programme schedule of <strong>{{ $packages[0]->title }}</strong></p>                
                <p></p>

                @if($packages[0]->nights > $packages[0]->days) 
                    @php
                        $duration = $packages[0]->nights
                    @endphp 
                @else
                    @php
                        $duration = $packages[0]->days
                    @endphp
                @endif

                @if (Session::get('error'))
                    <ul class="alert alert-success">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif

                <h4>Add Programme</h4>
                <form class="form-horizontal" method="POST" action="{{ route('packages.programme.save') }}" enctype="multipart/form-data">
                    @csrf               
                    <div class="row">
                        <input type="hidden" name="package_id" value="{{ $packages[0]->id }}">
                        <input type="hidden" name="total_loop" value="{{ $duration }}">
                        @for ($i = 1; $i<= $duration; $i++)
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Day</label>
                                    <input name="day[]" class="form-control" type="number" value="{{ $i }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title[]" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description[]" class="form-control"></textarea>
                                </div>
                            </div>
                        @endfor 

                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Upload Programme">
                </form>
                
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection