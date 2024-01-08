<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\IngressoFesta;
use App\Models\SenhaCorrida;
use App\Models\User;
use App\Policies\UserCanSeeSenha;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('user-can-see-senha', function(User $user, SenhaCorrida $senha)
        {
            return $user->id == $senha->user_id;
        });

        Gate::define('user-can-see-ingresso', function(User $user, IngressoFesta $ingresso)
        {
            return $user->id == $ingresso->user_id;
        });
    }
}
