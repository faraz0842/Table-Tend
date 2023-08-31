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
                        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    Language | Language Management</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->

                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <!--begin::Card-->
                            <div class="card card-flush">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ Route('languages') }}" role="button"
                                                aria-expanded="false">Translation
                                                List</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link active" aria-current="page"
                                                href="{{ Route('addLanguage') }}">Create Language</a>
                                        </li>
                                    </ul>
                                    <form class="row g-5 pt-5" action="{{ route('createLanguage') }}" method="POST">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label class="form-label me-3">Language</label>
                                                </div>
                                                <div class="col-md-9 mb-3">
                                                    <div class="flex-grow-1">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name">

                                                    </div>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-md-3">
                                                    <label class="form-label me-3">Code</label>
                                                </div>
                                                <div class="col-md-9 mb-3">
                                                    <div class="flex-grow-1">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="code">
                                                    </div>
                                                    @error('code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary me-3 btn-sm">Add
                                                        Language</button>
                                                    <a href="{{ Route('languages') }}"
                                                        class="btn btn-primary btn-sm">Cancel</a>
                                                </div>
                                            </div>
                                    </form>
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
