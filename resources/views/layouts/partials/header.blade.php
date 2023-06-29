<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- favicon -->
      <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}" media="all">
      <!-- Fonts Awesome CSS -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/fontawesome/css/all.min.css')}}">
      <!-- jquery-ui css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/jquery-ui/jquery-ui.min.css')}}">
      <!-- modal video css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/modal-video/modal-video.min.css')}}">
      <!-- light box css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/lightbox/dist/css/lightbox.min.css')}}">
      <!-- slick slider css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/slick/slick.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/slick/slick-theme.css')}}">
      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
      <title>GoTours | Travel & Tour organiser </title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
   </head>
   <body class="home">
      <div id="siteLoader" class="site-loader">
         <div class="preloader-content">
            <img src="{{asset('assets/images/loader1.gif')}}" alt="">
         </div>
      </div>
      <div id="page" class="full-page">
         <header id="masthead" class="site-header header-primary">
            <!-- header html start -->
            <div class="top-header">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 d-none d-lg-block">
                        <div class="header-contact-info">
                           {{-- {{ $company_details }} --}}
                           @foreach ($company_details as $cmpd)
                           <ul>
                              <li>
                                 <a href="#"><i class="fas fa-phone-alt"></i> {{ $cmpd->company_phone }}</a>
                              </li>
                              <li>
                                 <a href="mailto:{{ $cmpd->company_email }}"><i class="fas fa-envelope"></i> {{ $cmpd->company_email }}</a>
                              </li>
                              <li>
                                 <i class="fas fa-map-marker-alt"></i> {{ $cmpd->company_address }}
                              </li>
                           </ul>
                           @endforeach
                        </div>
                     </div>
                     <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                        <div class="header-social social-links">
                           <ul>
                              <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                        <div class="header-search-icon">
                           <button class="search-icon">
                              <i class="fas fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bottom-header sticky">
               <div class="container d-flex justify-content-between align-items-center">
                  <div class="site-identity">
                     <h1 class="site-title">
                        <a href="{{ URL::to('/') }}">
                           <img src="{{asset('assets/images/travele-logo.png')}}" alt="logo">
                        </a>
                     </h1>
                  </div>
                  <div class="main-navigation d-none d-lg-block">
                     @include('layouts.partials.menubar')
                  </div>
                  <div class="header-btn">
                     <a href="#" class="button-primary">BOOK NOW</a>
                  </div>
               </div>
            </div>
            <div class="mobile-menu-container sticky2"></div>
         </header>