@extends('layouts.app')

@section('content')
<main id="content" class="site-main">
    @include('layouts.homepage.banner')
    @include('layouts.homepage.destination')
    @include('layouts.homepage.package')
    @include('layouts.homepage.promotion')
    @include('layouts.homepage.adventure')
    @include('layouts.homepage.specialoffer')
    @include('layouts.homepage.traveller')
    @include('layouts.homepage.clients')
    @include('layouts.homepage.announcement')
    @include('layouts.homepage.blog')
    @include('layouts.homepage.testimonial')
    @include('layouts.homepage.contact')
 </main>

@endsection