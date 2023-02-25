<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        private string $token
    )
    {
    }

    public function build(): self
    {
        return $this->markdown('emails.password-reset')
            ->subject('Reset your password')
            ->with(['token' => $this->token]);
    }
}
