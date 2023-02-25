<?php

namespace App\Providers;

use App\Services\AuthService\AuthService;
use App\Services\AuthService\AuthServiceInterface;
use App\Services\EmailService\EmailServiceInterface;
use App\Services\EmailService\GmailEmailService;
use App\Services\PasswordResetService\PasswordResetService;
use App\Services\PasswordResetService\PasswordResetServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(PasswordResetServiceInterface::class, PasswordResetService::class);
        $this->app->bind(EmailServiceInterface::class, GmailEmailService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
