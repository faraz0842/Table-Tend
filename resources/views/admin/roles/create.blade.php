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
                            {{ __('role_management') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('create_role') }}</li>
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
                        action="{{ route('role.store') }}">
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
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-8 col-form-label required fw-bold fs-6">{{ __('name') }}</label>
                                        <input type="text" name="name" placeholder="{{ __('name') }}"
                                            value="{{ old('name') }}"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                    @if ($errors->has('name'))
                                        <div class="error text-danger">{{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-8 col-form-label required fw-bold fs-6">{{ __('guard_name') }}</label>
                                        <input readonly type="text" name="guard_name" value="web"
                                            placeholder="{{ __('guard_name') }}"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                    @if ($errors->has('guard_name'))
                                        <div class="error text-danger">
                                            {{ $errors->first('guard_name') }}</div>
                                    @endif
                                    <!--end::Col-->

                                    @foreach ($permissions as $permission)
                                        <div class="col-sm-3 my-4">
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" name="permission_checkbox[]"
                                                    value="{{ $permission['id'] }}" />
                                                <span
                                                    class="form-check-label fw-semibold text-muted">{{ $permission['name'] }}</span>
                                            </label>
                                            @if ($errors->has('permission_checkbox'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('permission_checkbox') }}
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
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
