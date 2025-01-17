<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Vérifier si un utilisateur est admin
        Gate::define('isAdmin', function ($user) {
            return $user instanceof \App\Models\User;
        });

        // Vérifier si un utilisateur est responsable
        Gate::define('isResponsable', function ($user) {
            return $user instanceof \App\Models\Responsable;
        });

        // Permettre à l'admin d'accéder à tout
        Gate::define('accessAllStocks', function ($user) {
            return $user instanceof \App\Models\User;
        });

        // Permettre au responsable d'accéder uniquement à son point de vente
        Gate::define('accessOwnStock', function ($user, $pointVenteId) {
            return $user instanceof \App\Models\Responsable && $user->point_vente_id == $pointVenteId;
        });
    }
}
