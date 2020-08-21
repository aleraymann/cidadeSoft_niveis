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
use App\model\PlanoContas;
use App\model\Recibo;
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
        $planocontas = PlanoContas::all();
        $recibos = Recibo::all();
        $criterio = "";
        return view("contas_recebidas", compact("ctas_recebidas","clifor","f_pag","c_pag","conta","c_cust","empresa","criterio","planocontas","recibos")); 
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
        $planocontas = PlanoContas::all();
        $recibos = Recibo::all();
        return view("edit.edit_contas_recebidas", compact("ctas_recebidas","id","clifor","f_pag","c_pag","conta","c_cust","empresa","planocontas","recibos"));
    }

    public function visualizar(ContasRecebidas $ctas_recebidas, $id)
    {
        $ctas_recebidas = $ctas_recebidas->find($id);
        if(Gate::denies('view_ctas_recebidas',$ctas_recebidas)){
            return redirect()->back();
        }
        return view("visual.view_contas_recebidas", compact("ctas_recebidas","id"));
    }

    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $criterio = "pagamento de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $conta = ContaCadastro::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        $planocontas = PlanoContas::all();
        $recibos = Recibo::all();
        $ctas_recebidas = ContasRecebidas::whereBetween( 'Data_Pagto' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("contas_recebidas", compact("ctas_recebidas","clifor","f_pag","c_pag","conta","c_cust","empresa", "criterio","planocontas","recibos")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $conta = ContaCadastro::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        $planocontas = PlanoContas::all();
        $recibos = Recibo::all();
        $ctas_recebidas = ContasRecebidas::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("contas_recebidas", compact("ctas_recebidas","clifor","f_pag","c_pag","conta","c_cust","empresa", "criterio","planocontas","recibos")); 
    }

}
