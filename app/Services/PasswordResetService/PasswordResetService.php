<?php

namespace App\Services\PasswordResetService;

use App\Jobs\SendEmailJob;
use App\Mail\PasswordResetMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;
use Throwable;

class PasswordResetService implements PasswordResetServiceInterface
{
    public function createToken(string $email): Model
    {
        PasswordReset::query()->where(['email' => $email])->delete();

        $token = Str::random(64);

        $entity = PasswordReset::query()->create([
            'email' => $email,
            'token' => $token
        ]);

        $entity->save();
        return $entity;
    }

    #[ArrayShape(['email' => 'string'])]
    public function sendPasswordResetEmail(array $data): bool
    {
        try {
            $entity = $this->createToken($data['email']);

            $mailable = new PasswordResetMail($entity->token);

            dispatch(new SendEmailJob($mailable, $entity->email));

            return true;
        } catch (Throwable $t) {
            return false;
        }
    }

    #[ArrayShape(['token' => 'string', 'password' => 'string', 'password_confirmation' => 'string'])]
    public function resetPassword(array $requestData): bool
    {
        $passwordReset = PasswordReset::query()->where(['token' => $requestData['token']])->first();
        $user = User::query()->where('email', $passwordReset->email)->first();

        // in case someone tries with random token(s)
        if (is_null($passwordReset) || is_null($user)) {
            return true;
        }

        // update password
        $user->password = Hash::make($requestData['password']);

        if ($user->save() && $passwordReset->delete()) {
            return true;
        }

        return false;
    }
}
