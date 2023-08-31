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
                            {{ __('add_driver_payout') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('create_driver_payout') }}</li>
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
                        action="{{ route('drivers_payout.store') }}">
                        @csrf
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
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('user') }}
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" data-control="select2" name="user_id"
                                                data-placeholder="Select an user">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user['id'] }}">
                                                        {{ $user['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('user_id'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('user_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('payment_method') }}
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" data-control="select2" name="payment_method_id"
                                                data-placeholder="Select an method">
                                                @foreach ($paymentMethod as $paymentMethods)
                                                    <option value="{{ $paymentMethods['id'] }}">
                                                        {{ $paymentMethods['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('payment_method_id'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('payment_method_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('paid_date') }}</label>
                                            <input type="date" name="paid_date" class="form-control"
                                                placeholder="{{ __('enter_paid_date') }}" value="{{ old('paid_date') }}">
                                            @if ($errors->has('paid_date'))
                                                <div class="text-danger">{{ $errors->first('paid_date') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('amount') }}</label>
                                            <input type="number" name="amount" class="form-control"
                                                placeholder="{{ __('amount') }}" value="{{ old('amount') }}" />
                                            @if ($errors->has('amount'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('amount') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('note') }}</label>
                                            <!--end::Label-->
                                            <div class="flex-grow-1">
                                                <!--begin::Block-->
                                                <div>
                                                    <textarea name="note" class="kt_docs_ckeditor_classic"></textarea>
                                                </div>
                                                @if ($errors->has('note'))
                                                    <div class="error text-danger">
                                                        {{ $errors->first('note') }}
                                                    </div>
                                                @endif
                                                <!--end::Block-->
                                            </div>
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
