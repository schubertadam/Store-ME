<?php

namespace App\Providers;

use App\Services\AuthService\AuthService;
use App\Services\AuthService\AuthServiceInterface;
use App\Services\EmailService\EmailServiceInterface;
use App\Services\EmailService\GmailEmailService;
use App\Services\PasswordService\PasswordService;
use App\Services\PasswordService\PasswordServiceInterface;
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
        $this->app->bind(PasswordServiceInterface::class, PasswordService::class);
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
