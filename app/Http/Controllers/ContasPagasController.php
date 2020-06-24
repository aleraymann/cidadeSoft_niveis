<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\ContasPagas;
use App\model\CliFor;
use App\model\Form_Pag;
use App\model\Cond_Pag;
use App\model\ContaCadastro;
use App\model\CentroCusto;
use App\model\Empresa;
use Gate;
use Illuminate\Support\Facades\DB;

class ContasPagasController extends Controller
{
    public function listar( ContasPagas $ctas_pagas)
    {  
        $ctas_pagas = $ctas_pagas->all();
        $ctas_pagas = ContasPagas::paginate(20);
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $conta = ContaCadastro::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        return view("contas_pagas", compact("ctas_pagas","clifor","f_pag","c_pag","conta","c_cust","empresa")); 
    }

    public function salvar(Request $dadosFormulario,ContasPagas $ctas_pagas, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $ctas_pagas->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ContasPagasController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $ctas_pagas->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ContasPagasController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("ContasPagasController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function destroy($Codigo,ContasPagas $ctas_pagas)
    {
        $ctas_pagas->destroy($Codigo);
    }

    public function editar(ContasPagas $ctas_pagas, $id)
    {
        $ctas_pagas = $ctas_pagas->find($id);
        if(Gate::denies('view_ctas_pagas',$ctas_pagas)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $conta = ContaCadastro::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        return view("edit.edit_contas_pagas", compact("ctas_pagas","id","clifor","f_pag","c_pag","conta","c_cust","empresa"));
    }

    public function visualizar(ContasPagas $ctas_pagas, $id)
    {
        $ctas_pagas = $ctas_pagas->find($id);
        if(Gate::denies('view_ctas_pagas',$ctas_pagas)){
            return redirect()->back();
        }
        return view("visual.view_contas_pagas", compact("ctas_pagas","id"));
    }

}
