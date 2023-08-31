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
                            {{ __('edit_nutrition') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('edit_nutrition') }}</li>
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
                        action="{{ route('nutrition.update', $nutrition->slug) }}">
                        @csrf
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
                                                placeholder="{{ __('enter_slug') }}" value="{{ $nutrition['slug'] }}">
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
                                                    value="{{ old($translation . '.name', $nutrition->hasTranslation($translation) ? $nutrition->translate($translation)->name : '') }}">
                                                @if ($errors->has($translation . '.name'))
                                                    <div class="text-danger">
                                                        {{ $errors->first($translation . '.name') }}
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('food') }}
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" data-control="select2" name="food_id"
                                                data-placeholder="Select an food">
                                                @foreach ($foods as $food)
                                                    <option value="{{ $food['id'] }}" {{ $nutrition['food_id'] == $food['id'] ? 'selected' : '' }}>
                                                        {{ $food['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('food_id'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('food_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('quantity') }}</label>
                                            <input type="number" name="quantity" class="form-control"
                                                placeholder="{{ __('quantity') }}" value="{{ $nutrition['quantity'] }}" />
                                            @if ($errors->has('quantity'))
                                                <div class="error text-danger">
                                                    {{ $errors->first('quantity') }}
                                                </div>
                                            @endif
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
