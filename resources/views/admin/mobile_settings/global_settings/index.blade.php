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
                            {{ __('mobile_app_setting') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('global_settings') }}</li>
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
                        action="{{ route('mobile.setting.store') }}">
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
                                <div class="card-body row pt-0">
                                    <h1>{{ __('google_maps_key') }}</h1>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('google_maps_key') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="google_maps_key" class="form-control col-6"
                                            placeholder="{{ __('google_maps_key') }}"
                                            value="{{ isset($mobile_setting['app_google_map']) ? $mobile_setting['app_google_map'] : '' }}" />
                                        <small>{{ __('insert_google_maps_key') }}</small>
                                        <a href=" https://console.developers.google.com/apis/dashboard" target="blank"
                                            style="font-size: 10px;">(https://console.developers.google.com/apis/dashboard)</a>
                                        @if ($errors->has('google_maps_key'))
                                            <div class="error text-danger">
                                                {{ $errors->first('google_maps_key') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label fw-bold fs-6">{{ __('default_unit_of_distance') }}</label>
                                        <select class="form-select" name="default_unit_of_distance"
                                            data-placeholder="Select an option" data-control="select2">
                                            @foreach ($distanceUnit as $unit)
                                                <option value="{{ $unit->name }}"
                                                    {{ isset($mobile_setting['app_default_distance']) && $unit->name == $mobile_setting['app_default_distance'] ? 'selected' : '' }}>
                                                    {{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                        <small>{{ __('enter_the_unit_of_distance_(must_restart_the_app_to_refresh_it)') }}</small>
                                        @if ($errors->has('default_unit_of_distance'))
                                            <div class="error text-danger">
                                                {{ $errors->first('default_unit_of_distance') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="separator my-5"></div>
                                    <h1>{{ __('application_language') }}</h1>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('language') }}</label>
                                        <div class="col-12">
                                            <select class="form-select" name="language" data-placeholder="Select an option"
                                                data-control="select2">
                                                @foreach ($language as $languages)
                                                    <option value="{{ $languages->name }}"
                                                        {{ isset($mobile_setting['app_language']) && $languages->name == $mobile_setting['app_language'] ? 'selected' : '' }}>
                                                        {{ $languages->name }}</option>
                                                @endforeach
                                            </select>
                                            <small>{{ __('select_the_default_language_of_the_application') }}</small>
                                            @if ($errors->has('language'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('language') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="separator my-5"></div>
                                    <h1>Version</h1>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('application_version') }}</label>
                                        <input type="number" name="application_version" class="form-control"
                                            placeholder="{{ __('application_version') }}"
                                            value="{{ isset($mobile_setting['app_version']) ? $mobile_setting['app_version'] : '' }}" />
                                        <small>{{ __('insert_the_application_version') }}</small>
                                    </div>
                                    @if ($errors->has('application_version'))
                                        <div class="error text-danger">
                                            {{ $errors->first('application_version') }}
                                        </div>
                                    @endif
                                    <!--end::Col-->
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label fw-bold fs-6">{{ __('show_version') }}</label>
                                        <input class="form-check-input mt-3" name="show_version" type="checkbox"
                                            {{ isset($mobile_setting['app_show_version']) && $mobile_setting['app_show_version'] == 'Active' ? 'checked' : '' }} />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ url()->previous() }}" class="btn btn-light me-5">Cancel</a>
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
