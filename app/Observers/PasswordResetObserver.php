<?php

namespace App\Observers;

use App\Jobs\SendEmailJob;
use App\Mail\PasswordResetMail;
use App\Models\PasswordReset;

class PasswordResetObserver
{
    public function created(PasswordReset $passwordReset): void
    {
        $mailable = new PasswordResetMail($passwordReset->token);
        dispatch(new SendEmailJob($mailable, $passwordReset->email));
    }

    public function updated(PasswordReset $passwordReset): void
    {
    }

    public function deleted(PasswordReset $passwordReset): void
    {
    }

    public function restored(PasswordReset $passwordReset): void
    {
    }

    public function forceDeleted(PasswordReset $passwordReset): void
    {
    }
}
