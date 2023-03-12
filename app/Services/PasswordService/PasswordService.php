<?php

namespace App\Services\PasswordService;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class PasswordService implements PasswordServiceInterface
{
    #[ArrayShape(['email' => 'string'])]
    public function createToken(array $data): PasswordReset
    {
        PasswordReset::query()->where(['email' => $data['email']])->delete();

        return PasswordReset::query()->create([
            'email' => $data['email'],
            'token' => Str::random(64)
        ]);
    }

    #[ArrayShape(['token' => 'string', 'password' => 'string', 'password_confirmation' => 'string'])]
    public function setPassword(array $data): bool
    {
        $tokenWithEmail = PasswordReset::query()->where(['token' => $data['token']])->first();
        $user = User::query()->where('email', $tokenWithEmail->email)->first();

        $user->password = Hash::make($data['password']);

        return $user->save() && $tokenWithEmail->delete();
    }
}
