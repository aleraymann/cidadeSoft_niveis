<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\model\Empresa;
use App\model\Funcionario;
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
        //empresa
        Gate::define('update_empresa', function( User $user, Empresa $empresa){//update - delete
            return $user->id == $empresa->user_id;     
        });
        
        
        Gate::define('view_empresa', function( User $user, Empresa $empresa){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $empresa->user_id;     
            }
            if( $user->hasAnyRoles('funcionario')){
                return $user->empresa == $empresa->Codigo;     
            }
        });


        //funcionario
        Gate::define('update_funcionario', function( User $user, Funcionario $funcionario){//update - delete
            return $user->id == $funcionario->user_id;     
        });
        
        Gate::define('view_emp_func', function( User $user, Empresa $empresa){//update - delete
            return $user->empresa == $empresa->Codigo;
        });
       
        //Users
       

        $permissions = Permission::with('roles')->get(); //recupera tudo das funcoes..
        //dd($permissions); //  puxa todas as permissoes 
        $contador = 0;

        foreach($permissions as $perm){
            
            Gate::define($perm->name, function(User $user) use ($perm){ // verifica se o user logado tem a permissao q esta no loop
                return $user->hasPermission($perm);     //return true
            });
        }

        Gate::before(function (User $user, $ability){
            if($user->hasAnyRoles('s_adm')){
                return true;
            }
        });

    }
}
