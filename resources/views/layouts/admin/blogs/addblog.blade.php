@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Blog Articles </h4>
                <p>Here add the package of <strong>GoTours</strong></p>                
                <p></p>
                @if ($message = Session::get('error'))
                    <ul class="warning-error">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif
                <h4>Add Blog</h4>
                <form class="form-horizontal" method="POST" action="{{ route('blog.save') }}" enctype="multipart/form-data">
                    @csrf               
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control dropdown" name="blog_category">
                                    <option value="Food">Food</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Weekend">Weekend</option>
                                    <option value="Destination">Destination</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="International">International</option>
                                    <option value="Trekking">Trekking</option>
                                </select>
                                @error('blog_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                        
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control" type="text">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Banner Image</label>
                                <input type="file" name="blog_banner" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                @error('blog_banner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Blog Image</label>
                                <input type="file" name="blog_image" class="form-control">
                                <label>*Image must be less than 2MB in size, and upload only jpg, png, gif only</label>
                                @error('blog_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_desc" class="form-control"></textarea>
                                @error('short_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="blog_content" class="form-control ckeditor"></textarea>
                                @error('blog_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-sm-4">
                            <div class="form-group">
                                <label>Status</label>
                                Draft <input class="form-input-control" type="radio" name="status" value="0" style="width: auto !important;"> | 
                                Request to Publish <input class="form-input-control" type="radio" name="status" value="1" style="width: auto !important;">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>      --}}
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tags</label>
                                <input name="tags[]" class="form-control" data-role="tagsinput" type="text">
                                @error('tags')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                        
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Create Blog">
                </form>
                
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection