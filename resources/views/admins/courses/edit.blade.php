@extends('admins.layouts.master')
@section('css')
@endsection
@section('title',__('main.edit_course'))
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('main.courses') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('main.edit_course') }}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Name Course English</label>
                        <input type="text" name="name_en" placeholder="English Name" class="form-control @error('name_en') is-invalid @enderror"
                        value="{{ old('name_en', $course->name_en) }}"
                        />
                        @error('name_en')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>اسم الدورة بالعربية</label>
                        <input type="text" name="name_ar" placeholder="Arabic Name" class="form-control @error('name_ar') is-invalid @enderror"
                        value="{{ old('name_ar', $course->name_ar) }}"
                        />
                        @error('name_ar')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>{{ __('main.imag') }}</label>
                        <input type="file" name="image"  class="form-control @error('image') is-invalid @enderror"/>
                        @error('image')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>{{ __('main.price') }}</label>
                        <input type="number" name="price" placeholder="{{ __('main.price') }}" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $course->price) }}"
                        />
                        @error('price')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>{{ __('main.duration') }}</label>
                        <input type="text" name="duration" placeholder="Duration" class="form-control @error('duration') is-invalid @enderror"
                        value="{{ old('duration', $course->duration) }}"
                        />
                        @error('duration')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>{{ __('main.th') }}</label>
                        <select name="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                            <option selected disabled>{{ __('main.select') }}</option>
                            @foreach ($teachers as $teacher)
                                <option @selected($course->teacher_id == $teacher->id) value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        @error('teacher_id')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Bio English</label>
                        <textarea name="content_en" placeholder="English Content" class="form-control @error('content_en') is-invalid @enderror" rows="7">{{ old('content_en', $course->content_en) }}</textarea>
                        @error('content_en')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>النبذة بالعربية</label>
                        <textarea name="content_ar" placeholder="Arabic Content" class="form-control @error('content_ar') is-invalid @enderror" rows="7">{{ old('content_ar', $course->content_ar) }}</textarea>
                        @error('content_ar')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>
            <button class="btn btn-info px-5"><i class="fas fa-save"></i> Update</button>

        </form>

    </div>
  </div>
@endsection
@section('js')
@endsection
