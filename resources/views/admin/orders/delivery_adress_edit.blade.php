@extends('layout.master')
@section('layout.header')
    @include('layout.header')
@endsection
@section('layout.left_side_nav')
    @include('layout.left_side_nav')
@endsection
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    {{ __('delivery_addresses')}} | {{  __('delivery_addresses_mangement')  }}</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <!--begin breadcrumbs-->
                                <div class="m-0">
                                    <!--begin::Menu toggle-->
                                    <a href="{{ route('dashboard') }}" class="fs-4 fw-bold" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--end::Svg Icon-->{{ __('dashboard') }}/
                                    </a>
                                    <a href="{{ route('orders.delivery_address') }}" class="fw-bold fs-4"data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--end::Svg Icon-->{{ __('delivery_address') }}/
                                    </a>
                                    <a class="fw-bold text-dark fs-4"data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--end::Svg Icon-->{{ __('delivery_address_edit') }}
                                    </a>
                                </div>
                                <!--end breadcrumbs-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <div id="kt_app_content" class="app-content flex-column-fluid" style="margin-bottom: 50px">
                        <!--begin::Content container-->
                        <div class="app-container">
                            <!--begin::Card-->
                            <div class="card card-flush">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ Route('orders.delivery_address') }}" role="button"
                                                aria-expanded="false">{{ __('delivery_address') }}</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link active" aria-current="page">{{ __('edit_delivery_address') }}</a>
                                        </li>
                                    </ul>
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <form class="form " action="" method="POST">
                                            @csrf
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="row">

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('description') }}</label>
                                                    <input type="text" name="description" class="form-control"
                                                        placeholder="{{ __('description') }}" value="" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('longitude') }}</label>
                                                    <input type="number" name="longitude" class="form-control"
                                                        placeholder="{{ __('longitude') }}" value="" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('address') }}</label>
                                                    <input type="text" name="address" class="form-control"
                                                        placeholder="{{ __('address') }}" value="" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('latitude') }}</label>
                                                    <input type="number" name="latitude" class="form-control"
                                                        placeholder="{{ __('latitude') }}" value="" />
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('user_id') }}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select" data-control="select2"
                                                        data-placeholder="Select an user_id">
                                                        <option></option>
                                                        <option value="1">Option 1</option>
                                                        <option value="2">Option 2</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container mt-8">
                                                    <label
                                                        class="col-form-label required fw-bold px-2">{{ __('featured') }}</label>
                                                    <input class="form-check-input mt-3" type="checkbox"
                                                        value="1" name="featured"
                                                        id="kt_roles_select_all" />
                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <!--begin::Button-->
                                                <a href="{{ url()->previous() }}" id="kt_ecommerce_edit_order_cancel"
                                                    class="btn btn-light me-5">{{ __('cancel') }}</a>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button type="submit" id="kt_ecommerce_edit_order_submit"
                                                    class="btn btn-primary">
                                                    <span class="indicator-label">{{ __('update_delivery_address') }}</span>
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

        </div>
        <!--begin::Footer-->
        @include('layout.footer')
        <!--end::Footer-->
    </div>
@endsection
