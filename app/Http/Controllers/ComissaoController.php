<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Comissao;
use App\model\ContasReceber;
use App\model\Funcionario;
use Gate;

class ComissaoController extends Controller
{
    public function listar( Comissao $comissao)
    {  
        $comissao = $comissao->all();
        $comissao = Comissao::paginate(20);
        $contas_receber = ContasReceber::all();
        $funcionario = Funcionario::all();
        $criterio = "";
        return view("comissao", compact("comissao","criterio","funcionario", "contas_receber")); 
    }
    public function salvar(Request $dadosFormulario, Comissao $comissao, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $comissao->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("ComissaoController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $comissao->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("ComissaoController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("ComissaoController@listar")
            ->with("toast_error","Houve um erro ao gravar o registro");
        }
    }
    public function editar( Comissao $comissao, $id)
    {
        $comissao = $comissao->find($id);
        $contas_receber = ContasReceber::all();
        $funcionario = Funcionario::all();
        if(Gate::denies('view_comissao', $comissao)){
            return redirect()->back();
        }
        return view("edit.edit_comissao", compact("comissao","id","funcionario", "contas_receber"));
    }
    public function excluir($Codigo, Comissao $comissao)
    {
        $comissao->destroy($Codigo);
    }
    
    public function visualizar(Comissao $comissao, $id)
    {
        $comissao = $comissao->find($id);
        if(Gate::denies('view_comissao',$comissao)){
            return redirect()->back();
        }
        return view("visual.view_comissao", compact("comissao","id"));
    }



    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $contas_receber = ContasReceber::all();
        $funcionario = Funcionario::all();
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $comissao = Comissao::whereBetween( 'Data_Prev' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("comissao", compact("comissao","criterio","funcionario", "contas_receber")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $contas_receber = ContasReceber::all();
        $funcionario = Funcionario::all();
        $comissao = Comissao::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("comissao", compact("comissao","criterio","funcionario", "contas_receber")); 
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        $contas_receber = ContasReceber::all();
        $funcionario = Funcionario::all();
        if( $request->criterio == "B"){
            $criterio  = "Bloqueado";
        }else if( $request->criterio == "L"){
            $criterio  = "Livre";
        }
        $comissao = Comissao::where( 'Situacao' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("comissao", compact("comissao","criterio","funcionario", "contas_receber")); 
    }
    public function busca4( Request $request){
        $criterio  = $request->criterio;
        $contas_receber = ContasReceber::all();
        $funcionario = Funcionario::all();

        if( $request->criterio == "A"){
            $criterio  = "Aberto";
        }else if( $request->criterio == "P"){
            $criterio  = "Pago";
        }
        $comissao = Comissao::where( 'Status' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("comissao", compact("comissao","criterio","funcionario", "contas_receber")); 
    }

}
