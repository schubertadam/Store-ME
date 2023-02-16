<?php

namespace App\Services\AuthService;

use JetBrains\PhpStorm\ArrayShape;

interface AuthServiceInterface
{
    #[ArrayShape(['ip' => 'string', 'remember' => 'bool', 'username' => 'string', 'password' => 'string'])]
    public function login(array $data): bool;

    public function logout(): bool;
}
