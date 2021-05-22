<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
