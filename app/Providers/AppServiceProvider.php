<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Responsable;

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
        Schema::defaultStringLength(191);

        // Définir les Gates pour la gestion des rôles
        Gate::define('isUser', function ($user) {
            return $user instanceof User;
        });

        Gate::define('isResponsable', function ($responsable) {
            return $responsable instanceof Responsable;
        });

        // Partager des variables globales avec toutes les vues
        view()->share('appName', config('app.name'));
    }
    
}
