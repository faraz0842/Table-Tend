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
                            <li class="breadcrumb-item text-muted">{{ __('payments') }}</li>
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
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page"
                                                type="button">{{ __('payments') }}</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ Route('payments.paypal') }}" role="button"
                                                aria-expanded="false">{{ __('paypal') }}
                                                <span
                                                    class="badge badge-exclusive badge-light-success fw-semibold fs-8 px-2 py-1 ms-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-original-title="In-house component"
                                                    data-kt-initialized="1">{{ __('active') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ Route('payments.stripe') }}" role="button"
                                                aria-expanded="false">{{ __('stripe') }}
                                                <span
                                                    class="badge badge-exclusive badge-light-success fw-semibold fs-8 px-2 py-1 ms-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-original-title="In-house component"
                                                    data-kt-initialized="1">{{ __('active') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ Route('payments.razorpay') }}" role="button"
                                                aria-expanded="false">{{ __('razorpay') }}
                                                <span
                                                    class="badge badge-exclusive badge-light-success fw-semibold fs-8 px-2 py-1 ms-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-original-title="In-house component"
                                                    data-kt-initialized="1">{{ __('active') }}</span>
                                            </a>
                                        </li>
                                    </ul>
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
                                    <form class="form" action="{{ Route('payments.store.payment') }}" method="POST">
                                        @csrf
                                        <div class="card card-flush my-10">
                                            <!--begin::Card header-->
                                            <div class="row">
                                                <div class="d-flex flex-row justify-content-start">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cash mt-1" viewBox="0 0 16 16">
                                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                        <path
                                                            d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                                    </svg>
                                                    <h2 class="mx-5">{{ __('default_tax') }}</h2>
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('default_tax') }}</label>
                                                    <!--begin::Input-->
                                                    <input type="number" name="default_tax" class="form-control"
                                                        placeholder="{{ __('default_tax') }}"
                                                        value="{{ isset($payment['app_tax']) ? $payment['app_tax'] : '' }}" />
                                                    <small>{{ __('insert_default_tax_ex:20_for_(20%)') }}</small>
                                                    @if ($errors->has('default_tax'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('default_tax') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="separator my-10"></div>
                                            <div class="row">
                                                <div class="d-flex flex-row justify-content-start">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-cash mt-1" viewBox="0 0 16 16">
                                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                        <path
                                                            d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                                    </svg>
                                                    <h2 class="mx-5">{{ __('default_currency') }}</h2>
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('default_currency') }}</label>
                                                    <select class="form-select" data-control="select2"
                                                        data-placeholder="select_an_default_currency"
                                                        name="default_currency">
                                                        @foreach ($default_currency as $default_currencies)
                                                            <option
                                                                value="{{ $default_currencies->name }}"{{ isset($payment['app_currency']) && $default_currencies->name == $payment['app_currency'] ? 'selected' : '' }}>
                                                                {{ $default_currencies->name }}
                                                                {{ $default_currencies->symbol }}</option>
                                                        @endforeach
                                                    </select>
                                                    <small>{{ __('select_you_default_currency_you_can_add_others_settings_currencies') }}</small>
                                                    @if ($errors->has('default_currency'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('default_currency') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('currency_in_the_right') }}</label>
                                                    <div>
                                                        <input class="form-check-input mt-4" type="checkbox"
                                                            name="currency_place"
                                                            {{ isset($payment['app_currency_place']) && $payment['app_currency_place'] == 'Active' ? 'checked' : '' }} />
                                                    </div>
                                                    {{-- <input class="form-check-input mt-4" type="checkbox"
                                                    name="currency_place"
                                                    {{ isset($payment['app_currency_place']) && $payment['app_currency_place'] == 'Active' ? 'checked' : '' }} /> --}}
                                                    @if ($errors->has('currency_place'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('currency_place') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end my-5">
                                            <!--begin::Button-->
                                            <a href="{{ url()->previous() }}" id="kt_ecommerce_edit_order_cancel"
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
