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
                                Drivers|Drivers Management</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Page title-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <!--begin breadcrumbs-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item fw-bold fs-4"><a
                                            href="{{ Route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item fw-bold fs-4"><a
                                            href="{{ Route('driver.index') }}">Drivers</a></li>
                                    <li class="breadcrumb-item fw-bold fs-4 active" aria-current="page">Edit Driver</li>
                                </ol>
                            </nav>
                            <!--end breadcrumbs-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid" style="margin-bottom: 50px">
                    <!--begin::Content container-->
                    <div id="kt_app_content_container" class="app-container">
                        <!--begin::Card-->
                        <div class="card card-flush">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('driver.index') }}"
                                            role="button" aria-expanded="false">Driver
                                            List</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link active" aria-current="page" href="#">Edit Driver</a>
                                    </li>
                                </ul>
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <form class="form"
                                        action="{{ route('driver.update', $driver->id) }}"
                                        method="POST">
                                        @csrf
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">

                                                <label
                                                    class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Delivery Fee') }}</label>
                                                <input type="text" name="delivery_fee" class="form-control"
                                                    placeholder="{{ __('Delivery Fee') }}"
                                                    value="{{ $driver->delivery_fee }}" />


                                            </div>
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container mt-6">
                                                <label
                                                    class="col-form-label required fw-bold px-2">{{ __('available') }}</label>
                                                <input class="form-check-input mt-3" type="checkbox"
                                                    name="available" id="kt_roles_select_all"
                                                    {{ $driver->available=='yes' ? 'checked' : '' }} />


                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                            <a href="{{ url()->previous() }}" id="kt_ecommerce_edit_order_cancel"
                                                class="btn btn-light me-5">Cancel</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_ecommerce_edit_order_submit"
                                                class="btn btn-primary">
                                                <span
                                                    class="indicator-label">{{ __('Update Driver') }}</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
            <!--end::Content wrapper-->
        </div>
        <!--end:::Main-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    @include('layout.footer')
    <!--end::Footer-->
</div>
@endsection
@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#kt_docs_ckeditor_classic'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
