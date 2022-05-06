@extends('layouts.app')

@section('content')
<style>
    .inner-shape {
        background-image: url('{{ asset('assets/images/slider-pattern.png')}}');
    }
</style>
<main id="content" class="site-main">
    <!-- Inner Banner html start-->
    {{-- {{ $blogs }} --}}
    <section class="inner-banner-wrap">
        @if (!empty($blogs[0]->blog_banner))
            <div class="inner-baner-container" style="background-image: url('{{ asset('images/blogs/'.$blogs[0]->blog_banner)}}');">
        @else
            <div class="inner-baner-container" style="background-image: url('{{ asset('images/blogs/'.$blogs[0]->blog_image)}}');">
        @endif       
        <div class="container">
            <div class="inner-banner-content">
                <h1 class="inner-title">{{ $blogs[0]->title}}</h1>
                <div class="entry-meta">
                <span class="byline">
                    <a href="#">{{ $blogs[0]->name }}</a>
                </span>
                <span class="posted-on">
                    <a href="#">{{ date('dS M, Y', strtotime($blogs[0]->created_at)) }}</a>
                </span>
                <span class="comments-link">
                    <a href="#">@if (COUNT($blog_comments)>0)
                        {{ COUNT($blog_comments) }} Comment(s)                             
                     @else
                        No Comments
                     @endif</a>
                </span>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-shape"></div>
    </section>
    <!-- Inner Banner html end-->
    <div class="single-post-section">
    <div class="single-post-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 primary right-sidebar">
                <!-- single blog post html start -->
                <figure class="feature-image">
                    <img src="{{URL::asset('/images/blogs/'.$blogs[0]->blog_image)}}" alt="">
                </figure>
                <article class="single-content-wrap">
                    {!! $blogs[0]->blog_content !!}
                </article>
                <div class="meta-wrap">
                    <div class="tag-links">
                        <?php $aa = json_decode($blogs[0]->tags);?>
                        @foreach ($aa as $tg)
                            <a href="#">{{ $tg }}</a>,
                        @endforeach                
                    </div>
                </div>
                <div class="post-socail-wrap">
                    <div class="social-icon-wrap">
                        <div class="social-icon social-facebook">
                            <a href="#">
                            <i class="fab fa-facebook-f"></i>
                            <span>Facebook</span>
                            </a>
                        </div>
                        <div class="social-icon social-google">
                            <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                            <span>Google</span>
                            </a>
                        </div>
                        <div class="social-icon social-pinterest">
                            <a href="#">
                            <i class="fab fa-pinterest"></i>
                            <span>Pinterest</span>
                            </a>
                        </div>
                        <div class="social-icon social-linkedin">
                            <a href="#">
                            <i class="fab fa-linkedin"></i>
                            <span>Linkedin</span>
                            </a>
                        </div>
                        <div class="social-icon social-twitter">
                            <a href="#">
                            <i class="fab fa-twitter"></i>
                            <span>Twitter</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="author-wrap">
                    <div class="author-thumb">
                        @if ($blogs[0]->author=='1')
                            <img src="{{URL::asset('assets/images/user-img.png')}}" alt="">
                        @else
                            <img src="{{URL::asset('assets/images/user-img.png')}}" alt="">
                        @endif
                    </div>
                    <div class="author-content">
                        @if ($blogs[0]->author=='1')
                            <h3 class="author-name">GoTours Admin</h3>
                            <p>Anim eligendi error magnis. Pretium fugiat cubilia ullamcorper adipisci, lobortis repellendus sit culpa maiores!</p>
                            <a href="#" class="button-text">VIEW ALL POSTS > </a>
                        @else
                            <h3 class="author-name">{{ $blogs[0]->name }}</h3>
                            <p>{{ $blogs[0]->bio }}</p>
                            <a href="#" class="button-text">VIEW ALL POSTS > </a>
                        @endif                        
                    </div>
                </div>
                <!-- post comment html -->
                <div class="comment-area">
                    <h2 class="comment-title">3 Comments</h2>
                    <div class="comment-area-inner">
                        <ol>
                            <li>
                            <figure class="comment-thumb">
                                <img src="assets/images/img20.jpg" alt="">
                            </figure>
                            <div class="comment-content">
                                <div class="comment-header">
                                    <h5 class="author-name">Tom Sawyer</h5>
                                    <span class="post-on">Jana 10 2020</span>
                                </div>
                                <p>Officia amet posuere voluptates, mollit montes eaque accusamus laboriosam quisque cupidatat dolor pariatur, pariatur auctor.</p>
                                <a href="#" class="reply"><i class="fas fa-reply"></i>Reply</a>
                            </div>
                            </li>
                            <li>
                            <ol>
                                <li>
                                    <figure class="comment-thumb">
                                        <img src="assets/images/img21.jpg" alt="">
                                    </figure>
                                    <div class="comment-content">
                                        <div class="comment-header">
                                        <h5 class="author-name">John Doe</h5>
                                        <span class="post-on">Jana 10 2020</span>
                                        </div>
                                        <p>Officia amet posuere voluptates, mollit montes eaque accusamus laboriosam quisque cupidatat dolor pariatur, pariatur auctor.</p>
                                        <a href="#" class="reply"><i class="fas fa-reply"></i>Reply</a>
                                    </div>
                                </li>
                            </ol>
                            </li>
                        </ol>
                        <ol>
                            <li>
                            <figure class="comment-thumb">
                                <img src="assets/images/img22.jpg" alt="">
                            </figure>
                            <div class="comment-content">
                                <div class="comment-header">
                                    <h5 class="author-name">Jaan Smith</h5>
                                    <span class="post-on">Jana 10 2020</span>
                                </div>
                                <p>Officia amet posuere voluptates, mollit montes eaque accusamus laboriosam quisque cupidatat dolor pariatur, pariatur auctor.</p>
                                <a href="#" class="reply"><i class="fas fa-reply"></i>Reply</a>
                            </div>
                            </li>
                        </ol>
                    </div>
                    <div class="comment-form-wrap">
                        <h2 class="comment-title">Leave a Reply</h2>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form class="comment-form">
                            <p class="full-width">
                            <label>Comment</label>
                            <textarea rows="9"></textarea>
                            </p>
                            <p>
                            <label>Name *</label>
                            <input type="text" name="name">
                            </p>
                            <p>
                            <label>Email *</label>
                            <input type="email" name="email">
                            </p>
                            <p>
                            <label>Website</label>
                            <input type="text" name="web">
                            </p>
                            <p class="full-width">
                            <input type="submit" name="submit" value="Post comment">
                            </p>
                        </form>
                    </div>
                    <!-- post navigation html -->
                    <div class="post-navigation">
                        <div class="nav-prev">
                            <a href="#">
                            <span class="nav-label">Previous Reading</span>
                            <span class="nav-title">Deleniti illum culpa sodales cubilia.</span>
                            </a>
                        </div>
                        <div class="nav-next">
                            <a href="#">
                            <span class="nav-label">Next Reading</span>
                            <span class="nav-title">Deleniti illum culpa sodales cubilia.</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- blog post item html end -->
                </div>
                <div class="col-lg-4 secondary">
                    <div class="sidebar">
                        <aside class="widget author_widget">
                            <h3 class="widget-title">ABOUT AUTHOR</h3>
                            <div class="widget-content text-center"> 
                                <div class="profile"> 
                                <figure class="avatar"> 
                                    <a href="#"> 
                                        @if ($blogs[0]->author=='1')
                                            <img src="{{URL::asset('assets/images/user-img.png')}}" alt="">
                                        @else
                                            <img src="{{URL::asset('assets/images/user-img.png')}}" alt="">
                                        @endif
                                    </a> 
                                </figure> 
                                <div class="text-content"> 
                                    <div class="name-title"> 
                                        <h3> 
                                            @if ($blogs[0]->author=='1')
                                                <a href="#">GoTours Admin</a>
                                            @else
                                                <a href="#">{{ $blogs[0]->name }}</a>
                                            @endif
                                            
                                        </h3> 
                                    </div> 
                                    @if ($blogs[0]->author=='1')
                                        <p>Accumsan? Aliquet nobis doloremque, aliqua? Inceptos voluptatem, duis tempore optio quae animi viverra distinctio cumque vivamus, earum congue, anim velit</p>
                                    @else
                                        <p>{{ $blogs[0]->bio }}</p> 
                                    @endif
                                    
                                </div> 
                                {{-- <div class="socialgroup"> 
                                    <ul> 
                                        <li> <a target="_blank" href="#"> <i class="fab fa-facebook"></i> </a> </li> 
                                        <li> <a target="_blank" href="#"> <i class="fab fa-google"></i> </a> </li> 
                                        <li> <a target="_blank" href="#"> <i class="fab fa-twitter"></i> </a> </li> 
                                        <li> <a target="_blank" href="#"> <i class="fab fa-instagram"></i> </a> </li> 
                                        <li> <a target="_blank" href="#"> <i class="fab fa-pinterest"></i> </a> </li> 
                                    </ul> 
                                </div>  --}}
                                </div> Hi 
                            </div>
                        </aside>
                        <aside class="widget widget_latest_post widget-post-thumb">
                            <h3 class="widget-title">Recent Post</h3>
                            {{-- {{ $related_blogs }} --}}
                            <ul>
                                @foreach ($related_blogs as $rp)
                                    <li>                                        
                                        <figure class="post-thumb">
                                            <a href="{{URL::route('blog.details',$rp->id)}}"><img src="{{URL::asset('/images/blogs/'.$rp->blog_image)}}" alt="{{ $rp->title }}"></a>
                                        </figure>
                                        <div class="post-content">
                                            <h5>
                                                <a href="{{URL::route('blog.details',$rp->id)}}">{{ $rp->title }}</a>
                                            </h5>
                                            <div class="entry-meta">
                                                <span class="posted-on">
                                                    <a href="{{URL::route('blog.details',$rp->id)}}">{{ date('dS M, Y', strtotime($rp->created_at)) }}</a>
                                                </span>
                                                {{-- <span class="comments-link">
                                                    <a href="{{URL::route('blog.details',$rp->id)}}">@if ($rp->totcm>0)
                                                        {{ $rp->totcm }} Comment(s)                             
                                                    @else
                                                        No Comments
                                                    @endif</a>
                                                </span> --}}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="widget widget_social">
                            <h3 class="widget-title">Social share</h3>
                            <div class="social-icon-wrap">
                                <div class="social-icon social-facebook">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </a>
                                </div>
                                <div class="social-icon social-pinterest">
                                <a href="#">
                                    <i class="fab fa-pinterest"></i>
                                    <span>Pinterest</span>
                                </a>
                                </div>
                                <div class="social-icon social-whatsapp">
                                <a href="#">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </a>
                                </div>
                                <div class="social-icon social-linkedin">
                                <a href="#">
                                    <i class="fab fa-linkedin"></i>
                                    <span>Linkedin</span>
                                </a>
                                </div>
                                <div class="social-icon social-twitter">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                                </div>
                                <div class="social-icon social-google">
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                    <span>Google</span>
                                </a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

@endsection