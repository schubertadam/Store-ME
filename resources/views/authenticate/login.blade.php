<x-layout.auth title="Login">
    <x-admin-panel.card.normal class="shadow-lg border-0 rounded-lg mt-5 mb-3">
        <x-slot:header>
            <h3 class="fw-light my-4">
                Login
            </h3>
        </x-slot:header>
        <x-admin-panel.form.form action="{{ route('login.store') }}">
            <x-admin-panel.form.input name="username"/>
            <x-admin-panel.form.input name="password" type="password"/>
            <x-admin-panel.form.checkbox name="remember" placeholder="Remember me"/>

            @error('custom')
                <div class="text-danger mb-3">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <a class="small" href="">Forgot Password?</a>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </x-admin-panel.form.form>
        <x-slot:footer>
            <div class="small">
                <a href="#">Need an account? Sign up!</a>
            </div>
        </x-slot:footer>
    </x-admin-panel.card.normal>
</x-layout.auth>
