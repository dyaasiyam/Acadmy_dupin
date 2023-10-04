@extends('teachers.layouts.master')
@section('css')
@endsection
@section('title',__('main.appointment'))
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('main.appointment') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('main.list_appointmentq') }}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-body">
            <table class="table text-md-nowrap" id="example1">
                <thead>
                    <tr>
                        <th class="wd-5p border-bottom-0">#</th>
                        <th class="wd-15p border-bottom-0">{{ __('main.name_student') }}</th>
                        <th class="wd-15p border-bottom-0">{{ __('main.day') }}</th>
                        <th class="wd-15p border-bottom-0">{{ __('main.operations') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment )
                    <tr>
                        <td>{{ $loop->iteration    }}</td>
                        <td>{{ $appointment->student->name }}</td>
                        <td>{{ $appointment->available_time->day }}</td>
                        <td>
                            <a href="" class="btn-sm btn-success">
                                <li class="fas fa-check"></li>
                            </a>
                            <a href="" class="btn-sm btn-danger">
                                <li class="fas fa-times"></li>
                            </a>
                        </td>
                    </tr>
                    @empty
                    @endforelse
            </table>
            </div>
    </div>
  </div>
@endsection
@section('js')
@endsection
