@extends('teachers.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('admin/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<style>
    tr.success {
    background: #bcffb3;
}

tr.danger {
    background: #ffc2c2;
}
tr.blow {
    background: #c2d7ff;
}

</style>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('main.availabletime') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('main.list_appointment') }}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('title', __('main.availabletime'))
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table text-md-nowrap" id="example1">
            <thead>
                <tr>
                    <th class="wd-5p border-bottom-0">#</th>
                    <th class="wd-15p border-bottom-0">{{ __('main.course_name') }}</th>
                    <th class="wd-15p border-bottom-0">{{ __('main.day') }}</th>
                    <th class="wd-15p border-bottom-0">{{ __('main.Time_From') }}</th>
                    <th class="wd-15p border-bottom-0">{{ __('main.Time to') }}</th>
                    <th class="wd-15p border-bottom-0">{{ __('main.operations') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($times as $time )
                <tr class="{{ $time->status == 1 ? 'success' : ($time->status == 2 ? 'danger' : '') }}">
                    <td>{{ $loop->iteration    }}</td>
                    <td> {{ $time->course->name }}</td>
                    <td> {{ $time->day }}</td>
                        <td>{{ $time->time_from}}</td>
                        <td>{{ $time->time_to}}</td>

                             <td>
                                        <a href="{{ route('teacher.time_status', [$time->id, 1]) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="{{ route('teacher.time_status', [$time->id, 2]) }}" class="btn btn-sm btn-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>

                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
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

