<?php

namespace App\Services\PasswordService;

use App\Models\PasswordReset;
use JetBrains\PhpStorm\ArrayShape;

interface PasswordServiceInterface
{
    #[ArrayShape(['email' => 'string'])]
    public function createToken(array $data): PasswordReset;

    #[ArrayShape(['token' => 'string', 'password' => 'string', 'password_confirmation' => 'string'])]
    public function setPassword(array $data): bool;
}
