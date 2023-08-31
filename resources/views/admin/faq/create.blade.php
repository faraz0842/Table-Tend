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
                            {{ __('add_faq') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('create_faq') }}</li>
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
                        action="{{ route('faq.store') }}">
                        @csrf
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
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('faq_slug') }}</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="{{ __('enter_slug') }}" value="{{ old('slug') }}">
                                        @if ($errors->has('slug'))
                                            <div class="text-danger">{{ $errors->first('slug') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('faq_category') }}</label>
                                        <select class="form-select" name="faq_category_id" data-control="select2"
                                            data-placeholder="faq_category_id">
                                            @foreach ($faqCategories as $faqCategory)
                                                <option value="{{ $faqCategory['id'] }}">
                                                    {{ $faqCategory['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('faq_category_id'))
                                            <div class="text-danger">
                                                {{ $errors->first('faq_category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    @foreach (config('translatable.locales') as $translation)
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('faq_question') }}
                                                ({{ $translation }})
                                            </label>
                                            <input type="text" name="{{ $translation }}[question]" class="form-control"
                                                placeholder="{{ __('enter__question') }}"
                                                value="{{ old($translation . '.question') }}">
                                            @if ($errors->has($translation . '.question'))
                                                <div class="text-danger">
                                                    {{ $errors->first($translation . '.question') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('faq_answer') }}
                                                ({{ $translation }})
                                            </label>
                                            <textarea type="text" name="{{ $translation }}[answer]" class="form-control"
                                                placeholder="{{ __('enter_answer') }}" rows="1">{{ old($translation . '.answer') }}</textarea>
                                            @if ($errors->has($translation . '.answer'))
                                                <div class="text-danger">
                                                    {{ $errors->first($translation . '.answer') }}
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
