<div class="card card-flush">
    <!--begin::Section-->
    <div id="kt_app_content" class="app-content p-0 flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="d-flex flex-column flex-row-fluid">
                <!--begin::Heading-->
                <div class="d-flex align-items-center justify-content-between collapsible py-3 toggle mb-0"
                    data-bs-toggle="collapse" data-bs-target="#kt_job_6_3">
                    <!--begin::Title-->
                    <h4 class="text-gray-700 fw-bold cursor-pointer m-0">
                        {{ __('mobile_app_settings') }}</h4>
                    <!--end::Title-->
                    <!--begin::Icon-->
                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                    rx="5" fill="currentColor" />
                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon toggle-off svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                    rx="5" fill="currentColor" />
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                    transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Icon-->
                </div>
                <!--end::Heading-->
                <!--begin::Body-->
                <div id="kt_job_6_3"
                    class="collapse fs-6
                         {{ Request::route()->getName() == 'mobile.setting.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'mobile.theme.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'mobile.screen.index' ? 'show' : '' }}
                         ">
                    <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 mb-3 mb-md-0 fs-6 ">
                        <li class="nav-item w-md-175px">
                            <a class="nav-link px-0 d-flex gap-2
                         {{ Request::route()->getName() == 'mobile.setting.index' ? 'text-primary' : '' }}"
                                href="{{ route('mobile.setting.index') }}">{{ __('global_settings') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0 d-flex gap-2
                         {{ Request::route()->getName() == 'mobile.theme.index' ? 'text-primary' : '' }}"
                                href="{{ route('mobile.theme.index') }}">{{ __('theme') }}</a>
                        </li>
                        {{-- <li class="nav-item w-md-175px">
                        <a class="nav-link
                         {{ Request::route()->getName() == 'mobile.screen.index' ? 'text-primary' : '' }}"
                            href="{{ route('mobile.screen.index') }}">{{ __('home_screen') }}</a>
                    </li> --}}
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0 d-flex gap-2
                         {{ Request::route()->getName() == 'slider.index' ? 'text-primary' : '' }}"
                                href="{{ route('slider.index') }}">{{ __('slides') }}</a>
                        </li>
                    </ul>
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
    <!--end::Section-->
</div>
