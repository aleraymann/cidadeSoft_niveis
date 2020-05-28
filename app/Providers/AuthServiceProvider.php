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
use App\model\CliForEndereco;
use App\model\CliForReferencia;
use App\model\Transportadora_Destino;
use App\model\Transportadora_Valor;
use App\model\Cond_Pag;
use App\model\Form_Pag;
use App\model\CentroCusto;
use App\model\CategoriaOS;
use App\model\Adicional_OSPed;
use App\model\BoletoRemessa;
use App\model\BoletoTitulo;
use App\model\ContaCadastro;
use App\model\NCM;
use App\model\CEST;

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
        
        //----------Empresa------------------------------------------------------------------------------
        Gate::define('view_empresa', function( User $user, Empresa $empresa){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $empresa->user_id;     
            }
            else
                return $user->empresa == $empresa->Codigo;     
          
        });
        Gate::define('view_empresa_boleto', function( User $user, Empresa $empresa){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $empresa->user_id;     
            }
            else
                return $user->adm == $empresa->user_id;     
          
        });
        
        
        //----------Clifor-------------------------------------------------------------------------------
        Gate::define('view_clifor', function( User $user, CliFor $clifor){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $clifor->user_id;     
            }
            else if( $user->hasAnyRoles('funcionario')){
                return $user->id == $clifor->Vendedor;     
            }
            else
                return $user->adm == $clifor->user_id;     
        });

        Gate::define('view_clifor_contato', function( User $user, CliForContato $cliforcontato){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $cliforcontato->user_id;     
            }
        });

        Gate::define('view_clifor_endereco', function( User $user, CliForEndereco $cliforendereco){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $cliforendereco->user_id;     
            }
        });
        Gate::define('view_clifor_referencia', function( User $user, CliForReferencia $clifor_referencia){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $clifor_referencia->user_id;     
            }  
        });
      

        //----------Funcionario-------------------------------------------------------------------------------------
        Gate::define('update_funcionario', function( User $user, Funcionario $funcionario){//update - delete
            return $user->id == $funcionario->user_id;     
        });
        

        //----------Transportadoras------------------------------------------------------------------------------------
        Gate::define('view_transp', function( User $user, Transportadora $transportadora){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $transportadora->user_id;     
            }
            else
                return $user->adm == $transportadora->user_id;     
        });

            Gate::define('view_transp_destino', function( User $user, Transportadora_Destino $destino){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $destino->user_id;     
            }
        });

            Gate::define('view_transp_valor', function( User $user, Transportadora_Valor $valor){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $valor->user_id;     
            }
        });

       
        //----------Condição Pagamento------------------------------------------------------------------------------------
        Gate::define('view_condPag', function( User $user, Cond_Pag $cond_pag){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $cond_pag->user_id;     
            }
           else
                return $user->adm == $cond_pag->user_id;     
        });


          //----------Forma Pagamento------------------------------------------------------------------------------------
          Gate::define('view_formPag', function( User $user, Form_Pag $form_pag){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $form_pag->user_id;     
            }else
                return $user->adm == $form_pag->user_id;     
        });


        //----------Centro Custo------------------------------------------------------------------------------------
        Gate::define('view_centroCusto', function( User $user, CentroCusto  $centrocusto){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $centrocusto->user_id;     
            }else
                return $user->adm == $centrocusto->user_id;     
        });


         //----------Categoria pedidos------------------------------------------------------------------------------------
         Gate::define('view_catOS', function( User $user, CategoriaOS $categoriaOS){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $categoriaOS->user_id;     
            }else
                return $user->adm == $categoriaOS->user_id;     
        });


        //----------Adicional OS/Ped------------------------------------------------------------------------------------
        Gate::define('view_adiOS', function( User $user, Adicional_OSPed $adiOS){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $adiOS->user_id;     
            }else
                return $user->adm == $adiOS->user_id;     
        });

        //----------Boleto Remessa------------------------------------------------------------------------------------
        Gate::define('view_boletoRem', function( User $user, BoletoRemessa $boleto_remessa){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $boleto_remessa->user_id;     
            }else
                return $user->adm == $boleto_remessa->user_id;     
        });

         //----------Boleto Titulo------------------------------------------------------------------------------------
         Gate::define('view_boletoTit', function( User $user, BoletoTitulo $boleto_titulo){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $boleto_titulo->user_id;     
            }else
                return $user->adm == $boleto_titulo->user_id;     
        });

        //----------Conta Bancária------------------------------------------------------------------------------------
        Gate::define('view_conta', function( User $user, ContaCadastro $conta){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $conta->user_id;     
            }else
                return $user->adm == $conta->user_id;     
        });

        //----------NCM------------------------------------------------------------------------------------
        Gate::define('view_ncm', function( User $user,NCM $ncm){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $ncm->user_id;     
            }else
                return $user->adm == $ncm->user_id;     
        });
         //----------CEST------------------------------------------------------------------------------------
         Gate::define('view_cest', function( User $user, CEST $cest){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $cest->user_id;     
            }else
                return $user->adm == $cest->user_id;     
        });

        









        
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
