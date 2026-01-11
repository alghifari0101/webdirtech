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
        require_once app_path('helpers.php');
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

        // Force HTTPS in production
        if (app()->isProduction()) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Define 'admin' gate for authorization
        \Illuminate\Support\Facades\Gate::define('admin', function (\App\Models\User $user) {
            return $user->role === 'admin';
        });

        // Define 'member' gate for active CV users
        \Illuminate\Support\Facades\Gate::define('member', function (\App\Models\User $user) {
            return $user->role === 'member' && $user->is_active;
        });
    }
}
