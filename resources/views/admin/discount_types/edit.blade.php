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
                            {{ __('edit_discount') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('edit_discount') }}</li>
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
                        action="{{ route('discount.update', $discount->slug) }}">
                        @csrf
                        <div class="d-flex flex-column flex-lg-row">
                            <div class="d-flex flex-column gap-7 col-3 gap-lg-10 mb-7 me-lg-10">
                                @include('layout.settings_sidebar')
                            </div>
                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('general') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body row pt-0">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('discount_slug') }}</label>
                                            <input type="text" name="slug" class="form-control"
                                                placeholder="{{ __('enter_slug') }}"
                                                value="{{ old('slug', $discount->slug) }}">
                                            @if ($errors->has('slug'))
                                                <div class="text-danger">{{ $errors->first('slug') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 row fv-plugins-icon-container">
                                            <label class="col-form-label fw-bold fs-6">{{ __('discount_color') }}</label>
                                            <!--end::Label-->
                                            <div class="d-flex">
                                                <input type="text" name="color" class="form-control color" readonly
                                                    placeholder="{{ __('use_unique_type_color') }}"
                                                    value="{{ old('color', $discount->color) }}" />
                                                <input type="color" aria-describedby="color"
                                                    class="form-control-color p-0 input-group-text colorPicker"
                                                    value="{{ old('color', $discount->color) }}" />
                                            </div>
                                            @if ($errors->has('color'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('color') }}
                                                </div>
                                            @endif
                                        </div>
                                        @foreach (config('translatable.locales') as $translation)
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('discount_name') }}
                                                    ({{ $translation }})
                                                </label>
                                                <input type="text" name="{{ $translation }}[name]" class="form-control"
                                                    placeholder="{{ __('enter_discount_name') }}"
                                                    value="{{ old($translation . '.name', $discount->hasTranslation($translation) ? $discount->translate($translation)->name : '') }}">
                                                @if ($errors->has($translation . '.name'))
                                                    <div class="text-danger">
                                                        {{ $errors->first($translation . '.name') }}
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-light me-5">{{ __('cancel') }}</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('save_changes') }}
                                    </button>
                                </div>
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
    @include('admin.scripts.color')
@endsection
