<?php

namespace App\Services\AuthService;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

class AuthService implements AuthServiceInterface
{
    private const MAX_ATTEMPTS = 5;

    #[ArrayShape(['ip' => 'string', 'remember' => 'bool', 'username' => 'string', 'password' => 'string'])]
    public function login(array $data): bool
    {
        $key = "{$data['ip']}|{$data['username']}";

        if (RateLimiter::tooManyAttempts($key, self::MAX_ATTEMPTS - 1)) {
            throw ValidationException::withMessages([
                'custom' => trans('auth.throttle', ['seconds' => RateLimiter::availableIn($key)])
            ]);
        }

        $credentials = array_merge(['username' => $data['username'], 'password' => $data['password']], ['status' => true]);

        if (!auth()->attempt($credentials, $data['remember'])) {
            RateLimiter::hit($key);

            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
                'custom' => 'Attempts left: ' . RateLimiter::retriesLeft($key, self::MAX_ATTEMPTS)
            ]);
        }

        return true;
    }
}
