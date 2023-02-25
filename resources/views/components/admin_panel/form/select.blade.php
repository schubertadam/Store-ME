<div class="mb-3">
    <label for="{{ $name }}" class="small mb-1">
        {{ $label ?? ucfirst($name) }}
    </label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
        @if(isset($old) || is_null(old($name)))
            <option selected disabled>Please choose...</option>
        @endif
        @foreach($data as $key => $value)
            @if(isset($old))
                <option value="{{ $key }}" @if($key == $old || $key == old($name)) selected="selected" @endif>{{ $value }}</option>
            @else
                <option value="{{ $key }}" @if($key == old($name)) selected="selected" @endif>{{ $value }}</option>
            @endif
        @endforeach
    </select>

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
