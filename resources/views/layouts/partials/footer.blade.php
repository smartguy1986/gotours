<footer id="colophon" class="site-footer footer-primary">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget_text">
                        <h3 class="widget-title">
                            About Travel
                        </h3>
                        <div class="textwidget widget-text">
                            {{ $company_details[0]->company_bio }}
                        </div>
                        <div class="award-img">
                            <a href="#"><img src="{{ asset('assets/images/logo6.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/logo2.png') }}" alt=""></a>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget_text">
                        <h3 class="widget-title">CONTACT INFORMATION</h3>
                        <div class="textwidget widget-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-phone-alt"></i>
                                        {{ $company_details[0]->company_phone }}
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:{{ $company_details[0]->company_phone }}">
                                        <i class="fas fa-envelope"></i>
                                        {{ $company_details[0]->company_email }}
                                    </a>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    3146 Koontz, California
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget_recent_post">
                        <h3 class="widget-title">Latest Post</h3>
                        <ul>
                            @foreach ($blogs as $article)
                                <li>
                                    <h5>
                                        <a
                                            href="{{ URL::route('blog.details', $article->slug) }}">{{ $article->title }}</a>
                                    </h5>
                                    <div class="entry-meta">
                                        <span class="post-on">
                                            <a href="#">{{ date('dS M, Y', strtotime($article->created_at)) }}</a>
                                        </span>
                                        <span class="comments-link">
                                            <a href="#">No Comments</a>
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget_newslatter">
                        <h3 class="widget-title">SUBSCRIBE US</h3>
                        <div class="widget-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <form id="footersubscribe" class="newslatter-form" onsubmit="subsMyForm()">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="email" name="usermail" placeholder="Your Email.." required>
                            <input type="submit" name="submit" value="SUBSCRIBE NOW">
                        </form>
                        <div id="submit"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="buttom-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="footer-menu">
                        <ul>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Term & Condition</a>
                            </li>
                            <li>
                                <a href="#">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="footer-logo">
                        <a href="#"><img src="{{ asset('assets/images/travele-logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="copy-right text-right">Copyright © 2021 Travele. All rights reserveds</div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a id="backTotop" href="#" class="to-top-icon">
    <i class="fas fa-chevron-up"></i>
</a>
<!-- custom search field html -->
<div class="header-search-form">
    <div class="container">
        <div class="header-search-container">
            <form class="search-form" role="search" method="get">
                <input type="text" name="s" placeholder="Enter your text...">
            </form>
            <a href="#" class="search-close">
                <i class="fas fa-times"></i>
            </a>
        </div>
    </div>
</div>
<!-- header html end -->
</div>

