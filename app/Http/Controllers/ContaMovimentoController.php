<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\ContaMovimento;
use App\model\CliFor;
use App\model\ContaCadastro;
use App\model\CentroCusto;
use App\model\Empresa;
use Illuminate\Support\Facades\DB;


class ContaMovimentoController extends Controller
{
    public function listar( ContaMovimento $conta_movimento)
    
    {  
        $conta_movimento = $conta_movimento->all();
        $clifor = CliFor::all();
        $conta = ContaCadastro::all();
        $custo = CentroCusto::all();
        $empresa = Empresa::all();
        return view('movimento',compact('conta_movimento','clifor','conta','custo','empresa'));
       
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
                $dados->update($conta_movimento->all());
                return redirect()
                ->action("ContaMovimentoController@listar")
                ->with("toast_success", "Registro Editado com sucesso");
            }
            else
            {
                $conta_movimento->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ContaMovimentoController@listar")
            ->with("toast_success", "Registro Gravado com sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("ContaMovimentoController@listar")
            ->with("toast_error", "Erro ao Gravar Registro");
        }

    }
}
