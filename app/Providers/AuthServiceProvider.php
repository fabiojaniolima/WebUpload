<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('arquivos', function ($user, $arq)
        {
            return $user->id === $arq->user_id;
        });
        
        Gate::define('preferencias', function ($user)
        {
            return $user->id == 1;
        });
        
        //Gate::before(function ($user) {
        //    if($user->id == 1) {
        //        return true;
        //    }
        //});
    }
}
