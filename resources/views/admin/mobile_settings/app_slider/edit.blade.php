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
                            {{ __('edit_slider') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('edit_sliders') }}</li>
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
                        action="{{ route('slider.update', $slider->slug) }}">
                        @csrf
                        <div class="d-flex flex-column col-3 gap-7 gap-lg-10 mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('thumbnail') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <div class="image-input-wrapper w-150px h-150px"
                                            style="background-image: url({{ $slider->getFirstMediaUrl('slider.images') }})">
                                        </div>
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
                                <div class="card-body row pt-0">
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('slug') }}</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="{{ __('enter_slug') }}" value="{{ old('slug', $slider->slug) }}">
                                        @if ($errors->has('slug'))
                                            <div class="text-danger">{{ $errors->first('slug') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('order') }}</label>
                                        <input type="number" name="order" class="form-control"
                                            value="{{ old('order', $slider->order) }}"
                                            placeholder="{{ __('order') }}" />
                                        @if ($errors->has('order'))
                                            <div class="text-danger">{{ $errors->first('order') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('text_position') }}</label>
                                        <select class="form-select" name="text_position" data-control="select2"
                                            data-placeholder="text_position">
                                            <option value="top_start">Top Start</option>
                                            <option value="top_center">Top Center</option>
                                            <option value="top_end">Top End</option>
                                            <option value="center">Center</option>
                                            <option value="center_end">Center End</option>
                                            <option value="center_start">Center Start</option>
                                            <option value="botton_start">Botton Start</option>
                                            <option value="botton_center">Botton Center</option>
                                            <option value="botton_end">Botton End</option>
                                        </select>
                                        @if ($errors->has('text_position'))
                                            <div class="text-danger">
                                                {{ $errors->first('text_position') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('text_color') }}</label>
                                        <div class="d-flex">
                                            <input type="text" name="text_color" class="form-control color"
                                                value="{{ old('text_color', $slider->text_color) }}" readonly
                                                placeholder="{{ __('use_unique_type_color') }}" />
                                            <input type="color" aria-describedby="color"
                                                value="{{ old('text_color') }}"
                                                class="form-control-color p-0 input-group-text colorPicker" />
                                        </div>
                                        @if ($errors->has('text_color'))
                                            <div class="text-danger">
                                                {{ $errors->first('text_color') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('button_color') }}</label>
                                        <div class="d-flex">
                                            <input type="text" name="button_color"
                                                value="{{ old('button_color', $slider->button_color) }}"
                                                class="form-control color" readonly
                                                placeholder="{{ __('use_unique_type_color') }}" />
                                            <input type="color" aria-describedby="color"
                                                value="{{ old('button_color', $slider->button_color) }}"
                                                class="form-control-color p-0 input-group-text colorPicker" />
                                        </div>
                                        @if ($errors->has('button_color'))
                                            <div class="text-danger">
                                                {{ $errors->first('button_color') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('background_color') }}</label>
                                        <div class="d-flex">
                                            <input type="text" name="background_color" class="form-control color"
                                                value="{{ old('background_color', $slider->background_color) }}" readonly
                                                placeholder="{{ __('use_unique_type_color') }}" />
                                            <input type="color" aria-describedby="color"
                                                value="{{ old('background_color', $slider->background_color) }}"
                                                class="form-control-color p-0 input-group-text colorPicker" />
                                        </div>
                                        @if ($errors->has('background_color'))
                                            <div class="text-danger">
                                                {{ $errors->first('background_color') }}
                                            </div>
                                        @endif
                                    </div>
                                    @foreach (config('translatable.locales') as $translation)
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('text') }}
                                                ({{ $translation }})
                                            </label>
                                            <input type="text" name="{{ $translation }}[text]" class="form-control"
                                                placeholder="{{ __('enter_text') }}"
                                                value="{{ old($translation . '.text', $slider->hasTranslation($translation) ? $slider->translate($translation)->text : '') }}">
                                            @if ($errors->has($translation . '.text'))
                                                <div class="text-danger">
                                                    {{ $errors->first($translation . '.text') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('button') }}
                                                ({{ $translation }})
                                            </label>
                                            <input type="text" name="{{ $translation }}[button]"
                                                class="form-control" placeholder="{{ __('enter_button') }}"
                                                value="{{ old($translation . '.button', $slider->hasTranslation($translation) ? $slider->translate($translation)->button : '') }}">
                                            @if ($errors->has($translation . '.button'))
                                                <div class="text-danger">
                                                    {{ $errors->first($translation . '.button') }}
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('indicator_color') }}</label>
                                        <div class="d-flex">
                                            <input type="text" name="indicator_color" class="form-control color"
                                                value="{{ old('indicator_color', $slider->indicator_color) }}" readonly
                                                placeholder="{{ __('use_unique_type_color') }}" />
                                            <input type="color" aria-describedby="color"
                                                value="{{ old('indicator_color', $slider->indicator_color) }}"
                                                class="form-control-color p-0 input-group-text colorPicker" />
                                        </div>
                                        @if ($errors->has('indicator_color'))
                                            <div class="text-danger">
                                                {{ $errors->first('indicator_color') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('image_fit') }}</label>
                                        <select class="form-select" name="image_fit" data-control="select2"
                                            data-placeholder="image_fit">
                                            <option value="cover">Cover</option>
                                            <option value="fill">Fill</option>
                                            <option value="contain">Contain</option>
                                            <option value="fit_height">Fit height</option>
                                            <option value="fit_width">Fit width</option>
                                            <option value="none">None</option>
                                            <option value="scale_down">Scale Down</option>
                                        </select>
                                        @if ($errors->has('image_fit'))
                                            <div class="text-danger">
                                                {{ $errors->first('image_fit') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('food') }}</label>
                                        <select class="form-select" name="food_id" data-control="select2"
                                            data-placeholder="food_id">
                                            @foreach ($foods as $food)
                                                <option value="{{ $food['id'] }}">
                                                    {{ $food['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('food_id'))
                                            <div class="text-danger">
                                                {{ $errors->first('food_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-6 col-form-label required fw-bold fs-6">{{ __('restaurant') }}</label>
                                        <select class="form-select" name="restaurant_id" data-control="select2"
                                            data-placeholder="restaurant_id">
                                            @foreach ($restaurants as $restaurant)
                                                <option value="{{ $restaurant['id'] }}">
                                                    {{ $restaurant['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('restaurant_id'))
                                            <div class="text-danger">
                                                {{ $errors->first('restaurant_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-form-label fw-bold px-2">{{ __('enabled') }}</label>
                                        <input class="form-check-input mt-3" type="checkbox"
                                            {{ $slider->enabled = 1 ? 'checked' : '' }}
                                            name="enabled" />
                                        @if ($errors->has('enabled'))
                                            <div class="text-danger">
                                                {{ $errors->first('enabled') }}
                                            </div>
                                        @endif
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
    @include('admin.scripts.color')
@endsection
