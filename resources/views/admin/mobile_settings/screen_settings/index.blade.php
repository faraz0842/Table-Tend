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
                                    {{ __('settings') }} / {{ __('settings_management') }}</h1>
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <!--begin::Filter menu-->
                                <div class="m-0">
                                    <!--begin::Menu toggle-->
                                    <a href="{{ route('dashboard') }}" class="fs-4 fw-bold" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--end::Svg Icon-->{{ __('dashboard /') }}
                                    </a>

                                    <a href="" class="fw-bold text-dark fs-4"data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--end::Svg Icon-->{{ __('home_screen_layout') }}
                                    </a>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <div class="row g-0">
                        <div class="col-3">
                            @include('layout.mobile_setting_sidebar')
                        </div>
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid col-9">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <!--begin::Card-->
                                    <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">

                                        <!--begin::Card body-->
                                        <div class="card-body pb-0">
                                            <!--begin::Navs-->
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="{{ Route('mobile.setting.index') }}"
                                                        role="button" aria-expanded="false">{{ __('global_settings') }}</a>
                                                </li>
                                            </ul>
                                            @include('layout.alert')
                                            <!--begin::Card-->
                                            <!--begin::General options-->
                                            <div class="card card-flush py-4">
                                                <!--begin::Card header-->
                                                @if (isset($mobileScreen))
                                                    <form action="{{ route('mobile.screen.update', $mobileScreen['id']) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                    @else
                                                        <form action="{{ route('mobile.screen.store') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                @endif
                                                @csrf
                                                <!--end::Card header-->
                                                <div class="row">
                                                    <h1>{{ __('home_screen_layout_builder') }}</h1>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -1') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_1"
                                                                data-placeholder="Select an option" data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_1'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_1'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_1'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_1'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_1'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_1'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_1'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_1') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -2') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_2"
                                                                data-placeholder="Select an option" data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_2'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_2'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_2'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_2'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_2'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_2'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_2'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_2') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -3') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_3"
                                                                data-placeholder="Select an option" data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_3'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_3'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_3'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_3'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_3'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_3'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_3'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_3') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -4') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_4"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_4'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_4'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_4'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_4'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_4'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_4'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_4'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_4') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -5') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_5"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_5'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_5'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_5'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_5'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_5'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_5'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_5'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_5') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -6') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_6"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_6'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_6'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_6'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_6'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_6'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_6'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_6'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_6') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -7') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_7"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_7'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_7'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_7'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_7'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_7'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_7'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_7'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_7') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -8') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_8"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_8'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_8'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_8'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_8'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_8'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_8'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_8'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_8') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -9') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_9"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_9'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_9'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_9'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_9'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_9'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_9'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_9'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_9') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -10') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_10"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_10'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_10'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_10'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_10'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_10'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_10'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_10'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_10') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -11') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_11"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_11'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_11'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_11'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_11'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_11'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_11'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_11'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_11') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                        <label
                                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('Section / Row -12') }}</label>
                                                        <div class="col-12">
                                                            <select class="form-select" name="section_12"
                                                                data-placeholder="Select an option"
                                                                data-control="select2">
                                                                @if (isset($mobileScreen))
                                                                    <option
                                                                        value="empty_section"{{ $mobileScreen['section_12'] == 'empty_section' ? 'selected' : '' }}>
                                                                        Empty section</option>
                                                                    <option
                                                                        value="searchbar_with_filter"{{ $mobileScreen['section_12'] == 'searchbar_with_filter' ? 'selected' : '' }}>
                                                                        Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option
                                                                        value="slider"{{ $mobileScreen['section_12'] == 'slider' ? 'selected' : '' }}>
                                                                        Slider</option>
                                                                    <option
                                                                        value="top_restaurant_heading"{{ $mobileScreen['section_12'] == 'top_restaurant_heading' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        heading</option>
                                                                    <option
                                                                        value="top_restaurant_carousel"{{ $mobileScreen['section_12'] == 'top_restaurant_carousel' ? 'selected' : '' }}>
                                                                        Top restaurant
                                                                        carousel</option>
                                                                    <option
                                                                        value="trending_this_week_heading"{{ $mobileScreen['section_12'] == 'trending_this_week_heading' ? 'selected' : '' }}>
                                                                        Trending this
                                                                        week heading</option>
                                                                @else
                                                                    <option value="empty_section">Empty section</option>
                                                                    <option value="searchbar_with_filter">Searchbar with
                                                                        filter
                                                                    </option>
                                                                    <option value="slider">Slider</option>
                                                                    <option value="top_restaurant_heading">Top restaurant
                                                                        heading</option>
                                                                    <option value="top_restaurant_carousel">Top restaurant
                                                                        carousel</option>
                                                                    <option value="trending_this_week_heading">Trending
                                                                        this
                                                                        week heading</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('section_12'))
                                                            <div class="error text-danger">
                                                                {{ $errors->first('section_12') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end my-5">
                                                <!--begin::Button-->
                                                <a href="{{ url()->previous() }}" class="btn btn-light me-5">Cancel</a>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button type="submit" class="btn btn-primary">
                                                    <span class="indicator-label">Save Changes</span>
                                                </button>
                                                <!--end::Button-->
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
        </div>
    </div>
@endsection
@section('layout.footer')
    <!--begin::Footer-->
    @include('layout.footer')
    <!--end::Footer-->
@endsection
