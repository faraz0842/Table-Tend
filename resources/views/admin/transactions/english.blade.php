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
                                    {{ __('settings') }}</h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="../../demo1/dist/index.html"
                                            class="text-muted text-hover-primary">{{ __('settings_management') }}</a>
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <!--begin::Filter menu-->
                                <div class="m-0">
                                    <!--begin::Menu toggle-->
                                    <a href="#"
                                        class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                        <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Filter
                                    </a>
                                    <!--end::Menu toggle-->
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                        id="kt_menu_633f099ee2a44">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Menu separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Form-->
                                        <div class="px-7 py-5">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Status:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div>
                                                    <select class="form-select form-select-solid" data-kt-select2="true"
                                                        data-placeholder="Select option"
                                                        data-dropdown-parent="#kt_menu_633f099ee2a44"
                                                        data-allow-clear="true">
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Member Type:</label>
                                                <!--end::Label-->
                                                <!--begin::Options-->
                                                <div class="d-flex">
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                        <span class="form-check-label">Author</span>
                                                    </label>
                                                    <!--end::Options-->
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2"
                                                            checked="checked" />
                                                        <span class="form-check-label">Customer</span>
                                                    </label>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Notifications:</label>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <div
                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="notifications" checked="checked" />
                                                    <label class="form-check-label">Enabled</label>
                                                </div>
                                                <!--end::Switch-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                    data-kt-menu-dismiss="true">Reset</button>
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    data-kt-menu-dismiss="true">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Menu 1-->
                                </div>
                                <!--end::Filter menu-->
                                <!--begin::Secondary button-->
                                <!--end::Secondary button-->
                                <!--begin::Primary button-->
                                <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app">Create</a>
                                <!--end::Primary button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <div class="row g-0">
                        <!--begin::Section-->

                        <div class="col-3">
                            @include('layout.settings_sidebar')
                        </div>
                        <!--end::Section-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content mb-15 flex-column-fluid col-9">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <div>
                                        <!--begin::Card-->
                                        <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">

                                            <!--begin::Card body-->
                                            <div class="card-body pb-0">
                                                <!--begin::Navs-->
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('transactions.index')}}"
                                                            role="button" aria-expanded="false">{{ __('Deutsch') }}</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="{{route('transactions.english')}}"
                                                            role="button" aria-expanded="false">{{ __('English') }}</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('transactions.esapagnol')}}"
                                                            role="button" aria-expanded="false">{{ __('Esapagnol') }}</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('transactions.french')}}"
                                                            role="button" aria-expanded="false">{{ __('French') }}</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('transactions.portuguese')}}"
                                                            role="button" aria-expanded="false">{{ __('portuguese') }}</a>
                                                    </li>
                                                </ul>

                                        <!--begin::Card-->
                                        <!--begin::General options-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <form class="form d-flex flex-column flex-lg-row" action=""
                                                method="POST">
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0">

                                                    <div class="row">
                                                        <div class="col-4">
                                                            <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 mb-3 mb-md-0 fs-6">
                                                                <li class="nav-item w-md-200px me-0">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_vtab_pane_1">Auth</a>
                                                                </li>
                                                                <li class="nav-item w-md-200px me-0">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_vtab_pane_2">Error</a>
                                                                </li>
                                                                <li class="nav-item w-md-200px">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_vtab_pane_3">Installer_Meeesage</a>
                                                                </li>
                                                                <li class="nav-item w-md-200px">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_vtab_pane_4">Lang</a>
                                                                </li>
                                                                <li class="nav-item w-md-200px">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_vtab_pane_5">Pagination</a>
                                                                </li>
                                                                <li class="nav-item w-md-200px">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_vtab_pane_6">Password</a>
                                                                </li>
                                                                <li class="nav-item w-md-200px">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_vtab_pane_7">Validation</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-content col-8" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                                                                <div class="col-12" id="kt_tab_pane_1">
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('agree') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('already_member') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('email') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('failed') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('forgot_password') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('login') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('login_facebook') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('login_google') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('login_title') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('login_twitter') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('logout') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('name') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('password') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('password_confirmation') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('register') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('rember_new_member') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('rember_me') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('rember_password') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('rest_password') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('rest_tittle') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('rest_password_title') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('send_password') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                        <label
                                                                            class="required form-label mx-3 col-3">{{ __('throttle') }}</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                            <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="kt_vtab_pane_2" role="tabpanel">
                                                                <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                                                                    <div class="col-12" id="kt_tab_pane_1">
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('agree') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('already_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('email') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('failed') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('forgot_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_facebook') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_google') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_twitter') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('logout') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('name') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password_confirmation') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('register') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_new_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_me') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_tittle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('send_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('throttle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="kt_vtab_pane_3" role="tabpanel">
                                                                <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                                                                    <div class="col-12" id="kt_tab_pane_1">
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('agree') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('already_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('email') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('failed') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('forgot_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_facebook') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_google') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_twitter') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('logout') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('name') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password_confirmation') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('register') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_new_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_me') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_tittle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('send_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('throttle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="kt_vtab_pane_4" role="tabpanel">
                                                                <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                                                                    <div class="col-12" id="kt_tab_pane_1">
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('agree') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('already_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('email') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('failed') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('forgot_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_facebook') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_google') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_twitter') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('logout') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('name') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password_confirmation') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('register') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_new_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_me') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_tittle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('send_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('throttle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="kt_vtab_pane_5" role="tabpanel">
                                                                <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                                                                    <div class="col-12" id="kt_tab_pane_1">
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('agree') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('already_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('email') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('failed') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('forgot_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_facebook') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_google') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_twitter') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('logout') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('name') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password_confirmation') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('register') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_new_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_me') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_tittle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('send_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('throttle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="kt_vtab_pane_6" role="tabpanel">
                                                                <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                                                                    <div class="col-12" id="kt_tab_pane_1">
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('agree') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('already_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('email') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('failed') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('forgot_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_facebook') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_google') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_twitter') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('logout') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('name') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password_confirmation') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('register') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_new_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_me') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_tittle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('send_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('throttle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="kt_vtab_pane_7" role="tabpanel">
                                                                <div class="tab-pane fade show active" id="kt_vtab_pane_1" role="tabpanel">
                                                                    <div class="col-12" id="kt_tab_pane_1">
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('agree') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('already_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('email') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('failed') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('forgot_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_facebook') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_google') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('login_twitter') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('logout') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('name') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('password_confirmation') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('register') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_new_member') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_me') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rember_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_tittle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('rest_password_title') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('send_password') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex m-5 align-items-center align-items-center col-12">
                                                                            <label
                                                                                class="required form-label mx-3 col-3">{{ __('throttle') }}</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" placeholder="I agree to the theme" aria-describedby="basic-addon2" fdprocessedid="qhv91l">
                                                                                <div class="input-group-append"><span class="input-group-text fs-8">delete</span></div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <!--end::Card header-->
                                        </div>
                                        <div class="d-flex justify-content-end my-5">
                                            <!--begin::Button-->
                                            <a href="{{url()->previous()}}"
                                                id="kt_ecommerce_edit_order_cancel" class="btn btn-light me-5">Cancel</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_ecommerce_edit_order_submit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Save Changes</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
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
