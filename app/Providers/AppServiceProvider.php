<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            try {
                return $user->hasRole('super_admin') ? true : null;
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Gate::before error', ['error' => $e->getMessage()]);
                return null;
            }
        });
    }
}