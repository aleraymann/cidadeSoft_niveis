<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\ContasReceber;
use App\model\CliFor;
use App\model\Form_Pag;
use App\model\Cond_Pag;
use App\model\BoletoTitulo;
use App\model\CentroCusto;
use App\model\Empresa;
use App\model\PlanoContas;
use App\model\Recibo;
use Gate;
use Illuminate\Support\Facades\DB;

class ContasReceberController extends Controller
{
    public function listar( ContasReceber $ctas_receber)
    {  
        $ctas_receber = $ctas_receber->all();
        $ctas_receber = ContasReceber::paginate(20);
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $boleto = BoletoTitulo::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        $planocontas = PlanoContas::all();
        $recibos = Recibo::all();
        $criterio = "";
        return view("contas_receber", compact("ctas_receber","clifor","f_pag","c_pag","boleto","c_cust","empresa","criterio","planocontas","recibos")); 
    }
    public function pesquisaAjax(Request $request){
        $numBoleto = $request['numBoleto'];
        $dados = DB::select("SELECT Codigo FROM `boleto_titulo` WHERE Nosso_Num = '$numBoleto' ");
        foreach($dados as $dados){
            $dados = $dados->Codigo;
        }
        return json_encode($dados);

    }

    public function salvar(Request $dadosFormulario,ContasReceber $ctas_receber, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $ctas_receber->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ContasReceberController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $ctas_receber->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ContasReceberController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("ContasReceberController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function editar(ContasReceber $ctas_receber, $id)
    {
        $ctas_receber = $ctas_receber->find($id);
        if(Gate::denies('view_ctas_receber',$ctas_receber)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $boleto = BoletoTitulo::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        $planocontas = PlanoContas::all();
        $recibos = Recibo::all();
        return view("edit.edit_contas_receber", compact("ctas_receber","id","clifor","f_pag","c_pag","boleto","c_cust","empresa","planocontas","recibos"));
    }

    public function destroy($Codigo,ContasReceber $ctas_receber)
    {
        $ctas_receber->destroy($Codigo);
    }
    
    public function visualizar(ContasReceber $ctas_receber, $id)
    {
        $ctas_receber = $ctas_receber->find($id);
        if(Gate::denies('view_ctas_receber',$ctas_receber)){
            return redirect()->back();
        }
        return view("visual.view_contas_receber", compact("ctas_receber","id"));
    }

    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $criterio = "vencimento de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $boleto = BoletoTitulo::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        $planocontas = PlanoContas::all();
        $recibos = Recibo::all();
        $ctas_receber = ContasReceber::whereBetween( 'Vencimento' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("contas_receber", compact("ctas_receber","clifor","f_pag","c_pag","boleto","c_cust","empresa", "criterio","planocontas","recibos")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $f_pag = Form_Pag::all();
        $c_pag = Cond_Pag::all();
        $boleto = BoletoTitulo::all();
        $c_cust = CentroCusto::all();
        $empresa = Empresa::all();
        $planocontas = PlanoContas::all();
        $recibos = Recibo::all();
        $ctas_receber = ContasReceber::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("contas_receber", compact("ctas_receber","clifor","f_pag","c_pag","boleto","c_cust","empresa", "criterio","planocontas","recibos")); 
    }

}
