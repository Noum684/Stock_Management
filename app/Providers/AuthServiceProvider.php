<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Responsable;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

    Gate::define('view-welcome', function ($user) {
        return $user instanceof User;
    });

    Gate::define('view-dashboards', function ($user) {
        return $user instanceof Responsable;
    });
    }
}
