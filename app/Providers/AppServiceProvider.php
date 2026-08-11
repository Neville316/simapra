<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(Login::class, function ($event) {
            $event->user->logActivity('login', 'User berhasil login ke sistem');
        });

        Event::listen(Logout::class, function ($event) {
            $event->user->logActivity('logout', 'User berhasil logout dari sistem');
        });
    }
}
