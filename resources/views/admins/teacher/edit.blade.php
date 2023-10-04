@extends('admins.layouts.master')
@section('title', __('main.edit_th'))
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('main.th') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('main.edit_th') }}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                <div class="card">
                    <div class="card-body">
                      <h3>{{ __('main.edit_th') }}</h3>

                      <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>{{ __('main.name_th') }}</label>
                                    <input type="text" name="name" placeholder="{{ __('main.name_th') }}" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $teacher->name) }}"
                                    />
                                    @error('name')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>{{ __('main.email') }}</label>
                                    <input type="email" name="email" placeholder="{{ __('main.email') }}" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $teacher->email) }}"
                                    />
                                    @error('email')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>{{ __('main.phone') }}</label>
                                    <input type="text" name="phone" placeholder="{{ __('main.phone') }}" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $teacher->phone) }}"
                                    />
                                    @error('phone')
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
                                    <label>{{ __('main.ex') }}</label>
                                    <input type="number" name="ex_years" placeholder="{{ __('main.ex') }}" class="form-control @error('ex_years') is-invalid @enderror"
                                    value="{{ old('ex_years',$teacher->ex_years) }}"
                                    />
                                    @error('ex_years')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>{{ __('main.bio') }}</label>
                                    <textarea name="bio" placeholder="{{ __('main.bio') }}" class="form-control @error('bio') is-invalid @enderror" rows="5">{{ old('bio', $teacher->bio) }}</textarea>
                                    @error('bio')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <button class="btn btn-success px-5"><i class="fas fa-save"></i> {{ __('main.edit_th') }}</button>

                    </form>


                    </div>
                  </div>
				<!-- row closed -->
@endsection

		<!-- main-content closed -->

