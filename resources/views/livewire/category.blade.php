<div>
    <div class="col-lg-12 fv-row fv-plugins-icon-container">
        <label class="col-lg-6 col-form-label required fw-bold fs-6" for="categories">{{ __('categories') }}</label>
        <select wire:model="selectedCategory" name="discountable_id" class="form-select">
            <option value="">Choose a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['slug'] }}</option>
            @endforeach
        </select>
        @if ($errors->has('category'))
            <div class="text-danger">
                {{ $errors->first('category') }}
            </div>
        @endif
    </div>
    @if ($selectedCategory)
        <livewire:food-dropdown :category_id="$selectedCategory" />
    @endif
</div>
