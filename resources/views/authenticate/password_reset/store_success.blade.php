<x-layout.auth title="Password Recovery">
    <x-admin_panel.card.normal class="shadow-lg border-0 rounded-lg mt-5 mb-3">
        <x-slot:header>
            <h3 class="fw-light my-4">Check your inbox</h3>
        </x-slot:header>

        The reset link has been successfully sent to the given email address. Please
        check you inbox for further instructions.
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <a class="small" href="{{ route('login.index') }}">Return to login</a>
        </div>
    </x-admin_panel.card.normal>
</x-layout.auth>
