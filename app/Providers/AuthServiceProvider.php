<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\model\Empresa;
use App\model\Funcionario;
use App\model\Permission;
use App\model\Role;
use App\model\CliFor;
use App\model\Transportadora;
use App\model\CliForContato;
use App\model\CliForEmdereco;
use App\model\CliForReferencia;
use App\model\Transportadora_Destino;
use App\model\Transportadora_Valor;

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
        
        //empresa------------------------------------------------------------------------------
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
        Gate::define('view_emp_func', function( User $user, Empresa $empresa){//update - delete
            return $user->empresa == $empresa->Codigo;
        });
        
        
        //clifor-------------------------------------------------------------------------------
        Gate::define('view_clifor', function( User $user, CliFor $clifor){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $clifor->user_id;     
            }
            if( $user->hasAnyRoles('funcionario')){
                return $user->adm == $clifor->user_id;     
            }
        });
        Gate::define('view_cli_func', function( User $user, CliFor $clifor){//update - delete
            return $user->id == $clifor->Vendedor;
        });
        Gate::define('view_cli_adm', function( User $user, CliFor $clifor){//update - delete
            return $user->id == $clifor->user_id;
        });


        Gate::define('view_clifor_contato', function( User $user, CliForContato $cliforcontato){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $cliforcontato->user_id;     
            }
            if( $user->hasAnyRoles('funcionario')){
                return $user->adm == $clifor->user_id;     
            }
        });

        Gate::define('view_clifor_endereco', function( User $user, CliForEndereco $cliforendereco){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $cliforendereco->user_id;     
            }
            if( $user->hasAnyRoles('funcionario')){
                return $user->adm == $clifor->user_id;     
            }
        });
        Gate::define('view_clifor_referencia', function( User $user, CliForReferencia $clifor_referencia){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $clifor_referencia->user_id;     
            }
            if( $user->hasAnyRoles('funcionario')){
                return $user->adm == $clifor->user_id;     
            }
        });
      

        //funcionario-------------------------------------------------------------------------------------
        Gate::define('update_funcionario', function( User $user, Funcionario $funcionario){//update - delete
            return $user->id == $funcionario->user_id;     
        });
        Gate::define('update_vendedor', function( User $user, Funcionario $funcionario){//update - delete
            return $user->id == $funcionario->user_id;     
        });
        
        //transportadoras------------------------------------------------------------------------------------
        Gate::define('view_transp', function( User $user, Transportadora $transportadora){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $transportadora->user_id;     
            }
            if( $user->hasAnyRoles('funcionario')){
                return $user->adm == $transportadora->user_id;     
            }
        });
        Gate::define('view_transp_destino', function( User $user, Transportadora_Destino $destino){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $destino->user_id;     
            }
            if( $user->hasAnyRoles('funcionario')){
                return $user->adm == $destino->user_id;     
            }
        });
        Gate::define('view_transp_valor', function( User $user, Transportadora_Valor $valor){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $valor->user_id;     
            }
            if( $user->hasAnyRoles('funcionario')){
                return $user->adm == $valor->user_id;     
            }
        });

        //Users--------------------------------------------------------------------------------
       

        
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
