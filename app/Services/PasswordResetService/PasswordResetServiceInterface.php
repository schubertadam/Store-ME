<?php

namespace App\Services\PasswordResetService;

use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\ArrayShape;

interface PasswordResetServiceInterface
{
    public function createToken(string $email): Model;
    #[ArrayShape(['email' => 'string'])]
    public function sendPasswordResetEmail(array $data): bool;
    #[ArrayShape(['token' => 'string', 'password' => 'string', 'password_confirmation' => 'string'])]
    public function resetPassword(array $requestData): bool;
}
