@extends('teachers.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('main.availabletime') }} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('main.add_availabletime') }}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">{{ __('main.add_availabletime') }}</h3>
                    <form class="mt-3" action="{{ route('teacher.times.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>{{ __('main.courses') }}</label>
                                    <select name="course_id" class="form-control">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('course')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>{{ __('main.day') }}</label>
                                    <input type="date" class="form-control @error('day') is-invalid @enderror" name="day" value="{{ old('day') }}" />
                                    @error('day')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>{{ __('main.Time_From') }}</label>
                                    <input type="time" class="form-control @error('time_from') is-invalid @enderror" name="time_from" value="{{ old('time_from') }}" />
                                    @error('time_from')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>{{ __('main.Time to') }}</label>
                                    <input type="time" class="form-control @error('time_to') is-invalid @enderror" name="time_to" value="{{ old('time_to') }}" />
                                    @error('time_to')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-success px-4">{{ __('main.add_availabletime') }}</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
  </div>
@endsection
@section('js')
@endsection
