<div class="card card-icon {{ $class ?? '' }}">
    <div class="row no-gutters">
        <div class="col-auto card-icon-aside bg-{{ $color ?? 'primary' }} text-white">
            <i data-feather="{{ $icon ?? 'info' }}"></i>
        </div>
        <div class="col">
            <div class="card-body py-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
