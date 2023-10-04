@extends('admins.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('main.courses') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('main.add_course') }}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('title',__('main.add_course'))
@section('content')
<div class="card">
    <div class="card-body">
                <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Name Course English</label>
                            <input type="text" name="name_en" placeholder="Name Course English" class="form-control @error('name_en') is-invalid @enderror"
                            value=""
                            />
                            @error('name_en')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>اسم دورة باللغة العربية</label>
                            <input type="text" name="name_ar" placeholder="اسم دورة باللغة العربية" class="form-control @error('name_ar') is-invalid @enderror"
                            value=""
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
                            value=""
                            />
                            @error('price')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>{{ __('main.duration') }}</label>
                            <input type="text" name="duration" placeholder="{{ __('main.duration') }}" class="form-control @error('duration') is-invalid @enderror"
                            value=""
                            />
                            @error('duration')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>{{ __('main.name_th') }}</label>
                            <select name="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                                <option selected disabled>{{ __('main.select') }}</option>
                                @foreach ($teachers as $teacher)
                                    <option  value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>English Content</label>
                            <textarea name="content_en" placeholder="English Content" class="form-control @error('content_en') is-invalid @enderror" rows="7"></textarea>
                            @error('content_en')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>النبذة بالعربية</label>
                            <textarea name="content_ar" placeholder="Arabic Content" class="form-control @error('content_ar') is-invalid @enderror" rows="7"></textarea>
                            @error('content_ar')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-success px-5"><i class="fas fa-save"></i> {{ __('main.add_course') }}</button>
                </div>

                </form>

        </div>
    </div>
@endsection
@section('js')
@endsection
