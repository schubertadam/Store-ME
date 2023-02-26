<header class="page-header page-header-dark bg-gradient-primary-to-secondary mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        @isset($icon)
                            <div class="page-header-icon">
                                <i data-feather="{{ $icon }}"></i>
                            </div>
                        @endisset
                        {{ $title }}
                    </h1>
                    @isset($subtitle)
                        <div class="page-header-subtitle">
                            {{ $subtitle }}
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container-xl px-4">
    {{ $slot }}
</div>
