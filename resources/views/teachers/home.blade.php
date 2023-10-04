@extends('teachers.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('admin/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('admin/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ __('main.hi') }} <span class="text-primary">{{ Auth::user()->name }}</span></h2>
						</div>
					</div>
					<div class="main-dashboard-header-right">
						<div>
							<strong class="tx-13 text-danger">{{ __('main.revenue') }}</strong>
							<h3 class="text-success">${{ Auth::user()->revenue }}</h3>
						</div>
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')

@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('admin/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('admin/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('admin/assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('admin/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('admin/assets/js/index.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
