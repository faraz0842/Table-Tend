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
                            <li class="breadcrumb-item text-muted">{{ __('mail') }}</li>
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
                                    <!--begin::Navs-->
                                    <h2>{{ __('mail_setting_management') }}</h2>
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
                                    <form action="{{ route('mail.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="row">
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label fw-bold fs-6">{{ __('mail_host') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="mail_host"
                                                        value="{{ isset($mail['app_mail_host']) ? $mail['app_mail_host'] : '' }}"
                                                        class="form-control" placeholder="{{ __('mail_host') }}" />
                                                    <small>{{ __('insert_the_mail_host_address') }}</small>
                                                    @if ($errors->has('mail_host'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('mail_host') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label fw-bold fs-6">{{ __('user_name') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="mail_username"
                                                        value="{{ isset($mail['app_mail_username']) ? $mail['app_mail_username'] : '' }}"
                                                        class="form-control" placeholder="{{ __('user_name') }}" />
                                                    <small>{{ __('insert_the_mail_username_most_of_services_use_email_as_username') }}</small>
                                                    @if ($errors->has('mail_username'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('mail_username') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label fw-bold fs-6">{{ __('mail_port') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="mail_port"
                                                        value="{{ isset($mail['app_mail_port']) ? $mail['app_mail_port'] : '' }}"
                                                        class="form-control" placeholder="{{ __('mail_port') }}" />
                                                    <small>{{ __('insert_the_mail_port') }}</small>
                                                    @if ($errors->has('mail_port'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('mail_port') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label fw-bold fs-6">{{ __('mail_password') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="password" name="mail_password"
                                                        value="{{ isset($mail['app_mail_password']) ? $mail['app_mail_password'] : '' }}"
                                                        class="form-control" placeholder="{{ __('mail_password') }}" />
                                                    <small>{{ __('insert_the_mail_password') }}</small>
                                                    @if ($errors->has('mail_password'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('mail_password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label fw-bold fs-6">{{ __('mail_encryption') }}</label>
                                                    <select class="form-select" data-control="select2"
                                                        data-placeholder="select_mail_encryption" name="mail_encryption">
                                                        <option value="TLS"
                                                            {{ isset($mail['app_mail_encryption']) && $mail['app_mail_encryption'] == 'TLS' ? 'selected' : '' }}>
                                                            TLS</option>
                                                        <option value="SSL"
                                                            {{ isset($mail['app_mail_encryption']) && $mail['app_mail_encryption'] == 'SSL' ? 'selected' : '' }}>
                                                            SSL</option>
                                                    </select>
                                                    <small>{{ __('select_the_mail_encryption_tls_/_ssl') }}</small>
                                                    @if ($errors->has('mail_encryption'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('mail_encryption') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label fw-bold fs-6">{{ __('sender_email') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="sender_email"
                                                        value="{{ isset($mail['app_sender_email']) ? $mail['app_sender_email'] : '' }}"
                                                        class="form-control" placeholder="{{ __('sender_email') }}" />
                                                    <small>{{ __('insert_the_sender_email_address') }}</small>
                                                    @if ($errors->has('sender_email'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('sender_email') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label fw-bold fs-6">{{ __('sender_name') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="text" name="sender_name"
                                                        value="{{ isset($mail['app_sender_name']) ? $mail['app_sender_name'] : '' }}"
                                                        class="form-control" placeholder="{{ __('sender_name') }}" />
                                                    <small>{{ __('insert_the_sender_name') }}</small>
                                                    @if ($errors->has('sender_name'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('sender_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <div class="d-flex justify-content-end my-5">
                                            <!--begin::Button-->
                                            <a href="{{ url()->previous() }}"
                                                class="btn btn-light me-5">{{ __('cancel') }}</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary">
                                                <span class="indicator-label">{{ __('save') }}</span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </form>
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
