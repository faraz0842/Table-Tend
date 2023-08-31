<div>
    <div class="col-lg-12 fv-row fv-plugins-icon-container">
        <label class="col-lg-6 col-form-label required fw-bold fs-6" for="restaurant">{{ __('restaurants') }}</label>
        <select wire:model="selectedRestaurant" name="discountable_id" class="form-select">
            <option value="">Choose a restaurant</option>
            @foreach ($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('restaurants'))
            <div class="text-danger">
                {{ $errors->first('restaurants') }}
            </div>
        @endif
    </div>
    @if ($selectedRestaurant)
        <livewire:category :restaurant_id="$selectedRestaurant" />
    @endif
</div>
