@extends('layouts.app')

@section('content')
    <style>
        .inner-shape {
            background-image: url('{{ asset('assets/images/slider-pattern.png') }}');
        }
    </style>
    <main id="content" class="site-main">
        <!-- Inner Banner html start-->
        <section class="inner-banner-wrap">
            <div class="inner-baner-container"
                style="background-image: url('{{ asset('assets/images/default/career-banner.jpg') }}');">
                <div class="container">
                    <div class="inner-banner-content">
                        <h1 class="inner-title">Job : {{ $careers[0]->post }}</h1>
                    </div>
                </div>
            </div>
            <div class="inner-shape"></div>
        </section>
        {{-- {{ $testimonials }} --}}
        <section class="about-section about-page-section">
            <div class="career-detail-section">
                <div class="career-detail-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="job-description">
                                    <ul>
                                        <li>
                                            <span>Post :</span>
                                            <h4>{{ $careers[0]->post }}</h4>
                                        </li>
                                        <li>
                                            <span>Time :</span>
                                            <h4>@if($careers[0]->type=='1') Part Time @elseif($careers[0]->type=='2') Full Time @else Contractual @endif</h4>
                                        </li>
                                        <li>
                                            <span>Salary :</span>
                                            <h4>{{ $careers[0]->salary }}</h4>
                                        </li>
                                        <li>
                                            <span>No. of Vacancy :</span>
                                            <h4>{{ $careers[0]->vacancy }}</h4>
                                        </li>
                                    </ul>
                                    <figure class="job-imgage">
                                        <img src="{{ asset('images/careers/'.$careers[0]->photo) }}" alt="">
                                    </figure>
                                </div>
                                <div class="tab-container">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview"
                                                role="tab" aria-controls="overview" aria-selected="true">Job
                                                Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience"
                                                role="tab" aria-controls="experience" aria-selected="false">Experience &
                                                Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="requirement-tab" data-toggle="tab" href="#requirement"
                                                role="tab" aria-controls="requirement"
                                                aria-selected="false">Requirement</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                            aria-labelledby="overview-tab">
                                            <div class="overview-content">
                                                {!! html_entity_decode($careers[0]->description) !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="experience" role="tabpanel"
                                            aria-labelledby="experience-tab">
                                            <div class="experience-content">
                                                {!! html_entity_decode($careers[0]->experience) !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="requirement" role="tabpanel"
                                            aria-labelledby="requirement-tab">
                                            <div class="requirement-content">
                                                {!! html_entity_decode($careers[0]->requirement) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-first">
                                <div class="sidebar">
                                    <div class="widget-bg sidebar-list">
                                        <h4 class="bg-title">How To Apply?</h4>
                                        <ul>
                                            <li><i class="fas fa-minus"></i>Nunc expedita montes minima.</li>
                                            <li><i class="fas fa-minus"></i>Animi atque ornare iaculis.</li>
                                            <li><i class="fas fa-minus"></i>Sociosqu scelerisque adipisci.</li>
                                            <li><i class="fas fa-minus"></i>Purus eveniet incidi dunt.</li>
                                            <li><i class="fas fa-minus"></i>Animi atque ornare iaculis.</li>
                                        </ul>
                                    </div>
                                    <div class="widget-bg faq-widget">
                                        <h4 class="bg-title">Frequently Asked Questions</h4>
                                        <div class="accordion" id="accordionOne">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        When the Announcements?
                                                    </button>
                                                </div>
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                    data-parent="#accordionOne">
                                                    <div class="card-body">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                                                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Can I Apply After Rejection?
                                                    </button>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                    data-parent="#accordionOne">
                                                    <div class="card-body">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                                                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Where to Interview?
                                                    </button>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                    data-parent="#accordionOne">
                                                    <div class="card-body">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                                                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-bg upload-widget text-center">
                                        <div class="widget-icon">
                                            <i class="fas fa-file-invoice"></i>
                                        </div>
                                        <h3>Send us your C.V.</h3>
                                        <p>Do you want to work with us? Please, send your CV to <a
                                                href="#">domain123@gmail.com</a></p>
                                        <span class="or-style">OR</span>
                                        <a href="{{ URL::route('contactpage') }}" class="button-primary">CONTACT US</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- callback section html start -->
                <div class="secondary-callback secondary-overlay" style="background-image: url({{ asset('assets/images/default/career-footer.jpg') }});">
                    <div class="container">
                        <div class="section-heading">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="heading-inner">
                                        <h5 class="dash-style">INVOLVE TODAY</h5>
                                        <h2>TRUSTED BY MORE THAN 65,000 PEOPLE</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus
                                            nec ullamcorper mattis, pulvinar dapibus leo. Eaque adipiscing, luctus eleifend
                                            temporibus occaecat luctus eleifend tempo ribus.</p>
                                        <a href="#" class="button-primary">JOINS US NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- callback html end -->
            </div>
        </section>
    </main>
@endsection
