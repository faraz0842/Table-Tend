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
                            <li class="breadcrumb-item text-muted">{{ __('social_authentication') }}</li>
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
                                        <form class="form" action="{{ route('socialite-auth.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="d-flex flex-row justify-content-start">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-facebook mt-2" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                                    </svg>
                                                    <h1 class="mx-3">{{ __('authentication_using_facebook') }}
                                                    </h1>
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('application_id') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="facebook_application_id"
                                                        class="form-control"
                                                        placeholder="{{ __('facebook_application_id') }}"
                                                        value="{{ isset($social_setting['app_facebook_id']) ? $social_setting['app_facebook_id'] : '' }}" />
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('application_secret') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="facebook_application_secret"
                                                        class="form-control" placeholder="{{ __('application_secret') }}"
                                                        value="{{ isset($social_setting['app_facebook_secret']) ? $social_setting['app_facebook_secret'] : '' }}" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('enable_facebook') }}</label>
                                                    <input class="form-check-input mt-3" name="facebook" type="checkbox"
                                                        {{ isset($social_setting['app_facebook_check']) && $social_setting['app_facebook_check'] == 'Active' ? 'checked' : '' }} />
                                                </div>
                                                <div class="separator mt-4"></div>
                                                <div class="d-flex flex-row justify-content-start mt-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-google mt-1 " viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                                    </svg>
                                                    <h1 class="mx-3">{{ __('authentication_using_google') }}
                                                    </h1>

                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('application_id') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="google_application_id" class="form-control"
                                                        placeholder="{{ __('application_id') }}"
                                                        value="{{ isset($social_setting['app_google_id']) ? $social_setting['app_google_id'] : '' }}" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('application_secret') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="google_application_secret"
                                                        class="form-control" placeholder="{{ __('application_secret') }}"
                                                        value="{{ isset($social_setting['app_google_id']) ? $social_setting['app_google_id'] : '' }}" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('enable_google') }}</label>
                                                    <input class="form-check-input mt-3" name="google" type="checkbox"
                                                        {{ isset($social_setting['app_google_check']) && $social_setting['app_google_check'] == 'Active' ? 'checked' : '' }} />
                                                </div>


                                            </div>
                                            <!--end::Card header-->
                                    </div>
                                    <div class="d-flex justify-content-end my-5">
                                        <!--begin::Button-->
                                        <a href="{{ url()->previous() }}" id="kt_ecommerce_edit_order_cancel"
                                            class="btn btn-light me-5">{{ __('cancel') }}</a>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">{{ __('save') }}</span>
                                        </button>
                                        <!--end::Button-->
                                        </form>
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
