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
                            <li class="breadcrumb-item text-muted">{{ __('stripe') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content mb-15 flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column gap-7 gap-lg-10 col-3 mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                @include('layout.settings_sidebar')
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin::Card-->
                            <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
                                <!--begin::Card body-->
                                <div class="card-body pb-0">
                                    <!--begin::Navs-->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ Route('payments.index') }}"
                                                role="button" aria-expanded="false">{{ __('payments') }}</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ Route('payments.paypal') }}"
                                                role="button" aria-expanded="false">{{ __('paypal') }}
                                                <span
                                                    class="badge badge-exclusive badge-light-success fw-semibold fs-8 px-2 py-1 ms-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-original-title="In-house component"
                                                    data-kt-initialized="1">{{ __('active')}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link active" aria-current="page"
                                                type="button">{{ __('stripe') }}
                                                <span
                                                    class="badge badge-exclusive badge-light-success fw-semibold fs-8 px-2 py-1 ms-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-original-title="In-house component"
                                                    data-kt-initialized="1">{{ __('active')}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ Route('payments.razorpay') }}"
                                                role="button" aria-expanded="false">{{ __('razorpay') }}
                                                <span
                                                    class="badge badge-exclusive badge-light-success fw-semibold fs-8 px-2 py-1 ms-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-original-title="In-house component"
                                                    data-kt-initialized="1">{{ __('active')}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    @include('layout.alert')
                                    <form class="form" action="{{ Route('payments.store.stripe') }}"
                                        method="POST">
                                        @csrf
                                        <div class="card card-flush my-10">
                                            <!--begin::Card header-->
                                            <div class="row">
                                                <div class="col-lg-12 fv-row fv-plugins-icon-container my-10">
                                                    <label class="fw-bold fs-6">
                                                        {{ __('enable_stripe') }}</label>
                                                    <input class="form-check-input mx-5" type="checkbox"
                                                        name="enable_stripe"
                                                        {{ isset($stripe['app_stripe']) && $stripe['app_stripe'] == 'Active' ? 'checked' : '' }} />
                                                    <small>{{ __('check_it_to_enable_stripe_payment_method') }}</small>
                                                    @if ($errors->has('enable_stripe'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('enable_stripe') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="col-lg-6 col-form-label fw-bold fs-6">
                                                        {{ __('stripe_key') }}</label>
                                                    <input type="text" name="stripe_key" class="form-control"
                                                        value="{{ isset($stripe['app_stripe_key']) ? $stripe['app_stripe_key'] : '' }}" />
                                                    <small>{{ __('insert_stripe_key') }}</small>
                                                    @if ($errors->has('stripe_key'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('stripe_key') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="col-lg-6 col-form-label fw-bold fs-6">
                                                        {{ __('stripe_secret') }}</label>
                                                    <input type="text" name="stripe_secret"
                                                        class="form-control"
                                                        value="{{ isset($stripe['app_stripe_secret']) ? $stripe['app_stripe_secret'] : '' }}" />
                                                    <small>{{ __('insert_stripe_secret') }}</small>
                                                    @if ($errors->has('stripe_secret'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('stripe_secret') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end my-5">
                                            <!--begin::Button-->
                                            <a href="{{ url()->previous() }}"
                                                id="kt_ecommerce_edit_order_cancel"
                                                class="btn btn-light me-5">{{ __('cancel') }}</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_ecommerce_edit_order_submit"
                                                class="btn btn-primary">
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
