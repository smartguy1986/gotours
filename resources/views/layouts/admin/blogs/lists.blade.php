@extends('layouts.admin.adminLayout')

@section('content')

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>Blog Articles</h4>
                <p>Here list of all the blogs of <strong>GoTours</strong></p>                
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
                {{-- {{ $blogs }} --}}
                <p></p>
                <div class="cart-list-inner">
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Banner</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Tags</th>
                                    <th>Short Desc</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th>Published On</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blg)
                                <tr>
                                    <td><span class="blog_banner"><img src="{{URL::asset('/images/blogs/'.$blg->blog_banner)}}" alt="image" width="200"></span></td>
                                    <td><span class="blog_image"><img src="{{URL::asset('/images/blogs/'.$blg->blog_image)}}" alt="image" width="200"></span></td>
                                    <td data-column="title">{{ $blg->blog_category }}</td>
                                    <td data-column="title">{{ $blg->title }}</td>
                                    <td data-column="name">{{ $blg->name."(".$blg->email.")" }}</td>
                                    <td data-column="tags">
                                        <?php $logs = implode(", ",json_decode($blg->tags)); ?>                                       
                                        {{ $logs }}
                                    </td>
                                    <td data-column="short_desc">{{ Str::of($blg->short_desc)->words(20, '...') }}</td>
                                    <td data-column="blog_content">{{ Str::of($blg->blog_content)->words(20, '...') }}</td>
                                    <td data-column="status">@if($blg->status == '0') Draft @elseif ($blg->status == '1') Pending Approval @elseif ($blg->status == '2')  Published @elseif ($blg->status == '3') Rejected @elseif ($blg->status == '4') Disabled @else Draft @endif</td>
                                    <td data-column="views">{{ $blg->views }}</td>
                                    <td data-column="published_on">{{ date('dS M, Y', strtotime($blg->created_at)) }}</td>
                                    <td data-column="last_updated">{{ date('dS M, Y', strtotime($blg->updated_at)) }}</td>
                                    <td data-column="action">
                                        <a href="{{ URL:: route('blog.edit', [$blg->id])}}"><i class="fas fa-edit"></i></a> | 
                                        <a href="{{ URL:: route('blog.delete', [$blg->id])}}"><i class="fas fa-trash-alt"></i></a>
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