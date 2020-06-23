<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\ContasPagar;
use App\model\CliFor;
use App\model\Form_Pag;
use App\model\Cond_Pag;
use App\model\BoletoTitulo;
use App\model\CentroCusto;
use App\model\Empresa;
use Gate;
use Illuminate\Support\Facades\DB;


class ContasPagarController extends Controller
{
    public function listar( ContasPagar $ctas_pagar)
    {  
        $ctas_pagar = $ctas_pagar->all();
        $ctas_pagar = ContasPagar::paginate(20);
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $boleto = BoletoTitulo::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        return view("contas_pagar", compact("ctas_pagar","clifor","f_pag","c_pag","boleto","c_cust","empresa")); 
    }
    public function pesquisaAjax(Request $request){
        $numBoleto = $request['numBoleto'];
        $dados = DB::select("SELECT Codigo FROM `boleto_titulo` WHERE Nosso_Num = '$numBoleto' ");
        foreach($dados as $dados){
            $dados = $dados->Codigo;
        }
        return json_encode($dados);

    }

    public function salvar(Request $dadosFormulario,ContasPagar $ctas_pagar, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $ctas_pagar->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ContasPagarController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $ctas_pagar->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ContasPagarController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("ContasPagarController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function editar(ContasPagar $ctas_pagar, $id)
    {
        $ctas_pagar = $ctas_pagar->find($id);
        if(Gate::denies('view_ctas_pagar',$ctas_pagar)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $boleto = BoletoTitulo::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        return view("edit.edit_contas_pagar", compact("ctas_pagar","id","clifor","f_pag","c_pag","boleto","c_cust","empresa"));
    }

    public function destroy($Codigo,ContasPagar $ctas_pagar)
    {
        $ctas_pagar->destroy($Codigo);
    }
    
    public function visualizar(ContasPagar $ctas_pagar, $id)
    {
        $ctas_pagar = $ctas_pagar->find($id);
        if(Gate::denies('view_ctas_pagar',$ctas_pagar)){
            return redirect()->back();
        }
        return view("visual.view_contas_pagar", compact("ctas_pagar","id"));
    }

}
