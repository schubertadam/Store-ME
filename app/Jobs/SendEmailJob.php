<?php

namespace App\Jobs;

use App\Services\EmailService\EmailServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private Mailable $mailable,
        private string $email
    )
    {
    }

    public function handle(
        EmailServiceInterface $service
    ): void
    {
        $service->send($this->mailable, $this->email);
    }
}
