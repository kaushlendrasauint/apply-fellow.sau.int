<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


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
        // VerifyCsrfToken::except([
        //     // 'sau-payment/success', // Exclude this route
        //     '/sau-payment/success', // Exclude this route
        //     // 'https://apply.sau.int/sau-payment/success', // Exclude this route
        // ]);
    }
}
