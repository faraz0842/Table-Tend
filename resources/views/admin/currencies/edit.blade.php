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
                            {{ __('settings') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('edit_currencies') }}</li>
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
                        action="{{ route('currencies.update', $currency->id) }}">
                        @csrf
                        <div class="d-flex flex-column gap-7 col-3 gap-lg-10 mb-7 me-lg-10">
                            @include('layout.settings_sidebar')
                        </div>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('general') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('name') }}</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('name') }}" value="{{ $currency->name }}" />
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('decimal_digits') }}</label>
                                        <input type="number" name="decimal_digits" class="form-control"
                                            placeholder="{{ __('decimal_digits') }}"
                                            value="{{ $currency->decimal_digits }}" />
                                        @if ($errors->has('decimal_digits'))
                                            <div class="text-danger">{{ $errors->first('decimal_digits') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('symbol') }}</label>
                                        <input type="text" name="symbol" class="form-control"
                                            placeholder="{{ __('symbol') }}" value="{{ $currency->symbol }}" />
                                        @if ($errors->has('symbol'))
                                            <div class="text-danger">{{ $errors->first('symbol') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('rounding') }}</label>
                                        <input type="number" name="rounding" class="form-control"
                                            placeholder="{{ __('rounding') }}" value="{{ $currency->rounding }}" />
                                        @if ($errors->has('rounding'))
                                            <div class="text-danger">
                                                {{ $errors->first('rounding') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('code') }}</label>
                                        <input type="text" name="code" class="form-control"
                                            placeholder="{{ __('code') }}" value="{{ $currency->code }}" />
                                        @if ($errors->has('code'))
                                            <div class="text-danger">{{ $errors->first('code') }}
                                            </div>
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
