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
                            {{ __('dashboard') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('Admin') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('dashboard') }}</li>
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
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <!--begin::Card-->
                        <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat bg-light">
                            <!--begin::Card body-->
                            <div class="row g-5 g-xl-4">
                                <div class="col-sm-6 col-lg-3 mb-xl-10">
                                    <!--begin::Card widget 2-->
                                    <div class="card h-lg-100">
                                        <!--begin::Body-->
                                        <div class="card-body row col-12 justify-content-between flex-row">
                                            <!--begin::Section-->
                                            <div class="d-flex col-8 flex-column">
                                                <!--begin::Number-->
                                                <span class="fw-bold fs-2x text-gray-800 lh-1">320k</span>
                                                <!--end::Number-->
                                                <!--begin::Follower-->
                                                <span class="fw-bold fs-6 text-gray-400">{{ __('total_orders') }}</span>
                                                <!--end::Follower-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Icon-->
                                            <span class="svg-icon col-4 svg-icon-primary svg-icon-4x">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Cooking/Dinner.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M12.5,19 C8.91014913,19 6,16.0898509 6,12.5 C6,8.91014913 8.91014913,6 12.5,6 C16.0898509,6 19,8.91014913 19,12.5 C19,16.0898509 16.0898509,19 12.5,19 Z M12.5,16.4 C14.6539105,16.4 16.4,14.6539105 16.4,12.5 C16.4,10.3460895 14.6539105,8.6 12.5,8.6 C10.3460895,8.6 8.6,10.3460895 8.6,12.5 C8.6,14.6539105 10.3460895,16.4 12.5,16.4 Z M12.5,15.1 C11.0640597,15.1 9.9,13.9359403 9.9,12.5 C9.9,11.0640597 11.0640597,9.9 12.5,9.9 C13.9359403,9.9 15.1,11.0640597 15.1,12.5 C15.1,13.9359403 13.9359403,15.1 12.5,15.1 Z"
                                                            fill="#000000" opacity="0.3" />
                                                        <path
                                                            d="M22,13.5 L22,13.5 C22.2864451,13.5 22.5288541,13.7115967 22.5675566,13.9954151 L23.0979976,17.8853161 C23.1712756,18.4226878 22.7950533,18.9177172 22.2576815,18.9909952 C22.2137086,18.9969915 22.1693798,19 22.125,19 L22.125,19 C21.5576012,19 21.0976335,18.5400324 21.0976335,17.9726335 C21.0976335,17.9415812 21.0990414,17.9105449 21.1018527,17.8796201 L21.4547321,13.9979466 C21.4803698,13.7159323 21.7168228,13.5 22,13.5 Z"
                                                            fill="#000000" opacity="0.3" />
                                                        <path
                                                            d="M24,5 L24,12 L21,12 L21,8 C21,6.34314575 22.3431458,5 24,5 Z"
                                                            fill="#000000"
                                                            transform="translate(22.500000, 8.500000) scale(-1, 1) translate(-22.500000, -8.500000) " />
                                                        <path
                                                            d="M0.714285714,5 L1.03696911,8.32873399 C1.05651593,8.5303749 1.22598532,8.68421053 1.42857143,8.68421053 C1.63115754,8.68421053 1.80062692,8.5303749 1.82017375,8.32873399 L2.14285714,5 L2.85714286,5 L3.17982625,8.32873399 C3.19937308,8.5303749 3.36884246,8.68421053 3.57142857,8.68421053 C3.77401468,8.68421053 3.94348407,8.5303749 3.96303089,8.32873399 L4.28571429,5 L5,5 L5,8.39473684 C5,9.77544872 3.88071187,10.8947368 2.5,10.8947368 C1.11928813,10.8947368 -7.19089982e-16,9.77544872 -8.8817842e-16,8.39473684 L0,5 L0.714285714,5 Z"
                                                            fill="#000000" />
                                                        <path
                                                            d="M2.5,12.3684211 L2.5,12.3684211 C2.90055463,12.3684211 3.23115721,12.6816982 3.25269782,13.0816732 L3.51381042,17.9301218 C3.54396441,18.4900338 3.11451066,18.9683769 2.55459863,18.9985309 C2.53641556,18.9995101 2.51820943,19 2.5,19 L2.5,19 C1.93927659,19 1.48472045,18.5454439 1.48472045,17.9847204 C1.48472045,17.966511 1.48521034,17.9483049 1.48618958,17.9301218 L1.74730218,13.0816732 C1.76884279,12.6816982 2.09944537,12.3684211 2.5,12.3684211 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--end::Icon-->
                                            <!--begin::Statistics-->
                                            <div class="m-0">
                                                <!--begin::Badge-->
                                                <span class="badge badge-success d-inline-flex flex-center px-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                                                    <span class="svg-icon svg-icon-7 svg-icon-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.5"
                                                                d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->2.1 %
                                                </span>
                                                <!--end::Badge-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card widget 2-->
                                </div>
                                <!--begin::Col-->
                                <div class="col-sm-6 col-lg-3 mb-xl-10">
                                    <!--begin::Card widget 2-->
                                    <div class="card h-lg-100">
                                        <!--begin::Body-->
                                        <div class="card-body row col-12 justify-content-between flex-row">
                                            <!--begin::Section-->
                                            <div class="d-flex col-8 flex-column">
                                                <!--begin::Number-->
                                                <span class="fw-bold fs-2x text-gray-800 lh-1">$160.93</span>
                                                <!--end::Number-->
                                                <!--begin::Follower-->
                                                <span class="fw-bold fs-6 text-gray-400">{{ __('total_earnings') }}</span>
                                                <!--end::Follower-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Icon-->
                                            <span class="svg-icon col-4 svg-icon-primary svg-icon-4x">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Wallet.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5"
                                                            r="1.5" />
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                            x="3" y="3" width="18" height="7"
                                                            rx="1" />
                                                        <path
                                                            d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--end::Icon-->
                                            <!--begin::Statistics-->
                                            <div class="m-0">
                                                <!--begin::Badge-->
                                                <span class="badge badge-danger d-inline-flex flex-center px-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr068.svg-->
                                                    <span class="svg-icon svg-icon-7 svg-icon-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.5"
                                                                d="M13 14.4V3.00003C13 2.40003 12.6 2.00003 12 2.00003C11.4 2.00003 11 2.40003 11 3.00003V14.4H13Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M5.7071 16.1071C5.07714 15.4771 5.52331 14.4 6.41421 14.4H17.5858C18.4767 14.4 18.9229 15.4771 18.2929 16.1071L12.7 21.7C12.3 22.1 11.7 22.1 11.3 21.7L5.7071 16.1071Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->0.47 %
                                                </span>
                                                <!--end::Badge-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card widget 2-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-sm-6 col-lg-3  mb-xl-10">
                                    <!--begin::Card widget 2-->
                                    <div class="card h-lg-100">
                                        <!--begin::Body-->
                                        <div class="card-body row col-12 justify-content-between flex-row">
                                            <!--begin::Section-->
                                            <div class="d-flex col-8 flex-column">
                                                <!--begin::Number-->
                                                <span
                                                    class="fw-bold fs-2x text-gray-800 lh-1">{{ $totalRestaurants }}</span>
                                                <!--end::Number-->
                                                <!--begin::Follower-->
                                                <span class="fw-bold fs-6 text-gray-400">{{ __('restaurants') }}</span>
                                                <!--end::Follower-->
                                            </div>
                                            <!--end::Section-->
                                            <span class="svg-icon col-4 svg-icon-primary svg-icon-4x">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Cooking/KnifeAndFork2.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path
                                                            d="M3.98842709,3.05999994 L11.0594949,10.1310678 L8.23106778,12.9594949 L3.98842709,8.71685419 C2.42632992,7.15475703 2.42632992,4.62209711 3.98842709,3.05999994 Z"
                                                            fill="#000000" />
                                                        <path
                                                            d="M17.7539614,3.90710683 L14.8885998,7.40921548 C14.7088587,7.62889898 14.7248259,7.94903916 14.9255342,8.14974752 C15.1262426,8.35045587 15.4463828,8.36642306 15.6660663,8.18668201 L19.1681749,5.32132039 L19.8752817,6.02842717 L17.0099201,9.53053582 C16.830179,9.75021933 16.8461462,10.0703595 17.0468546,10.2710679 C17.2475629,10.4717762 17.5677031,10.4877434 17.7873866,10.3080024 L21.2894953,7.44264073 L21.9966021,8.14974752 L18.8146215,11.331728 C17.4477865,12.6985631 15.2317091,12.6985631 13.8648741,11.331728 C12.4980391,9.96489301 12.4980391,7.74881558 13.8648741,6.38198056 L17.0468546,3.20000005 L17.7539614,3.90710683 Z"
                                                            fill="#000000" />
                                                        <path
                                                            d="M11.0753788,13.9246212 C11.4715437,14.3207861 11.4876245,14.9579589 11.1119478,15.3736034 L6.14184561,20.8724683 C5.61370242,21.4567999 4.71186338,21.5023497 4.12753173,20.9742065 C4.10973311,20.9581194 4.09234327,20.9415857 4.0753788,20.9246212 C3.51843234,20.3676747 3.51843234,19.4646861 4.0753788,18.9077397 C4.09234327,18.8907752 4.10973311,18.8742415 4.12753173,18.8581544 L9.62639662,13.8880522 C10.0420411,13.5123755 10.6792139,13.5284563 11.0753788,13.9246212 Z"
                                                            fill="#000000" opacity="0.3" />
                                                        <path
                                                            d="M13.0754022,13.9246212 C13.4715671,13.5284563 14.1087399,13.5123755 14.5243844,13.8880522 L20.0232493,18.8581544 C20.0410479,18.8742415 20.0584377,18.8907752 20.0754022,18.9077397 C20.6323487,19.4646861 20.6323487,20.3676747 20.0754022,20.9246212 C20.0584377,20.9415857 20.0410479,20.9581194 20.0232493,20.9742065 C19.4389176,21.5023497 18.5370786,21.4567999 18.0089354,20.8724683 L13.0388332,15.3736034 C12.6631565,14.9579589 12.6792373,14.3207861 13.0754022,13.9246212 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--begin::Statistics-->
                                            <div class="m-0">
                                                <!--begin::Badge-->
                                                <span class="badge badge-success d-inline-flex flex-center px-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                                                    <span class="svg-icon svg-icon-7 svg-icon-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.5"
                                                                d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->0.6 %
                                                </span>
                                                <!--end::Badge-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card widget 2-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-sm-6 col-lg-3 mb-xl-10">
                                    <!--begin::Card widget 2-->
                                    <div class="card h-lg-100">
                                        <!--begin::Body-->
                                        <div class="card-body row col-12 justify-content-between flex-row">
                                            <!--begin::Section-->
                                            <div class="d-flex col-8 flex-column">
                                                <!--begin::Number-->
                                                <span class="fw-bold fs-2x text-gray-800 lh-1">6</span>
                                                <!--end::Number-->
                                                <!--begin::Follower-->
                                                <span class="fw-bold fs-6 text-gray-400">{{ __('total_clients') }}</span>
                                                <!--end::Follower-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-03-24-172858/core/html/src/media/icons/duotune/communication/com014.svg-->
                                            <span class="svg-icon col-4 svg-icon-muted svg-icon-4x"><svg width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                        fill="currentColor" />
                                                    <rect opacity="0.3" x="14" y="4" width="4"
                                                        height="4" rx="2" fill="currentColor" />
                                                    <path
                                                        d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                        fill="#000000" />
                                                    <rect opacity="0.3" x="6" y="5" width="6"
                                                        height="6" rx="3" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--begin::Statistics-->
                                            <div class="m-0">
                                                <!--begin::Badge-->
                                                <span class="badge badge-success d-inline-flex flex-center px-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                                                    <span class="svg-icon svg-icon-7 svg-icon-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.5"
                                                                d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->3 %
                                                </span>
                                                <!--end::Badge-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card widget 2-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <div class="row g-5 g-xl-8">
                            <div class="col-xl-6">
                                <!--begin::Charts Widget 3-->
                                <div class="card mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold fs-3 mb-1">{{ __('earnings') }}</span>
                                        </h3>
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar" data-kt-buttons="true">
                                            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1"
                                                id="kt_charts_widget_3_year_btn">Year</a>
                                            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1"
                                                id="kt_charts_widget_3_month_btn">Month</a>
                                            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4"
                                                id="kt_charts_widget_3_week_btn">Week</a>
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                        <!--begin::Info-->
                                        <div class="px-9 mb-5">
                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Value-->
                                                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">$126.93</span>
                                                <!--end::Value-->
                                            </div>
                                            <!--end::Statistics-->
                                            <!--begin::Description-->
                                            <span class="fs-6 fw-semibold">{{ __('earning_over_time') }}
                                            </span>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_4" class="min-h-auto ps-4 pe-6" style="height: 300px">
                                        </div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Charts Widget 3-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Charts Widget 4-->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                                id="kt_table_users">
                                                <!--begin::Table head-->
                                                <div class="card-tools text-end">

                                                    <a href="{{ route('restaurant.list') }}"
                                                        class="btn btn-tool btn-sm"><i class="fa fa-bars"></i>
                                                    </a>
                                                </div>
                                                <thead>
                                                    <!--begin::Table row-->
                                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="min-w-110px">{{ __('image') }}</th>
                                                        <th class="min-w-110px">{{ __('restaurant') }}</th>
                                                        <th class="min-w-110px">{{ __('address') }}</th>
                                                        <th class="min-w-110px text-end">{{ __('action') }}</th>
                                                    </tr>
                                                    <!--end::Table row-->
                                                </thead>
                                                <tbody>
                                                    @foreach ($restaurants as $restaurant)
                                                        <tr>
                                                            <td> <img
                                                                    src="{{ ImageHelper::GetImageUrl($restaurant->getFirstMediaUrl('restaurant.images')) }}"
                                                                    class="symbol symbol-circle symbol-50px overflow-hidden me-3 w-50px h-50px">
                                                            </td>
                                                            <td>{{ $restaurant['name'] }}</td>
                                                            <td>{{ $restaurant['address'] }}</td>
                                                            <td>
                                                            <td class="">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon"
                                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                            class="fa-solid fa-ellipsis-vertical"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a href="{{ route('restaurant.edit', $restaurant) }}"
                                                                            class="dropdown-item">
                                                                            Edit</a>
                                                                        <a href="{{ route('restaurant.delete', $restaurant) }}"
                                                                            class="dropdown-item">
                                                                            Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <!--end::Table head-->
                                            </table>
                                            {{ $restaurants->links() }}
                                        </div>
                                    </div>
                                </div>
                                <!--end::Charts Widget 4-->
                            </div>
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
