<x-layout.auth title="Password Recovery">
    <x-admin_panel.card.normal class="shadow-lg border-0 rounded-lg mt-5 mb-3">
        <x-slot:header>
            <h3 class="fw-light my-4">Password Recovery</h3>
        </x-slot:header>

        <div class="small mb-3 text-muted">Enter you new password, and we will set it for you.</div>

        <x-admin_panel.form.form action="{{ route('password_reset.update', $token) }}">
            @method('PUT')
            <x-admin_panel.form.input name="token" type="hidden" value="{{ $token }}"/>
            <x-admin_panel.form.input name="email" type="email" placeholder="Email address"/>
            <x-admin_panel.form.input name="password" type="password" placeholder="password"/>
            <x-admin_panel.form.input name="password_confirmation" type="password" placeholder="password again"/>

            @error('custom')
            <div class="text-danger mb-3">
                <small>{{ $message }}</small>
            </div>
            @enderror

            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <a class="small" href="{{ route('login.index') }}">Return to login</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </x-admin_panel.form.form>

    </x-admin_panel.card.normal>
</x-layout.auth>
