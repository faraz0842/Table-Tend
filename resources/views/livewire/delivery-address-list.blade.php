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
                <input type="text" wire:model="searchDescription"
                    class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_description') }}" />
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
                <input type="text" wire:model="searchAddress" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_address') }}" />
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
                <input type="text" wire:model="searchUser" class="form-control form-control-solid w-250px ps-15"
                    placeholder="{{ __('search_user') }}" />
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-50px">#</th>
                    <th class="text-center min-w-100px">{{ __('description') }}</th>
                    <th class="text-center min-w-100px">{{ __('address') }}</th>
                    <th class="text-center min-w-100px">{{ __('is_default') }}</th>
                    <th class="text-center min-w-100px">{{ __('user_id') }}</th>
                    <th class="text-center min-w-100px">{{ __('updated_at') }}</th>
                    <th class="text-center min-w-100px">{{ __('actions') }}</th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @forelse ($addresses as $key => $address)
                    <tr class="text-center">
                        <td class="text-dark">{{ $key + 1 }}</td>
                        <td class="text-dark">{{ strip_tags($address->description) }}</td>
                        <td class="text-dark">{{ strip_tags($address->address) }}</td>
                        <td class="text-dark">
                            @if ($address->is_default == '1')
                                <div class="badge badge-success text-sm">{{ __('yes') }}</div>
                            @else
                                <div class="badge badge-danger text-sm">{{ __('no') }}</div>
                            @endif
                        </td>
                        <td class="text-dark">{{ $address->user->name }}</td>
                        <td class="text-dark">{{ $address->updated_at }}</td>
                        <td class="text-dark">
                            @can('address.view')
                                <a href="{{ route('address.view', $address->id) }}"
                                    class="btn btn-icon btn-success btn-sm mr-2">
                                    <i class="bi bi-eye fs-4"></i>
                                </a>
                            @endcan
                            @can('address.edit')
                                <a href="{{ route('address.edit', $address->id) }}"
                                    class="btn btn-icon btn-success btn-sm mr-2">
                                    <i class="bi bi-pencil fs-4"></i>
                                </a>
                            @endcan
                            @can('address.delete')
                                <a type="button" data-bs-toggle="modal" data-category="" data-bs-target="#deleteModal"
                                    class="btn btn-icon btn-danger btn-sm mr-2">
                                    <i class="bi bi-trash fs-4"></i>
                                </a>
                            @endcan
                        </td>
                    </tr>
                    <div class="modal fade" id="deleteModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <h3>{{ __('are_you_sure_you_want_to_delete_?') }}</h3>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">{{ __('no') }},
                                        {{ __('cancel') }}</button>
                                    <a href="{{ route('address.delete', $address['id']) }}" type="button"
                                        class="btn btn-danger">{{ __('yes') }},
                                        {{ __('delete') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <h4>{{ __('no_address_found') }}</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $addresses->links() }}
    </div>
</div>
