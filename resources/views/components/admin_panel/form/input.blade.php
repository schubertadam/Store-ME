<div class="mb-3">
    @if(isset($type) && $type == 'hidden')
    @else
        <label for="{{ $name }}" class="small mb-1">
            {{ $label ?? ucfirst($name) }}
        </label>
    @endif

    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}"
           value="{{ old($name, $value ?? '') }}" placeholder="{{ $placeholder ?? '' }}"
           class="form-control @error($name) is-invalid @enderror">

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
