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
use App\model\Calendario;
use App\model\Convenio;
use App\model\Contrato;
use App\model\DataContaMovimento;
use App\model\ContaMovimento;
use App\model\Cotacao;
use App\model\ContasPagar;
use App\model\ContasPagas;
use App\model\ContasReceber;
use App\model\ContasRecebidas;
use App\model\Inventario;
use App\model\Fluxo;
use App\model\Fidelidade;
use App\model\CFOP;
use App\model\Recibo;
use App\model\Equipamento;
use App\model\ReciboTitulo;
use App\model\Telemarketing;
use App\model\AjusteEstoque;
use App\model\Duplicata;
use App\model\InventarioContagem;
use App\model\InventarioItem;
use App\model\Comissao;
use App\model\AjusteItem;
use App\model\PlanoContas;
use App\model\CatPlanoContas;


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
                return $user->id == $empresa->Vend_CliForPadrao;     
          
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

         //----------Calendario------------------------------------------------------------------------------------
         Gate::define('view_eventos', function( User $user, Calendario $calendar){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $calendar->user_id;     
            }else
                return $user->id == $calendar->cod_usuario;     
        });

         //----------Convenio------------------------------------------------------------------------------------
         Gate::define('view_convenio', function( User $user, Convenio $convenio){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $convenio->user_id;     
            }else
                return $user->adm == $convenio->user_id;     
        });

          //----------Contrato------------------------------------------------------------------------------------
          Gate::define('view_contrato', function( User $user, Contrato $contrato){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $contrato->user_id;     
            }else
                return $user->adm == $contrato->user_id;     
        });

         //----------Data Movimento------------------------------------------------------------------------------------
         Gate::define('view_data_movimento', function( User $user, DataContaMovimento $data){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $data->user_id;     
            }else
                return $user->adm == $data->user_id;     
        });

         //---------- Movimento------------------------------------------------------------------------------------
         Gate::define('view_movimento', function( User $user, ContaMovimento $movimento){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $movimento->user_id;     
            }else
                return $user->adm == $movimento->user_id;     
        });

          //---------- Cotacao------------------------------------------------------------------------------------
          Gate::define('view_cotacao', function( User $user,Cotacao $cotacao){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $cotacao->user_id;     
            }else
                return $user->adm == $cotacao->user_id;     
        });

         //---------- Contas Pagar------------------------------------------------------------------------------------
         Gate::define('view_ctas_pagar', function( User $user,ContasPagar $ctas_pagar){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $ctas_pagar->user_id;     
            }else
                return $user->adm == $ctas_pagar->user_id;     
        });

        Gate::define('view_ctas_pagas', function( User $user,ContasPagas $ctas_pagas){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $ctas_pagas->user_id;     
            }else
                return $user->adm == $ctas_pagas->user_id;     
        });

        //---------- Contas Receber------------------------------------------------------------------------------------
        Gate::define('view_ctas_receber', function( User $user,ContasReceber $ctas_receber){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $ctas_receber->user_id;     
            }else
                return $user->adm == $ctas_receber->user_id;     
        });

         //---------- Contas Recebidas------------------------------------------------------------------------------------
         Gate::define('view_ctas_recebidas', function( User $user,ContasRecebidas $ctas_recebidas){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $ctas_recebidas->user_id;     
            }else
                return $user->adm == $ctas_recebidas->user_id;     
        });
        //---------- Inventario------------------------------------------------------------------------------------
        Gate::define('view_inventario', function( User $user,Inventario $inventario){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $inventario->user_id;     
            }else
                return $user->adm == $inventario->user_id;     
        });

         //---------- Fluxo------------------------------------------------------------------------------------
         Gate::define('view_fluxo', function( User $user,Fluxo $fluxo){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $fluxo->user_id;     
            }else
                return $user->adm == $fluxo->user_id;     
        });

         //---------- Fidelidade------------------------------------------------------------------------------------
         Gate::define('view_fidelidade', function( User $user,Fidelidade $fidelidade){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $fidelidade->user_id;     
            }else
                return $user->adm == $fidelidade->user_id;     
        });

        //---------- CFOP ------------------------------------------------------------------------------------
        Gate::define('view_cfop', function( User $user,CFOP $cfop){//apenas visualizar
            if( $user->hasAnyRoles('adm')){
                return $user->id == $cfop->user_id;     
            }else
                return $user->adm == $cfop->user_id;     
        });

       //---------- Recibo ------------------------------------------------------------------------------------
       Gate::define('view_recibo', function( User $user,Recibo $recibo){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $recibo->user_id;     
        }else
            return $user->adm == $recibo->user_id;     
    });

    //---------- Equipamento ------------------------------------------------------------------------------------
    Gate::define('view_equipamento', function( User $user,Equipamento $equipamento){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $equipamento->user_id;     
        }else
            return $user->adm == $equipamento->user_id;     
    });

    //---------- Recibo Titulo ------------------------------------------------------------------------------------
    Gate::define('view_recibo_tit', function( User $user, ReciboTitulo $recibo_tit){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $recibo_tit->user_id;     
        }else
            return $user->adm == $recibo_tit->user_id;     
    });

     //---------- Telemarketing ------------------------------------------------------------------------------------
     Gate::define('view_telemarketing', function( User $user, Telemarketing $telemarketing){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $telemarketing->user_id;     
        }else
            return $user->adm == $telemarketing->user_id;     
    });

     //---------- Ajuste Estoque ------------------------------------------------------------------------------------
     Gate::define('view_ajuste_est', function( User $user, AjusteEstoque $ajuste){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $ajuste->user_id;     
        }else
            return $user->adm == $ajuste->user_id;     
    });

     //---------- Duplicata ------------------------------------------------------------------------------------
     Gate::define('view_duplicata', function( User $user, Duplicata $duplicata){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $duplicata->user_id;     
        }else
            return $user->adm == $duplicata->user_id;     
    });

     //---------- Contagem de Inventario ------------------------------------------------------------------------------------
     Gate::define('view_invent_cont', function( User $user, InventarioContagem $inventario_contagem){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $inventario_contagem->user_id;     
        }else
            return $user->adm == $inventario_contagem->user_id;     
    });

    //---------- Item de Inventario ------------------------------------------------------------------------------------
    Gate::define('view_invent_item', function( User $user, InventarioItem $inventario_item){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $inventario_item->user_id;     
        }else
            return $user->adm == $inventario_item->user_id;     
    });

    //---------- Comissao ------------------------------------------------------------------------------------
    Gate::define('view_comissao', function( User $user, Comissao $comissao){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $comissao->user_id;     
        }else
            return $user->adm == $comissao->user_id;     
    });

     //---------- Ajuste de Item ------------------------------------------------------------------------------------
     Gate::define('view_ajuste_item', function( User $user, AjusteItem $ajuste_item){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $ajuste_item->user_id;     
        }else
            return $user->adm == $ajuste_item->user_id;     
    });

    //---------- Plano de Contas ------------------------------------------------------------------------------------
    Gate::define('view_planocontas', function( User $user, PlanoContas $planocontas){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $planocontas->user_id;     
        }else
            return $user->adm == $planocontas->user_id;     
    });

     //---------- Cat de Plano de Contas ------------------------------------------------------------------------------------
     Gate::define('view_cat_planocontas', function( User $user, CatPlanoContas $cat_planocontas){//apenas visualizar
        if( $user->hasAnyRoles('adm')){
            return $user->id == $cat_planocontas->user_id;     
        }else
            return $user->adm == $cat_planocontas->user_id;     
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
