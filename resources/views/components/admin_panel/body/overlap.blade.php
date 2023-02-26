<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
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
                </div>
                @isset($subtitle)
                    <div class="col-12 col-xl-auto mt-4">
                        {{ $subtitle }}
                    </div>
                @endisset
            </div>
        </div>
    </div>
</header>
<div class="container-xl px-4 mt-n10">
    {{ $slot }}
</div>
