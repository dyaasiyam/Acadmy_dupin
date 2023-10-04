@extends('teachers.layouts.master')
@section('css')
@endsection
@section('title', $course->name)
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('main.courses') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $course->name }}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body h-100">
                        <div class="row row-sm ">
                            <div class=" col-xl-3 col-lg-4 col-md-4">
                                <div class="preview-pic tab-content">
                                  <div class="tab-pane active"  id="pic-1"><img src="{{ asset('images/'.$course->image)}}" width="50" alt="image"/></div>
                                  {{-- <div class="tab-pane" id="pic-2"><img src="{{URL::asset('assets/img/ecommerce/shirt-2.png')}}" alt="image"/></div>
                                  <div class="tab-pane" id="pic-3"><img src="{{URL::asset('assets/img/ecommerce/shirt-3.png')}}" alt="image"/></div>
                                  <div class="tab-pane" id="pic-4"><img src="{{URL::asset('assets/img/ecommerce/shirt-4.png')}}" alt="image"/></div>
                                  <div class="tab-pane" id="pic-5"><img src="{{URL::asset('assets/img/ecommerce/shirt-1.png')}}" alt="image"/></div> --}}
                                </div>
                                {{-- <ul class="preview-thumbnail nav nav-tabs">
                                  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-5.png')}}" alt="image"/></a></li>
                                  <li><a data-target="#pic-2" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-2.png')}}" alt="image"/></a></li>
                                  <li><a data-target="#pic-3" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-3.png')}}" alt="image"/></a></li>
                                  <li><a data-target="#pic-4" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-4.png')}}" alt="image"/></a></li>
                                  <li><a data-target="#pic-5" data-toggle="tab"><img src="{{URL::asset('assets/img/ecommerce/shirt-1.png')}}" alt="image"/></a></li>
                                </ul> --}}
                            </div>
                            <div class="details col-xl-3 col-lg-4 col-md-4 mt-4 mt-xl-0">
                                <h4 class="product-title mb-1">{{ $course->name }}</h4>
                                <p class="text-muted tx-13 mb-1">{{ $course->duration }}</p>
                                <p class="text-muted tx-13 mb-1">{{ __('main.name_th') }} : <strong> {{ $course->teacher->name }}</strong></p>
                                <div class="rating mb-1">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star text-muted"></span>
                                        <span class="fa fa-star text-muted"></span>
                                    </div>
                                    <span class="review-no"> (<strong class="">{{ $course->students()->count() }} </strong> ){{ __('main.Buyers') }}</span>
                                </div>
                                <h6 class="price">{{ __('main.price') }} <span class="h3 ml-2">{{ $course->price }}$</span></h6>
                                <p class="product-description">{{ $course->{'content_'.app()->currentLocale()} }}</p>
                            </div>
                            <div class="details col-xl-5 col-lg-4 col-md-4 mt-4 mt-xl-0">
                                <table class="table text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="wd-5p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0">{{ __('main.student_count') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentsInCourse as $student)
                                        <tr>
                                            <td>{{ $loop->iteration    }}</td>
                                            <td>{{ $student->name }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('admin/assets/js/table-data.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
    @if (session('msg'))
    Toast.fire({
       icon: '{{ session("type") }}',
      title: '{{ session("msg") }}'
      })
    @endif
</script>



@endsection
