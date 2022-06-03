@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Blog Articles </h4>
                <p>Here edit the package of <strong>GoTours</strong></p>                
                <p></p>
                @if ($message = Session::get('error'))
                    <ul class="warning-error">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif
                {{-- {{ $blogs }} --}}
                <h4>Edit Blog</h4>
                <form class="form-horizontal" method="POST" action="{{ route('blog.update') }}" enctype="multipart/form-data">
                    @csrf               
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $blogs[0]->id }}">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control dropdown" name="blog_category">
                                    <option value="Food" @if ($blogs[0]->blog_category=='Food') selected @endif>Food</option>
                                    <option value="Travel" @if ($blogs[0]->blog_category=='Travel') selected @endif>Travel</option>
                                    <option value="Weekend" @if ($blogs[0]->blog_category=='Weekend') selected @endif>Weekend</option>
                                    <option value="Destination" @if ($blogs[0]->blog_category=='Destination') selected @endif>Destination</option>
                                    <option value="Adventure" @if ($blogs[0]->blog_category=='Adventure') selected @endif>Adventure</option>
                                    <option value="International" @if ($blogs[0]->blog_category=='International') selected @endif>International</option>
                                    <option value="Trekking" @if ($blogs[0]->blog_category=='Trekking') selected @endif>Trekking</option>
                                </select>
                                @error('blog_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                        
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" class="form-control" type="text" value="{{ $blogs[0]->title }}">
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
                                <input name="old_blog_banner" class="form-control" type="hidden" value="{{ $blogs[0]->blog_banner }}">
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
                                <input name="old_blog_image" class="form-control" type="hidden" value="{{ $blogs[0]->blog_image }}">
                            </div>
                        </div>                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_desc" class="form-control">{{ $blogs[0]->short_desc }}</textarea>
                                @error('short_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="blog_content" class="form-control ckeditor">{{ $blogs[0]->blog_content }}</textarea>
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
                                <?php $tags = implode(',',json_decode($blogs[0]->tags));?>
                                <input name="tags[]" class="form-control" data-role="tagsinput" type="text"  value="{{ $tags }}">
                                @error('tags')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                        
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Update Blog">
                </form>
                
            </div>
        </div>  
    </div>
</div>
<!-- Content / End -->

@endsection