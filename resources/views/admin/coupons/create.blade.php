@extends('layout.master')
@section('layout.left_side_nav')
    @include('layout.left_side_nav')
@endsection
@section('content')
    @include('layout.header')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            {{ __('add_coupon') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('create_coupon') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container">
                    @if (session('success'))
                        <div class="alert alert-success my-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger my-2">
                            {{ Session('error') }}
                        </div>
                    @endif
                    <form class="form d-flex flex-column flex-lg-row" method="POST" enctype="multipart/form-data"
                        action="{{ route('coupon.store') }}">
                        @csrf
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('general') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body row pt-0">
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('coupon_slug') }}</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="{{ __('enter_slug') }}" value="{{ old('slug') }}">
                                        @if ($errors->has('slug'))
                                            <div class="text-danger">{{ $errors->first('slug') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('coupon_code') }}</label>
                                        <input type="text" name="code" class="form-control"
                                            placeholder="{{ __('enter_unique_code') }}" value="{{ old('code') }}">
                                        @if ($errors->has('code'))
                                            <div class="text-danger">{{ $errors->first('code') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('discount') }}</label>
                                        <input type="number" name="discount" class="form-control"
                                            placeholder="{{ __('enter_discount') }}" value="{{ old('discount') }}">
                                        @if ($errors->has('discount'))
                                            <div class="text-danger">{{ $errors->first('discount') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('expiry_date') }}</label>
                                        <input type="date" name="expiry_date" class="form-control"
                                            placeholder="{{ __('enter_expiry_date') }}" value="{{ old('expiry_date') }}">
                                        @if ($errors->has('expiry_date'))
                                            <div class="text-danger">{{ $errors->first('expiry_date') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('discount_type') }}</label>
                                        <select class="form-select" name="discount_type_id" data-control="select2"
                                            data-placeholder="discount_type_id">
                                            @foreach ($discountTypes as $discountType)
                                                <option value="{{ $discountType['id'] }}">
                                                    {{ $discountType['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('discount_type_id'))
                                            <div class="text-danger">
                                                {{ $errors->first('discount_type_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-form-label required fw-bold px-2">{{ __('enabled') }}</label>
                                        <input class="form-check-input mt-3" type="checkbox" name="enabled" />
                                        @if ($errors->has('enabled'))
                                            <div class="text-danger">
                                                {{ $errors->first('enabled') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <livewire:restaurant-dropdown />
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label fw-bold fs-6">{{ __('description') }}</label>
                                        <textarea name="description" class="kt_docs_ckeditor_classic">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="text-danger">
                                                {{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ url()->previous() }}" class="btn btn-light me-5">{{ __('cancel') }}</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('save_changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
@section('scripts')
    @include('admin.scripts.editor')
@endsection
