<div class="card {{ $class ?? '' }}">
    @isset($header)
        <div class="card-header">
            {{ $header }}
        </div>
    @endisset

    <div class="card-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card-footer text-center">
            {{ $footer }}
        </div>
    @endisset
</div>
