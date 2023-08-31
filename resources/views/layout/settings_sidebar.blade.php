<div class="card card-flush">
    <div id="kt_app_content" class="app-content p-0 flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="d-flex flex-column flex-row-fluid">
                <!--begin::Heading-->
                <div class="d-flex align-items-center justify-content-between collapsible py-3 toggle mb-0"
                    data-bs-toggle="collapse" data-bs-target="#kt_job_6_1">
                    <!--begin::Title-->
                    <h4 class="text-gray-700 fw-bold cursor-pointer m-0">
                        {{ __('roles_and_permission') }}
                    </h4>
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
                <div id="kt_job_6_1"
                    class="collapse fs-6
                         {{ Request::route()->getName() == 'permission.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'permission.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'permission.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'role.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'role.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'role.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'user.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'user.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'user.edit' ? 'show' : '' }} ">
                    <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column pb-3 mb-md-0 fs-6">
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                         {{ Request::route()->getName() == 'permission.index' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'permission.create' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'permission.edit' ? 'text-primary' : '' }}"
                                href="{{ route('permission.index') }}"><i
                                    class="bi bi-layers-half my-auto fs-3"></i>{{ __('permissions') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                         {{ Request::route()->getName() == 'role.index' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'role.create' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'role.edit' ? 'text-primary' : '' }}"
                                href="{{ route('role.index') }}"><i
                                    class="bi bi-layers-half my-auto fs-3"></i>{{ __('roles') }}</a>
                        </li>
                        <li class="nav-item w-md-175px">
                            <a class="nav-link px-0  d-flex gap-2
                         {{ Request::route()->getName() == 'user.index' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'user.create' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'user.edit' ? 'text-primary' : '' }}"
                                href="{{ route('user.index') }}"><i
                                    class="bi bi-people-fill my-auto fs-3"></i>{{ __('users') }}</a>
                        </li>
                    </ul>
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
</div>
<div class="card card-flush">
    <div id="kt_app_content" class="app-content p-0 flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="d-flex flex-column flex-row-fluid">
                <!--begin::Heading-->
                <div class="d-flex align-items-center justify-content-between collapsible py-3 toggle mb-0"
                    data-bs-toggle="collapse" data-bs-target="#kt_job_6_2">
                    <!--begin::Title-->
                    <h4 class="text-gray-700 fw-bold cursor-pointer m-0">
                        {{ __('global_settings') }}</h4>
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
                <div id="kt_job_6_2"
                    class="collapse fs-6
                         {{ Request::route()->getName() == 'global.setting.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'localisation.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'socialite-auth.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'payments.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'payments.paypal' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'payments.stripe' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'payments.razorpay' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'push_notification.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'mail.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'transactions.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'currencies.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'currencies.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'currencies.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'discount.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'discount.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'discount.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'settingType.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'settingType.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'settingType.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'distanceUnit.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'distanceUnit.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'distanceUnit.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'languages' ? 'show' : '' }}">
                    <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 pb-3 mb-md-0 fs-6 ">
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0 d-flex gap-2
                         {{ Request::route()->getName() == 'global.setting.index' ? 'text-primary' : '' }}"
                                href="{{ route('global.setting.index') }}"><i
                                    class="bi bi-gear-fill my-auto fs-3"></i>{{ __('global_settings') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                         {{ Request::route()->getName() == 'localisation.index' ? 'text-primary' : '' }}"
                                href="{{ route('localisation.index') }}"><i
                                    class="bi bi-translate my-auto fs-3"></i>{{ __('localization') }}</a>
                        </li>
                        <li class="nav-item w-md-175px">
                            <a class="nav-link px-0 d-flex gap-2
                         {{ Request::route()->getName() == 'socialite-auth.index' ? 'text-primary' : '' }}"
                                href="{{ route('socialite-auth.index') }}"><i
                                    class="bi bi-dribbble my-auto fs-3"></i>{{ __('social_authentication') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                         {{ Request::route()->getName() == 'payments.index' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'payments.paypal' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'payments.stripe' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'payments.razorpay' ? 'text-primary' : '' }}"
                                href="{{ route('payments.index') }}"><i
                                    class="bi bi-credit-card my-auto fs-3"></i>{{ __('payment') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                         {{ Request::route()->getName() == 'currencies.index' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'currencies.create' ? 'text-primary' : '' }}
                         {{ Request::route()->getName() == 'currencies.edit' ? 'text-primary' : '' }}"
                                href="{{ route('currencies.index') }}"><i
                                    class="bi bi-currency-dollar my-auto fs-3"></i>{{ __('currencies') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                            {{ Request::route()->getName() == 'discount.index' ? 'text-primary' : '' }}
                            {{ Request::route()->getName() == 'discount.create' ? 'text-primary' : '' }}
                            {{ Request::route()->getName() == 'discount.edit' ? 'text-primary' : '' }}"
                                href="{{ route('discount.index') }}"><i
                                    class="bi bi-disc my-auto fs-3"></i>{{ __('discount_type') }}</a>
                        </li>
                        <li class="nav-item w-md-175px">
                            <a class="nav-link px-0 d-flex gap-2
                            {{ Request::route()->getName() == 'push_notification.index' ? 'text-primary' : '' }}"
                                href="{{ route('push_notification.index') }}"><i
                                    class="bi bi-bell-fill my-auto fs-3"></i>{{ __('push_notifications') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                            {{ Request::route()->getName() == 'mail.index' ? 'text-primary' : '' }}"
                                href="{{ route('mail.index') }}"><i
                                    class="bi bi-envelope-fill my-auto fs-3"></i>{{ __('mail') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                            {{ Request::route()->getName() == 'settingType.index' ? 'text-primary' : '' }}
                            {{ Request::route()->getName() == 'settingType.create' ? 'text-primary' : '' }}
                            {{ Request::route()->getName() == 'settingType.edit' ? 'text-primary' : '' }}"
                                href="{{ route('settingType.index') }}"><i
                                    class="bi bi-sliders my-auto fs-3"></i>{{ __('setting_types') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                         {{ Request::route()->getName() == 'languages' ? 'text-primary' : '' }}"
                                href="{{ route('languages') }}"><i
                                    class="bi bi-translate my-auto fs-3"></i>{{ __('translation') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0  d-flex gap-2
                                 {{ Request::route()->getName() == 'distanceUnit.index' ? 'text-primary' : '' }}
                                 {{ Request::route()->getName() == 'distanceUnit.create' ? 'text-primary' : '' }}
                                 {{ Request::route()->getName() == 'distanceUnit.edit' ? 'text-primary' : '' }}"
                                href="{{ route('distanceUnit.index') }}"><i
                                    class="bi bi-binoculars-fill my-auto fs-3"></i>{{ __('distance_unit') }}</a>
                        </li>
                    </ul>
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Section-->
    </div>
</div>
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
                    <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 pb-3 mb-md-0 fs-6 ">
                        <li class="nav-item w-md-175px">
                            <a class="nav-link px-0 d-flex gap-2
                         {{ Request::route()->getName() == 'mobile.setting.index' ? 'text-primary' : '' }}"
                                href="{{ route('mobile.setting.index') }}"><i
                                    class="bi bi-layers-half my-auto fs-3"></i>{{ __('global_settings') }}</a>
                        </li>
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0 d-flex gap-2
                         {{ Request::route()->getName() == 'mobile.theme.index' ? 'text-primary' : '' }}"
                                href="{{ route('mobile.theme.index') }}"><i
                                    class="bi bi-layers-half my-auto fs-3"></i>{{ __('theme') }}</a>
                        </li>
                        {{-- <li class="nav-item w-md-175px">
                        <a class="nav-link
                         {{ Request::route()->getName() == 'mobile.screen.index' ? 'text-primary' : '' }}"
                            href="{{ route('mobile.screen.index') }}">{{ __('home_screen') }}</a>
                    </li> --}}
                        <li class="nav-item w-md-175px me-0">
                            <a class="nav-link px-0 d-flex gap-2
                         {{ Request::route()->getName() == 'slider.index' ? 'text-primary' : '' }}"
                                href="{{ route('slider.index') }}"><i
                                    class="bi bi-stack my-auto fs-3"></i>{{ __('slides') }}</a>
                        </li>
                    </ul>
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
    <!--end::Section-->
</div>
