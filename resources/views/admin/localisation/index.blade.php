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
                            {{ __('localisation_management') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('localisation') }}</li>
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
                    <form class="form flex-column" method="POST" enctype="multipart/form-data"
                        action="{{ route('localisation.store') }}">
                        @csrf
                        <div class="d-flex flex-column flex-lg-row">
                            <div class="d-flex flex-column gap-7 col-3 gap-lg-10 mb-7 me-lg-10">
                                @include('layout.settings_sidebar')
                            </div>
                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('general') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body row pt-0">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label fw-bold fs-6">{{ __('date') }}</label>
                                            <input type="text" name="date_format" class="form-control"
                                                value="{{ config()->get('app.date_format') }}"
                                                placeholder="{{ __('enter_your_format') }}" />
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label fw-bold fs-6">{{ __('application_language') }}</label>
                                            <select class="form-select" data-control="select2"
                                                data-placeholder="Select an option" name='locale'>
                                                <option>{{ config()->get('app.locale') }}</option>
                                                @foreach (Config::get('languages') ? Config::get('languages') : ['Null' => 'No Language Added'] as $key => $value)
                                                    <option value="{{ $key }}">
                                                        {{ $value }}({{ $key }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label fw-bold fs-6">{{ __('timezone') }}</label>
                                            <select class="form-select" data-control="select2"
                                                data-placeholder="Select timezone" name='timezone'>
                                                <option>{{ config()->get('app.timezone') }}</option>
                                                @foreach (Config::get('timezone') ? Config::get('timezone') : ['Null' => 'No Timezone Added'] as $key => $value)
                                                    <option value="{{ $key }}">
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('save_changes') }}
                                    </button>
                                </div>
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
    @include('admin.scripts.color')
@endsection
