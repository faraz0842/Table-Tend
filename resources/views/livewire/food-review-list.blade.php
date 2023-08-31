<div>
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
                <input type="text" data-kt-filter="search" wire:model="searchName" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_food_review') }}" />
            </div>
        </div>
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
                <input type="text" data-kt-filter="search" wire:model="searchUser" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_user') }}" />
            </div>
        </div>
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
                <input type="text" data-kt-filter="search" wire:model="searchFood" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_foods') }}" />
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-50px">#</th>
                    <th class="text-center min-w-100px">{{ __('review') }}</th>
                    <th class="text-center min-w-100px">{{ __('rate') }}</th>
                    <th class="text-center min-w-100px">{{ __('user') }}</th>
                    <th class="text-center min-w-100px">{{ __('food') }}</th>
                    <th class="text-center min-w-100px">{{ __('updated_at') }}</th>
                    <th class="text-center min-w-100px">{{ __('actions') }}</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @forelse ($foodReview as $key => $foodReviews)
                    <tr class="text-center">
                        <td class="text-dark">{{ $key + 1 }}</td>
                        <td class="text-dark">{{ strip_tags($foodReviews->review) }}</td>
                        <td class="text-dark">{{ $foodReviews->rate }}</td>
                        <td class="text-dark">{{ $foodReviews->user['name'] }}</td>
                        <td class="text-dark">{{ $foodReviews->food['name'] }}</td>
                        <td class="text-dark">{{ $foodReviews->updated_at->diffForHumans() }}</td>
                        <td class="text-dark">
                            @can('food_review.edit')
                                <a href="{{ route('food_review.edit', $foodReviews->uuid) }}"
                                    class="btn btn-icon btn-success btn-sm mr-2">
                                    <i class="bi bi-pencil fs-4"></i>
                                </a>
                            @endcan
                            @can('food_review.delete')
                                <button data-bs-toggle="modal" data-bs-target="#kt_modal_{{ $foodReviews->id }}"
                                    class="btn btn-icon btn-danger btn-sm mr-2">
                                    <i class="bi bi-trash fs-4"></i>
                                </button>
                            @endcan
                            <div class="modal fade" tabindex="-1" id="kt_modal_{{ $foodReviews->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3>{{ __('are_you_sure_you_want_to_delete_?') }}</h3>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">{{ __('no') }},
                                                {{ __('cancel') }}</button>
                                            <a href="{{ route('food_review.delete', $foodReviews->uuid) }}"
                                                type="button" class="btn btn-danger">{{ __('yes') }},
                                                {{ __('delete') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            <h4>{{ __('no_food_review_found') }}</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $foodReview->links() }}
    </div>
</div>
