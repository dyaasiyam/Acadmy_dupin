@extends('front.app')
@section('title', __('main.th'))
@section('css')
<style>
    .singel-teachers .image img {
        width: 100%; /* حدد العرض المرغوب للصورة */
        height: 50vh; /* حدد الارتفاع المرغوب للصورة */
        object-fit: cover; /* هذا يضمن عرض وارتفاع الصورة المحددين داخل الحاوية */
    }
</style>
@endsection

@section('content')

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont text-right" dir="rtl">
                        <h2>{{ __('main.all_th') }}</h2>
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb text-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('main.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('main.all_th') }}</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
            @foreach ($teachers as $teacher )
            <div class="col-lg-3 col-sm-6">
                <div class="singel-teachers mt-30 text-center">
                    <div class="image">
                        <img src="{{ asset('images/'.$teacher->image) }}" alt="Teachers">
                    </div>
                    <div class="cont">
                        <a href="{{ route('teachers_single',$teacher->id) }}"><h6>{{ $teacher->name }}</h6></a>
                    </div>
                </div> <!-- singel teachers -->
            </div>

            @endforeach

           </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            <li class="page-item"><a href="#">3</a></li>
                            <li class="page-item">
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->

   @endsection
