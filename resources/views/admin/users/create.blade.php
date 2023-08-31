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
                            {{ __('user_management') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('create_user') }}</li>
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
                        action="{{ route('user.store') }}">
                        @csrf
                        <div class="d-flex flex-column gap-7 col-3 gap-lg-10 mb-7 me-lg-10">
                            @include('layout.settings_sidebar')
                        </div>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h1>{{ __('general') }}</h1>
                                    </div>
                                </div>
                                <div class="card-body row pt-0">
                                    <div class="col-lg-12 fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold px-2">{{ __('avatar') }}</label>
                                        <!--end::Label-->
                                        <div class="col-12">
                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                                data-kt-image-input="true">
                                                <div class="image-input-wrapper w-150px h-150px selected-image">
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
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('name') }}</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="{{ __('insert_name') }}" />
                                        @if ($errors->has('name'))
                                            <div class="error text-danger">
                                                {{ $errors->first('name') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('email') }}</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="{{ __('insert_email') }}" />
                                        @if ($errors->has('email'))
                                            <div class="error text-danger">
                                                {{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('password') }}</label>
                                        <input type="password" name="password" class="form-control"
                                            value="{{ old('password') }}" placeholder="{{ __('insert_password') }}" />
                                        @if ($errors->has('password'))
                                            <div class="error text-danger">
                                                {{ $errors->first('password') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ 'roles' }}</label>
                                        <select class="form-select form-select-solid" name="roles[]"
                                            data-placeholder="Select an option" data-control="select2">
                                            @foreach ($roles as $role)
                                                <option></option>
                                                <option value="{{ $role['id'] }}">
                                                    {{ $role['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                            <div class="error text-danger">
                                                {{ $errors->first('role') }}</div>
                                        @endif
                                    </div>
                                    <div class="separator mt-6"></div>
                                    <h2 class="mt-2">{{ __('custom_fields') }}</h2>

                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('phone') }}</label>
                                        <input type="number" name="mobile_number" class="form-control"
                                            value="{{ old('mobile_number') }}"
                                            placeholder="{{ __('+12-9874567895') }}" />
                                        @if ($errors->has('mobile_number'))
                                            <div class="error text-danger">
                                                {{ $errors->first('mobile_number') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('address') }}</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('address') }}" placeholder="{{ __('enter_address') }}" />
                                        @if ($errors->has('address'))
                                            <div class="error text-danger">
                                                {{ $errors->first('address') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('short_biography') }}</label>
                                        <div class="flex-grow-1">
                                            <div>
                                                <textarea name="short_biography" class="kt_docs_ckeditor_classic">{{ old('short_biography') }}"</textarea>
                                            </div>
                                            @if ($errors->has('short_biography'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('short_biography') }}
                                                </div>
                                            @endif
                                        </div>
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
    @include('admin.scripts.editor')
@endsection
