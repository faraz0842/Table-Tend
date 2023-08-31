<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="text" wire:model="searchOrder" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_by_order') }}" />
            </div>
        </div>
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="text" wire:model="searchText" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_by_text') }}" />
            </div>
        </div>
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="text" wire:model="searchButton" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_by_button') }}" />
            </div>
        </div>
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="text" wire:model="searchFood" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_by_food') }}" />
            </div>
        </div>
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="text" wire:model="searchRestaurant"
                    class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_by_restaurant') }}" />
            </div>
        </div>
        <div class="card-toolbar">
            <div class="d-flex justify-content-end">
                <a href="{{ route('slider.create') }}" class="btn btn-primary">
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                fill="currentColor"></rect>
                        </svg>
                    </span>
                    {{ __('add_new_slider') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-50px">#</th>
                    <th class="text-center min-w-100px">{{ __('image') }}</th>
                    <th class="text-center min-w-100px">{{ __('slug') }}</th>
                    <th class="text-center min-w-100px">{{ __('order') }}</th>
                    <th class="text-center min-w-100px">{{ __('text') }}</th>
                    <th class="text-center min-w-100px">{{ __('button') }}</th>
                    <th class="text-center min-w-100px">{{ __('food_id') }}</th>
                    <th class="text-center min-w-100px">{{ __('restaurant_id') }}</th>
                    <th class="text-center min-w-100px">{{ __('status') }}</th>
                    <th class="text-center min-w-100px">{{ __('actions') }}</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @forelse ($sliders as $key => $slider)
                    <tr class="text-center">
                        <td class="text-dark">{{ $key + 1 }}</td>
                        <td>
                            <!--begin:: Avatar -->
                            <div class="symbol symbol-rounded symbol-50px overflow-hidden me-3">
                                <img src="{{ ImageHelper::GetImageUrl($slider->getFirstMediaUrl('slider.images')) }}"
                                    class="w-100" />
                            </div>
                            <!--end::Avatar-->
                        </td>
                        <td class="text-dark">{{ $slider->slug }}</td>
                        <td class="text-dark">{{ $slider->order }}</td>
                        <td class="text-dark">{{ $slider->text }}</td>
                        <td class="text-dark">{{ $slider->button }}</td>
                        <td class="text-dark">{{ $slider->food->name }}</td>
                        <td class="text-dark">{{ $slider->restaurant->name }}</td>
                        <td class="text-dark">
                            @if ($slider->enabled == '1')
                                <div class="badge badge-success text-sm">{{ __('active') }}</div>
                            @else
                                <div class="badge badge-danger text-sm">{{ __('inactive') }}</div>
                            @endif
                        </td>
                        <td class="text-dark">
                            <a href="{{ route('slider.edit', $slider->slug) }}"
                                class="btn btn-icon btn-success btn-sm mr-2">
                                <i class="bi bi-pencil fs-4"></i>
                            </a>
                            <a type="button" data-bs-toggle="modal" data-category="{{ $slider['slug'] }}"
                                data-bs-target="#deleteModal{{ $slider['slug'] }}"
                                class="btn btn-icon btn-danger btn-sm mr-2">
                                <i class="bi bi-trash fs-4"></i>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="deleteModal{{ $slider['slug'] }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <h3>{{ __('are_you_sure_you_want_to_delete_?') }}</h3>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">{{ __('no') }},
                                        {{ __('cancel') }}</button>
                                    <a href="{{ route('slider.delete', $slider['slug']) }}" type="button"
                                        class="btn btn-danger">{{ __('yes') }},
                                        {{ __('delete') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">
                            <h4>{{ __('no_sliders_found') }}</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $sliders->links() }}
    </div>
</div>
