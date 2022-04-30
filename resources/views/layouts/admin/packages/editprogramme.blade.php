@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                {{-- {{ $packages }} --}}
                <h4>Edit Programme</h4>
                <p>Here Edit the programme schedule of <strong>{{ $packages[0]->title }}</strong></p>                
                <p></p>
                {{-- {{ $programms }} --}}
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

                <h4>Edit Programme</h4>
                <form class="form-horizontal" method="POST" action="{{ route('packages.programme.update') }}" enctype="multipart/form-data">
                    @csrf               
                    <div class="row">
                        <input type="hidden" name="package_id" value="{{ $packages[0]->id }}">
                        <input type="hidden" name="total_loop" value="{{ $duration }}">
                        @for ($i = 0; $i<= ($duration-1); $i++)
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Day</label>
                                    <input name="day[]" class="form-control" type="number" value="{{ $i+1 }}" readonly>
                                    <input name="progid[]" class="form-control" type="hidden" @if(isset($programms[$i]->id)) value="{{ $programms[$i]->id }}" @endif readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title[]" class="form-control" type="text" @if(isset($programms[$i]->title)) value="{{ $programms[$i]->title }}" @endif>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description[]" class="form-control">@if(isset($programms[$i]->description)) {{ $programms[$i]->description }} @endif</textarea>
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