<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('dashboard') }}">
            <img alt="Logo" src="{{ asset('assets/media/logos/default-dark.svg') }}"
                class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}"
                class="h-20px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                @can('dashboard')
                    <div class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('dashboard') }}"
                            class="menu-link {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="2" y="2" width="9" height="9" rx="2"
                                            fill="currentColor" />
                                        <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                            rx="2" fill="currentColor" />
                                        <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                            rx="2" fill="currentColor" />
                                        <rect opacity="0.3" x="2" y="13" width="9" height="9"
                                            rx="2" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ __('dashboard') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan
                @can('favorite.index')
                    <div class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('favorite.index') }}"
                            class="menu-link
                            {{ Request::route()->getName() == 'favorite.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'favorite.create' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'favorite.edit' ? 'active' : '' }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <span class="svg-icon svg-icon-muted svg-icon-1"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ __('favorites') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">{{ __('app_management') }}</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                @can('cuisine.index')
                    <!--begin:Menu item-->
                    <div class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('cuisine.index') }}"
                            class="menu-link
                         {{ Request::route()->getName() == 'cuisine.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'cuisine.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'cuisine.edit' ? 'active' : '' }}">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/medicine/med008.svg-->
                                <span class="svg-icon svg-icon-muted svg-icon-1"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M17.2 9.10509C17.0674 8.87541 17.0315 8.60248 17.1001 8.3463C17.1687 8.09013 17.3363 7.87161 17.566 7.739L18.566 7.16307C18.4499 6.93158 18.4287 6.66389 18.5068 6.41698C18.5849 6.17007 18.7562 5.96332 18.9843 5.84069C19.2124 5.71805 19.4793 5.68923 19.7283 5.76024C19.9773 5.83126 20.1889 5.99657 20.318 6.22106L21.278 7.88305C21.3996 8.11038 21.4287 8.37585 21.3593 8.62413C21.2898 8.87242 21.1271 9.08435 20.9052 9.21557C20.6833 9.34678 20.4193 9.38714 20.1682 9.32836C19.9172 9.26957 19.6986 9.11612 19.558 8.90001L18.568 9.47106C18.4161 9.55914 18.2436 9.60542 18.068 9.60509C17.8921 9.60544 17.7193 9.55933 17.5669 9.47155C17.4145 9.38376 17.288 9.2574 17.2 9.10509ZM20.89 14.9241C20.6698 14.7983 20.4098 14.7615 20.1632 14.8212C19.9167 14.8808 19.7023 15.0325 19.564 15.2451L18.564 14.6691C18.4502 14.6024 18.3244 14.5589 18.1937 14.541C18.0631 14.5231 17.9301 14.5312 17.8026 14.5649C17.6751 14.5986 17.5556 14.6573 17.4508 14.7374C17.3461 14.8175 17.2582 14.9175 17.1922 15.0317C17.1263 15.1459 17.0836 15.272 17.0666 15.4028C17.0496 15.5336 17.0587 15.6664 17.0932 15.7937C17.1278 15.921 17.1871 16.0402 17.268 16.1444C17.3488 16.2486 17.4494 16.3359 17.564 16.4011L18.555 16.973C18.4428 17.2022 18.4224 17.4655 18.498 17.7092C18.5736 17.9529 18.7395 18.1586 18.9617 18.2839C19.184 18.4093 19.4457 18.445 19.6934 18.3837C19.9411 18.3223 20.1559 18.1687 20.294 17.9541L21.254 16.291C21.3875 16.0621 21.4247 15.7896 21.3574 15.5333C21.2901 15.277 21.1238 15.0578 20.895 14.9241H20.89ZM5.44199 14.739L4.57599 15.239C4.44244 15.0112 4.22423 14.8456 3.96894 14.7781C3.71364 14.7106 3.44201 14.7467 3.21332 14.8788C2.98464 15.0108 2.81745 15.2279 2.74827 15.4828C2.67908 15.7376 2.71348 16.0094 2.844 16.239L3.844 17.9711C3.90918 18.0857 3.99639 18.1863 4.10062 18.2671C4.20485 18.3479 4.32403 18.4073 4.4513 18.4419C4.57857 18.4764 4.71145 18.4855 4.84223 18.4685C4.97301 18.4515 5.09911 18.4087 5.21332 18.3428C5.32753 18.2768 5.42759 18.189 5.5077 18.0842C5.5878 17.9795 5.64638 17.8599 5.68009 17.7324C5.7138 17.6049 5.72197 17.472 5.70411 17.3413C5.68624 17.2106 5.64269 17.0848 5.57599 16.9711L6.44199 16.4711C6.6698 16.3375 6.83556 16.1193 6.90305 15.864C6.97055 15.6087 6.93432 15.3371 6.80228 15.1084C6.67025 14.8797 6.45312 14.7125 6.19828 14.6433C5.94344 14.5741 5.67155 14.6085 5.44199 14.739ZM6.44199 7.66906L5.57599 7.16906C5.64269 7.05529 5.68624 6.92948 5.70411 6.79882C5.72197 6.66815 5.7138 6.5352 5.68009 6.4077C5.64638 6.2802 5.5878 6.16066 5.5077 6.0559C5.42759 5.95114 5.32753 5.86329 5.21332 5.79735C5.09911 5.73141 4.97301 5.68862 4.84223 5.67162C4.71145 5.65462 4.57857 5.66368 4.4513 5.69823C4.32403 5.73278 4.20485 5.79223 4.10062 5.87304C3.99639 5.95384 3.90918 6.05441 3.844 6.16906L2.844 7.90111C2.7773 8.01488 2.73378 8.14069 2.71592 8.27135C2.69805 8.40202 2.7062 8.53497 2.7399 8.66246C2.77361 8.78996 2.83222 8.90951 2.91233 9.01427C2.99244 9.11903 3.09246 9.20687 3.20667 9.27282C3.32088 9.33876 3.44702 9.38143 3.57779 9.39843C3.70857 9.41543 3.84142 9.40637 3.96869 9.37182C4.09597 9.33726 4.21514 9.27793 4.31937 9.19713C4.4236 9.11633 4.51081 9.01576 4.57599 8.90111L5.44199 9.40111C5.67155 9.53163 5.94344 9.566 6.19828 9.49682C6.45312 9.42763 6.67025 9.26041 6.80228 9.03173C6.93432 8.80304 6.97055 8.53141 6.90305 8.27611C6.83556 8.02082 6.6698 7.80261 6.44199 7.66906ZM13.065 20.14V19.14C13.065 18.8748 12.9596 18.6205 12.7721 18.433C12.5846 18.2454 12.3302 18.14 12.065 18.14C11.7998 18.14 11.5454 18.2454 11.3579 18.433C11.1703 18.6205 11.065 18.8748 11.065 19.14V20.14C10.7998 20.14 10.5454 20.2454 10.3579 20.433C10.1703 20.6205 10.065 20.8748 10.065 21.14C10.065 21.4052 10.1703 21.6596 10.3579 21.8472C10.5454 22.0347 10.7998 22.14 11.065 22.14H13.065C13.3302 22.14 13.5846 22.0347 13.7721 21.8472C13.9596 21.6596 14.065 21.4052 14.065 21.14C14.065 20.8748 13.9596 20.6205 13.7721 20.433C13.5846 20.2454 13.3302 20.14 13.065 20.14ZM11.065 3.98803V5.14C11.065 5.40522 11.1703 5.65962 11.3579 5.84716C11.5454 6.03469 11.7998 6.14 12.065 6.14C12.3302 6.14 12.5846 6.03469 12.7721 5.84716C12.9596 5.65962 13.065 5.40522 13.065 5.14V3.99608C13.3302 3.99343 13.5835 3.88545 13.7692 3.69603C13.9548 3.50662 14.0577 3.25129 14.055 2.98607C14.0523 2.72086 13.9445 2.46751 13.755 2.28185C13.5656 2.09619 13.3102 1.99343 13.045 1.99608H11.125C10.8668 1.99686 10.6191 2.09788 10.4341 2.27794C10.249 2.458 10.1412 2.70299 10.1334 2.96105C10.1256 3.21911 10.2185 3.47011 10.3923 3.661C10.5661 3.85189 10.8073 3.96765 11.065 3.984V3.98803Z"
                                            fill="currentColor" />
                                        <path
                                            d="M15.105 17.3269C15.3054 17.213 15.5393 17.1731 15.7661 17.214C15.9929 17.255 16.1981 17.3742 16.346 17.5509C17.751 16.4375 18.6737 14.8262 18.923 13.0509C18.6729 13.035 18.4382 12.9244 18.2667 12.7416C18.0952 12.5588 17.9998 12.3176 17.9998 12.0669C17.9998 11.8163 18.0952 11.5751 18.2667 11.3924C18.4382 11.2096 18.6729 11.0989 18.923 11.0829C18.674 9.31931 17.7612 7.71738 16.371 6.60403C16.2313 6.81931 16.0138 6.97219 15.764 7.03091C15.5142 7.08964 15.2513 7.04959 15.0304 6.9191C14.8094 6.7886 14.6474 6.57784 14.5782 6.33072C14.509 6.0836 14.5379 5.8192 14.659 5.59293C12.9966 4.90633 11.1328 4.89062 9.45901 5.54898L9.46899 5.56497C9.6016 5.79478 9.63749 6.06786 9.56876 6.32413C9.50002 6.58039 9.33232 6.79882 9.10251 6.93143C8.8727 7.06403 8.59962 7.10001 8.34335 7.03128C8.08708 6.96255 7.8686 6.79478 7.73599 6.56497L7.71899 6.53494C6.27851 7.64848 5.32952 9.28023 5.07401 11.0829C5.32413 11.0989 5.55879 11.2096 5.73029 11.3924C5.90178 11.5751 5.99722 11.8163 5.99722 12.0669C5.99722 12.3176 5.90178 12.5588 5.73029 12.7416C5.55879 12.9244 5.32413 13.035 5.07401 13.0509C5.33028 14.8605 6.28557 16.4977 7.73499 17.611C7.87521 17.4108 8.0851 17.2701 8.32358 17.2163C8.56205 17.1626 8.81197 17.1997 9.02451 17.3205C9.23704 17.4412 9.3969 17.6369 9.47281 17.8693C9.54872 18.1017 9.53524 18.354 9.435 18.5769C11.1232 19.2459 13.0058 19.2295 14.682 18.531C14.5986 18.3128 14.5953 18.0719 14.6727 17.8515C14.7502 17.631 14.9034 17.4451 15.105 17.3269ZM7 12.07C7 11.0811 7.29324 10.1144 7.84265 9.29214C8.39206 8.4699 9.17295 7.82903 10.0866 7.45059C11.0002 7.07215 12.0056 6.97312 12.9755 7.16605C13.9454 7.35897 14.8363 7.83519 15.5355 8.53445C16.2348 9.23372 16.711 10.1246 16.9039 11.0945C17.0969 12.0644 16.9978 13.0698 16.6194 13.9834C16.2409 14.8971 15.6001 15.6779 14.7779 16.2273C13.9556 16.7767 12.9889 17.07 12 17.07C10.6739 17.07 9.40216 16.5432 8.46448 15.6055C7.5268 14.6678 7 13.3961 7 12.07Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M18.337 18.924C18.4028 19.0378 18.4455 19.1635 18.4628 19.2938C18.48 19.4241 18.4714 19.5564 18.4374 19.6834C18.4034 19.8104 18.3447 19.9294 18.2647 20.0336C18.1847 20.1379 18.0849 20.2253 17.971 20.2909L17.106 20.7909L16.241 21.2909C16.1272 21.3566 16.0016 21.3991 15.8714 21.4162C15.7411 21.4333 15.6088 21.4245 15.482 21.3904C15.3551 21.3564 15.2362 21.2976 15.1321 21.2176C15.0279 21.1375 14.9406 21.0378 14.875 20.924C14.7424 20.6943 14.7065 20.4214 14.7751 20.1652C14.8438 19.909 15.0113 19.6906 15.241 19.558L14.741 18.693C14.6753 18.5793 14.6327 18.4536 14.6156 18.3233C14.5985 18.193 14.6072 18.0608 14.6412 17.9339C14.71 17.6776 14.8777 17.4591 15.1075 17.3265C15.3373 17.1939 15.6104 17.158 15.8667 17.2267C16.1229 17.2955 16.3414 17.4632 16.474 17.693L16.974 18.558C17.2034 18.4264 17.4756 18.3909 17.7311 18.4595C17.9865 18.5281 18.2044 18.6951 18.337 18.924ZM8.89999 4.57806C9.11219 4.43587 9.26194 4.21777 9.31851 3.96868C9.37508 3.71959 9.33419 3.45835 9.20422 3.23846C9.07426 3.01856 8.86506 2.85674 8.61957 2.78619C8.37408 2.71563 8.11089 2.74161 7.884 2.85894L6.22101 3.81902C6.01126 3.956 5.86054 4.16671 5.79871 4.40948C5.73687 4.65224 5.76841 4.90931 5.88708 5.12994C6.00576 5.35056 6.20293 5.51866 6.43958 5.60088C6.67622 5.68311 6.9351 5.67354 7.16501 5.57403L7.73901 6.56805C7.87162 6.79786 8.09008 6.9655 8.34634 7.03423C8.60261 7.10297 8.87569 7.06711 9.1055 6.9345C9.33531 6.80189 9.50301 6.58347 9.57175 6.3272C9.64048 6.07093 9.60459 5.79786 9.47198 5.56805L8.89999 4.57806ZM9.035 17.327C8.80533 17.1944 8.53239 17.1585 8.27621 17.2271C8.02004 17.2957 7.80162 17.4634 7.66901 17.693L7.16901 18.558C6.9392 18.4254 6.66612 18.3895 6.40985 18.4582C6.15358 18.5269 5.9351 18.6947 5.80249 18.9245C5.66988 19.1543 5.634 19.4274 5.70273 19.6836C5.77146 19.9399 5.9392 20.1583 6.16901 20.2909L7.901 21.2909C8.01479 21.3566 8.1404 21.3993 8.27066 21.4164C8.40092 21.4336 8.53327 21.4248 8.66016 21.3908C8.78705 21.3568 8.90598 21.2981 9.01019 21.2181C9.1144 21.1381 9.20183 21.0383 9.26749 20.9245C9.33315 20.8107 9.37577 20.6851 9.39288 20.5549C9.41 20.4246 9.40128 20.2922 9.36725 20.1653C9.33322 20.0384 9.27455 19.9194 9.19455 19.8152C9.11455 19.711 9.01479 19.6237 8.901 19.558L9.401 18.693C9.5336 18.4634 9.56952 18.1904 9.50089 17.9343C9.43225 17.6781 9.26468 17.4596 9.035 17.327ZM15.035 6.93401C15.2647 7.06662 15.5376 7.10251 15.7938 7.03387C16.05 6.96523 16.2684 6.79772 16.401 6.56805L16.973 5.57903C17.2025 5.69367 17.4673 5.71566 17.7126 5.64056C17.9579 5.56546 18.165 5.39894 18.291 5.17547C18.4169 4.952 18.4522 4.68863 18.3895 4.43987C18.3268 4.19111 18.1709 3.97607 17.954 3.83904L16.291 2.87896C16.0672 2.75278 15.8033 2.71805 15.5545 2.78204C15.3057 2.84602 15.0912 3.00373 14.9561 3.22222C14.8209 3.44071 14.7756 3.70307 14.8294 3.95428C14.8833 4.20548 15.0322 4.42611 15.245 4.57L14.669 5.57C14.537 5.7995 14.5015 6.072 14.5701 6.32769C14.6387 6.58338 14.8059 6.80141 15.035 6.93401ZM6 12.07C6 11.8048 5.89463 11.5504 5.70709 11.3628C5.51956 11.1753 5.26522 11.07 5 11.07H4C4 10.8048 3.89463 10.5504 3.70709 10.3628C3.51956 10.1753 3.26522 10.07 3 10.07C2.73478 10.07 2.48044 10.1753 2.29291 10.3628C2.10537 10.5504 2 10.8048 2 11.07V13.07C2 13.3352 2.10537 13.5896 2.29291 13.7772C2.48044 13.9647 2.73478 14.07 3 14.07C3.26522 14.07 3.51956 13.9647 3.70709 13.7772C3.89463 13.5896 4 13.3352 4 13.07H5C5.26522 13.07 5.51956 12.9647 5.70709 12.7772C5.89463 12.5896 6 12.3352 6 12.07ZM21.14 10.1301C20.8864 10.1307 20.6426 10.2284 20.4589 10.4033C20.2751 10.5781 20.1653 10.8167 20.152 11.07H19C18.7348 11.07 18.4804 11.1753 18.2929 11.3628C18.1054 11.5504 18 11.8048 18 12.07C18 12.3352 18.1054 12.5896 18.2929 12.7772C18.4804 12.9647 18.7348 13.07 19 13.07H20.144C20.1453 13.2013 20.1725 13.3311 20.2239 13.452C20.2754 13.5728 20.3502 13.6823 20.444 13.7742C20.5378 13.8662 20.6487 13.9387 20.7706 13.9877C20.8924 14.0368 21.0227 14.0613 21.154 14.06C21.2853 14.0587 21.4151 14.0315 21.5359 13.98C21.6567 13.9286 21.7663 13.8539 21.8582 13.7601C21.9501 13.6663 22.0227 13.5552 22.0717 13.4334C22.1208 13.3116 22.1453 13.1813 22.144 13.05V11.1301C22.144 10.9984 22.118 10.868 22.0675 10.7464C22.017 10.6248 21.943 10.5144 21.8497 10.4214C21.7564 10.3285 21.6457 10.255 21.5239 10.205C21.4021 10.155 21.2717 10.1295 21.14 10.1301ZM14.121 14.191C14.5407 13.7715 14.8265 13.2369 14.9423 12.655C15.0581 12.073 14.9988 11.4698 14.7717 10.9216C14.5447 10.3733 14.1602 9.90469 13.6668 9.57501C13.1734 9.24532 12.5934 9.06939 12 9.06939C11.4066 9.06939 10.8266 9.24532 10.3332 9.57501C9.83982 9.90469 9.45531 10.3733 9.22827 10.9216C9.00124 11.4698 8.94188 12.073 9.05771 12.655C9.17354 13.2369 9.45935 13.7715 9.879 14.191C10.0676 14.3731 10.3202 14.474 10.5824 14.4717C10.8446 14.4695 11.0954 14.3642 11.2808 14.1788C11.4662 13.9934 11.5714 13.7426 11.5737 13.4804C11.5759 13.2182 11.4752 12.9656 11.293 12.777C11.1531 12.6372 11.0578 12.4589 11.0192 12.2649C10.9806 12.071 11.0004 11.8699 11.0761 11.6872C11.1518 11.5044 11.2799 11.3482 11.4444 11.2383C11.6089 11.1284 11.8022 11.0698 12 11.0698C12.1978 11.0698 12.3911 11.1284 12.5556 11.2383C12.7201 11.3482 12.8482 11.5044 12.9239 11.6872C12.9996 11.8699 13.0194 12.071 12.9808 12.2649C12.9422 12.4589 12.8469 12.6372 12.707 12.777C12.6115 12.8693 12.5353 12.9796 12.4829 13.1016C12.4305 13.2236 12.4029 13.3548 12.4018 13.4876C12.4006 13.6204 12.4259 13.752 12.4762 13.8749C12.5264 13.9978 12.6007 14.1095 12.6946 14.2034C12.7885 14.2973 12.9001 14.3715 13.023 14.4218C13.1459 14.4721 13.2776 14.4974 13.4104 14.4963C13.5432 14.4951 13.6744 14.4675 13.7964 14.4151C13.9184 14.3627 14.0288 14.2865 14.121 14.191Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ __('cuisines') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                @endcan
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                         {{ Request::route()->getName() == 'restaurant.list' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'restaurant.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'restaurant.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'restaurant.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'restaurant_review.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'restaurant_review.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'gallery.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'gallery.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'gallery.edit' ? 'show' : '' }}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-1">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Cooking/KnifeAndFork2.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3.98842709,3.05999994 L11.0594949,10.1310678 L8.23106778,12.9594949 L3.98842709,8.71685419 C2.42632992,7.15475703 2.42632992,4.62209711 3.98842709,3.05999994 Z"
                                            fill="currentColor" />
                                        <path
                                            d="M17.7539614,3.90710683 L14.8885998,7.40921548 C14.7088587,7.62889898 14.7248259,7.94903916 14.9255342,8.14974752 C15.1262426,8.35045587 15.4463828,8.36642306 15.6660663,8.18668201 L19.1681749,5.32132039 L19.8752817,6.02842717 L17.0099201,9.53053582 C16.830179,9.75021933 16.8461462,10.0703595 17.0468546,10.2710679 C17.2475629,10.4717762 17.5677031,10.4877434 17.7873866,10.3080024 L21.2894953,7.44264073 L21.9966021,8.14974752 L18.8146215,11.331728 C17.4477865,12.6985631 15.2317091,12.6985631 13.8648741,11.331728 C12.4980391,9.96489301 12.4980391,7.74881558 13.8648741,6.38198056 L17.0468546,3.20000005 L17.7539614,3.90710683 Z"
                                            fill="currentColor" />
                                        <path
                                            d="M11.0753788,13.9246212 C11.4715437,14.3207861 11.4876245,14.9579589 11.1119478,15.3736034 L6.14184561,20.8724683 C5.61370242,21.4567999 4.71186338,21.5023497 4.12753173,20.9742065 C4.10973311,20.9581194 4.09234327,20.9415857 4.0753788,20.9246212 C3.51843234,20.3676747 3.51843234,19.4646861 4.0753788,18.9077397 C4.09234327,18.8907752 4.10973311,18.8742415 4.12753173,18.8581544 L9.62639662,13.8880522 C10.0420411,13.5123755 10.6792139,13.5284563 11.0753788,13.9246212 Z"
                                            fill="currentColor" opacity="0.3" />
                                        <path
                                            d="M13.0754022,13.9246212 C13.4715671,13.5284563 14.1087399,13.5123755 14.5243844,13.8880522 L20.0232493,18.8581544 C20.0410479,18.8742415 20.0584377,18.8907752 20.0754022,18.9077397 C20.6323487,19.4646861 20.6323487,20.3676747 20.0754022,20.9246212 C20.0584377,20.9415857 20.0410479,20.9581194 20.0232493,20.9742065 C19.4389176,21.5023497 18.5370786,21.4567999 18.0089354,20.8724683 L13.0388332,15.3736034 C12.6631565,14.9579589 12.6792373,14.3207861 13.0754022,13.9246212 Z"
                                            fill="currentColor" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{ __('restaurants') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    @can('restaurant.list')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <a href="{{ route('restaurant.list') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'restaurant.list' ? 'active' : '' }}">
                                    <!--begin:Menu link-->
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('requested_restaurants') }}</span>
                                    <!--end:Menu link-->
                                </a>
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('restaurant.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <a href="{{ route('restaurant.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'restaurant.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'restaurant.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'restaurant.edit' ? 'active' : '' }}">
                                    <!--begin:Menu link-->
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('restaurants') }}</span>
                                    <!--end:Menu link-->
                                </a>
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('gallery.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('gallery.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'gallery.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'gallery.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'gallery.edit' ? 'active' : '' }}
                                ">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('galleries') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('restaurant_review.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('restaurant_review.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'restaurant_review.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'restaurant_review.edit' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('restaurant_reviews') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                </div>
                @can('category.index')
                    <!--begin:Menu item-->
                    <div class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('category.index') }}"
                            class="menu-link
                         {{ Request::route()->getName() == 'category.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'category.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'category.edit' ? 'active' : '' }}
                        ">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <span class="svg-icon svg-icon-muted svg-icon-1"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                            fill="currentColor" />
                                        <path
                                            d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ __('categories') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                @endcan
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                         {{ Request::route()->getName() == 'food.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'food.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'food.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'extra_group.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'extra_group.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'extra_group.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'extra.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'extra.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'extra.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'food_review.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'food_review.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'food_review.edit' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'nutrition.index' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'nutrition.create' ? 'show' : '' }}
                         {{ Request::route()->getName() == 'nutrition.edit' ? 'show' : '' }}
                         ">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M12.5,19 C8.91014913,19 6,16.0898509 6,12.5 C6,8.91014913 8.91014913,6 12.5,6 C16.0898509,6 19,8.91014913 19,12.5 C19,16.0898509 16.0898509,19 12.5,19 Z M12.5,16.4 C14.6539105,16.4 16.4,14.6539105 16.4,12.5 C16.4,10.3460895 14.6539105,8.6 12.5,8.6 C10.3460895,8.6 8.6,10.3460895 8.6,12.5 C8.6,14.6539105 10.3460895,16.4 12.5,16.4 Z M12.5,15.1 C11.0640597,15.1 9.9,13.9359403 9.9,12.5 C9.9,11.0640597 11.0640597,9.9 12.5,9.9 C13.9359403,9.9 15.1,11.0640597 15.1,12.5 C15.1,13.9359403 13.9359403,15.1 12.5,15.1 Z"
                                            fill="currentcolor" opacity="0.3" />
                                        <path
                                            d="M22,13.5 L22,13.5 C22.2864451,13.5 22.5288541,13.7115967 22.5675566,13.9954151 L23.0979976,17.8853161 C23.1712756,18.4226878 22.7950533,18.9177172 22.2576815,18.9909952 C22.2137086,18.9969915 22.1693798,19 22.125,19 L22.125,19 C21.5576012,19 21.0976335,18.5400324 21.0976335,17.9726335 C21.0976335,17.9415812 21.0990414,17.9105449 21.1018527,17.8796201 L21.4547321,13.9979466 C21.4803698,13.7159323 21.7168228,13.5 22,13.5 Z"
                                            fill="currentcolor" opacity="0.7" />
                                        <path d="M24,5 L24,12 L21,12 L21,8 C21,6.34314575 22.3431458,5 24,5 Z"
                                            fill="currentcolor"
                                            transform="translate(22.500000, 8.500000) scale(-1, 1) translate(-22.500000, -8.500000) " />
                                        <path
                                            d="M0.714285714,5 L1.03696911,8.32873399 C1.05651593,8.5303749 1.22598532,8.68421053 1.42857143,8.68421053 C1.63115754,8.68421053 1.80062692,8.5303749 1.82017375,8.32873399 L2.14285714,5 L2.85714286,5 L3.17982625,8.32873399 C3.19937308,8.5303749 3.36884246,8.68421053 3.57142857,8.68421053 C3.77401468,8.68421053 3.94348407,8.5303749 3.96303089,8.32873399 L4.28571429,5 L5,5 L5,8.39473684 C5,9.77544872 3.88071187,10.8947368 2.5,10.8947368 C1.11928813,10.8947368 -7.19089982e-16,9.77544872 -8.8817842e-16,8.39473684 L0,5 L0.714285714,5 Z"
                                            fill="currentcolor" />
                                        <path
                                            d="M2.5,12.3684211 L2.5,12.3684211 C2.90055463,12.3684211 3.23115721,12.6816982 3.25269782,13.0816732 L3.51381042,17.9301218 C3.54396441,18.4900338 3.11451066,18.9683769 2.55459863,18.9985309 C2.53641556,18.9995101 2.51820943,19 2.5,19 L2.5,19 C1.93927659,19 1.48472045,18.5454439 1.48472045,17.9847204 C1.48472045,17.966511 1.48521034,17.9483049 1.48618958,17.9301218 L1.74730218,13.0816732 C1.76884279,12.6816982 2.09944537,12.3684211 2.5,12.3684211 Z"
                                            fill="currentcolor" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">{{ __('foods') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    @can('food.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('food.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'food.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'food.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'food.edit' ? 'active' : '' }}
                                ">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('all_foods') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('extra_group.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('extra_group.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'extra_group.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'extra_group.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'extra_group.edit' ? 'active' : '' }}
                                ">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('extra_groups') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('extra.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('extra.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'extra.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'extra.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'extra.edit' ? 'active' : '' }}
                                ">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('extras') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('food_review.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('food_review.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'food_review.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'food_review.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'food_review.edit' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('food_reviews') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('nutrition.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('nutrition.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'nutrition.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'nutrition.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'nutrition.edit' ? 'active' : '' }}
                                ">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('nutrition') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    {{ Request::route()->getName() == 'orders.index' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'orders.create' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'status.index' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'status.create' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'status_edit' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'address.index' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'address.create' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'adress_edit' ? 'show' : '' }}
                    ">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                            fill="currentColor" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z"
                                            fill="currentColor" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">{{ __('orders') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    @can('orders.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('orders.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'orders.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'orders.create' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('orders') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('status.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('status.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'status.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'status.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'status_edit' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('order_status') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('address.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('address.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'address.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'address.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'adress_edit' ? 'active' : '' }}
                                ">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('delivery_addresses') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                </div>
                <!--begin:Menu item-->
                @can('coupon.index')
                    <div class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('coupon.index') }}"
                            class="menu-link
                         {{ Request::route()->getName() == 'coupon.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'coupon.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'coupon.edit' ? 'active' : '' }}
                         ">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z"
                                                fill="currentcolor"
                                                transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) " />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">{{ __('coupons') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan
                <!--end:Menu item-->
                <!--begin:Menu item-->
                @can('driver.index')
                    <div class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('driver.index') }}"
                            class="menu-link
                         {{ Request::route()->getName() == 'driver.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'driver.create' ? 'active' : '' }}
                        ">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M12,19 C15.8659932,19 19,15.8659932 19,12 C19,8.13400675 15.8659932,5 12,5 C8.13400675,5 5,8.13400675 5,12 C5,15.8659932 8.13400675,19 12,19 Z M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z"
                                                fill="currentcolor" fill-rule="nonzero" />
                                            <path
                                                d="M12,9.66666667 C11.3333333,8.64514991 11,7.88126102 11,7.375 C11,6.61560847 11.4477153,6 12,6 C12.5522847,6 13,6.61560847 13,7.375 C13,7.88126102 12.6666667,8.64514991 12,9.66666667 Z M12,14 C12.6666667,15.0215168 13,15.7854056 13,16.2916667 C13,17.0510582 12.5522847,17.6666667 12,17.6666667 C11.4477153,17.6666667 11,17.0510582 11,16.2916667 C11,15.7854056 11.3333333,15.0215168 12,14 Z M14.3333333,12 C15.3548501,11.3333333 16.118739,11 16.625,11 C17.3843915,11 18,11.4477153 18,12 C18,12.5522847 17.3843915,13 16.625,13 C16.118739,13 15.3548501,12.6666667 14.3333333,12 Z M10,12 C8.97848324,12.6666667 8.21459435,13 7.70833333,13 C6.9489418,13 6.33333333,12.5522847 6.33333333,12 C6.33333333,11.4477153 6.9489418,11 7.70833333,11 C8.21459435,11 8.97848324,11.3333333 10,12 Z M13.6499158,10.3500842 C13.9008327,9.15635823 14.2052815,8.38050496 14.5632621,8.02252436 C15.100233,7.48555345 15.8521164,7.36683502 16.2426407,7.75735931 C16.633165,8.1478836 16.5144465,8.89976702 15.9774756,9.43673792 C15.619495,9.79471852 14.8436418,10.0991673 13.6499158,10.3500842 Z M10.5857864,13.4142136 C10.3348695,14.6079395 10.0304208,15.3837928 9.67244018,15.7417734 C9.13546928,16.2787443 8.38358587,16.3974627 7.99306157,16.0069384 C7.60253728,15.6164141 7.72125572,14.8645307 8.25822662,14.3275598 C8.61620722,13.9695792 9.39206049,13.6651305 10.5857864,13.4142136 Z M13.6499158,13.6499158 C14.8436418,13.9008327 15.619495,14.2052815 15.9774756,14.5632621 C16.5144465,15.100233 16.633165,15.8521164 16.2426407,16.2426407 C15.8521164,16.633165 15.100233,16.5144465 14.5632621,15.9774756 C14.2052815,15.619495 13.9008327,14.8436418 13.6499158,13.6499158 Z M10.5857864,10.5857864 C9.39206049,10.3348695 8.61620722,10.0304208 8.25822662,9.67244018 C7.72125572,9.13546928 7.60253728,8.38358587 7.99306157,7.99306157 C8.38358587,7.60253728 9.13546928,7.72125572 9.67244018,8.25822662 C10.0304208,8.61620722 10.3348695,9.39206049 10.5857864,10.5857864 Z"
                                                fill="currentcolor" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">{{ __('drivers') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan
                <!--end:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    {{ Request::route()->getName() == 'faq.index' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'faq.create' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'faq.edit' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'faqCategory.index' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'faqCategory.create' ? 'show' : '' }}
                    {{ Request::route()->getName() == 'faqCategory.edit' ? 'show' : '' }}
                    ">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="currentcolor" opacity="0.3" cx="12" cy="12"
                                            r="9" />
                                        <path
                                            d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z"
                                            fill="currentcolor" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">{{ __('faqs') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    @can('faqCategory.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('faqCategory.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'faqCategory.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'faqCategory.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'faqCategory.edit' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('faq_categories') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('faq.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('faq.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'faq.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'faq.create' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'faq.edit' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('all_faq') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                </div>

                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">{{ __('settings') }}</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                @can('file.index')
                    <!--begin:Menu item-->
                    <div class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('file.index') }}"
                            class="menu-link
                         {{ Request::route()->getName() == 'file.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'media.create' ? 'active' : '' }}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
                                                fill="currentcolor" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">{{ __('media_library') }}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                @endcan

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                {{ Request::route()->getName() == 'earnings.index' ? 'show' : '' }}
                {{ Request::route()->getName() == 'drivers_payout.index' ? 'show' : '' }}
                {{ Request::route()->getName() == 'drivers_payout.create' ? 'show' : '' }}
                {{ Request::route()->getName() == 'restaurant_payout.index' ? 'show' : '' }}
                {{ Request::route()->getName() == 'restaurant_payout.create' ? 'show' : '' }}
                    ">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="currentcolor" opacity="0.3" x="2" y="5"
                                            width="20" height="14" rx="2" />
                                        <rect fill="currentcolor" x="2" y="8" width="20"
                                            height="3" />
                                        <rect fill="currentcolor" opacity="0.3" x="16" y="14"
                                            width="4" height="2" rx="1" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">{{ __('payments') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    @can('earnings.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('earnings.index') }}"
                                    class="menu-link
                                    {{ Request::route()->getName() == 'earnings.index' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('earnings') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('drivers_payout.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('drivers_payout.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'drivers_payout.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'drivers_payout.create' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('drivers_payout') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                    @can('restaurant_payout.index')
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion mb-1">
                                <!--begin:Menu link-->
                                <a href="{{ route('restaurant_payout.index') }}"
                                    class="menu-link
                         {{ Request::route()->getName() == 'restaurant_payout.index' ? 'active' : '' }}
                         {{ Request::route()->getName() == 'restaurant_payout.create' ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('restaurants_payouts') }}</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    @endcan
                </div>
                @can('mobile.setting.index')
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion
                            {{ Request::route()->getName() == 'mobile.setting.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'mobile.screen.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'mobile.screen.create' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'mobile.screen.edit' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'slider.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'slider.create' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'slider.edit' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'mobile.theme.index' ? 'show' : '' }}
                                ">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z"
                                                fill="currentcolor" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                fill="currentcolor" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">{{ __('mobile_app_setting') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        @can('mobile.setting.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('mobile.setting.index') }}"
                                        class="menu-link
                                            {{ Request::route()->getName() == 'mobile.setting.index' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('global_settings') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('mobile.theme.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('mobile.theme.index') }}"
                                        class="menu-link
                                            {{ Request::route()->getName() == 'mobile.theme.index' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('theme') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                            {{-- @can('mobile.screen.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('mobile.screen.index') }}"
                                    class="menu-link
                                    {{ Request::route()->getName() == 'mobile.screen.index' ? 'active' : '' }}
                                    {{ Request::route()->getName() == 'mobile.screen.edit' ? 'active' : '' }}
                                    {{ Request::route()->getName() == 'mobile.screen.create' ? 'active' : '' }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ __('home_screen') }}</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                @endcan --}}
                        @can('slider.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('slider.index') }}"
                                        class="menu-link
                                            {{ Request::route()->getName() == 'slider.index' ? 'active' : '' }}
                                            {{ Request::route()->getName() == 'slider.edit' ? 'active' : '' }}
                                            {{ Request::route()->getName() == 'slider.create' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('slider') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                    </div>
                @endcan
                @can('global.setting.index')
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion
                            {{ Request::route()->getName() == 'global.setting.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'user.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'user.create' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'user.edit' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'permission.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'discount.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'discount.create' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'discount.edit' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'unit.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'unit.create' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'unit.edit' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'localisation.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'languages' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'currencies.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'currencies.create' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'currencies.edit' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'payments.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'payments.paypal' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'payments.stripe' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'payments.razorpay' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'socialite-auth.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'push_notification.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'mail.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'settingType.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'settingType.create' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'settingType.edit' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'distanceUnit.index' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'distanceUnit.create' ? 'show' : '' }}
                            {{ Request::route()->getName() == 'distanceUnit.edit' ? 'show' : '' }}
                            ">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z"
                                                fill="currentcolor" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                fill="currentcolor" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="menu-title">{{ __('settings') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        @can('global.setting.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('global.setting.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'global.setting.index' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('global_settings') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('user.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('user.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'user.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'user.create' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'user.edit' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('users') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('permission.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('permission.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'permission.index' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('roles_&_permissions') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('unit.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('unit.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'unit.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'unit.create' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'unit.edit' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('mass_unit') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('discount.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('discount.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'discount.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'discount.create' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'discount.edit' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('discount_type') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('localisation.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('localisation.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'localisation.index' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('localization') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('languages')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('languages') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'languages' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('translation') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('currencies.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('currencies.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'currencies.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'currencies.create' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'currencies.edit' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('currencies') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('payments.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('payments.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'payments.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'payments.paypal' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'payments.stripe' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'payments.razorpay' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('payments') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('socialite-auth.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('socialite-auth.index') }}"
                                        class="menu-link
                                {{ Request::route()->getName() == 'socialite-auth.index' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('social_authentication') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('push_notification.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('push_notification.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'push_notification.index' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('push_notifications') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('mail.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('mail.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'mail.index' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('mail') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('settingType.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('settingType.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'settingType.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'settingType.create' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'settingType.edit' ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('setting_types') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                        @can('distanceUnit.index')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion mb-1">
                                    <!--begin:Menu link-->
                                    <a href="{{ route('distanceUnit.index') }}"
                                        class="menu-link
                            {{ Request::route()->getName() == 'distanceUnit.index' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'distanceUnit.create' ? 'active' : '' }}
                            {{ Request::route()->getName() == 'distanceUnit.edit' ? 'active' : '' }} ">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ __('distance_unit') }}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                        @endcan
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
<!--end::Sidebar-->
