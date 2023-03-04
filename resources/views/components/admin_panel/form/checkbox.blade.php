<div class="mb-3">
    @if(!isset($placeholder))
        <label for="{{ $name }}" class="small mb-1">
            {{ ucfirst($name) }}
        </label>
    @endif

    <div class="form-check">
        <input type="checkbox" name="{{ $name }}" id="{{ $name }}" class="form-check-input @error($name) is-invalid @enderror" @if(isset($status) && $status) checked @endif>
        <label class="form-check-label small" id="{{ $name }}Label" for="{{ $name }}">{{ $placeholder ?? '' }}</label>
    </div>

    @isset($statuses)
        @php
            $statusText = explode('|', $statuses)
        @endphp
    <script type="text/javascript">
        $(document).ready(function() {
            $('#{{ $name }}Label').html($('#{{ $name }}').is(':checked') ? '{{ $statusText[0] }}' : '{{ $statusText[1] }}');
        });

        $('#{{ $name }}').click(function () {
            $('#{{ $name }}Label').html($('#{{ $name }}').is(':checked') ? '{{ $statusText[0] }}' : '{{ $statusText[1] }}');
        });
    </script>
    @endisset

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
