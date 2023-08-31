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
                        action="{{ route('mobile.theme.store') }}">
                        @csrf
                        <div class="d-flex flex-column gap-7 col-3 gap-lg-10 mb-7 me-lg-10">
                            @include('layout.settings_sidebar')
                        </div>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h1>{{ __('application_theme') }}</h1>
                                    </div>
                                </div>
                                <div class="card-body row pt-0">
                                    <div class="col-lg-6 row fv-plugins-icon-container">
                                        <label
                                            class="col-form-label fw-bold fs-6">{{ __('main_color_light_theme') }}</label>
                                        <!--end::Label-->
                                        <div class="d-flex">
                                            <input type="text" name="main_color_light" class="form-control color"
                                                readonly placeholder="{{ __('use_unique_type_color') }}"
                                                value="{{ isset($themeSetting['app_main_color_light']) ? $themeSetting['app_main_color_light'] : '' }}" />
                                            <input type="color" aria-describedby="color"
                                                class="form-control-color p-0 input-group-text colorPicker"
                                                value="{{ isset($themeSetting['app_main_color_light']) ? $themeSetting['app_main_color_light'] : '' }}" />
                                        </div>
                                        <small>{{ __('insert_the_main_color_of_the_app') }}</small>
                                        @if ($errors->has('main_color_light'))
                                            <div class="error text-danger">
                                                {{ $errors->first('main_color_light') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 row fv-plugins-icon-container">
                                        <label
                                            class="col-form-label fw-bold fs-6">{{ __('main_color_dark_theme') }}</label>
                                        <!--end::Label-->
                                        <div class="d-flex">
                                            <input type="text" name="main_color_dark" class="form-control color" readonly
                                                placeholder="{{ __('use_unique_type_color') }}"
                                                value="{{ isset($themeSetting['app_main_color_dark']) ? $themeSetting['app_main_color_dark'] : '' }}" />
                                            <input type="color" aria-describedby="color"
                                                class="form-control-color p-0 input-group-text colorPicker"
                                                value="{{ isset($themeSetting['app_main_color_dark']) ? $themeSetting['app_main_color_dark'] : '' }}" />
                                        </div>
                                        <small>{{ __('insert_the_main_dark_color_of_the_app') }}</small>
                                        @if ($errors->has('main_color_dark'))
                                            <div class="error text-danger">
                                                {{ $errors->first('main_color_dark') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 row fv-plugins-icon-container">
                                        <label
                                            class="col-form-label fw-bold fs-6">{{ __('second_color_light_theme') }}</label>
                                        <!--end::Label-->
                                        <div class="d-flex">
                                            <input type="text" name="second_color_light" class="form-control color"
                                                readonly placeholder="{{ __('use_unique_type_color') }}"
                                                value="{{ isset($themeSetting['app_second_color_light']) ? $themeSetting['app_second_color_light'] : '' }}" />
                                            <input type="color" aria-describedby="color"
                                                class="form-control-color p-0 input-group-text colorPicker"
                                                value="{{ isset($themeSetting['app_second_color_light']) ? $themeSetting['app_second_color_light'] : '' }}" />
                                        </div>
                                        <small>{{ __('insert_second_color_for_bright_theme') }}</small>
                                        @if ($errors->has('second_color_light'))
                                            <div class="error text-danger">
                                                {{ $errors->first('second_color_light') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 row fv-plugins-icon-container">
                                        <label
                                            class="col-form-label fw-bold fs-6">{{ __('second_color_dark_theme') }}</label>
                                        <!--end::Label-->
                                        <div class="d-flex">
                                            <input type="text" name="second_color_dark" class="form-control color"
                                                readonly placeholder="{{ __('use_unique_type_color') }}"
                                                value="{{ isset($themeSetting['app_second_color_dark']) ? $themeSetting['app_second_color_dark'] : '' }}" />
                                            <input type="color" aria-describedby="color"
                                                class="form-control-color p-0 input-group-text colorPicker"
                                                value="{{ isset($themeSetting['app_second_color_dark']) ? $themeSetting['app_second_color_dark'] : '' }}" />
                                        </div>
                                        <small>{{ __('insert_second_color_for_dark_theme') }}</small>
                                        @if ($errors->has('second_color_dark'))
                                            <div class="error text-danger">
                                                {{ $errors->first('second_color_dark') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 row fv-plugins-icon-container">
                                        <label
                                            class="col-form-label fw-bold fs-6">{{ __('accent_color_light_theme') }}</label>
                                        <!--end::Label-->
                                        <div class="d-flex">
                                            <input type="text" name="accent_color_light" class="form-control color"
                                                readonly placeholder="{{ __('use_unique_type_color') }}"
                                                value="{{ isset($themeSetting['app_accent_color_light']) ? $themeSetting['app_accent_color_light'] : '' }}" />
                                            <input type="color" aria-describedby="color"
                                                class="form-control-color p-0 input-group-text colorPicker"
                                                value="{{ isset($themeSetting['app_accent_color_light']) ? $themeSetting['app_accent_color_light'] : '' }}" />
                                        </div>
                                        <small>{{ __('accent_color') }}</small>
                                        @if ($errors->has('accent_color_light'))
                                            <div class="error text-danger">
                                                {{ $errors->first('accent_color_light') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 row fv-plugins-icon-container">
                                        <label
                                            class="col-form-label fw-bold fs-6">{{ __('accent_color_dark_theme') }}</label>
                                        <!--end::Label-->
                                        <div class="d-flex">
                                            <input type="text" name="accent_color_dark" class="form-control color"
                                                readonly placeholder="{{ __('use_unique_type_color') }}"
                                                value="{{ isset($themeSetting['app_accent_color_dark']) ? $themeSetting['app_accent_color_dark'] : '' }}" />
                                            <input type="color" aria-describedby="color"
                                                class="form-control-color p-0 input-group-text colorPicker"
                                                value="{{ isset($themeSetting['app_accent_color_dark']) ? $themeSetting['app_accent_color_dark'] : '' }}" />
                                        </div>
                                        <small>{{ __('insert_dark_color') }}</small>
                                        @if ($errors->has('accent_color_dark'))
                                            <div class="error text-danger">
                                                {{ $errors->first('accent_color_dark') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 row fv-plugins-icon-container">
                                        <label
                                            class="col-form-label fw-bold fs-6">{{ __('background_color_light_theme') }}</label>
                                        <!--end::Label-->
                                        <div class="d-flex">
                                            <input type="text" name="background_color_light"
                                                class="form-control color" readonly
                                                placeholder="{{ __('use_unique_type_color') }}"
                                                value="{{ isset($themeSetting['app_background_color_light']) ? $themeSetting['app_background_color_light'] : '' }}" />
                                            <input type="color" aria-describedby="color"
                                                class="form-control-color p-0 input-group-text colorPicker"
                                                value="{{ isset($themeSetting['app_background_color_light']) ? $themeSetting['app_background_color_light'] : '' }}" />
                                        </div>
                                        <small>{{ __('insert_background_color_for_light_theme') }}</small>
                                        @if ($errors->has('background_color_light'))
                                            <div class="error text-danger">
                                                {{ $errors->first('background_color_light') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 row fv-plugins-icon-container">
                                        <label
                                            class="col-form-label fw-bold fs-6">{{ __('background_color_dark_theme') }}</label>
                                        <!--end::Label-->
                                        <div class="d-flex">
                                            <input type="text" name="background_color_dark" class="form-control color"
                                                readonly placeholder="{{ __('use_unique_type_color') }}"
                                                value="{{ isset($themeSetting['app_background_color_dark']) ? $themeSetting['app_background_color_dark'] : '' }}" />
                                            <input type="color" aria-describedby="color"
                                                class="form-control-color p-0 input-group-text colorPicker"
                                                value="{{ isset($themeSetting['app_background_color_dark']) ? $themeSetting['app_background_color_dark'] : '' }}" />
                                        </div>
                                        <small>{{ __('insert_background_color_for_dark_theme') }}</small>
                                        @if ($errors->has('background_color_dark'))
                                            <div class="error text-danger">
                                                {{ $errors->first('background_color_dark') }}
                                            </div>
                                        @endif
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
@section('scripts')
    @include('admin.scripts.color')
@endsection
