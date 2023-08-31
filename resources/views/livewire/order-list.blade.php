 <div class="card">
     <div class="card-header border-0 pt-6">
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
                 <input type="text" wire:model="searchId" class="form-control form-control-solid w-250px ps-15"
                     placeholder="{{ __('search_order') }}" />
             </div>
         </div>
     </div>
     <div class="card-body pt-0">
         <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
             <thead>
                 <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                     <th class="text-center min-w-50px">#</th>
                     <th class="text-center min-w-100px">{{ __('order_id') }}</th>
                     <th class="text-center min-w-100px">{{ __('client') }}</th>
                     <th class="text-center min-w-100px">{{ __('order_status') }}</th>
                     <th class="text-center min-w-100px">{{ __('tax') }}</th>
                     <th class="text-center min-w-100px">{{ __('delivery_status') }}</th>
                     <th class="text-center min-w-100px">{{ __('method') }}</th>
                     <th class="text-center min-w-100px">{{ __('active') }}</th>
                     <th class="text-center min-w-100px">{{ __('actions') }}</th>
                 </tr>
             </thead>
             <tbody class="fw-semibold text-gray-600">
                 @forelse ($orders as $key => $order)
                     <tr class="text-center">
                         <td class="text-dark">{{ $key + 1 }}</td>
                         <td class="text-dark">{{ $order->client }}</td>
                         <td class="text-dark">{{ $order->order_status }}</td>
                         <td class="text-dark">{{ $order->tax }}</td>
                         <td class="text-dark">{{ $order->method }}</td>
                         <td class="text-dark">{{ $order->delivery_status }}</td>
                         <td class="text-dark">{{ $order->active }}</td>
                         <td class="text-dark">
                             @can('order.view')
                                 <a href="{{ route('order.view', $order->slug) }}"
                                     class="btn btn-icon btn-success btn-sm mr-2">
                                     <i class="bi bi-eye fs-4"></i>
                                 </a>
                             @endcan
                             @can('order.edit')
                                 <a href="{{ route('order.edit', $order->slug) }}"
                                     class="btn btn-icon btn-success btn-sm mr-2">
                                     <i class="bi bi-pencil fs-4"></i>
                                 </a>
                             @endcan
                             @can('order.delete')
                                 <a type="button" data-bs-toggle="modal" data-category="{{ $order['slug'] }}"
                                     data-bs-target="#deleteModal{{ $order['slug'] }}"
                                     class="btn btn-icon btn-danger btn-sm mr-2">
                                     <i class="bi bi-trash fs-4"></i>
                                 </a>
                             @endcan
                         </td>
                     </tr>
                     <div class="modal fade" id="deleteModal{{ $order['slug'] }}">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-body text-center">
                                     <h3>{{ __('are_you_sure_you_want_to_delete_?') }}</h3>
                                 </div>
                                 <div class="modal-footer d-flex justify-content-center">
                                     <button type="button" class="btn btn-light"
                                         data-bs-dismiss="modal">{{ __('no') }},
                                         {{ __('cancel') }}</button>
                                     <a href="{{ route('order.delete', $order['slug']) }}" type="button"
                                         class="btn btn-danger">{{ __('yes') }},
                                         {{ __('delete') }}</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @empty
                     <tr>
                         <td colspan="9" class="text-center">
                             <h4>{{ __('no_orders_found') }}</h4>
                         </td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
         {{ $orders->links() }}
     </div>
 </div>
