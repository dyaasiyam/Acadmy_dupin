@extends('front.app')
@section('title', $course->name )
@section('content')

    <!--====== PAGE BANNER PART START ======-->
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{ asset('front/images/page-banner-2.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont text-right" dir="rtl">
                        <h2>{{ __('main.courses_all') }}</h2>
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb text-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('main.courses') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $course->name}}</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== COURSES SINGEl PART START ======-->

    <section id="corses-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="corses-singel-left mt-30">
                        <div class="title">
                            <h3>{{ __('main.p1_slide') }}</h3>
                        </div> <!-- title -->
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                            <img src="{{ asset('images/'.$course->teacher->image) }}" width="40" alt="Teacher">
                                        </div>
                                        <div class="name">
                                            <span>{{ __('main.name_th') }}</span>
                                            <h6>{{ $course->teacher->name }}</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="course-category">
                                        <span>{{ __('main.ex') }}</span>
                                        <h6>{{ $course->teacher->ex_years }} </h6>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- course terms -->

                        <div class="corses-singel-image pt-50">
                            <img src="{{asset('images/'.$course->image)}}" height="90%" alt="Courses">
                        </div> <!-- corses singel image -->

                        <div class="corses-tab mt-30">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">{{ __('main.duration') }}</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="overview-description">
                                        <div class="singel-description pt-40">
                                            <h6>{{ $course->duration }}</h6>
                                        </div>

                                    </div> <!-- overview description -->
                                </div>
                            </div> <!-- tab content -->
                        </div>
                    </div> <!-- corses singel left -->

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                               <h4>{{ $course->name }} </h4>
                                <ul>
                                    <li><i class="fa fa-user-o"></i>Students :  <span>{{ $course->students->count() }}</span></li>
                                </ul>
                                <div class="price-button pt-10">
                                    <span>Price : <b>${{ $course->price }}</b></span>
                                    <a href="{{ route('enroll',$course->id) }}" class="main-btn">{{ __('main.Enroll Now') }}</a>
                                </div>
                            </div> <!-- course features -->
                        </div>
                    </div>
                </div>
            </div> <!-- row --><!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES SINGEl PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
@endsection
