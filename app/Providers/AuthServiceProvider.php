<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\model\Empresa;
use App\model\Permission;
use App\model\Role;

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

        Gate::define('update_empresa', function( User $user, Empresa $empresa){
            return $user->id == $empresa->user_id;     
        });

        Gate::define('delete_empresa', function( User $user, Empresa $empresa){
            return $user->id == $empresa->user_id;     
        });

        $permissions = Permission::with('roles')->get(); //recupera tudo das funcoes..
        //dd($permissions);
        foreach($permissions as $perm){
            Gate::define($perm->name, function( User $user) use($perm){
                return $user->hasPermission($perm);     
            });
        }

    }
}
