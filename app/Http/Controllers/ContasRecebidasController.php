<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\ContasRecebidas;
use App\model\CliFor;
use App\model\Form_Pag;
use App\model\Cond_Pag;
use App\model\ContaCadastro;
use App\model\CentroCusto;
use App\model\Empresa;
use Gate;
use Illuminate\Support\Facades\DB;

class ContasRecebidasController extends Controller
{
    public function listar( ContasRecebidas $ctas_recebidas)
    {  
        $ctas_recebidas = $ctas_recebidas->all();
        $ctas_recebidas = ContasRecebidas::paginate(20);
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $conta = ContaCadastro::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        return view("contas_recebidas", compact("ctas_recebidas","clifor","f_pag","c_pag","conta","c_cust","empresa")); 
    }

    public function salvar(Request $dadosFormulario,ContasRecebidas $ctas_recebidas, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $ctas_recebidas->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ContasRecebidasController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $ctas_recebidas->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ContasRecebidasController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("ContasRecebidasController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function destroy($Codigo,ContasRecebidas $ctas_recebidas)
    {
        $ctas_recebidas->destroy($Codigo);
    }

    public function editar(ContasRecebidas $ctas_recebidas, $id)
    {
        $ctas_recebidas = $ctas_recebidas->find($id);
        if(Gate::denies('view_ctas_recebidas',$ctas_recebidas)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $conta = ContaCadastro::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        return view("edit.edit_contas_recebidas", compact("ctas_recebidas","id","clifor","f_pag","c_pag","conta","c_cust","empresa"));
    }

    public function visualizar(ContasRecebidas $ctas_recebidas, $id)
    {
        $ctas_recebidas = $ctas_recebidas->find($id);
        if(Gate::denies('view_ctas_recebidas',$ctas_recebidas)){
            return redirect()->back();
        }
        return view("visual.view_contas_recebidas", compact("ctas_recebidas","id"));
    }
}
