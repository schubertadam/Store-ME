<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        @isset($icon)
                            <div class="page-header-icon">
                                <i data-feather="{{ $icon }}"></i>
                            </div>
                        @endisset
                        {{ $title }}
                    </h1>
                </div>
                @isset($subtitle)
                    <div class="col-12 col-xl-auto mb-3">
                        {{ $subtitle }}
                    </div>
                @endisset
            </div>
        </div>
    </div>
</header>
<div class="container-xl px-4">
    {{ $slot }}
</div>
