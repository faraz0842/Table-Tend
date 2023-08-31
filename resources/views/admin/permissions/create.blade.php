@extends('layout.master')
@section('layout.header')
    @include('layout.header')
@endsection
@section('layout.left_side_nav')
    @include('layout.left_side_nav')
@endsection
@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <div class="p-5">
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="card mb-5 mb-xl-8" style="user-select: auto;">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5" style="user-select: auto;">
                        <h3 class="card-title align-items-start flex-column" style="user-select: auto;">
                            <span class="card-label fw-bold fs-3 mb-1" style="user-select: auto;">Add Permission</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3" style="user-select: auto;">
                        <!--begin::Table container-->
                        <div class="modal-body">
                            <!--begin::Label-->
                            <!--end::Label-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <label class="col-lg-8 col-form-label required fw-bold fs-6">Permission Name</label>
                                    <input type="text" name="name" placeholder="Permission Name"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                @if ($errors->has('name'))
                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <label class="col-lg-8 col-form-label required fw-bold fs-6">Guard Name</label>
                                    <input type="text" name="guard_name" placeholder="Guard Name"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                @if ($errors->has('guard_name'))
                                    <div class="error text-danger">{{ $errors->first('guard_name') }}</div>
                                @endif
                                <!--end::Col-->
                            </div>
                        </div>
                        <div class="modal-footer gap-2">
                            <button type="submit" class="btn btn-success">
                                Add Permission
                            </button>
                            <a class="btn btn-light-danger" href={{ route('permission.index') }}> Cancel </a>
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
            </div>
        </form>
    </div>
    <!--end:::Main-->
@endsection
@section('layout.footer')
    @include('layout.footer')
@endsection
