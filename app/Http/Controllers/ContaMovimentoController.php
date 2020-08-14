<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\ContaMovimento;
use App\model\CliFor;
use App\model\ContaCadastro;
use App\model\CentroCusto;
use App\model\Empresa;
use App\model\DataContaMovimento;
use App\model\ContaSaldo;
use Gate;
use Illuminate\Support\Facades\DB;


class ContaMovimentoController extends Controller
{
    public function listar( ContaMovimento $conta_movimento)
    
    {  
        $conta_movimento = $conta_movimento->all();
        return view('movimento',compact('conta_movimento'));
       
    }

    public function pesquisaAjax(Request $request){
        $nomeCliente = $request['nomeCliente'];
  
        $dados = DB::select("SELECT Codigo FROM `clifor` WHERE Nome_Fantasia = '$nomeCliente' ");
        foreach($dados as $dados){
            $dados = $dados->Codigo;
        }
        return json_encode($dados);
    }

    public function pesquisaAjaxSaldo(Request $request){
        $id_conta = $request['id_conta'];
        $dados = DB::select("SELECT * FROM `conta_saldo` WHERE Cod_Conta = '$id_conta' order by Codigo desc limit 1 ");
        return ($dados);
    }

    public function salvar(Request $dadosFormulario,ContaMovimento $conta_movimento, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $conta_movimento->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("DataContaMovimentoController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $conta_movimento->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("DataContaMovimentoController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("DataContaMovimentoController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }
    public function editar(ContaMovimento $conta_movimento, $id)
    {
        $conta_movimento = $conta_movimento->find($id);
        //dd($id);
        if(Gate::denies('view_movimento', $conta_movimento)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $conta = ContaCadastro::all();
        $saldo = ContaSaldo::all();
        $custo = CentroCusto::all();
        $empresa = Empresa::all();
        $data_movimento = DataContaMovimento::all();
        return view("edit.edit_conta_movimento", compact('conta_movimento','id','clifor','conta','custo','empresa','saldo', 'data_movimento'));
    }

    public function excluir($Codigo,  ContaMovimento $conta_movimento)
    {
            $conta_movimento->destroy($Codigo);
    }

    public function visualizar(ContaMovimento $conta_movimento, $id)
    {
        $conta_movimento = ContaMovimento::find($id);
        return view("visual.view_movimento", compact("conta_movimento","id"));
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        if( $request->criterio == "NFF"){
            $criterio  = "Nota Fiscal";
        }else if( $request->criterio == "REC"){
            $criterio  = "Recibo";
        }
        $conta_movimento = ContaMovimento::where( 'Documento' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("busca_mov_conta", compact("conta_movimento","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
       
        $conta_movimento = ContaMovimento::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("busca_mov_conta", compact("conta_movimento","criterio")); 
    }
    public function busca( Request $request){
        $criterio  = $request->criterio;
        if( $request->criterio == "1"){
            $criterio  = "Dinheiro";
        }else if( $request->criterio == "2"){
            $criterio  = "Cheque";
        }
        else if( $request->criterio == "3"){
            $criterio  = "Cartão";
        }
        $conta_movimento = ContaMovimento::where( 'Especie' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("busca_mov_conta", compact("conta_movimento","criterio")); 
    }
}
