@extends('layouts.manager.managerLayout')

@section('content')
    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <h4>Package </h4>
                    <p>Here add the package of <strong>GoTours</strong></p>
                    <p></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <h4><a href="{{ URL::route('packages.list') }}" class="orange-link">Packages</a> <i
                            class="fas fa-angle-double-left"></i> Edit Packages</h4>
                    {{-- {{ $packages }} --}}
                    @if (Auth::user()->type == 'manager')
                        <form class="form-horizontal" method="POST" action="{{ route('packages.update.manager') }}"
                            enctype="multipart/form-data">
                        @else
                            <form class="form-horizontal" method="POST" action="{{ route('packages.update') }}"
                                enctype="multipart/form-data">
                    @endif
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $packages[0]->id }}">
                    <input type="hidden" name="agency_id" value="{{ Session::get('managerData')->id }}">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control dropdown" name="category">
                                    @foreach ($categories as $cat)
                                        @if ($cat->id == $packages[0]->category)
                                            <option value="{{ $cat->id }}" selected>{{ $cat->cat_name }}</option>
                                        @else
                                            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control" type="text"
                                    value="{{ $packages[0]->title }}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Tagline</label>
                                <input name="tagline" class="form-control" type="text"
                                    value="{{ $packages[0]->tagline }}">
                                @error('tagline')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Banner Image</label>
                                <input type="hidden" name="oldbanner" class="form-control"
                                    value="{{ $packages[0]->banner }}">
                                <input type="file" name="banner" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                @error('banner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Package Image</label>
                                <input type="hidden" name="oldimage" class="form-control"
                                    value="{{ $packages[0]->imageURL }}">
                                <input type="file" name="imageURL" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                @error('imageURL')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Duration Days</label>
                                <select class="form-control dropdown" name="days">
                                    @for ($i = 1; $i <= 15; $i++)
                                        <option {{ $packages[0]->days == $i ? 'selected' : null }} value="{{ $i }}">
                                            {{ $i }} Days</option>
                                    @endfor
                                </select>
                                @error('days')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Duration Nights</label>
                                <select class="form-control dropdown" name="nights">
                                    @for ($j = 1; $j <= 15; $j++)
                                        <option value="{{ $j }}"
                                            {{ $packages[0]->nights == $j ? 'selected' : null }}>{{ $j }} Nights
                                        </option>
                                    @endfor
                                </select>
                                @error('nights')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Minimum Group</label>
                                <select class="form-control" aria-label="Default select example" name="mingroup">
                                    <option value="Solo" {{ $packages[0]->mingroup == 'Solo' ? 'selected' : '' }}>Solo
                                    </option>
                                    <option value="Couple" {{ $packages[0]->mingroup == 'Couple' ? 'selected' : '' }}>
                                        Couple</option>
                                    <option value="Family" {{ $packages[0]->mingroup == 'Family' ? 'selected' : '' }}>
                                        Family</option>
                                    <option value="People : 4"
                                        {{ $packages[0]->mingroup == 'People : 4' ? 'selected' : '' }}>People : 4
                                    </option>
                                    <option value="People : 6"
                                        {{ $packages[0]->mingroup == 'People : 6' ? 'selected' : '' }}>People : 6
                                    </option>
                                    <option value="People : 10"
                                        {{ $packages[0]->mingroup == 'People : 10' ? 'selected' : '' }}>People : 10
                                    </option>
                                    <option value="Customizable Group"
                                        {{ $packages[0]->mingroup == 'Customizable Group' ? 'selected' : '' }}>
                                        Customizable Group</option>
                                </select>
                                @error('mingroup')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Destination</label>
                                <select class="form-control dropdown" name="destinations">
                                    @foreach ($destinations as $dst)
                                        <option @if ($packages[0]->destination == $dst->id) selected @endif
                                            value="{{ $dst->id }}">{{ $dst->name }}</option>
                                    @endforeach
                                </select>
                                @error('destinations')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="descriptions" class="form-control ckeditor">{{ $packages[0]->descriptions }}</textarea>
                                @error('descriptions')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input name="contact_person" class="form-control" type="text"
                                    value="{{ $packages[0]->contact_person }}">
                                @error('contact_person')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" class="form-control" type="text"
                                    value="{{ $packages[0]->phone }}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" class="form-control" type="text"
                                    value="{{ $packages[0]->address }}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" class="form-control" type="number"
                                    value="{{ $packages[0]->price }}">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Is Sale</label>
                                No <input class="form-input-control" type="radio" name="is_sale" value="0"
                                    style="width: auto !important;" {{ $packages[0]->is_sale == '0' ? 'checked' : null }}> |
                                Yes <input class="form-input-control" type="radio" name="is_sale" value="1"
                                    style="width: auto !important;" {{ $packages[0]->is_sale == '1' ? 'checked' : null }}>
                                @error('is_sale')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Sale Price</label>
                                <input name="sale_price" class="form-control" type="number"
                                    value="{{ $packages[0]->sale_price }}">
                                @error('sale_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Status</label>
                                Active <input class="form-input-control" type="radio" name="status" value="1"
                                    style="width: auto !important;" @if ($packages[0]->status == 1) checked @endif> |
                                Inactive <input class="form-input-control" type="radio" name="status" value="0"
                                    style="width: auto !important;" @if ($packages[0]->status == 0) checked @endif>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Update Package">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->
@endsection
