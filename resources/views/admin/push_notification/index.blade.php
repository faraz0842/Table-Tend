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
                            <li class="breadcrumb-item text-muted">{{ __('push_notification') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content mb-15 flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column gap-7 col-3 gap-lg-10 mb-7 me-lg-10">
                            @include('layout.settings_sidebar')
                        </div>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin::Card-->
                            <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
                                <!--begin::Card body-->
                                <div class="card-body pb-0">
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
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
                                        <form class="form" action="" method="POST">
                                            <div class="row">
                                                <div class="d-flex flex-row justify-content-start">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-bell-fill mt-2"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                                    </svg>
                                                    <h1 class="mx-3">{{ __('push_notification') }}</h1>
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('enable_push') }}</label>
                                                    <input class="form-check-input mt-3" name="status" type="checkbox" />
                                                </div>
                                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('firebase_cloud_messaging_key') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="firebase_cloud_messaging_key"
                                                        class="form-control"
                                                        placeholder="{{ __('firebase_cloud_messaging_key') }}"
                                                        value="" />
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('api_key') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="api_key" class="form-control"
                                                        placeholder="{{ __('api_key') }}" value="" />
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('auth_domain') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="auth_domain" class="form-control"
                                                        placeholder="{{ __('auth_domain') }}" value="" />
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('database_url') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="database_url" class="form-control"
                                                        placeholder="{{ __('database_url') }}" value="" />
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('project_id') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="project_id" class="form-control"
                                                        placeholder="{{ __('project_id') }}" value="" />
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('storage_bucket') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="storage_bucket" class="form-control"
                                                        placeholder="{{ __('storage_bucket') }}" value="" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('messaging_sender_id') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="messaging_sender_id" class="form-control"
                                                        placeholder="{{ __('messaging_sender_id') }}" value="" />
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('application_id') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="application_id" class="form-control"
                                                        placeholder="{{ __('application_id') }}" value="" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('measurement_id') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="measurement_id" class="form-control"
                                                        placeholder="{{ __('measurement_id') }}" value="" />
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                        </form>
                                    </div>
                                    <div class="d-flex justify-content-end my-5">
                                        <!--begin::Button-->
                                        <a href="{{ url()->previous() }}" id="kt_ecommerce_edit_order_cancel"
                                            class="btn btn-light me-5">Cancel</a>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_ecommerce_edit_order_submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">Save smtp driver</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::General options-->
                    <!--end::Card-->
                </div>
                <!--end::Content container-->
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
@section('scripts')
    @include('admin.scripts.editor')
@endsection
