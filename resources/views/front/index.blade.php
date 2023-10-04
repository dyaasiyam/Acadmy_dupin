@extends('front.app')
@section('title')
@section('content')

    <!--====== SEARCH BOX PART ENDS ======-->

    <!--====== SLIDER PART START ======-->

    <section id="slider-part" class="slider-active">
        <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('front/images/slider/s-1.jpg') }})" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">{{ __('main.p1_slide') }}</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">{{ __('main.p2_slide') }}</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">{{ __('main.courses') }}</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">{{ __('main.th') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

        <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('front/images/slider/s-3.jpg') }})" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">{{ __('main.p2_slide') }}</</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">{{ __('main.p1_slide') }}</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">{{ __('main.courses') }}</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">{{ __('main.all_th') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->

        <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('front/images/slider/s-2.jpg') }})" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">{{ __('main.slide') }}</</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">{{ __('main.p1_slide') }}</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">{{ __('main.courses') }}</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">{{ __('main.all_th') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>

    <!--====== SLIDER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->


    <!--====== CATEGORY PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about-part" class="pt-65" >
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>{{ __('main.About us') }}</h5>
                        <h2>{{ __('main.welcome') }}  </h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>{{ __('main.p_about') }} <br> <br> {{ __('main.p2_about') }}</p>
                        <a href="#" class="main-btn mt-55">{{ __('main.all_th') }}</a>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-5 offset-lg-1">
                    <div class="category-form">
                        <div class="form-title text-center">
                            <h3>{{ __('main.free') }}</h3>
                            <span>{{ __('main.Sign') }} </span>
                        </div>
                        <div class="main-form">
                           @include('auth.register')
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-bg">
            <img src="{{ asset('front/images/about/bg-1.png') }}" alt="About">
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->
    <!--====== COUNTER PART START ======-->

    <div id="counter-part" class="bg_cover pt-65 pb-110" data-overlay="8" style="background-image: url({{ asset('front/images/bg-2.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $students }}</span>+</span>
                        <p>{{ __('main.student_count') }}</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $courses_count }}</span>+</span>
                        <p>{{ __('main.courses_all') }}</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">{{ $teacher_count }}</span>+</span>
                        <p>{{ __('main.all_th') }}</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <span><span class="counter">39,000</span>+</span>
                        <p>Global Teachers</p>
                    </div> <!-- singel counter -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

    <!--====== COUNTER PART ENDS ======-->
    <!--====== COURSE PART START ======-->

    <section id="course-part" class="pt-115 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-45">
                        <h5>{{ __('main.Our course') }}</h5>
                        <h2>{{ __('main.new_course') }} </h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row course-slied mt-30">
                @foreach ($courses as $course)
                <div class="col-lg-4">
                    <div class="singel-course">
                        <div class="thum">
                            <div class="image">
                                <img src="{{ asset('images/'.$course->image )}}" width="50" alt="Course">
                            </div>
                            <div class="price">
                                <span>{{ $course->price }}</span>
                            </div>
                        </div>
                        <div class="cont">
                            <a href="{{ route('courses_single',$course->id) }}"><h4>{{ $course->name }}</h4></a>
                            <div class="course-teacher">
                                <div class="thum">
                                    <a href="#"><img src="{{ asset('images/'.$course->teacher->image) }}" alt="teacher"></a>
                                </div>
                                <div class="name">
                                    <a href="{{ route('teachers_single', $course->teacher->id) }}"><h6>{{ $course->teacher->name }}</h6></a>
                                </div>
                                <div class="admin">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i><span>{{ $course->students->count() }}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- singel course -->
                </div>

                @endforeach

            </div> <!-- course slied -->
        </div> <!-- container -->
    </section>

    <!--====== COURSE PART ENDS ======-->

    <!--====== VIDEO FEATURE PART START ======-->

     {{-- <section id="video-feature" class="bg_cover pt-60 pb-110" style="background-image: url(images/bg-1.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-last order-lg-first">
                    <div class="video text-lg-left text-center pt-50">
                        <a class="Video-popup" href="https://www.youtube.com/watch?v=bRRtdzJH1oE"><i class="fa fa-play"></i></a>
                    </div> <!-- row -->
                </div>
                <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                    <div class="feature pt-50">
                        <div class="feature-title">
                            <h3>Our Facilities</h3>
                        </div>
                        <ul>
                            <li>
                                <div class="singel-feature">
                                    <div class="icon">
                                        <img src="images/all-icon/f-1.png" alt="icon">
                                    </div>
                                    <div class="cont">
                                        <h4>Global Certificate</h4>
                                        <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                    </div>
                                </div> <!-- singel feature -->
                            </li>
                            <li>
                                <div class="singel-feature">
                                    <div class="icon">
                                        <img src="images/all-icon/f-2.png" alt="icon">
                                    </div>
                                    <div class="cont">
                                        <h4>Alumni Support</h4>
                                        <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                    </div>
                                </div> <!-- singel feature -->
                            </li>
                            <li>
                                <div class="singel-feature">
                                    <div class="icon">
                                        <img src="images/all-icon/f-3.png" alt="icon">
                                    </div>
                                    <div class="cont">
                                        <h4>Books & Library</h4>
                                        <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                    </div>
                                </div> <!-- singel feature -->
                            </li>
                        </ul>
                    </div> <!-- feature -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="feature-bg"></div> <!-- feature bg -->
    </section> --}}

    <!--====== VIDEO FEATURE PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->



    <!--====== TEACHERS PART ENDS ======-->
    <section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8" style="background-image: url(images/bg-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-40">
                        <h5>{{ __('main.th') }}</h5>
                        <h2>{{ __('main.ex')}}</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row testimonial-slied mt-40">
                @foreach ($teachers as $teacher )
                <div class="col-lg-6">
                    <div class="singel-testimonial">
                        <div class="testimonial-thum">
                            <img src="{{ asset('images/'.$teacher->image) }}" width="90" alt="Testimonial">
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="testimonial-cont">
                            <p>{{ $teacher->bio }} </p>
                            <h6>{{ $teacher->name }}</h6>
                            <span>{{ $teacher->courses->count() }}</span>
                        </div>
                    </div> <!-- singel testimonial -->
                </div>
                @endforeach

            </div> <!-- testimonial slied -->
        </div> <!-- container -->
    </section>

    <!--====== PUBLICATION PART START ======-->

    {{-- <section id="publication-part" class="pt-115 pb-120 gray-bg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6 col-md-8 col-sm-7">
                    <div class="section-title pb-60">
                        <h5>Publications</h5>
                        <h2>From Store </h2>
                    </div> <!-- section title -->
                </div>
                <div class="col-lg-6 col-md-4 col-sm-5">
                    <div class="products-btn text-right pb-60">
                        <a href="#" class="main-btn">All Products</a>
                    </div> <!-- products btn -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="singel-publication mt-30">
                        <div class="image">
                            <img src="images/publication/p-1.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="name">
                                <a href="shop-singel.html"><h6>Set for life </h6></a>
                                <span>By Scott Trench</span>
                            </div>
                            <div class="button text-right">
                                <a href="#" class="main-btn">Buy Now ($50)</a>
                            </div>
                        </div>
                    </div> <!-- singel publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="singel-publication mt-30">
                        <div class="image">
                            <img src="images/publication/p-2.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="name">
                                <a href="shop-singel.html"><h6>A Daughters </h6></a>
                                <span>By Scott Trench</span>
                            </div>
                            <div class="button text-right">
                                <a href="#" class="main-btn">Buy Now ($30)</a>
                            </div>
                        </div>
                    </div> <!-- singel publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="singel-publication mt-30">
                        <div class="image">
                            <img src="images/publication/p-3.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="name">
                                <a href="shop-singel.html"><h6>A Magnet </h6></a>
                                <span>By Scott Trench</span>
                            </div>
                            <div class="button text-right">
                                <a href="#" class="main-btn">Buy Now ($20)</a>
                            </div>
                        </div>
                    </div> <!-- singel publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="singel-publication mt-30">
                        <div class="image">
                            <img src="images/publication/p-4.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="name">
                                <a href="shop-singel.html"><h6>Pices of light</h6></a>
                                <span>By Scott Trench</span>
                            </div>
                            <div class="button text-right">
                                <a href="#" class="main-btn">Buy Now ($75)</a>
                            </div>
                        </div>
                    </div> <!-- singel publication -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section> --}}

    <!--====== PUBLICATION PART ENDS ======-->


    <!--====== PATNAR LOGO PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
@endsection

