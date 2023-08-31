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
                            {{ __('add_restaurant') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('create_restaurants') }}</li>
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
                        action="{{ route('restaurant.store') }}">
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
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('restaurant_slug') }}</label>
                                            <input type="text" name="slug" class="form-control"
                                                placeholder="{{ __('enter_slug') }}" value="{{ old('slug') }}">
                                            @if ($errors->has('slug'))
                                                <div class="text-danger">{{ $errors->first('slug') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('cuisine') }}</label>
                                            <select class="form-select" name="cuisines[]" multiple data-control="select2"
                                                data-placeholder="cuisine">
                                                @foreach ($cuisines as $cuisine)
                                                    <option value="{{ $cuisine['id'] }}">
                                                        {{ $cuisine['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('cuisines'))
                                                <div class="text-danger">
                                                    {{ $errors->first('cuisines') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('delivery_boys') }}</label>
                                            <select class="form-select" name="users" data-control="select2"
                                                data-placeholder="drivers">
                                                @foreach ($drivers as $driver)
                                                    <option value="{{ $driver['id'] }}">
                                                        {{ $driver['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('users'))
                                                <div class="text-danger">
                                                    {{ $errors->first('users') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('delivery_fee') }}</label>
                                            <input type="number" name="delivery_fee" class="form-control"
                                                value="{{ old('delivery_fee') }}"
                                                placeholder="{{ __('delivery_fee_here') }}" />
                                            @if ($errors->has('delivery_fee'))
                                                <div class="text-danger">
                                                    {{ $errors->first('delivery_fee') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('delivery_range') }}</label>
                                            <input type="number" name="delivery_range"
                                                class="form-control"value="{{ old('delivery_range') }}"
                                                placeholder="{{ __('delivery_range') }}" />
                                            @if ($errors->has('delivery_range'))
                                                <div class="text-danger">
                                                    {{ $errors->first('delivery_range') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('default_tax_of_the_restaurant') }}</label>
                                            <input type="number" name="default_tax"
                                                class="form-control"value="{{ old('default_tax') }}"
                                                placeholder="{{ __('default_tax_of_the_restaurant') }}" />
                                            @if ($errors->has('default_tax'))
                                                <div class="text-danger">
                                                    {{ $errors->first('default_tax') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('phone') }}</label>
                                            <input type="number" name="phone"
                                                class="form-control"value="{{ old('phone') }}"
                                                placeholder="{{ __('phone') }}" />
                                            @if ($errors->has('phone'))
                                                <div class="text-danger">{{ $errors->first('phone') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label fw-bold fs-6">{{ __('mobile') }}</label>
                                            <input type="number" name="mobile"
                                                class="form-control"value="{{ old('mobile') }}"
                                                placeholder="{{ __('optional') }}" />

                                            @if ($errors->has('mobile'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mobile') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label  fw-bold fs-6">{{ __('latitude') }}</label>
                                            <input type="number" name="latitude"
                                                class="form-control"value="{{ old('latitude') }}"
                                                placeholder="{{ __('optional') }}" />
                                            @if ($errors->has('latitude'))
                                                <div class="text-danger">
                                                    {{ $errors->first('latitude') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label  fw-bold fs-6">{{ __('longitude') }}</label>
                                            <input type="number" name="longitude"
                                                class="form-control"value="{{ old('longitude') }}"
                                                placeholder="{{ __('longitude') }}" />
                                            @if ($errors->has('longitude'))
                                                <div class="text-danger">
                                                    {{ $errors->first('longitude') }}
                                                </div>
                                            @endif
                                        </div>
                                        @foreach (config('translatable.locales') as $translation)
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('restaurant_name') }}
                                                    ({{ $translation }})
                                                </label>
                                                <input type="text" name="{{ $translation }}[name]"
                                                    class="form-control" placeholder="{{ __('enter_restaurant_name') }}"
                                                    value="{{ old($translation . '.name') }}">
                                                @if ($errors->has($translation . '.name'))
                                                    <div class="text-danger">
                                                        {{ $errors->first($translation . '.name') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('restaurant_address') }}
                                                    ({{ $translation }})
                                                </label>
                                                <input type="text" name="{{ $translation }}[address]"
                                                    class="form-control"
                                                    placeholder="{{ __('enter_restaurant_address') }}"
                                                    value="{{ old($translation . '.address') }}">
                                                @if ($errors->has($translation . '.address'))
                                                    <div class="text-danger">
                                                        {{ $errors->first($translation . '.address') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label fw-bold fs-6">{{ __('description') }}
                                                    ({{ $translation }})</label>
                                                <textarea name="{{ $translation }}[description]" class="kt_docs_ckeditor_classic">{{ old($translation . '.description') }}</textarea>
                                                @if ($errors->has($translation . '.description'))
                                                    <div class="text-danger">
                                                        {{ $errors->first($translation . '.description') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label fw-bold fs-6">{{ __('information') }}
                                                    ({{ $translation }})</label>
                                                <textarea name="{{ $translation }}[information]" class="kt_docs_ckeditor_classic">{{ old($translation . '.information') }}</textarea>
                                                @if ($errors->has($translation . '.information'))
                                                    <div class="text-danger">
                                                        {{ $errors->first($translation . '.information') }}
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                        @can('admin')
                                            <div class="separator mt-4"></div>
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <h1 class="col-lg-6">{{ __('admin_configurations') }}</h1>
                                            </div>
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('restaurant_owner') }}</label>
                                                <select class="form-select" name="users" data-control="select2"
                                                    data-placeholder="users">
                                                    @foreach ($managers as $manager)
                                                        <option value="{{ $manager['id'] }}">
                                                            {{ $manager['name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('users'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('users') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('admin_commission') }}</label>
                                                <input type="number" name="admin_commission"
                                                    class="form-control"value="{{ old('admin_commission') }}"
                                                    placeholder="{{ __('admin_commission') }}" />
                                                @if ($errors->has('admin_commission_id'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('admin_commission_id') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 row fv-plugins-icon-container">
                                                <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-form-label required fw-bold px-2">{{ __('closed_restaurant') }}</label>
                                                    <input class="form-check-input mt-3" type="checkbox" name="closed" />
                                                    @if ($errors->has('closed'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('closed') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                    <label for="availability_for_delivery"
                                                        class="col-form-label required fw-bold px-2">{{ __('available_for_delivery') }}</label>
                                                    <input class="form-check-input mt-3" type="checkbox"
                                                        name="availability_for_delivery" />
                                                    @if ($errors->has('availability_for_delivery'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('availability_for_delivery') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                    <label
                                                        class="col-form-label required fw-bold px-2">{{ __('active') }}</label>
                                                    <input class="form-check-input mt-3" type="checkbox" name="active" />
                                                    @if ($errors->has('active'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('active') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ url()->previous() }}" class="btn btn-light me-5">Cancel</a>
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
