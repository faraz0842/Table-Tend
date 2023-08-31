<div>
    <div class="col-lg-12 fv-row fv-plugins-icon-container">
        <label class="col-lg-6 col-form-label required fw-bold fs-6" for="foods">{{ __('foods') }}</label>
        <select class="form-select" name="discountable_id">
            <option value="">Choose a food</option>
            @foreach ($categories as $category)
                @foreach ($category->foods as $food)
                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                @endforeach
            @endforeach

        </select>
        @if ($errors->has('foods'))
            <div class="text-danger">
                {{ $errors->first('foods') }}
            </div>
        @endif
    </div>
</div>
