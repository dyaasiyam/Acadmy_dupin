@extends('front.app')
@section('title', $course->name )
@section('content')

    <!--====== PAGE BANNER PART START ======-->
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{ asset('front/images/page-banner-6.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont text-right" dir="rtl">
                        <h2>{{ __('main.Enroll Now') }}</h2>
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb text-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('main.Enroll Now') }}</a></li>
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
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif

            <form action="{{ route('payment',$course->id) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX  "></form>
        </div>

      </div>

    <!--====== COURSES SINGEl PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
@endsection
@section('js')
<script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $id }}"></script>
@endsection
