<?php

namespace App\Services\EmailService;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class GmailEmailService implements EmailServiceInterface
{

    public function send(Mailable $mailable, string $email): bool
    {
        return !is_null(Mail::to($email)->send($mailable));
    }
}
