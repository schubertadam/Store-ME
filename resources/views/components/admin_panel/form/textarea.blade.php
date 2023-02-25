<div class="mb-3">
    <label for="{{ $name }}" class="small mb-1">
        {{ $label ?? ucfirst($name) }}
    </label>

    <textarea type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}"
              rows="{{ $rows ?? 6 }}" cols="{{ $colspan ?? 50 }}" placeholder="{{ $placeholder ?? '' }}"
              class="form-control @error($name) is-invalid @enderror">{{ old($name, $value ?? '') }}</textarea>

    @if($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @else
        @isset($help)
            <div class="form-text">
                {{ $help }}
            </div>
        @endisset
    @endif
</div>
