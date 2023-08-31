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
                            {{ __('favorites') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('favorites') }}</li>
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
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="currentColor" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <input type="text" data-kt-filter="search"
                                        class="form-control form-control-solid w-250px ps-15"
                                        placeholder="{{ __('search_favorites') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center min-w-50px">#</th>
                                        <th class="text-center min-w-100px">{{ __('food') }}</th>
                                        <th class="text-center min-w-100px">{{ __('extra') }}</th>
                                        <th class="text-center min-w-100px">{{ __('user') }}</th>
                                        <th class="text-center min-w-100px">{{ __('updated_at') }}</th>
                                        <th class="text-center min-w-100px">{{ __('actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <tr class="text-center">
                                        <td class="text-dark">1</td>
                                        <td class="text-dark">Haleem</td>
                                        <td class="text-dark">Salad</td>
                                        <td class="text-dark">Ebad</td>
                                        <td class="text-dark">3 days ago</td>
                                        <td class="text-dark">
                                            <button data-bs-toggle="modal" data-bs-target="#kt_modal"
                                                class="btn btn-icon btn-danger btn-sm mr-2">
                                                <i class="bi bi-trash fs-4"></i>
                                            </button>
                                            <div class="modal fade" tabindex="-1" id="kt_modal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3>{{ __('are_you_sure_you_want_to_delete_?') }}</h3>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">{{ __('no') }},
                                                                {{ __('cancel') }}</button>
                                                            <a href="#" type="button"
                                                                class="btn btn-danger">{{ __('yes') }},
                                                                {{ __('delete') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
@endsection
@section('scripts')
    @include('admin.datatable.script')
@endsection
