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
                            {{ __('edit_order') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('edit_order') }}</li>
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
                    <!--begin::Card header-->
                    <form class="form " action="" method="POST">
                        @csrf
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('general') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body row pt-0">
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('client') }}</label>
                                        <select class="form-select" data-control="select2"
                                            data-placeholder="select_an_client">
                                            <option></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('delivery_boy') }}</label>
                                        <select class="form-select" data-control="select2"
                                            data-placeholder="select_an_delivery_boy">
                                            <option></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('tax') }}</label>
                                        <select class="form-select" data-control="select2" data-placeholder="select_an_tax">
                                            <option></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('payment_status_paid') }}</label>
                                        <select class="form-select" data-control="select2"
                                            data-placeholder="select_an_payment_status_paid">
                                            <option></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('hint') }}</label>
                                        <!--end::Label-->
                                        <div class="flex-grow-1">
                                            <!--begin::Block-->
                                            <div>
                                                <textarea name="hint" class="kt_docs_ckeditor_classic"></textarea>
                                            </div>
                                            <!--end::Block-->
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