<!-- JavaScript -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/vendors/countdown-date-loop-counter/loopcounter.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.js') }}"></script>
<script src="{{ asset('assets/vendors/modal-video/jquery-modal-video.min.js') }}"></script>
<script src="{{ asset('assets/vendors/masonry/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendors/lightbox/dist/js/lightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script> --}}
<script>
    // function getMessage() {
    //    $.ajax({
    //       type:'POST',
    //       url:'/getmsg',
    //       data:{ "_token": "{{ csrf_token() }}" },
    //       success:function(data) {
    //          $("#msg").html(data.msg);
    //       }
    //    });
    // }
    $('#footersubscribe').submit(function(event) {
        event.preventDefault();
    });

    function subsMyForm() {
        $('#submit').html('Please Wait...');
        $("#submit").attr("disabled", true);
        $.ajax({
            url: "subscribeuser",
            type: "POST",
            data: $('#footersubscribe').serialize(),
            success: function(response) {
                $('#submit').html(response.msg);
                // $("#submit").attr("disabled", false);
                //alert('Ajax form has been submitted successfully');
                document.getElementById("footersubscribe").reset();
            }
        });
        return false;
    }

    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    });

    $(window).scroll(function() {
        var sticky = $('.sticky'),
            scroll = $(window).scrollTop();

        if (scroll >= 100) sticky.addClass('fixed blur-back');
        else sticky.removeClass('fixed blur-back');

        var sticky2 = $('.sticky2'),
            scroll2 = $(window).scrollTop();

        if (scroll2 >= 100) sticky2.addClass('fixed2 blur-back');
        else sticky2.removeClass('fixed2 blur-back');
    });

    if (window.location.pathname == "/packages") {
        var ENDPOINT = "{{ route('packages') }}"
        var paginate = 1;
        loadMoreData(paginate);

        $('#load-more-packages').click(function() {
            var page = $(this).data('paginate');
            console.log(page);
            loadMoreData(page);
            $(this).data('paginate', page + 1);
        });
        // run function when user click load more button
        function loadMoreData(paginate) {
            $.ajax({
                    url: ENDPOINT + '?page=' + paginate,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('#preload').show();
                        $('#load-more-packages').text('Loading...');
                    }
                })
                .done(function(data) {
                    if (data.packages.length == 0) {
                        $('.invisible').removeClass('invisible');
                        $('#load-more-packages').hide();
                        $('#preload').hide();
                        return;
                    } else if (data.packages.length < 6) {
                        $('.invisible').addClass('invisible');
                        $('#load-more-packages').hide();
                        $('#preload').hide();
                        return;
                    } else {
                        $('#load-more-packages').text('Load more...');
                        $('#packages-post').append(data.packages);
                        $('#preload').hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Something went wrong.');
                });
        }
    }

    if ((window.location.pathname).indexOf('packages-by-theme') > -1) {
        // alert(window.location.pathname);
        var paginate2 = 1;
        loadMoreData2(paginate2);
        var urlpath2 = window.location.pathname;
        console.log(urlpath2);

        $('#load-more2').click(function() {
            var page2 = $(this).data('paginate2');
            loadMoreData2(page2);
            $(this).data('paginate2', page2 + 1);
        });
        // run function when user click load more button
        function loadMoreData2(paginate2) {
            var lastpart = window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1);
            console.log(lastpart);
            $.ajax({
                    url: '/packages-by-theme/' + lastpart + '?page=' + paginate2,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('#preload').show();
                        $('#load-more2').text('Loading...');
                    }
                })
                .done(function(data2) {
                    console.log(data2.packagetheme);
                    if (data2.packagetheme.length == 0) {
                        $('.invisible').removeClass('invisible');
                        $('#load-more2').hide();
                        $('#preload').hide();
                        return;
                    } else if (data2.packagetheme.length <= 6) {
                        $('.invisible').addClass('invisible');
                        $('#load-more2').hide();
                        $('#preload').hide();
                        return;
                    } else {
                        $('#load-more2').text('Load more...');
                        $('#post2').append(data2.packagetheme);
                        $('#preload').hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Something went wrong.');
                });
        }
    }

    if ((window.location.pathname).indexOf('packages-by-destination') > -1) {

        var paginate3 = 1;
        loadMoreData3(paginate3);
        // var urlpath3 = window.location.pathname;
        //alert(urlpath3);
        $('#load-more3').click(function() {
            var page3 = $(this).data('paginate3');
            loadMoreData3(page3);
            $(this).data('paginate3', page3 + 1);
        });
        // run function when user click load more button
        function loadMoreData3(paginate3) {
            var lastpart3 = window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1);
            console.log(lastpart3);
            $.ajax({
                    url: '/packages-by-destination/' + lastpart3 + '?page=' + paginate3,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('#preload').show();
                        $('#load-more3').text('Loading...');
                    }
                })
                .done(function(data3) {
                    if (data3.packagedesti.length == 0) {
                        $('.invisible').removeClass('invisible');
                        $('#load-more3').hide();
                        $('#preload').hide();
                        return;
                    } else if (data3.packagedesti.length < 6) {
                        $('.invisible').addClass('invisible');
                        $('#load-more3').hide();
                        $('#preload').hide();
                        return;
                    } else {
                        $('#load-more3').text('Load more...');
                        $('#post3').append(data3.packagedesti);
                        $('#preload').hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Something went wrong.');
                });
        }
    }

    if ((window.location.pathname).indexOf('package-offers') > -1) {
        // /alert(window.location.pathname);
        var paginate4 = 1;
        loadMoreData4(paginate4);
        // var urlpath4 = window.location.pathname;
        $('#load-more4').click(function() {
            var page4 = $(this).data('paginate4');
            loadMoreData4(page4);
            $(this).data('paginate4', page4 + 1);
        });
        // run function when user click load more button
        function loadMoreData4(paginate4) {
            $.ajax({
                    url: 'package-offers?page=' + paginate4,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('#preload').show();
                        $('#load-more4').text('Loading...');
                    }
                })
                .done(function(data4) {
                    if (data4.packageoffer.length == 0) {
                        $('.invisible').removeClass('invisible');
                        $('#load-more4').hide();
                        $('#preload').hide();
                        return;
                    } else if (data4.packageoffer.length < 6) {
                        $('.invisible').addClass('invisible');
                        $('#load-more4').hide();
                        $('#preload').hide();
                        return;
                    } else {
                        $('#load-more4').text('Load more...');
                        $('#post4').append(data4.packageoffer);
                        $('#preload').hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Something went wrong.');
                });
        }
    }

    if ((window.location.pathname).indexOf('testimonials') > -1) {
        // /alert(window.location.pathname);
        var paginate5 = 1;
        loadMoreData5(paginate5);
        // var urlpath4 = window.location.pathname;
        $('#load-more-testimonials').click(function() {
            var page5 = $(this).data('paginate5');
            loadMoreData5(page5);
            $(this).data('paginate5', page5 + 1);
        });
        // run function when user click load more button
        function loadMoreData5(paginate5) {
            $.ajax({
                    url: 'testimonials?page=' + paginate5,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('#preload').show();
                        $('#load-more-testimonials').text('Loading...');
                    }
                })
                .done(function(data5) {
                    if (data5.testimonials.length == 0) {
                        $('.invisible').removeClass('invisible');
                        $('#load-more-testimonials').hide();
                        $('#preload').hide();
                        return;
                    } else if (data5.testimonials.length < 6) {
                        $('.invisible').addClass('invisible');
                        $('#load-more-testimonials').hide();
                        $('#preload').hide();
                        return;
                    } else {
                        $('#load-more-testimonials').text('Load more...');
                        $('#testimonials-post').append(data5.testimonials);
                        $('#preload').hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Something went wrong.');
                });
        }
    }

    $('#contactbutton').on('click', function() {
        $('#contactbutton').html('Please Wait...');
        $("#contactbutton").attr("disabled", true);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "contactsubmit",
            type: "POST",
            data: $('#contactform').serialize(),
            beforeSend: function() {
                $('#contactbutton').val('Submitting your message...');
            },
            success: function(response) {
                $('#contactbutton').val('SUBMIT MESSAGE');
                $("#contactbutton").attr("disabled", false);
                $('#contacterrors').html(response.msg);
                if (response.status) {
                    document.getElementById("contactform").reset();
                }
            }
        });
    });

    $('#joinformsubmit').on('click', function() {
        $('#joinformsubmit').val('Please Wait...');
        $("#joinformsubmit").attr("disabled", true);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "careerquery",
            type: "POST",
            data: $('#jointheteamform').serialize(),
            beforeSend: function() {
                $('#joinformsubmit').val('Sending application...');
            },
            success: function(response) {
                $('#joinformsubmit').val('SEND APPLICATION');
                $("#joinformsubmit").attr("disabled", false);
                $('#jointeamerrors').html(response.msg);
                if (response.status) {
                    document.getElementById("jointheteamform").reset();
                }
            }
        });
    });

    if ((window.location.pathname).indexOf('tour-operator') > -1) {
        // /alert(window.location.pathname);
        var paginateo = 1;
        loadMoreDatao(paginateo);
        // var urlpath4 = window.location.pathname;
        $('#load-more-operator').click(function() {
            var pageo = $(this).data('paginateo');
            loadMoreDatao(pageo);
            $(this).data('paginateo', pageo + 1);
        });
        // run function when user click load more button
        function loadMoreDatao(paginateo) {
            $.ajax({
                    url: 'tour-operator?page=' + paginateo,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('#preload').show();
                        $('#load-more-operator').text('Loading...');
                    }
                })
                .done(function(datao) {
                    if (datao.agencies.length == 0) {
                        $('.invisible').removeClass('invisible');
                        $('#load-more-operator').hide();
                        $('#preload').hide();
                        return;
                    } else if (datao.agencies.length < 6) {
                        $('.invisible').addClass('invisible');
                        $('#load-more-operator').hide();
                        $('#preload').hide();
                        return;
                    } else {
                        $('#load-more-operator').text('Load more...');
                        $('#operator-post').append(datao.agencies);
                        $('#preload').hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Something went wrong.');
                });
        }
    }
</script>
</body>

</html>
