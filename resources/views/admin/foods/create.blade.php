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
                            {{ __('add_food') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('create_foods') }}</li>
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
                    <form class="form d-flex flex-column flex-lg-row" method="POST" enctype="multipart/form-data"
                        action="{{ route('food.store') }}">
                        @csrf
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('thumbnail') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="text-muted fs-7">
                                        {{ __('set the thumbnail. Only *.png, *.jpg and *.jpeg image files are accepted') }}
                                    </div>
                                    @if ($errors->has('image'))
                                        <div class="text-danger">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('general') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('slug') }}</label>
                                            <input type="text" name="slug" class="form-control"
                                                placeholder="{{ __('enter_slug') }}" value="{{ old('slug') }}">
                                            @if ($errors->has('slug'))
                                                <div class="text-danger">{{ $errors->first('slug') }}
                                                </div>
                                            @endif
                                        </div>
                                        @foreach (config('translatable.locales') as $translation)
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('name') }}
                                                    ({{ $translation }})
                                                </label>
                                                <input type="text" name="{{ $translation }}[name]" class="form-control"
                                                    placeholder="{{ __('enter_name') }}"
                                                    value="{{ old($translation . '.name') }}">
                                                @if ($errors->has($translation . '.name'))
                                                    <div class="text-danger">
                                                        {{ $errors->first($translation . '.name') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('description') }}({{ $translation }})</label>
                                                <!--end::Label-->
                                                <div class="flex-grow-1">
                                                    <!--begin::Block-->
                                                    <div>
                                                        <textarea name="{{ $translation }}[description]" class="kt_docs_ckeditor_classic">{{ old($translation . '.description') }}</textarea>
                                                    </div>
                                                    @if ($errors->has($translation . '.description'))
                                                        <div class="text-danger">
                                                            {{ $errors->first($translation . '.description') }}</div>
                                                    @endif
                                                    <!--end::Block-->
                                                </div>
                                            </div>
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('ingredients') }}({{ $translation }})</label>
                                                <!--end::Label-->
                                                <div class="flex-grow-1">
                                                    <!--begin::Block-->
                                                    <div>
                                                        <textarea name="{{ $translation }}[ingredients]" class="kt_docs_ckeditor_classic">{{ old($translation . '.ingredients') }}</textarea>
                                                    </div>
                                                    @if ($errors->has($translation . '.ingredients'))
                                                        <div class="text-danger">
                                                            {{ $errors->first($translation . '.ingredients') }}</div>
                                                    @endif
                                                    <!--end::Block-->
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('price') }}</label>
                                            <input type="number" name="price" class="form-control"
                                                placeholder="{{ __('price') }}" value="{{ old('price') }}" />
                                            @if ($errors->has('price'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('price') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('discount_price') }}</label>
                                            <input type="number" name="discount_price" class="form-control"
                                                placeholder="{{ __('discount_price') }}"
                                                value="{{ old('discount_price') }}" />
                                            @if ($errors->has('discount_price'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('discount_price') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('unit') }}</label>
                                            <select class="form-select" data-control="select2" name="unit_id"
                                                data-placeholder="Select an restaurant">
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit['id'] }}">
                                                        {{ $unit['short_form'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('unit_id'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('unit_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('package_count') }}</label>
                                            <input type="number" name="package_count" class="form-control"
                                                placeholder="{{ __('package_count') }}"
                                                value="{{ old('package_count') }}" />
                                            @if ($errors->has('package_count'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('package_count') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('weight') }}</label>
                                            <input type="number" name="weight" class="form-control"
                                                placeholder="{{ __('weight') }}" value="{{ old('weight') }}" />
                                            @if ($errors->has('weight'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('weight') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('restaurant') }}
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" data-control="select2" name="restaurant_id"
                                                data-placeholder="Select an restaurant">
                                                @foreach ($restaurants as $restaurant)
                                                    <option value="{{ $restaurant['id'] }}">
                                                        {{ $restaurant['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('restaurant_id'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('restaurant_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('category') }}
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" data-control="select2" name="category_id"
                                                data-placeholder="Select an category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category['id'] }}">
                                                        {{ $category['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('category_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container mt-6">
                                            <label
                                                class="col-form-label required fw-bold px-2">{{ __('featured') }}</label>
                                            <input class="form-check-input mt-3" type="checkbox" name="featured"
                                                id="kt_roles_select_all" />

                                            <label
                                                class="col-form-label required fw-bold px-2">{{ __('deliverable_food') }}</label>
                                            <input class="form-check-input mt-3" type="checkbox" name="deliverable"
                                                id="kt_roles_select_all" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ url()->previous() }}" class="btn btn-light me-5">{{ __('cancel') }}</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('save_changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
@section('scripts')
    @include('admin.scripts.editor')
@endsection
