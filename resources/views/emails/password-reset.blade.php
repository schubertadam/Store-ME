<x-mail::message>
# Recover password

Please click the button below, to reset your password.

<x-mail::button url="{{ route('password_reset.show', $token) }}">
    Recover password
</x-mail::button>

In case the button does not work, please copy the link below and paste it
in the browser's search bar

<small>{{ route('password_reset.show', $token) }}</small>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
