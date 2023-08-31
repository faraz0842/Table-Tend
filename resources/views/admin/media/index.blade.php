@extends('layout.master')
@section('layout.left_side_nav')
    @include('layout.left_side_nav')
@endsection
@section('content')
    @include('layout.header')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            {{ __('media_library') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('media_library') }}</li>
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
                        <div class="card-header border-0 justify-content-end mb-4 pt-6">
                            @can('media.create')
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('media.create') }}" class="btn btn-primary">
                                            <span class="svg-icon svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                        height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                                        fill="currentColor"></rect>
                                                    <rect x="4.36396" y="11.364" width="16" height="2"
                                                        rx="1" fill="currentColor"></rect>
                                                </svg>
                                            </span>
                                            {{ __('add_media') }}
                                        </a>
                                    </div>
                                </div>
                            @endcan
                        </div>
                        <div class="card-body row pt-0">
                            @foreach ($images as $image)
                                <div class="col-sm-3 g-3 shadow-lg" id="file-manager">
                                    <div class="card clickble">
                                        <form action="{{ route('file.destroy', $image['id']) }}" method="post"
                                            enctype="multipart/form-data" class="justify-content-end d-flex">
                                            @csrf
                                            @can('file.destroy')
                                                <button
                                                    class="btn btn-light-danger justify-content-center delete_btn btn-sm col-3 position-absolute m-6 d-flex"
                                                    type="submit">Delete</button>
                                            @endcan
                                        </form>
                                        <img class="card-img p-3 img-responsive" style="height:30vh" data-bs-dismiss="modal"
                                            src="{{ asset($image->getUrl()) }}" alt="Card image"
                                            data-image-id="{{ $image->id }}">
                                        <div class="card-footer text-center">
                                            <small>{{ $image['mime_type'] }}</small><br> <small
                                                class="text-muted">{{ $image['created_at'] }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
