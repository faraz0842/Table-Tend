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
                            <li class="breadcrumb-item text-muted">{{ __('global_setting') }}</li>
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
                        action="{{ route('global.setting.store') }}">
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
                                    <div class="row">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('application_name') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="application_name" class="form-control"
                                                placeholder="{{ __('food_delievery') }}"
                                                value="{{ isset($global_setting['app_name']) ? $global_setting['app_name'] : '' }}" />
                                            @if ($errors->has('application_name'))
                                                <div class="text-danger">
                                                    {{ $errors->first('application_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <!--begin::Input-->
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('short_discription') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="short_description" class="form-control"
                                                placeholder="{{ __('insert_tax') }}"
                                                value="{{ isset($global_setting['app_desc']) ? $global_setting['app_desc'] : '' }}" />
                                            @if ($errors->has('short_description'))
                                                <div class="text-danger">
                                                    {{ $errors->first('short_description') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('facebook_link') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="facebook_link" class="form-control"
                                                placeholder="{{ __('facebook_link') }}"
                                                value="{{ isset($global_setting['app_facebook']) ? $global_setting['app_facebook'] : '' }}" />
                                            @if ($errors->has('facebook_link'))
                                                <div class="text-danger">
                                                    {{ $errors->first('facebook_link') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('instagram_link') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="insta_link" class="form-control"
                                                placeholder="{{ __('insta_link') }}"
                                                value="{{ isset($global_setting['app_instagram']) ? $global_setting['app_instagram'] : '' }}" />
                                            @if ($errors->has('insta_link'))
                                                <div class="text-danger">{{ $errors->first('insta_link') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('google_link') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="google_link" class="form-control"
                                                placeholder="{{ __('google_link') }}"
                                                value="{{ isset($global_setting['app_google']) ? $global_setting['app_google'] : '' }}" />
                                            @if ($errors->has('google_link'))
                                                <div class="text-danger">
                                                    {{ $errors->first('google_link') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('twitter_link') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="twitter_link" class="form-control"
                                                placeholder="{{ __('twitter_link') }}"
                                                value="{{ isset($global_setting['app_twitter']) ? $global_setting['app_twitter'] : '' }}" />
                                            @if ($errors->has('twitter_link'))
                                                <div class="text-danger">
                                                    {{ $errors->first('twitter_link') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('email') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="email" class="form-control"
                                                placeholder="{{ __('email') }}"
                                                value="{{ isset($global_setting['app_email']) ? $global_setting['app_email'] : '' }}" />
                                            @if ($errors->has('email'))
                                                <div class="text-danger">{{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Label-->
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container mt-8">
                                            <label
                                                class="col-form-label required fw-bold px-2">{{ __('fixed_header') }}</label>
                                            <input class="form-check-input mt-3" type="checkbox" name="fixed_header"
                                                {{ isset($global_setting['app_header']) && $global_setting['app_header'] == 'Active' ? 'checked' : '' }} />
                                            <label
                                                class="col-form-label required fw-bold px-2">{{ __('fixed_footer') }}</label>
                                            <input class="form-check-input mt-3" type="checkbox" name="fixed_footer"
                                                {{ isset($global_setting['app_footer']) && $global_setting['app_footer'] == 'Active' ? 'checked' : '' }} />
                                        </div>
                                        <div class="col-lg-6 fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold px-2">{{ __('favicon') }}</label>
                                            <div class="col-12">
                                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                                    data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-150px h-150px selected-image"
                                                        @if (isset($globalSetting) && $globalSetting->media()) style="background-image: url('{{ $globalSetting->getFirstMediaUrl('setting.images') }}')" @endif>
                                                    </div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="image" class="selected-data"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                    </label>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            @if ($errors->has('image'))
                                                <div class="text-danger">
                                                    {{ $errors->first('image') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold px-2">{{ __('application_logo') }}</label>
                                            <!--end::Label-->
                                            <div class="col-12">
                                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                                    data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-150px h-150px selected-image"
                                                        @if (isset($globalSetting) && $globalSetting->media()) style="background-image: url('{{ $globalSetting->getFirstMediaUrl('application.logo.images') }}')" @endif>
                                                    </div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="application_logo"
                                                            class="selected-data" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                    </label>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            @if ($errors->has('application_logo'))
                                                <div class="text-danger">
                                                    {{ $errors->first('application_logo') }}
                                                </div>
                                            @endif
                                        </div>
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
