@foreach ($languages as $locale)
    <div class="col-lg-12 fv-row fv-plugins-icon-container">
        <label class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('mass_unit_full_form') }}
            ({{ $locale }})
        </label>
        <input type="text" name="{{ $locale }}[full_form]" class="form-control"
            placeholder="{{ __('enter_full_form') }}" value="{{ old($locale . '.full_form') }}">
        @if ($errors->has($locale . '.full_form'))
            <div class="text-danger">
                {{ $errors->first($locale . '.full_form') }}
            </div>
        @endif
    </div>
    <div class="col-lg-12 fv-row fv-plugins-icon-container">
        <label class="col-lg-12 col-form-label required fw-bold fs-6">{{ __('mass_unit_short_form') }}
            ({{ $locale }})</label>
        <input type="text" name="{{ $locale }}[short_form]" class="form-control"
            placeholder="{{ __('enter_short_form') }}" value="{{ old($locale . '.short_form') }}">
        @if ($errors->has($locale . '.short_form'))
            <div class="text-danger">
                {{ $errors->first($locale . '.short_form') }}
            </div>
        @endif
    </div>
@endforeach
