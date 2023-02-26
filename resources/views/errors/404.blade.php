<x-layout.error>
    <img class="img-fluid p-4" src="{{ asset('assets/images/errors/404-error-with-a-cute-animal.svg') }}" alt="" />
    <p class="lead">This requested URL was not found on this server.</p>
    <a class="text-arrow-icon" href="{{ route('dashboard') }}">
        <i class="ms-0 me-1" data-feather="arrow-left"></i>
        Return to Dashboard
    </a>
</x-layout.error>
