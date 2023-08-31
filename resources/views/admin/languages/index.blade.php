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
                            {{ __('language_translation') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('translation') }}</li>
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
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column gap-7 col-3 gap-lg-10 mb-7 me-lg-10">
                            @include('layout.settings_sidebar')
                        </div>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush p-4">
                                <div class="card-header">
                                    <ul class="nav col-12 nav-tabs">
                                        @if ($languages->count() > 0)
                                            @foreach ($languages as $language)
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $language->name == 'English' ? 'active' : '' }}"
                                                        aria-current="page">{{ $language->name }}({{ $language->code }})
                                                        @if ($language->name == 'English')
                                                            <span class="badge badge-success">Active</span>
                                                        @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <div class="card-toolbar col-12 py-3 justify-content-end">
                                        <div class="d-flex gap-3">
                                            <a href="{{ route('addLanguage') }}" class="btn btn-primary btn-sm">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-90 11.364 20.364)" fill="currentColor">
                                                        </rect>
                                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                                            rx="1" fill="currentColor"></rect>
                                                    </svg>
                                                </span>
                                                {{ __('add_new_language') }}
                                            </a>
                                            <a href="{{ route('newlyConfig') }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-arrow-repeat fs-3"></i>
                                                {{ __('sync_language') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body row justify-content-between">
                                    <div class="col-3">
                                        <?php
                                        $activeTab = 'tab1'; // set default value
                                        ?>
                                        <ul
                                            class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 mb-3 mb-md-0 fs-6">
                                            <li class="nav-item w-md-150px me-0">
                                                <a class="nav-link rounded-pill {{ $activeTab == 'tab1' ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#kt_vtab_pane_1">Auth</a>
                                            </li>
                                            <li class="nav-item w-md-150px me-0">
                                                <a class="nav-link rounded-pill {{ $activeTab == 'tab2' ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#kt_vtab_pane_2">Error</a>
                                            </li>
                                            <li class="nav-item w-md-150px">
                                                <a class="nav-link rounded-pill {{ $activeTab == 'tab3' ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#kt_vtab_pane_3">Installer_Message</a>
                                            </li>
                                            <li class="nav-item w-md-150px">
                                                <a class="nav-link rounded-pill {{ $activeTab == 'tab3' ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#kt_vtab_pane_2">Lang</a>
                                            </li>
                                            <li class="nav-item w-md-150px">
                                                <a class="nav-link rounded-pill {{ $activeTab == 'tab3' ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#kt_vtab_pane_3">Pagination</a>
                                            </li>
                                            <li class="nav-item w-md-150px">
                                                <a class="nav-link rounded-pill {{ $activeTab == 'tab3' ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#kt_vtab_pane_3">Passwords</a>
                                            </li>
                                            <li class="nav-item w-md-150px">
                                                <a class="nav-link rounded-pill {{ $activeTab == 'tab3' ? 'active' : '' }}"
                                                    data-bs-toggle="tab" href="#kt_vtab_pane_3">Validation</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="vr col-1 p-0"></div>
                                    <div class="col-8">
                                        @if ($columnsCount > 0)
                                            @foreach ($languages as $language)
                                                @if ($language->name == 'English')
                                                    <div class="tab-content fade" id="kt_vtab_pane_2" role="tabpanel">
                                                        @foreach ($columns[0] as $columnKey => $columnValue)
                                                            <div class="col-lg-12 row fv-plugins-icon-container">
                                                                <label
                                                                    class="col-form-label text-end fw-bold fs-6 col-4">{{ $columnKey }}</label>
                                                                <div class="col-7">
                                                                    <input type="text" name="value"
                                                                        class="form-control"
                                                                        placeholder="{{ __('value') }}"
                                                                        value="{{ $columnValue }}" />
                                                                    <small>{{ $columnValue }}</small>
                                                                </div>
                                                                <a href="{{ route('translations.destroy', $columnKey) }}"
                                                                    class="btn btn-icon btn-danger btn-sm mr-2">
                                                                    <i class="bi bi-trash fs-4"></i>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="tab-content fade" id="kt_vtab_pane_1" role="tabpanel">
                                                        @foreach ($columns[0] as $columnKey => $columnValue)
                                                            <div class="col-lg-12 row fv-plugins-icon-container">
                                                                <label
                                                                    class="col-form-label text-end fw-bold fs-6 col-4">{{ $columnKey }}</label>
                                                                <div class="col-7">
                                                                    <input type="text" name="value"
                                                                        class="form-control"
                                                                        placeholder="{{ __('value') }}"
                                                                        value="{{ $columnValue }}" />
                                                                    <small>{{ $columnValue }}</small>
                                                                </div>
                                                                <a href="{{ route('translations.destroy', $columnKey) }}"
                                                                    class="btn btn-icon btn-danger btn-sm mr-2">
                                                                    <i class="bi bi-trash fs-4"></i>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <span class="separator my-5"></span>
                                    <div class="card-title">
                                        <h3>{{ __('add_new_key/value') }}</h3>
                                    </div>
                                    <form method='POST' action='{{ route('translation.store') }}'>
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-6 col-form-label required fw-bold fs-6">{{ __('key') }}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="key" class="form-control"
                                                    placeholder="{{ __('insert_key') }}" />
                                                <small>{{ __('insert_key') }}</small>
                                                @if ($errors->has('key'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('key') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <!--begin::Input-->
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-6 col-form-label required fw-bold fs-6">{{ __('value') }}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="value" class="form-control"
                                                    placeholder="{{ __('insert_value') }}" />
                                                <small>{{ __('insert_value') }}</small>
                                                @if ($errors->has('value'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('value') }}
                                                    </div>
                                                @endif
                                            </div>
                                            {{-- <div class="col-md-6 row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-6 col-form-label fw-bold fs-6">{{ __('') }}</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name='key'>
                                                    <small>{{ __('insert_key') }}</small>
                                                    @if ($errors->has('key'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('key') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-6 col-form-label fw-bold fs-6">{{ __('value') }}</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name='value'>
                                                    <small>{{ __('insert_value') }}</small>
                                                    @if ($errors->has('value'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('value') }}</div>
                                                    @endif
                                                </div>
                                            </div> --}}
                                            <div class="col-12 d-flex justify-content-end fv-plugins-icon-container">
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm">{{ __('add_here') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
@endsection
