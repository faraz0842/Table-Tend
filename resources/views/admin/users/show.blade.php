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
                            {{ __('user_profile') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('profile') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container">
                    <div class="form d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                <h2 class="mx-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>
                                    {{ __('about_me') }}
                                </h2>
                                <div class="separator my-2"></div>
                                <div class="card-body text-center pt-10">
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <div class="image-input-wrapper w-150px h-150px"
                                            style="background-image: url({{ $user->getFirstMediaUrl('user.images') }})">
                                        </div>
                                        <label data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
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
                                    <div class="text-muted fs-7">
                                        {{ __('set the thumbnail. Only *.png, *.jpg and *.jpeg image files are accepted') }}
                                    </div>
                                    <div class="my-5">
                                        <h2>{{ $user['name'] }}</h2>
                                    </div>
                                    <div class="fs-7">
                                        <span class="badge badge-light-success text-capitalize">{{ $userRole }}</span>
                                    </div>
                                    <div class="my-7">
                                        <a
                                            class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                            </svg>
                                            {{ $user['email'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush py-4">
                                <h2 class="mx-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>
                                    {{ __('custom_fields') }}
                                </h2>
                                <div class="separator my-2"></div>
                                <div class="card-body pt-10">
                                    <div>
                                        <h2>{{ __('phone') }}</h2>
                                        <span class="text-muted">
                                            {{$user['mobile_number']}}
                                        </span>
                                    </div>
                                    <div class="my-10">
                                        <h2>{{ __('address') }}</h2>
                                        <span class="text-muted">
                                            {{$user['address']}}
                                        </span>
                                    </div>
                                    <div>
                                        <h2>{{ __('short_biography') }}</h2>
                                        <span class="text-muted">
                                            {{ strip_tags($user['short_biography'])}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('main_fields') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">{{ __('name') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('insert_name') }}"
                                            value="{{ $user['name'] }}" readonly />
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">{{ __('email') }}</label>
                                        <input type="text" class="form-control" readonly
                                            placeholder="{{ __('insert_email') }}" value="{{ $user['email'] }}" />
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">{{ __('role') }}</label>
                                        <select class="form-select form-select-solid" data-placeholder="Select an option"
                                            data-control="select2" disabled>
                                            @foreach ($roles as $role)
                                                <option></option>
                                                <option value="{{ $role['id'] }}"
                                                    {{ $userRole == $role['name'] ? 'selected' : '' }}>
                                                    {{ $role['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="separator my-5"></div>
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('custom_fields') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">{{ __('phone') }}</label>
                                        <input type="number" class="form-control" placeholder="{{ __('+12-9874567895') }}"
                                            value="{{ $user['mobile_number'] }}" readonly />
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">{{ __('address') }}</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ __('569 Braxton Street Cortland, IL 60112') }}"
                                            value="{{ $user['address'] }}" readonly />
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('short_biography') }}</label>
                                        <!--end::Label-->
                                        <div class="flex-grow-1">
                                            <!--begin::Block-->
                                            <div>
                                                <textarea class="kt_docs_ckeditor_classic" disabled>{{ $user['short_biography'] }}</textarea>
                                            </div>
                                            <!--end::Block-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
@section('scripts')
    @include('admin.scripts.editor')
@endsection
