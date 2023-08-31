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
                                    {{__('orders ')}} | {{  __('orders_management')  }}</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <!--begin breadcrumbs-->
                                <div class="m-0">
                                    <!--begin::Menu toggle-->
                                    <a href="{{ route('dashboard') }}" class="fs-4 fw-bold" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--end::Svg Icon-->{{ __('dashboard') }}/
                                    </a>
                                    <a href="{{ route('orders.index') }}" class="fw-bold fs-4"data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--end::Svg Icon-->{{ __('orders') }}/
                                    </a>
                                    <a class="fw-bold text-dark fs-4"data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--end::Svg Icon-->{{ __('orders_list') }}
                                    </a>
                                </div>
                                <!--end breadcrumbs-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container">
                            <!--begin::Card-->
                            <div class="card card-flush">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#" role="button"
                                                aria-expanded="false">{{ __('all_orders')}}</a>
                                        </li>
                                    </ul>
                                    <div class="row m-5">
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('order_id') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">#7</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('status') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">Order Received</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('restaurant') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">Home Cooking Experience</div>
                                        </div>
                                    </div>
                                    <div class="row m-5">
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('client') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">Charles W. Abeyta</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('active') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">Yes</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('address') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">3515 Rosewood Lane Manhattan, NY 10016
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-5">
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('phone_number') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">+1 098-6543-236</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('method') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">Cash</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('phone') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">+136 226 5669</div>
                                        </div>
                                    </div>
                                    <div class="row m-5">
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('delivery_address') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">1850 Big Elm Kansas City, MO 64106</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('payment_status')}}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">Waiting for Client</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('driver') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">Not assigned</div>
                                        </div>
                                    </div>
                                    <div class="row m-5">
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('date_of_order') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">2023-01-28 06:12:34</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('updated_at') }}</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold">2023-01-28 06:12:34</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="fw-bold fs-7">{{ __('hint') }}:</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-gray-600 fw-semibold"></div>
                                        </div>
                                    </div>
                                    <div class="separator mt-5"></div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                            <!--begin::Table head-->

                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-center fw-bold fs-7 text-uppercase gs-0">
                                                    <th>Food</th>
                                                    <th>Extras</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="text-center text-gray-600 fw-semibold">
                                                <tr>
                                                    <td>Pizza Margherita</td>
                                                    <td>Mozzarella</td>
                                                    <td>$50</td>
                                                    <td>1</td>
                                                    <!--end::Action-->
                                                </tr>
                                                <!--end::Table row-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <div class="row d-flex justify-content-end">
                                            <div class="col-md-2">
                                                <span class="text-center fw-bold fs-7 text-uppercase gs-0">{{ __('subtotal') }}</span>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="text-center text-gray-600 fw-semibold">$10.00</span>
                                            </div>
                                        </div>

                                        <div class="row d-flex justify-content-end mt-3">
                                            <div class="col-md-2">
                                                <span class="text-center fw-bold fs-7 text-uppercase gs-0">{{ __('delivery_fee')}}</span>
                                            </div>

                                            <div class="col-md-2">
                                                <span class="text-center text-gray-600 fw-semibold">$7.00</span>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-end mt-3">
                                            <div class="col-md-2">
                                                <span class="text-center fw-bold fs-7 text-uppercase gs-0">{{ __('tax')}}(15%)</span>
                                            </div>

                                            <div class="col-md-2">
                                                <span class="text-center text-gray-600 fw-semibold">$2.25</span>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-end mt-3">
                                            <div class="col-md-2">
                                                <span class="text-center fw-bold fs-7 text-uppercase gs-0">{{ __('total') }}</span>
                                            </div>

                                            <div class="col-md-2">
                                                <span class="text-center text-gray-600 fw-semibold">$10.00</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end my-5">
                                            <!--begin::Button-->
                                            <a href="{{ url()->previous() }}" id="kt_ecommerce_edit_order_cancel"
                                                class="btn btn-light me-5">{{ __('back_to_list') }}</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->

                                            <!--end::Button-->
                                        </div>
                                    </div>
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
