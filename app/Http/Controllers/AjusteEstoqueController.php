<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\AjusteEstoque;
use App\model\AjusteItem;
use App\model\CliFor;
use App\model\Empresa;
use App\User;
use Gate;

class AjusteEstoqueController extends Controller
{
    public function listar( AjusteEstoque $ajuste_estoque)
    {  
        $ajuste_estoque = $ajuste_estoque->all();
        $ajuste_estoque = AjusteEstoque::paginate(20);
        $clifor = CliFor::all();
        $funcionario = User::all();
        $empresa = Empresa::all();
        $criterio = "";
        return view("ajuste_estoque", compact("ajuste_estoque","empresa","funcionario","clifor","criterio")); 
    }

    public function salvar(Request $dadosFormulario,  AjusteEstoque $ajuste_estoque, $id = null)
    {
       //dd($dadosFormulario);
        try
        {
            if($id > 0)
            {
                $dados = $ajuste_estoque->find($id);
                $dados->update($dadosFormulario->all());
                return redirect()
                ->action("AjusteEstoqueController@listar")
                ->with("toast_success", "Registro Editado Com Sucesso");
            }
            else
            {
                $ajuste_estoque->create($dadosFormulario->all());
            }
            
            return redirect()
            ->action("AjusteEstoqueController@listar")
            ->with("toast_success", "Registro Gravado Com Sucesso");
        } 
        catch (\Illuminate\Database\QueryException $e) 
        {
            //dd($e);
            return redirect()
            ->action("AjusteEstoqueController@listar")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }

    public function excluir($Codigo,  AjusteEstoque $ajuste_estoque)
    {
        $ajuste_estoque->destroy($Codigo);
    }
       
    public function editar ( AjusteEstoque $ajuste_estoque, $id)
    {
        $ajuste_estoque = $ajuste_estoque->find($id);
        if(Gate::denies('view_ajuste_est', $ajuste_estoque)){
            return redirect()->back();
        }
        $clifor = CliFor::all();
        $funcionario = User::all();
        $empresa = Empresa::all();
        return view("edit.edit_ajuste_estoque", compact("ajuste_estoque","id","clifor","funcionario","empresa"));
    }

    public function visualizar(AjusteEstoque $ajuste_estoque, $id)
    {
        $ajuste_estoque = $ajuste_estoque->find($id);
         if(Gate::denies('view_ajuste_est', $ajuste_estoque)){
            return redirect()->back();
        }
        $ajuste_item = AjusteItem::all();
        return view("visual.view_ajuste_estoque", compact("ajuste_estoque","id","ajuste_item"));
    }

    public function busca( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $clifor = CliFor::all();
        $funcionario = User::all();
        $empresa = Empresa::all();
        $criterio = "Data de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $ajuste_estoque = AjusteEstoque::whereBetween( 'Data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("ajuste_estoque", compact("ajuste_estoque","clifor","funcionario","empresa","criterio")); 
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $funcionario = User::all();
        $empresa = Empresa::all();
        $ajuste_estoque = AjusteEstoque::where( 'Codigo' , 'LIKE', '%'. $request->criterio .'%' )->paginate(10);
        return view("ajuste_estoque", compact("ajuste_estoque","clifor","funcionario","empresa","criterio")); 
    }

    public function busca3( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $funcionario = User::all();
        $empresa = Empresa::all();
        $ajuste_estoque = AjusteEstoque::where( 'Situacao' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("ajuste_estoque", compact("ajuste_estoque","clifor","funcionario","empresa","criterio")); 
    }
    public function busca4( Request $request){
        $criterio  = $request->criterio;
        $clifor = CliFor::all();
        $funcionario = User::all();
        $empresa = Empresa::all();
        if( $request->criterio == "S"){
            $criterio  = "Saída";
        }else if( $request->criterio == "E"){
            $criterio  = "Entrada";
        }
        $ajuste_estoque = AjusteEstoque::where( 'Tipo_Mov' , 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("ajuste_estoque", compact("ajuste_estoque","clifor","funcionario","empresa","criterio")); 
    }


}
