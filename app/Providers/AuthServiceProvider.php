<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Responsable;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies=[
        // User::class=>UserPolicy::class,
        // \App\Models\User::class=>\App\Policies\UserPolisy::class;
    ];
    public function boot()
    {
        $this->registerPolicies();

    Gate::define('view-welcome', function ($user) {
        return $user ->isAdmin();
    });

    Gate::define('view-dashboards', function ($user) {
        return $user ->isResponsable();
    });
    }
}
