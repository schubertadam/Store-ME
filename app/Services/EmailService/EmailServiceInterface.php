<?php

namespace App\Services\EmailService;

use Illuminate\Mail\Mailable;

interface EmailServiceInterface
{
    public function send(Mailable $mailable, string $email): bool;
}
