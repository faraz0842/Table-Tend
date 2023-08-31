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
                            {{ __('edit_restaurant_review') }}</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}"
                                    class="text-muted text-hover-primary">{{ __('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">{{ __('edit_restaurant_review') }}</li>
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
                    <form class="form d-flex flex-column flex-lg-row"
                        action="{{ route('restaurant_review.update', $restaurantReview->uuid) }}" method="POST">
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
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('user') }}</label>
                                            <select class="form-select" data-control="select2" name="user_id"
                                                data-placeholder="Select an User">
                                                <option value=""></option>
                                                @foreach ($users as $user)
                                                    <option
                                                        value="{{ $user['id'] }}"{{ $restaurantReview->user_id == $user->id ? 'selected' : '' }}>
                                                        {{ $user['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('user'))
                                                <div class="text-danger">{{ $errors->first('user') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('restaurant') }}</label>
                                            <select class="form-select" data-control="select2" name="restaurant_id"
                                                data-placeholder="Select an restaurant">
                                                <option value=""></option>
                                                @foreach ($restaurants as $restaurant)
                                                    <option
                                                        value="{{ $restaurant['id'] }}"{{ $restaurantReview->restaurant_id == $restaurant->id ? 'selected' : '' }}>
                                                        {{ $restaurant['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('restaurant'))
                                                <div class="text-danger">{{ $errors->first('restaurant') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('rate') }}</label>
                                            <input type="number" name="rate" class="form-control"
                                                placeholder="{{ __('insert_rate') }}"
                                                value="{{ old('rate', $restaurantReview->rate) }}" />
                                        </div>
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <label
                                                class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('review') }}</label>
                                            <div class="flex-grow-1">
                                                <!--begin::Block-->
                                                <div>
                                                    <textarea name="review"class="kt_docs_ckeditor_classic">{{ old('review', $restaurantReview->review) }}</textarea>
                                                </div>
                                                <!--end::Block-->
                                            </div>
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
