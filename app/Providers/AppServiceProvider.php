<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

/**
 * Application Service Provider.
 * 
 * Follows Rule 4.1 (Eloquent Hardening) and Rule 3.5 (Error Masking).
 */
final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * 
     * @return void
     */
    public function boot(): void
    {
        // Prevent lazy loading in non-production environments
        // Follows Rule 4.1 for better performance and integrity.
        Model::preventLazyLoading(!app()->isProduction());
        
        // Prevent accessing missing attributes
        Model::preventAccessingMissingAttributes(!app()->isProduction());

        // Fix for MySQL old version index length issue
        Schema::defaultStringLength(191);
    }
}
